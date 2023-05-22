<?php
$page_title = 'Testing Hub';
include ('includes/iheader.html');
?>

<div>
    <div style="text-align: center; width:100vh;">
        <h1>TESTING HUB</h1>
        
        <h3>A platform to explore and try exploiting using Cross-Site Scripting (XSS) attack WITH or WITHOUT prevention techniques being applied.</h3>
        <br>

        <h3>If you're at lost, you may refer the "Help" tab to help you in the dummy website.</h3>
        <br>
        
        <h3>Click on the button below to get started.</h3>

        <h3><p>PLEASE NOTE: Once you press "Logout", you will be redirected back to this page. You may re-enter anytime you want.</p></h3>
        <p align="center"><a href="Home"><input class="form-submit-button" type="submit" name="submit" value="Get Started"/></a></p>
    </div>
</div>



<?php $_SESSION['toggle'] = 0;
include ('includes/footer.html'); ?>