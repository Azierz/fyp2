<?php 
$page_title = 'Registration Form';
include ('includes/theader.html');
require ('mysqli_connect.php');

if (!empty($_SESSION['user_id'])) {
	echo '
		<script>
		window.alert("\nALREADY LOGGED IN!");
		setTimeout(function(){location.href="profile"},0);
		</script>';
}

if ($_SESSION["toggle"] == 1){ // SECURE CODES
	
	// Check if the form has been submitted:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

		// Check for first name:
		if (empty($_POST['fname'])) {
			$errors[] = 'You forgot to enter your first name.';
		} else {
			$fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
		}

		// Check for last name:
		if (empty($_POST['lname'])) {
			$errors[] = 'You forgot to enter your last name.';
		} else {
			$ln = mysqli_real_escape_string($dbc, trim($_POST['lname']));
		}

		// Check the phone number:
		if (empty($_POST['phone_no'])) {
			
			$errors[] = 'You forgot to enter your phone number.';
		} else {
			$pn = mysqli_real_escape_string($dbc, trim($_POST['phone_no']));
		}
		
		// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// Check for a password and match against the confirmed password:
		if (!empty($_POST['pass1'])) {
			if ($_POST['pass1'] != $_POST['pass2']) {
				$errors[] = 'Your password did not match the confirmed password.';
			} else {
				$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			}
		} else {
			$errors[] = 'You forgot to enter your password.';
		}

		if (empty($errors)) { // If everything's OK. ($fn && $ln && $pn && $e && $p)
			
			

			//  Test for unique email address
			$q = "SELECT email FROM users WHERE email='$e'";
			$r = @mysqli_query($dbc, $q);

			if(mysqli_num_rows($r) > 0){ // Check for unique email address
				$errors[] = "Email Address already exists.";
			} else { // Register the user in the database...

				//Insert default profile pic
				$dp = "includes/defaultpic.png";

				// Make the query:
				$q = "INSERT INTO users (first_name, last_name, phone_no, email, password, registration_date, profile_pic) VALUES ('$fn', '$ln', '$pn', '$e', SHA1('$p'), NOW(), '$dp' )";	
				$r = mysqli_query ($dbc, $q); // Run the query.
				if ($r) { // If it ran OK.

					// Print a message:
					echo '
					<div class="flex-container">
						<h1>Thank you!</h1>
						<p id="success">You are now registered.</p>
						<br>
						<a href="login"><button class="form-submit-button">Go to Login Page</button></a>
					</div>';	

				} else { // If it did not run OK.

					// Public message:
					echo '
					<div class="flex-container">
						<h1>System Error</h1>
						<p id="errors">You could not be registered due to a system error. We apologize for any inconvenience.</p>
						<br>
						<a href="home"><button align="right">Back to Home</button></a>
						<br><br><br>
					</div>';

					// Debugging message:
					echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
				} // End of if($r) IF.
				
				mysqli_close($dbc); // Close the database connection.
				
				// Include the footer and quit the script:
				include ('includes/footer.html'); 
				exit();	
			}
		} // End of if(empty($errors)) IF.

		echo '<div class="flex-container">';
		if ($errors) { // Report the errors.
		echo '<h1>Error!</h1>
		<div id ="errors">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br/>";
		}
		echo '</div> 
		<div id = "errors">Please try again.</div>'; // Close div "errors"
		}
		echo '</div>';

	} // End of the main Submit conditional.


	// Create the form:
	?>
	<div class="flex-container">
		<h1 align="center">REGISTER</h1>
		<form action="register.php" method="post" >
			<p>* Please complete the form below.</p>
			<table style="font-size: 100%">
				<tr>
					<td><p><input type="text" name="fname" placeholder="First Name" maxlength="30" value="<?php if (isset($_POST['fname'])) echo htmlspecialchars($_POST['fname']); ?>"/></p></td>
					<td><p><input type="text" name="lname" placeholder="Last Name" maxlength="30" value="<?php if (isset($_POST['lname'])) echo htmlspecialchars($_POST['lname']); ?>"/></p></td>
				</tr>
				<tr>
					<td colspan="2"><p><input type="text" name="phone_no" placeholder="Phone Number" maxlength="40" value= "<?php if (isset($_POST['phone_no'])) echo htmlspecialchars($_POST['phone_no']); ?>"/></p></td>
				</tr>
				<tr>
					<td colspan="2"><p><input type="text" name="email" placeholder="Email Address" maxlength="60" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"/></p></td>
				</tr>
				<tr>
					<td colspan="2"><p><input type="password" name="pass1" placeholder="Password" maxlength="20" value=""/></p></td>
				</tr>
				<tr>
					<td colspan="2"><p><input type="password" name="pass2" placeholder="Confirm Password" maxlength="20" value=""/></p></td>
				</tr>
				<tr>
					<td colspan="2"><span class="smolink"><b><a href="login">Login Here</a></b></span></td>
				</tr>
				<tr>
					<td colspan="2"><input class="form-submit-button" type="submit" name="submit" value="Register" /></td>
				</tr>
			</table>
		</form>
	</div>
	
<?php } else { // NON-SECURE CODES

	// Check if the form has been submitted:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize an error array.

		// Check for first name:
		if (empty($_POST['fname'])) {
			$errors[] = 'You forgot to enter your first name.';
		} else {
			$fn = trim($_POST['fname']);
		}

		// Check for last name:
		if (empty($_POST['lname'])) {
			$errors[] = 'You forgot to enter your last name.';
		} else {
			$ln = trim($_POST['lname']);
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

		if (empty($errors)) { // If everything's OK. ($fn && $ln && $pn && $e && $p)
			
			

			//  Test for unique email address
			$q = "SELECT email FROM users WHERE email='$e'";
			$r = @mysqli_query($dbc, $q);

			if(mysqli_num_rows($r) > 0){ // Check for unique email address
				$errors[] = "Email Address already exists.";
			} else { // Register the user in the database...

				//Insert default profile pic
				$dp = "includes/defaultpic.png";

				// Make the query:
				$q = "INSERT INTO users (first_name, last_name, phone_no, email, password, registration_date, profile_pic) VALUES ('$fn', '$ln', '$pn', '$e', SHA1('$p'), NOW(), '$dp' )";	
				$r = mysqli_query ($dbc, $q); // Run the query.
				if ($r) { // If it ran OK.

					// Print a message:
					echo '
					<div class="flex-container">
						<h1>Thank you!</h1>
						<p id="success">You are now registered.</p>
						<br>
						<a href="login"><button align="right">Go to Login Page</button></a>
						<br><br><br>
					</div>';	

				} else { // If it did not run OK.

					// Public message:
					echo '
					<div class="flex-container">
						<h1>System Error</h1>
						<p id="errors">You could not be registered due to a system error. We apologize for any inconvenience.</p>
						<br>
						<a href="home"><button align="right">Back to Home</button></a>
						<br><br><br>
					</div>';

					// Debugging message:
					echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
				} // End of if($r) IF.
				
				mysqli_close($dbc); // Close the database connection.
				
				// Include the footer and quit the script:
				include ('includes/footer.html'); 
				exit();	
			}
		} // End of if(empty($errors)) IF.

		echo '<div class="flex-container">';
		if ($errors) { // Report the errors.
		echo '<h1>Error!</h1>
		<div id ="errors">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br/>";
		}
		echo '</div> 
		<div id = "errors">Please try again.</div>'; // Close div "errors"
		}
		echo '</div>';

	} // End of the main Submit conditional.
	?>
	<div class="flex-container">
		<h1 align="center">REGISTER</h1>
		<form action="register.php" method="post" >
			<p>* Please complete the form below.</p>
			<table style="font-size: 100%">
				<tr>
					<td><p><input type="text" name="fname" placeholder="First Name" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"/></p></td>
					<td><p><input type="text" name="lname" placeholder="Last Name" maxlength="30" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"/></p></td>
				</tr>
				<tr>
					<td colspan="2"><p><input type="text" name="phone_no" placeholder="Phone Number" maxlength="40" value= "<?php if (isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>"/></p></td>
				</tr>
				<tr>
					
					<td colspan="2"><p><input type="text" name="email" placeholder="Email Address" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></p></td>
				</tr>
				<tr>
					
					<td colspan="2"><p><input type="password" name="pass1" placeholder="Password" maxlength="20" value=""/></p></td>
				</tr>
				<tr>
					
					<td colspan="2"><p><input type="password" name="pass2" placeholder="Confirm Password" maxlength="20" value=""/></p></td>
				</tr>
				<tr>
					<td colspan="2"><span class="smolink"><b><a href="login">Login Here</a></b></span></td>
				</tr>
				<tr>
					<td colspan="2"><input class="form-submit-button" type="submit" name="submit" value="Register" /></td>
				</tr>
			</table>
		</form>
	</div>
<?php } ?>

<?php include ('includes/footer.html'); ?>