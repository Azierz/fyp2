<?php 
include ('includes/theader.html');
require ('mysqli_connect.php');

if (!empty($_SESSION['user_id'])) { //page title
	$page_title = 'User Profile';
} else {
	$page_title = 'Registered Participants';
}



// USER VIEW
if (!empty($_SESSION['user_id'])) {

	echo '
		<div class="flex-con"><div class="flex-container">';

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
			echo '
			<span class="profile"><img src="'.$_SESSION['profile_pic'].'" style="max-width: 200; width: 100%; height: auto; justify-content:center;">
			<figcaption align=center><b><a href="changepassword">CHANGE PROFILE PHOTO</a></b></figcaption></span>
			';
			
			echo '
			<table align="center" cellspacing="10" cellpadding="10" width=40%>
				<tr>
					<td><b>Description / About Me</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['about_me'] . '</td>
				</tr>
				</table>
		</div><div class="flex-container">
			<table align="center" cellspacing="10" cellpadding="10" width=40%>
				<tr>
					<td><b>First Name</b></td>
					<td><b>Last Name</b></td>
				</tr>
				<tr>
					<td id = "table_td">' . $row['first_name'] . '</td>
					<td id = "table_td">' . $row['last_name'] . '</td>
				</tr>

				<tr>
					<td colspan=2><b>Email</b></td>
				</tr>
				<tr>
					<td id = "table_td" colspan=2>' . $row['email'] . '</td>
				</tr>

				<tr>
					<td colspan=2><b>Phone Number (+60)</b></td>
				</tr>
				<tr>
					<td id = "table_td" colspan=2>' . $row['phone_no'] . '</td>
				</tr>

				<tr>
					<td colspan=2><b>Registered Date</b></td>
				</tr>
				<tr>
					<td id = "table_td" colspan=2>' . $row['dr'] . '</td>
				</tr>
				';

				echo '</table></div>';


			mysqli_free_result ($r);	

	} else { // If no records were returned.
		echo '<p class="error">There are currently no registered participant.</p>';
	}
	echo '</div>';
// ADMIN VIEW
} elseif (!empty($_SESSION['admin_id'])) {

	echo "<div id = vcontent>";

		echo '<h1>WELCOME BACK, '. $_SESSION['username'] .' !</h1>';

		$q = "SELECT *, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY user_id";		
		$r = @mysqli_query ($dbc, $q);

		// Count the number of returned rows:
		$num = mysqli_num_rows($r);

		if ($num > 0) { // If it ran OK, display the records.

			// Print how many users there are:
			echo "<p>There are currently $num registered participant(s).</p><br>";

			// Table header:
			echo '<table border=1px align="center" cellspacing="5" cellpadding="5" width="100%">
				<tr>
					<td align="left"><b>Full Name</b></td>
					<td align="left"><b>Username</b></td>
					<td align="left"><b>Email</b></td>
					<td align="left"><b>Phone Number(+60)</b></td>
					<td align="left"><b>Platform</b></td>
					<td align="left"><b>Password</b></td>
					<td align="left"><b>Registered Date</b></td>
				</tr>
				';
			
				// Fetch and print all the records:
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					echo '<tr>
						<td align="left">' .  $row['fullname'] .  '</td>
						<td align="left">' .  $row['username'] .  '</td>
						<td align="left">' .  $row['email'] .  '</td>
						<td align="left">' .  $row['phoneNo'] .  '</td>
						<td align="left">' .  $row['platform'] .  '</td>
						<td align="left">' .  $row['password'] .  '</td>
						<td align="left">' .  $row['dr'] .  '</td>
					</tr>
					';
				}
			echo '</table>';

			mysqli_free_result ($r);	

	} else { // If no records were returned.
		echo '<p id="errors">There are currently no registered participant(s).</p>';
	}
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