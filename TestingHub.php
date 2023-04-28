<?php
$page_title = 'Testing Hub';
include ('includes/iheader.html');
?>

<div>
    <div style="text-align: center; width:100vh;">
        <h1>Testing Hub</h1>
        <h3>A platform to learn how does the mechanims of Cross-Site Scripting (XSS) works with and/or without prevention techniques applied.</h3>
        <br>
        
        <!-- <h3>Learn how to prevent XSS attacks by reading the articles in the Reading Hub.</h3>
        <br>
        
        <h3>Test your understanding by playing around with the dummy website in the Testing Hub.</h3>
        <br>
        
        <h3>Test your knowledge by taking the assessment in the Assessment Hub.</h3>
        <br> -->
        <h3>If you're at lost, you may refer the "Help" tab to help you in the dummy website.</h3>
        <br>
        
        <h3>Click on the button below to get started.</h3>
        <!-- <h3>Test your knowledge by answering the questions in the Assessment Hub.</h3>
        <h3>Get a chance to be on the leaderboard by answering the questions correctly.</h3> -->

        <h3><p>PLEASE NOTE: Once you press "Logout", you will be redirected back to this page. You may re-enter anytime you want.</p></h3>
        <p align="center"><a href="Home"><input class="form-submit-button" type="submit" name="submit" value="Get Started"/></a></p>
    </div>
</div>



<?php $_SESSION['toggle'] = 0;
include ('includes/footer.html'); ?>