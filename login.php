<?php
$page_title = 'Login Form';
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

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize error array.

		// Validate the email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email.';
		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// Validate the password:
		if (empty($_POST['pass'])) {
			$errors[] = 'You forgot to enter your password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
		}

		if (empty($errors)) { // If everything's OK.

			// Query for user
			$q1 = "SELECT user_id, email, profile_pic, first_name, last_name FROM users WHERE email='$e' AND password=SHA1('$p')";		
			$r1 = @mysqli_query ($dbc, $q1); // Run the query.
			
			// Check the result:
			if (mysqli_num_rows($r1) == 1) {

				// Fetch the record:
				$row = mysqli_fetch_array($r1, MYSQLI_ASSOC);

				// Set the session data:
				
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $e;
				$_SESSION['profile_pic'] = $row['profile_pic'];
				$_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];

				
				// Redirect user
				// header("Location:profile.php");
				echo '<script>setTimeout(function(){location.href="profile"},0);</script>';

			} else { // Not a match!
				$errors[] = 'The email and password entered do not match those on file.';
			}
		} // End of empty($errors) IF.

		mysqli_close($dbc); // Close the database connection.
		
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

	} // End of the main submit conditional.

	// Display the form:?>
	<div class="flex-container">
		<h1 align="center">LOGIN</h1>
		<form action="login.php" method="post">
			<table style="font-size: 100%">
				<tr>
					<td><p><input type="text" name="email" placeholder="Email Address" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"/></p></td>
				</tr>
				<tr>
					<td><p><input type="password" name="pass" placeholder="Password" /></p></td>
				</tr>
				<tr>
					<td><span class="smolink"><b><a href="register">REGISTER HERE</a></b></span></td>
				</tr>
				<tr>
					<td colspan="2"><input class="form-submit-button" type="submit" name="submit" value="Login" /></td>
				</tr>		
			</table>
		</form>
	</div>
<?php } else { // INSECURE CODES

	// Run after submit form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array(); // Initialize error array.

		// Validate the email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email.';
		} else {
			$e = trim($_POST['email']);
		}

		// Validate the password:
		if (empty($_POST['pass'])) {
			$errors[] = 'You forgot to enter your password.';
		} else {
			$p = trim($_POST['pass']);
		}

		if (empty($errors)) { // If everything's OK.

			// Query for user
			$q1 = "SELECT user_id, email, profile_pic, first_name, last_name FROM users WHERE email='$e' AND password=SHA1('$p')";		
			$r1 = @mysqli_query ($dbc, $q1); // Run the query.
			
			// Check the result:
			if (mysqli_num_rows($r1) == 1) {

				// Fetch the record:
				$row = mysqli_fetch_array($r1, MYSQLI_ASSOC);

				// Set the session data:
				
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $e;
				$_SESSION['profile_pic'] = $row['profile_pic'];
				$_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];

				
				// Redirect user
				// header("Location:profile.php");
				echo '<script>setTimeout(function(){location.href="profile"},0);</script>';

			} else { // Not a match!
				$errors[] = 'The email and password entered do not match those on file.';
			}
		} // End of empty($errors) IF.

		mysqli_close($dbc); // Close the database connection.
		
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

	} // End of the main submit conditional.

	// Display the form:?>
	<div class="flex-container">
		<h1 align="center">LOGIN</h1>
		<form action="login.php" method="post">
			<table style="font-size: 100%">
				<tr>
					<td><p><input type="text" name="email" placeholder="Email Address" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></p></td>
				</tr>
				<tr>
					<td><p><input type="password" name="pass" placeholder="Password" /></p></td>
				</tr>
				<tr>
					<td><span class="smolink"><b><a href="register">REGISTER HERE</a></b></span></td>
				</tr>
				<tr>
					<td colspan="2"><input class="form-submit-button" type="submit" name="submit" value="Login" /></td>
				</tr>		
			</table>
		</form>
	</div>
<?php } ?>

<?php include ('includes/footer.html'); ?>
