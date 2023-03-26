<?php 
$page_title = 'Registration Form';
include ('includes/theader.html');

if (!empty($_SESSION['user_id']) || !empty($_SESSION['admin_id'])) {
	echo '
		<script>
		window.alert("\nALREADY LOGGED IN!");
		setTimeout(function(){location.href="profile"},0);
		</script>';
}

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.

	// Check for full name:
	if (empty($_POST['fullname'])) {
		$errors[] = 'You forgot to enter your full name.';
	} else {
		$fn = trim($_POST['fullname']);
	}

	// Check the phone number:
	if (empty($_POST['phone_no'])) {
		
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$pn = trim($_POST['phone_no']);
	}
	
	// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$e = trim($_POST['email']);
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($errors)) { // If everything's OK. ($fn && $un && $e && $pn && $plt && $p)
		
		require ('mysqli_connect.php'); // Connect to the db.

		//  Test for unique username and email address
		$q = "SELECT username FROM users WHERE username='$un'";
		$r = @mysqli_query($dbc, $q);

		$q1 = "SELECT email FROM users WHERE email='$e'";
		$r1 = @mysqli_query($dbc, $q1);

		if(mysqli_num_rows($r) > 0){ // Check for unique username
			$errors[] = "Username has been taken.";
			if (mysqli_num_rows($r1) > 0) { // Check for unique email address
				$errors[] = "Email Address already exists.";
			}
		} elseif (mysqli_num_rows($r1) > 0) { // Check for unique email address
			$errors[] = "Email Address already exists.";
		} else { // Register the user in the database...

			//Insert default profile pic
			$dp = "includes/defaultpic.png";

			// Make the query:
			$q = "INSERT INTO users (fullname, phoneNo, email, password, registration_date, profile_pic) VALUES ('$fn', '$pn', '$e', SHA1('$p'), NOW(), '$dp' )";	
			$r = mysqli_query ($dbc, $q); // Run the query.
			if ($r) { // If it ran OK.

				// Print a message:
				echo '<h1>Thank you!</h1>
				<p id="success">You are now registered.</p>
				<br>
				<a href="login"><button align="right">Go to Login Page</button></a>
				<br><br><br>';	

			} else { // If it did not run OK.

				// Public message:
				echo '<h1>System Error</h1>
				<p id="errors">You could not be registered due to a system error. We apologize for any inconvenience.</p>
				<br>
				<a href="home"><button align="right">Back to Home</button></a>
				<br><br><br>';

				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
					
			} // End of if($r) IF.
			
			mysqli_close($dbc); // Close the database connection.
			
			// Include the footer and quit the script:
			include ('includes/footer.html'); 
			exit();	
		}
	} // End of if(empty($errors)) IF.

	if ($errors) { // Report the errors.
	echo '<h1>Error!</h1>
	<div id ="errors">The following error(s) occurred:<br />';
	foreach ($errors as $msg) { // Print each error.
		echo " - $msg<br/>";
	}
	echo '</div> 
	<div id = "errors">Please try again.</div>'; // Close div "errors"
	}

} // End of the main Submit conditional.
?>

<h1>SIGN UP FORM</h1>
<form action="register.php" method="post">
	<p>* Please complete the form below.</p>
	<table style="font-size: 100%">
		<tr>
			<td><p>Full Name</p></td>
			<td><p><input type="text" name="fullname" placeholder="First & Last Name" size="30" maxlength="30" value="<?php if (isset($_POST['fullname'])) echo $_POST['fullname']; ?>"/></p></td>
		</tr>
		<tr>
			<td><p>Phone Number</p></td>
			<td><p><input type="text" name="phone_no" placeholder="Phone Number" size="25" maxlength="40" value= "<?php if (isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>"/></p></td>
		</tr>
		<tr>
			<td><p>Email Address</p></td>
			<td><p><input type="text" name="email" placeholder="Email Address" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></p></td>
		</tr>
		<tr>
			<td><p>Password</p></td>
			<td><p><input type="password" name="pass1" placeholder="Password" size="15" maxlength="20" value=""/></p></td>
		</tr>
		<tr>
			<td><p>Confirm Password</p></td>
			<td><p><input type="password" name="pass2" placeholder="Confirm Password" size="15" maxlength="20" value=""/></p></td>
		</tr>
	</table>
	<p align="right"><input type="submit" name="submit" value="Register" /></p>
</form>

<?php include ('includes/footer.html'); ?>