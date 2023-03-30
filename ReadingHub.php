<?php
$page_title = 'Reading Hub';
include ('includes/header.html');


// Display the form:?>
<div class="flex-container" style="flex-wrap: wrap;">
<div>
    <h1>READING HUB</h1>	
    <br>
</div>
    <div>
        <h2>What is Cross-Site Scripting (XSS)?</h2>
    </div>
    <div>
            <p>Cross-Site Scripting (XSS) is a security vulnerability that can be found in web applications. It allows attackers to inject malicious code into web pages viewed by other users, potentially allowing them to steal sensitive information. This type of vulnerability accounted for 84% of documented security issues in 2007.</p>
            <br>
    </div>
    <div>
        <h2>Why is it Dangerous?</h2>
    </div>
    <div>
            <p>XSS is dangerous because it allows attackers to execute malicious code in the victim's browser. This code can be used to steal sensitive information or manipulate web content. For example, an attacker could use XSS to steal a user's session cookie, allowing them to impersonate the user and access their account. They could also use XSS to redirect the user to a malicious website or display a fake login page to steal their credentials.</p>
            <br>
    </div>
    <div> 
        <h2>How does Cross-Site Scripting Works?</h2>
    </div>
    <div>
            <p>XSS works by exploiting a vulnerability in a web application that allows attackers to inject malicious code into web pages. This code is then executed by the victim's browser, potentially allowing the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page. There are three types of XSS:</p>
            <br>

            <h3>Stored XSS</h3>
            <p>In this type of attack, the malicious code is stored on the web server and executed when a user visits the page that contains it.</p>
            <br>

            <h3>Reflected XSS</h3>
            <p>In this type of attack, the attacker sends a malicious URL to the victim. When the victim clicks the link, the malicious code is executed by the victim's browser and sent back to the web server. The server then sends the code back to the victim's browser to be executed.</p>
            <br>

            <h3>DOM-Based XSS</h3>
            <p>In this type of attack, the attacker exploits a vulnerability in the web application that allows them to inject malicious code that is executed by the victim's browser.</p>
            <br>
    </div>
    <div>
        <h2>What kind of consequences that XSS have?</h2>
    </div>
    <div>
            <p>XSS can have serious consequences for web applications and their users. It can be used to steal sensitive information, manipulate web content, and redirect users to malicious websites. For example, an attacker could use XSS to steal a user's session cookie, allowing them to impersonate the user and access their account. They could also use XSS to redirect the user to a malicious website or display a fake login page to steal their credentials.</p>
            <br>
    </div>
    <div>       
        <h2>How to prevent XSS?</h2>
    </div>
    <div>
            <p>One of the methods are by using XSS prevention technique. However, there are still other methods to prevent XSS:</p>
            <br>
            <ul>
                <li>Validate all user input: All user input should be validated to ensure that it is in the correct format and does not contain malicious code.</li>
                <li>Encode all output: All output should be encoded to ensure that it is not interpreted as HTML or JavaScript.</li>
                <li>Use a whitelist: A whitelist is a list of allowed characters that can be used in user input. All other characters should be removed or encoded.</li>
                <li>Use a blacklist: A blacklist is a list of characters that should not be allowed in user input. All other characters should be allowed.</li>
                <li>Use a context-specific filter: A context-specific filter is a filter that is specific to the type of data that is being validated. For example, a filter that checks for valid email addresses would be a context-specific filter.</li>
                <li>Use a generic filter: A generic filter is a filter that is not specific to the type of data that is being validated. For example, a filter that checks for valid characters in a username would be a generic filter.</li>
                <li>Use a context-specific sanitizer: A context-specific sanitizer is a sanitizer that is specific to the type of data that is being sanitized. For example, a sanitizer that removes HTML tags from a blog post would be a context-specific sanitizer.</li>
                <li>Use a generic sanitizer: A generic sanitizer is a sanitizer that is not specific to the type of data that is being sanitized. For example, a sanitizer that removes all HTML tags would be a generic sanitizer.</li>
            </ul> 
            <br>
    </div>
</div>
<?php include ('includes/footer.html'); ?>
