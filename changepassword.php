<?php 
include ('includes/theader.html');
require ('mysqli_connect.php');

$page_title = 'Change Password';


// USER VIEW
if (!empty($_SESSION['user_id'])) {

	echo '
		<div class="flex-con">';

		$user_id=$_SESSION['user_id'];
		echo '<h1>WELCOME BACK, '. $_SESSION['fname'] .' '. $_SESSION['lname'] .' !</h1>';
		
		$q = "SELECT *, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users WHERE user_id='$user_id' ORDER BY user_id";		
		$r = @mysqli_query ($dbc, $q);

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Fetch and print the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			echo "<p>Here's your profile information:</p>";

			// Change Profile Picture
			echo '<span class="profile"><img src="'.$_SESSION['profile_pic'].'" width=auto height=43%><figcaption align=center><b><a href="upload">CHANGE PROFILE PHOTO</a></b></figcaption></span>';
			echo '</table>';
			echo '<table align="center" cellspacing="10" cellpadding="10" width=40%>
				<tr>
					<td><b>Description / About Me</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['about_me'] . '</td>
				</tr>
				</table>
			<table align="center" cellspacing="10" cellpadding="10" width=40%>
			<div class="flex-container">
				<tr>
					<td><b>Current Password</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['email'] . '</td>
				</tr>

				<tr>
					<td><b>New Password</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['phone_no'] . '</td>
				</tr>

				<tr>
					<td><b>Confirm New Password</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['dr'] . '</td>
				</tr>
				';

				echo '</table>';


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


include ('includes/footer.html');
?>