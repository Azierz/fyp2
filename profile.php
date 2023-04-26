<?php 
$page_title = 'User Profile';
include ('includes/theader.html');
require ('mysqli_connect.php');

if ($_SESSION["toggle"] == 1){ // SECURE CODES

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$user_id=$_SESSION['user_id'];
		
		// Validate the about me:
		if (empty($_POST['aboutme'])) {
			$errors[] = 'No description has been inserted.';
		} else {
			$aboutme = mysqli_real_escape_string($dbc, trim($_POST['aboutme']));
		}

		// Validate the first name:
		if (empty($_POST['fname'])) {
			$errors[] = 'No first name has been inserted.';
		} else {
			$fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
		}

		// Validate the last name:
		if (empty($_POST['lname'])) {
			$errors[] = 'No last name has been inserted.';
		} else {
			$lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
		}

		// Validate the email:
		if (empty($_POST['email'])) {
			$errors[] = 'No email has been inserted.';
		} else {
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		if(empty($errors)) {
			$q = "UPDATE users SET about_me='$aboutme', first_name='$fname', last_name='$lname', email='$email' WHERE user_id='$user_id'";		
			$r = @mysqli_query ($dbc, $q);

			if ($r) { // If it ran OK.
				echo '
					<script>
					window.alert("\nYour profile has been updated!");
					setTimeout(function(){location.href="profile"},0);
					</script>';
			} else { // If it did not run OK.
				echo '
					<script>
					window.alert("\nYour profile could not be updated!");
					setTimeout(function(){location.href="profile"},0);
					</script>';
			}
		} else { // Report the errors.
			echo '
				<script>
				window.alert("\nYour profile could not be updated!");
				setTimeout(function(){location.href="profile"},0);
				</script>';
		}
	}

	if (!empty($_SESSION['user_id'])) {

		echo '
		<div class="flex-con">
			<div class="flex-container" style="justify-content: flex-start;align-items: center;">';

			$user_id=$_SESSION['user_id'];
			echo '<h1 style="width:55vh">WELCOME BACK, '. $_SESSION['name'] .' !</h1>';
			
			$q = "SELECT *, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users WHERE user_id='$user_id' ORDER BY user_id";		
			$r = @mysqli_query ($dbc, $q);

			// Count the number of returned rows:
			$num = mysqli_num_rows($r);

			if ($num > 0) { // If it ran OK, display the records.

				// Fetch and print the record:
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

				echo "<p>Here's your profile information:</p>";

				// Change Profile Picture
				echo '
				<span class="profile"><img src="'.$_SESSION['profile_pic'].'" style="max-width: 200; width: 100%; height: auto;">
				<figcaption align=center><b><a href="upload">CHANGE PROFILE PHOTO</a></b></figcaption></span>
				';
				
				echo '
				<form action="profile.php" method="POST" id="prof">
					<table align="center" cellspacing="10" cellpadding="10" width=400vh>
						<tr>
							<td><b>Description / About Me</b></td>
						</tr>
						<tr>
							<td id = "table_profile" style="width:50vh;"><textarea class="textprofile" name="aboutme" rows="4" cols="42">' . htmlspecialchars($row['about_me']) . '</textarea></td>
						</tr>
					</table>
			</div><div class="flex-container">&emsp;</div><div class="flex-container">
					<table align="center" cellspacing="10" cellpadding="10" width=400vh>
						<tr>
							<td><b>First Name</b></td>
							<td><b>Last Name</b></td>
						</tr>
						<tr>
							<td id = "table_profile"><input type="text" name="fname" value="' . htmlspecialchars($row['first_name']) . '"></td>
							<td id = "table_profile"><input type="text" name="lname" value="' . htmlspecialchars($row['last_name']) . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Email</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2><input type="text" name="email" value="' . htmlspecialchars($row['email']) . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Phone Number (+60)</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2><input type="text" name="phoneno" value="' . htmlspecialchars($row['phone_no']) . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Registered Date</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2 style="padding:10px">' . htmlspecialchars($row['dr']) . '</td>
						</tr></form>
						<tr>
							<td><a href="changepassword"><input class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px;" type="submit" name="others" value="Change Password"></a></td>
							<td><input form="prof" class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px; margin-left:35%" type="submit" name="submit" value="Save Changes"></td>
						</tr>
						';

					echo '</table></div>';


				mysqli_free_result ($r);	

		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered participant.</p>';
		}
		echo '</div>';

	} else { // No Login Session
		echo '
			<script>
			window.alert("\nNO SESSION EXIST!\n\nPLEASE LOG IN.");
			setTimeout(function(){location.href="login"},0);
			</script>';
	}

	mysqli_close($dbc); // Close the database connection.

} else { // INSECURE CODES

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$user_id=$_SESSION['user_id'];
		
		// Validate the about me:
		if (empty($_POST['aboutme'])) {
			$errors[] = 'No description has been inserted.';
		} else {
			$aboutme = trim($_POST['aboutme']);
		}

		// Validate the first name:
		if (empty($_POST['fname'])) {
			$errors[] = 'No first name has been inserted.';
		} else {
			$fname = trim($_POST['fname']);
		}

		// Validate the last name:
		if (empty($_POST['lname'])) {
			$errors[] = 'No last name has been inserted.';
		} else {
			$lname = trim($_POST['lname']);
		}

		// Validate the email:
		if (empty($_POST['email'])) {
			$errors[] = 'No email has been inserted.';
		} else {
			$email = trim($_POST['email']);
		}

		if(empty($errors)) {
			$q = "UPDATE users SET about_me='$aboutme', first_name='$fname', last_name='$lname', email='$email' WHERE user_id='$user_id'";		
			$r = @mysqli_query ($dbc, $q);

			if ($r) { // If it ran OK.
				echo '
					<script>
					window.alert("\nYour profile has been updated!");
					setTimeout(function(){location.href="profile"},0);
					</script>';
			} else { // If it did not run OK.
				echo '
					<script>
					window.alert("\nYour profile could not be updated!");
					setTimeout(function(){location.href="profile"},0);
					</script>';
			}
		} else { // Report the errors.
			echo '
				<script>
				window.alert("\nYour profile could not be updated!");
				setTimeout(function(){location.href="profile"},0);
				</script>';
		}
	}

	if (!empty($_SESSION['user_id'])) {

		echo '
		<div class="flex-con">
			<div class="flex-container" style="justify-content: flex-start;align-items: center;">';

			$user_id=$_SESSION['user_id'];
			echo '<h1 style="width:55vh">WELCOME BACK, '. $_SESSION['name'] .' !</h1>';
			
			$q = "SELECT *, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users WHERE user_id='$user_id' ORDER BY user_id";		
			$r = @mysqli_query ($dbc, $q);

			// Count the number of returned rows:
			$num = mysqli_num_rows($r);

			if ($num > 0) { // If it ran OK, display the records.

				// Fetch and print the record:
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

				echo "<p>Here's your profile information:</p>";

				// Change Profile Picture
				echo '
				<span class="profile"><img src="'.$_SESSION['profile_pic'].'" style="max-width: 200; width: 100%; height: auto;">
				<figcaption align=center><b><a href="upload">CHANGE PROFILE PHOTO</a></b></figcaption></span>
				';
				
				echo '
				<form action="profile.php" method="POST" id="prof">
					<table align="center" cellspacing="10" cellpadding="10" width=400vh>
						<tr>
							<td><b>Description / About Me</b></td>
						</tr>
						<tr>
							<td id = "table_profile" style="width:50vh;"><textarea class="textprofile" name="aboutme" rows="4" cols="42">' . $row['about_me'] . '</textarea></td>
						</tr>
					</table>
			</div><div class="flex-container">&emsp;</div><div class="flex-container">
					<table align="center" cellspacing="10" cellpadding="10" width=400vh>
						<tr>
							<td><b>First Name</b></td>
							<td><b>Last Name</b></td>
						</tr>
						<tr>
							<td id = "table_profile"><input type="text" name="fname" value="' . $row['first_name'] . '"></td>
							<td id = "table_profile"><input type="text" name="lname" value="' . $row['last_name'] . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Email</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2><input type="text" name="email" value="' . $row['email'] . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Phone Number (+60)</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2><input type="text" name="phoneno" value="' . $row['phone_no'] . '"></td>
						</tr>

						<tr>
							<td colspan=2><b>Registered Date</b></td>
						</tr>
						<tr>
							<td id = "table_profile" colspan=2 style="padding:10px">' . $row['dr'] . '</td>
						</tr></form>
						<tr>
							<td><a href="changepassword"><input class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px;" type="submit" name="others" value="Change Password"></a></td>
							<td><input form="prof" class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px; margin-left:35%" type="submit" name="submit" value="Save Changes"></td>
						</tr>
						';

					echo '</table></div>';


				mysqli_free_result ($r);	

		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered participant.</p>';
		}
		echo '</div>';

	} else { // No Login Session
		echo '
			<script>
			window.alert("\nNO SESSION EXIST!\n\nPLEASE LOG IN.");
			setTimeout(function(){location.href="login"},0);
			</script>';
	}

	mysqli_close($dbc); // Close the database connection.
}

include ('includes/footer.html');
?>