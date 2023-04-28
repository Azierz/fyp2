<?php 
// Path: Leaderboard.php
// Compare this snippet from browse.php:

if (!empty($_SESSION['user_id'])) { //page title
	$page_title = 'User Profile';
} else {
	$page_title = 'Registered Participants';
}

include ('includes/header.html');
require ('mysqli_connect.php');

// USER VIEW
if (!empty($_SESSION['user_id'])) {


		$user_id=$_SESSION['user_id'];
		echo '<h1>WELCOME BACK, '. $_SESSION['username'] .' !</h1>';
		
		$q = "SELECT *, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users WHERE user_id='$user_id' ORDER BY user_id";		
		$r = @mysqli_query ($dbc, $q);

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Fetch and print the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			echo "<p>Here's your profile information:</p>";

			echo '<table align="center" cellspacing="10" cellpadding="10" width=40%>
				<tr>
					<td><b>Full Name</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['fullname'] . '</td>
				</tr>

				<tr>
					<td><b>Username</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['username'] . '</td>
				</tr>

				<tr>
					<td><b>Email</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['email'] . '</td>
				</tr>

				<tr>
					<td><b>Phone Number (+60)</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['phoneNo'] . '</td>
				</tr>

				<tr>
					<td><b>Platform</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['platform'] . '</td>
				</tr>

				<tr>
					<td><b>Registered Date</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['dr'] . '</td>
				</tr>
				';

				// Change Profile Picture
				echo '<span class="profile"><img src="'.$_SESSION['profile_pic'].'" width=auto height=43%><figcaption align=center><b><a href="upload">CHANGE PROFILE PHOTO</a></b></figcaption></span>';
			echo '</table>';

			mysqli_free_result ($r);	

	} else { // If no records were returned.
		echo '<p class="error">There are currently no registered participant.</p>';
	}

} else { // No Login Session
	echo '
		<script>
		window.alert("\nNO SESSION EXIST!\n\nPLEASE LOG IN.");
		setTimeout(function(){location.href="login"},0);
		</script>';
}

mysqli_close($dbc); // Close the database connection.

include ('static_animate.php');
include ('includes/footer.html');
?>