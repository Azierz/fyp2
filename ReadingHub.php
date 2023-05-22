<?php
$page_title = 'Reading Hub';
include ('includes/iheader.html');


// Display the form:?>
<div class="flex-con" style="flex-wrap: wrap; width: 125vh;">
<!-- <div class="flex-con" style="flex-wrap: wrap; width: 100vh; justify-content: center; text-align:center;"> for iheader+ifooter -->
<div  style="text-align: center;">
    <h1>READING HUB</h1>	
</div>
    <div>
        <h2><p>What is Cross-Site Scripting (XSS)?</p></h2>
    </div>
    <div>
            <h3>Cross-Site Scripting (XSS) is a security vulnerability that can be found in web applications. It allows attackers to inject malicious code into web pages viewed by other users, potentially allowing them to steal sensitive information. This type of vulnerability accounted for 84% of documented security issues in 2007.</h3>
    </div>
    <div>
        <h2><p>Why is it Dangerous?</p></h2>
    </div>
    <div>
            <h3>XSS is dangerous because it allows attackers to execute malicious code in the victim's browser. This code can be used to steal sensitive information or manipulate web content. For example, an attacker could use XSS to steal a user's session cookie, allowing them to impersonate the user and access their account. They could also use XSS to redirect the user to a malicious website or display a fake login page to steal their credentials.</h3>
    </div>
    <div> 
        <h2><p>How does Cross-Site Scripting Works?</p></h2>
    </div>
    <div>
            <h3>XSS works by exploiting a vulnerability in a web application that allows attackers to inject malicious code into web pages. This code is then executed by the victim's browser, potentially allowing the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page. There are three types of XSS:</h3>

            <h3><p>Stored XSS</p></h3>
            <h3>Stored XSS is the most common type and occurs when the malicious code is stored in a database or other data store.<br/><br/>For example, the malicious code is stored on the web server and executed when a user visits the page that contains it.</h3>
            
            <h3><p>Reflected XSS</p></h3>
            <h3>Reflected XSS occurs when the malicious code is reflected off the server and executed in the victim's browser.<br/><br/>For example, the attacker sends a malicious URL to the victim. When the victim clicks the link, the malicious code is executed by the victim's browser and sent back to the web server. The server then sends the code back to the victim's browser to be executed.</h3>

            <h3><p>DOM-Based XSS</p></h3>
            <h3>DOM-based XSS occurs when the malicious code is executed in the victim's browser without being sent to the server.<br/><br/>For example, the attacker exploits a vulnerability in the web application that allows them to inject malicious code that is executed by the victim's browser.</h3>           
    </div>
    <div>       
        <h2><p>How to prevent XSS?</p></h2>
    </div>
    <div>
    
        <!-- <h3>XSS can be prevented by sanitizing user input and escaping output. Sanitizing user input means removing any potentially malicious code from the data before it is stored in the database or displayed on a web page. Escaping output means converting any potentially malicious code into harmless characters so that it cannot be executed by the browser.</h3> -->

        <h3><p>Sanitizing User Input</p></h3>
        <h3>Sanitizing user input means removing any potentially malicious code from the data before it is stored in the database or displayed on a web page. This can be done by using a whitelist of allowed characters and rejecting any input that contains characters not on the list. For example, if the application only allows alphanumeric characters, then any input that contains special characters such as <, >, or & will be rejected.</h3>

        <h3><p>Escaping Output</p></h3>
        <h3>Escaping output means converting any potentially malicious code into harmless characters so that it cannot be executed by the browser. This can be done by replacing special characters with their HTML entity equivalents. For example, the < character can be replaced with &amplt; and the > character can be replaced with &ampgt;.</h3>

        <h3><p>Using Functions</p></h3>
        <h3>Sanitizing user input and escaping output can be done manually, but it is easier to use functions that are built into the programming language or framework being used. <br/><br/>Majority of the functions can be used to prevent XSS by converting any potentially malicious code into harmless characters so that it cannot be executed by the browser. However, some of them works differently. Below are some example of functions that can be used: </h3>

            <h4><p>PHP Functions</p></h4>
                <!-- <h4>PHP provides several functions for sanitizing user input and escaping output. These include htmlspecialchars(), htmlentities(), and strip_tags().</h4> -->
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">htmlspecialchars()</span> function converts special characters to HTML entities.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">htmlentities()</span> function converts all the applicable characters to HTML entities.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">strip_tags()</span> function removes HTML tags from a string. This can be used to prevent XSS by removing any potentially malicious code from the data before it is stored in the database or displayed on a web page.</h4>

            <h4><p>JavaScript Functions</p></h4>
                <!-- <h4>JavaScript provides several functions for sanitizing user input and escaping output. These include encodeURI(), encodeURIComponent(), and escape().</h4> -->
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">encodeURI() / encodeURIComponent()</span> function encodes a (URI / URI component) by replacing each instance of certain characters by one, two, or three escape sequences representing the UTF-8 encoding of the character.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">escape()</span> function encodes a string by replacing each instance of certain characters with one, two, or three escape sequences representing the UTF-8 encoding of the character.</h4>

            <h4><p>HTML5 Functions</p></h4>
                <!-- <h4>HTML5 provides several functions for sanitizing user input and escaping output. These include innerHTML(), outerHTML(), and textContent().</h4> -->
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">innerHTML()</span> function sets or returns the HTML content (inner HTML) of an element.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">outerHTML()</span> function sets or returns the HTML content (outer HTML) of an element.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">textContent()</span> function sets or returns the text content of an element.</h4>

            <!-- <h4><p>jQuery Functions</p></h4>
                <h4>jQuery provides several functions for sanitizing user input and escaping output. These include html(), text(), and val().</h4>                
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">html()</span> function sets or returns the HTML content of an element.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">text()</span> function sets or returns the text content of an element.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">val()</span> function sets or returns the value of an input field.</h4>

            <h4><p>URL Functions</p></h4>
                <h4>URLs can be used to prevent XSS by converting any potentially malicious code into harmless characters so that it cannot be executed by the browser.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">encodeURI() / encodeURIComponent()</span> function encodes a (URI / URI component) by replacing each instance of certain characters by one, two, or three escape sequences representing the UTF-8 encoding of the character.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">decodeURI() / decodeURIComponent()</span> function decodes a (URI / URI component) by replacing each instance of certain escape sequences representing the UTF-8 encoding of the character by the character itself.</h4>

            <h4><p>CSS Functions</p></h4>
                <h4>CSS can be used to prevent XSS by converting any potentially malicious code into harmless characters so that it cannot be executed by the browser.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">escape()</span> function encodes a string by replacing each instance of certain characters by one, two, or three escape sequences representing the UTF-8 encoding of the character.</h4>
                <h4>The <span style="background-color: #e5ff0099; padding:0.2em;">unescape()</span> function decodes a string by replacing each instance of certain escape sequences representing the UTF-8 encoding of the character by the character itself.</h4> -->
    </div>
    <div>
        <h2><p>Conclusion</p></h2>
    </div>
    <div>
        <h3>XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</h3>
        <h3>There are many ways to prevent XSS attacks. The most important thing is to be aware of the threat and to take steps to protect yourself.</h3>

    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

</div>
<?php include ('includes/ifooter.html'); ?>

<script type="text/javascript">
	//Get the button:
	mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    mybutton.style.display = "block";
	  } else {
	    mybutton.style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0; // For Safari
	  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}
</script>