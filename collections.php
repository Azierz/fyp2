<?php 
$page_title = 'Collections: Game Details';
include ('includes/theader.html');
require ('mysqli_connect.php');

if ($_SESSION["toggle"] == 1){ // SECURE CODES

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['gameid'])){
			$col_id = $_POST['gameid'];
			$_SESSION['cur_id'] = $_POST['gameid'];
		} else {
			$col_id = $_SESSION['cur_id'];
		}
		
		if(isset($_SESSION['name'])){
			$name = $_SESSION['name'];
		} else {
			$name = "Anonymous";
		}

		if (!empty($_POST['current'])) {
			$errors = array(); // Initialize error array.

			// Validate the comments:
			if (empty($_POST['comments'])) {
				$errors[] = 'No comment(s)/review(s) has been inserted.';
			} else {
				$c = mysqli_real_escape_string($dbc, trim($_POST['comments']));
			}

			if(empty($errors)) {
				// $user_id=$_SESSION['user_id'];
				
				$q = "INSERT INTO reviews (col_id, timestamp, name, comments) VALUES ('$col_id', NOW(), '$name', '$c')";		
				$r = @mysqli_query ($dbc, $q);

				if ($r) { // If it ran OK.
					echo '
						<script>
						window.alert("\nYour review has been added!");
						setTimeout(function(){location.href="collections"},0);
						</script>';
				} else { // If it did not run OK.
					echo '
						<script>
						window.alert("\nYour review could not be added!");
						setTimeout(function(){location.href="collections"},0);
						</script>';
				}
			} else { // Report the errors.
				echo '
					<script>
					window.alert("\nYour review could not be added!");
					setTimeout(function(){location.href="collections"},0);
					</script>';
			}
	}}


	echo '
	<div class="flex-con">
		<div class="flex-container" style="justify-content: flex-start;align-items: center;">';
		
		if(!isset($_POST['gameid'])) {
			$col_id = $_SESSION['cur_id'];	
		} else {
			$col_id = $_POST['gameid'];
		}
		
		$q = "SELECT * FROM collections WHERE collection_id='$col_id' ORDER BY collection_id";		
		$r = @mysqli_query ($dbc, $q);

		$q1 = "SELECT * FROM reviews WHERE col_id='$col_id' ORDER BY comment_id";		
		$r1 = @mysqli_query ($dbc, $q1);

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Fetch and print the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			// echo "<p>Here's your profile information:</p>";
			echo '<h1 style="width:60vh">'.$row['game_name'].'</h1>';
			// Change Profile Picture
			echo '
			<img src="'. $row['game_pic'] .'" style="max-width:350; width: 100%; height: auto;">';

			echo '
			<table align="center" cellspacing="10" cellpadding="10" width=400vh>
				<tr>
					<td colspan="2" align="center"><b>Basic Info</b></td>
				</tr>
				<tr>
					<td><b>Developer</b></td>
					<td id = "table_td">' . $row['developer'] . '</td>
				</tr>
				<tr>
					<td><b>Publisher</b></td>
					<td id = "table_td">' . $row['publisher'] . '</td>
				</tr>
				<tr>
					<td><b>Platform</b></td>
					<td id = "table_td">' . $row['platform'] . '</td>
				</tr>
				<tr>
					<td><b>Genre</b></td>
					<td id = "table_td">' . $row['genre'] . '</td>
				</tr>
			</table>
			</div><div class="flex-container">&emsp;</div><div class="flex-container">
			<table align="center" cellspacing="10" cellpadding="10" width=60%>
				<tr>
					<td><b>Release Info</b></td>
					<td><a href="browse"><input class="form-submit-button" style="width:auto; height:fit-content; margin-left:75%" type="submit" name="submit" value="Go Back >"></td>
				</tr>
				<tr>
					<td><b>Version / Re-Release</b></td>
					<td><b>Order in Series</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['release_date'] . '</td>
					<td id = "table_td">' . $row['series_order'] . '</td>
				</tr>
				<!-- <tr>
					<td><b>Original Release</b></td>
					<td><b>Re-Release</b></td>
				</tr> -->
				<tr>
					<td><b>&emsp;</b></td>
				</tr>
				<tr>
					<td colspan=2><b>Description</b></td>
				</tr>
				<tr>
					<td id = "table_td" colspan=2 style="width:50vh;">' . $row['description'] . '</td>
				</tr>
				<tr>
					<td colspan=2><b>Comments / Reviews</b></td>
				</tr>
			';

			echo '
				<form action="collections.php" method="post">
					<input type="hidden" name="gameid" value="'.$row['collection_id'].'">
					<input type="hidden" name="current" value="1">
					<tr>
						<td colspan=2><textarea name="comments" rows="5" cols="90" placeholder=" Write a comment/review | Rate this game"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="form-submit-button" style="width:20%; height:fit-content; margin-left:80%" type="submit" name="submit" value="Submit"></td>
					</tr>
				</form> ';

			$num1 = mysqli_num_rows($r1);

			if ($num1 > 0) { // If it ran OK, display the records.
				// Fetch and print the record:
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
					
					echo '
					<tr>
						<td id = "table_td" colspan=2>' . $row1['timestamp'] . ' | ' . $row1['name'] . '
						<br><br>' . htmlspecialchars($row1['comments']) . '</td>
					</tr>
					';
				}
			} else { // If no records were returned.
				echo '
				<tr>
					<td id = "table_td" colspan=2>
					There are currently no comment(s)/review(s) for this game.</td>
				</tr>
				';
			}

			echo '
			</table>
			</div>';

			mysqli_free_result ($r);	
			mysqli_free_result ($r1);		

		} else { // If no records were returned.
			echo '
			<p class="error">There are currently no registered game on this website.</p>
			</div>
			';
		}

		echo '</div>';

		mysqli_close($dbc); // Close the database connection.

} else {  // INSECURE CODES

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['gameid'])){
			$col_id = $_POST['gameid'];
			$_SESSION['cur_id'] = $_POST['gameid'];
		} else {
			$col_id = $_SESSION['cur_id'];
		}
		
		if(isset($_SESSION['name'])){
			$name = $_SESSION['name'];
		} else {
			$name = "Anonymous";
		}

		if (!empty($_POST['current'])) {
			$errors = array(); // Initialize error array.

			// Validate the comments:
			if (empty($_POST['comments'])) {
				$errors[] = 'No comment(s)/review(s) has been inserted.';
			} else {
				$c = trim($_POST['comments']);
			}

			if(empty($errors)) {
				// $user_id=$_SESSION['user_id'];
				
				$q = "INSERT INTO reviews (col_id, timestamp, name, comments) VALUES ('$col_id', NOW(), '$name', '$c')";		
				$r = @mysqli_query ($dbc, $q);

				if ($r) { // If it ran OK.
					echo '
						<script>
						window.alert("\nYour review has been added!");
						setTimeout(function(){location.href="collections"},0);
						</script>';
				} else { // If it did not run OK.
					echo '
						<script>
						window.alert("\nYour review could not be added!");
						setTimeout(function(){location.href="collections"},0);
						</script>';
				}
			} else { // Report the errors.
				echo '
					<script>
					window.alert("\nYour review could not be added!");
					setTimeout(function(){location.href="collections"},0);
					</script>';
			}
	}}


	echo '
	<div class="flex-con">
		<div class="flex-container" style="justify-content: flex-start;align-items: center;">';
		
		if(!isset($_POST['gameid'])) {
			$col_id = $_SESSION['cur_id'];	
		} else {
			$col_id = $_POST['gameid'];
		}
		
		$q = "SELECT * FROM collections WHERE collection_id='$col_id' ORDER BY collection_id";		
		$r = @mysqli_query ($dbc, $q);

		$q1 = "SELECT * FROM reviews WHERE col_id='$col_id' ORDER BY comment_id";		
		$r1 = @mysqli_query ($dbc, $q1);

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Fetch and print the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			// echo "<p>Here's your profile information:</p>";
			echo '<h1 style="width:60vh">'.$row['game_name'].'</h1>';
			// Change Profile Picture
			echo '
			<img src="'. $row['game_pic'] .'" style="max-width:350; width: 100%; height: auto;">';

			echo '
			<table align="center" cellspacing="10" cellpadding="10" width=400vh>
				<tr>
					<td colspan="2" align="center"><b>Basic Info</b></td>
				</tr>
				<tr>
					<td><b>Developer</b></td>
					<td id = "table_td">' . $row['developer'] . '</td>
				</tr>
				<tr>
					<td><b>Publisher</b></td>
					<td id = "table_td">' . $row['publisher'] . '</td>
				</tr>
				<tr>
					<td><b>Platform</b></td>
					<td id = "table_td">' . $row['platform'] . '</td>
				</tr>
				<tr>
					<td><b>Genre</b></td>
					<td id = "table_td">' . $row['genre'] . '</td>
				</tr>
			</table>
			</div><div class="flex-container">&emsp;</div><div class="flex-container">
			<table align="center" cellspacing="10" cellpadding="10" width=60%>
				<tr>
					<td><b>Release Info</b></td>
					<td><a href="browse"><input class="form-submit-button" style="width:auto; height:fit-content; margin-left:75%" type="submit" name="submit" value="Go Back >"></td>
				</tr>
				<tr>
					<td><b>Version / Re-Release</b></td>
					<td><b>Order in Series</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['release_date'] . '</td>
					<td id = "table_td">' . $row['series_order'] . '</td>
				</tr>
				<!-- <tr>
					<td><b>Original Release</b></td>
					<td><b>Re-Release</b></td>
				</tr> -->
				<tr>
					<td><b>&emsp;</b></td>
				</tr>
				<tr>
					<td colspan=2><b>Description</b></td>
				</tr>
				<tr>
					<td id = "table_td" colspan=2 style="width:50vh;">' . $row['description'] . '</td>
				</tr>
				<tr>
					<td colspan=2><b>Comments / Reviews</b></td>
				</tr>
			';

			echo '
				<form action="collections.php" method="post">
					<input type="hidden" name="gameid" value="'.$row['collection_id'].'">
					<input type="hidden" name="current" value="1">
					<tr>
						<td colspan=2><textarea name="comments" rows="5" cols="90" placeholder=" Write a comment/review | Rate this game"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="form-submit-button" style="width:20%; height:fit-content; margin-left:80%" type="submit" name="submit" value="Submit"></td>
					</tr>
				</form> ';

			$num1 = mysqli_num_rows($r1);

			if ($num1 > 0) { // If it ran OK, display the records.
				// Fetch and print the record:
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
					
					echo '
					<tr>
						<td id = "table_td" colspan=2>' . $row1['timestamp'] . ' | ' . $row1['name'] . '
						<br><br>' . $row1['comments'] . '</td>
					</tr>
					';
				}
			} else { // If no records were returned.
				echo '
				<tr>
					<td id = "table_td" colspan=2>
					There are currently no comment(s)/review(s) for this game.</td>
				</tr>
				';
			}

			echo '
			</table>
			</div>';

			mysqli_free_result ($r);	
			mysqli_free_result ($r1);		

		} else { // If no records were returned.
			echo '
			<p class="error">There are currently no registered game on this website.</p>
			</div>
			';
		}

		echo '</div>';

		mysqli_close($dbc); // Close the database connection.
}

include ('includes/ifooter.html');
?>