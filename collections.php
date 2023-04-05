<?php 
$page_title = 'Collections';
include ('includes/theader.html');
require ('mysqli_connect.php');

// if (!empty($_SESSION['user_id'])) { //page title
// 	$page_title = 'User Profile';
// } else {
// 	$page_title = 'Registered Participants';
// }



echo '
	<div class="flex-con">';

	// $user_id=$_SESSION['user_id'];
	// echo '<h1>WELCOME BACK, '. $_SESSION['fname'] .' '. $_SESSION['lname'] .' !</h1>';
	$col_id = $_POST['gameid'];
	$q = "SELECT * FROM collections WHERE collection_id='$col_id' ORDER BY collection_id";		
	$r = @mysqli_query ($dbc, $q);

	// Count the number of returned rows:
	$num = mysqli_num_rows($r);

	if ($num > 0) { // If it ran OK, display the records.

		// Fetch and print the record:
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

		// echo "<p>Here's your profile information:</p>";
		echo '<h1>'.$row['game_name'].'&emsp;</h1>';
		// Change Profile Picture
		echo '<span class="profile"><img src="'.$_SESSION['profile_pic'].'" width=auto height=43%><figcaption align=center><b><a href="upload">CHANGE PROFILE PHOTO</a></b></figcaption></span>';

		echo '<table align="center" cellspacing="10" cellpadding="10" width=40%>
			<tr>
				<td><b>Basic Info</b></td>
			</tr>
			<tr>
				<td id = "table_td">' . $row['developer'] . '</td>
				<td id = "table_td">' . $row['publisher'] . '</td>
				<td id = "table_td">' . $row['platform'] . '</td>
				<td id = "table_td">' . $row['genre'] . '</td>
			</tr>
			</table>
			<table align="center" cellspacing="10" cellpadding="10" width=40%>
		<div class="flex-container">
			<tr>
				<td><b>Version / Re-Release</b></td>
				<td><b>Order in Series</b></td>
			</tr>
			<tr>
				<td id = "table_td">' . $row['release_date'] . '</td>
				<td id = "table_td">' . $row['series_order'] . '</td>
			</tr>

			
			<tr>
				<td><b>&emsp;</b></td>
			</tr>

			<tr>
				<td colspan=2><b>Description</b></td>
			</tr>
			<tr>
				<td id = "table_td" colspan=2>' . $row['description'] . '</td>
			</tr>

			<tr>
				<td colspan=2><b>Comments / Reviews</b></td>
			</tr>
			<tr>
				<td id = "table_td" colspan=2>' . $row['comments'] . '</td>
			</tr>
			';

			
		echo '</table>';

		mysqli_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered participant.</p>';
}
echo '</div>';


mysqli_close($dbc); // Close the database connection.


include ('includes/footer.html');
?>