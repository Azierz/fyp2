<?php 
include ('includes/theader.html');
require ('mysqli_connect.php');

$page_title = 'Change Password';


// Run after submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$user_id=$_SESSION['user_id'];
	
	// Validate the current password:
	if (empty($_POST['cpass'])) {
		$errors[] = 'No current password has been inserted.';
	} else {
		$cpass = mysqli_real_escape_string($dbc, trim($_POST['cpass']));
	}
	
	// Validate the new password:
	if (empty($_POST['npass1'])) {
		$errors[] = 'No new password has been inserted.';
	} else {
		$npass1 = mysqli_real_escape_string($dbc, trim($_POST['npass1']));
	}
	
	// Validate the confirm new password:
	if (empty($_POST['npass2'])) {
		$errors[] = 'No confirm new password has been inserted.';
	} else {
		$npass2 = mysqli_real_escape_string($dbc, trim($_POST['npass2']));
	}
	
	if(empty($errors)) {
		$q = "SELECT * FROM users WHERE user_id='$user_id'";		
		$r = @mysqli_query ($dbc, $q);
		
		// Count the number of returned rows:
		$num = mysqli_num_rows($r);
		
		if ($num > 0) { // If it ran OK, display the records.
			
			// Fetch and print the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			// Check if current password is correct
			// if(password_verify($cpass, $row['password'])) [save for reference]
			if(SHA1($cpass) == $row['password']) {
				// Check if new password and confirm new password are the same
				if($npass1 == $npass2) {
					// Hash the password
					// $npass1 = password_hash($npass1, PASSWORD_DEFAULT); [save for reference]

					$q = "UPDATE users SET password=SHA1('$npass1') WHERE user_id='$user_id'";		
					$r = @mysqli_query ($dbc, $q);
					
					if ($r) { // If it ran OK.
						echo '
							<script>
							window.alert("\nYour password has been changed!");
							setTimeout(function(){location.href="changepassword"},0);
							</script>';
					} else { // If it did not run OK.
						echo '
							<script>
							window.alert("\nYour password could not be changed!");
							setTimeout(function(){location.href="changepassword"},0);
							</script>';
					}
				} else {
					echo '
						<script>
						window.alert("\nNew password and confirm new password are not the same!");
						setTimeout(function(){location.href="changepassword"},0);
						</script>';
				}
			} else {
				echo '
					<script>
					window.alert("\nCurrent password is not correct!");
					setTimeout(function(){location.href="changepassword"},0);
					</script>';
			}
		} else { // If it did not run OK.
			echo '
				<script>
				window.alert("\nYour password could not be changed!");
				setTimeout(function(){location.href="changepassword"},0);
				</script>';
		}
	} else {
		echo '
			<script>
			window.alert("\nYour password could not be changed!");
			setTimeout(function(){location.href="changepassword"},0);
			</script>';
	}

}


if (!empty($_SESSION['user_id'])) {

	echo '
		<div class="flex-con"><div class="flex-container" style="justify-content: flex-start;align-items: center;">';

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
			<form action="changepassword.php" method="POST" id="prof">
				<table align="center" cellspacing="10" cellpadding="10" width=400vh>
					<tr>
						<td><b>Description / About Me</b></td>
					</tr>
					<tr>
						<td id = "table_td">' . $row['about_me'] . '</td>
					</tr>
				</table>
		</div><div class="flex-container">&emsp;</div><div class="flex-container">
				<table align="center" cellspacing="10" cellpadding="10" width=400vh>
					<tr>
						<td><b>Current Password</b></td>
					</tr>
					<tr>
						<td id = "table_profile" colspan=2><input type="password" name="cpass" maxlength="20" value=""></td>
					</tr>

					<tr>
						<td><b>New Password</b></td>
					</tr>
					<tr>
						<td id = "table_profile" colspan=2><input type="password" name="npass1" maxlength="20" value=""></td>
					</tr>

					<tr>
						<td><b>Confirm New Password</b></td>
					</tr>
					<tr>
						<td id = "table_profile" colspan=2><input type="password" name="npass2" maxlength="20" value=""></td>
					</tr></form>
					<tr>
						<td><a href="profile"><input class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px;" type="submit" name="others" value="< Go Back"></a></td>
						<td><input form="prof" class="form-submit-button" style="width:auto; height:fit-content; font-size: 14px; margin-left:20%" type="submit" name="submit" value="Save Changes"></td>
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


include ('includes/footer.html');
?>