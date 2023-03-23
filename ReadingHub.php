<?php
$page_title = 'Login Form';
include ('includes/header.html');


// Display the form:?>
<h1>READING HUB</h1>	
<br><br><br>
<h2>What is Cross-Site Scripting?</h2>
    <p>Cross-Site Scripting (XSS) is a type of computer security vulnerability typically found in web applications. XSS enables attackers to inject client-side scripts into web pages viewed by other users. A cross-site scripting vulnerability may be used by attackers to bypass access controls such as the same-origin policy. Cross-site scripting carried out on websites accounted for roughly 84% of all security vulnerabilities documented by Symantec as of 2007.</p>
    <br><br><br>

    <h2>How does XSS works?</h2>
    <p>When a user inputs malicious code into a web application, the code is executed by the web server and then sent to the user's browser. The malicious code is then executed by the user's browser. This can allow the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>
    <br><br><br>

    <h2>What are the types of XSS?</h2>
    <p>There are three types of XSS:</p>
    <br><br><br>

    <h2>Reflected XSS</h2>
    <p>Reflected XSS is the most common type of XSS. In this type of attack, the attacker sends a malicious URL to the victim. The victim clicks on the link, and the malicious script is executed by the victim's browser. The malicious script is sent to the web server as part of the URL. The web server then sends the malicious script back to the victim's browser. The malicious script is then executed by the victim's browser. This can allow the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>
    <br><br><br>

    <h2>Stored XSS</h2>
    <p>Stored XSS is similar to reflected XSS, except that the malicious script is not sent to the victim's browser as part of the URL. Instead, the malicious script is stored on the web server. When a user visits the web page that contains the malicious script, the script is executed by the user's browser. This can allow the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>
    <br><br><br>

    <h2>DOM-Based XSS</h2>
    <p>DOM-Based XSS is a type of XSS that occurs when an application uses client-side data in a dangerous way without validating or encoding it. This can allow the attacker to steal cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>
    <br><br><br>

    <h2>How to prevent XSS?</h2>
    <p>There are several ways to prevent XSS attacks. The most common way is to filter the input and output of data. This can be done by using a whitelist of allowed characters, or by using a blacklist of disallowed characters. The blacklist approach is more common, as it is easier to implement and maintain. The blacklist approach is also more effective, as it prevents the attacker from using encoding to bypass the filter. For example, if the blacklist only disallows the characters < and >, then the attacker can use the encoded characters &amp;lt; and &amp;gt; to bypass the filter. However, if the blacklist disallows the characters <, >, and &, then the attacker cannot bypass the filter by encoding the characters.</p>
    <br><br><br>

    <h2>What is XSS Prevention?</h2>
    <p>XSS prevention is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>

    <h2>What are the types of XSS Prevention?</h2>
    <p>There are two types of XSS Prevention:</p>
    <br><br><br>
<h3>1. Server-Side Prevention</h3>
    <p>Server-side prevention is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. Client-Side Prevention</h3>
    <p>Client-side prevention is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the techniques used in XSS Prevention?</h2>
    <p>There are two techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. Encoding</h3>
    <p>Encoding is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. Filtering</h3>
    <p>Filtering is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the encoding techniques used in XSS Prevention?</h2>
    <p>There are two encoding techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. HTML Encoding</h3>
    <p>HTML Encoding is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. JavaScript Encoding</h3> 
    <p>JavaScript Encoding is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the filtering techniques used in XSS Prevention?</h2>
    <p>There are two filtering techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. Whitelist Filtering</h3>
    <p>Whitelist Filtering is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. Blacklist Filtering</h3>
    <p>Blacklist Filtering is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the client-side prevention techniques used in XSS Prevention?</h2>
    <p>There are two client-side prevention techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. Content Security Policy</h3>
    <p>Content Security Policy is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. HTTP Only Cookies</h3>
    <p>HTTP Only Cookies is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the server-side prevention techniques used in XSS Prevention?</h2>
    <p>There are two server-side prevention techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. Input Validation</h3>
    <p>Input Validation is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. Output Encoding</h3>
    <p>Output Encoding is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h2>What are the prevention techniques used in XSS Prevention?</h2>
    <p>There are two prevention techniques used in XSS Prevention:</p>
    <br><br><br>
<h3>1. Sanitization</h3>
    <p>Sanitization is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>
<h3>2. Escaping</h3>
    <p>Escaping is a technique used to prevent Cross-Site Scripting (XSS) attacks. XSS attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.</p>
    <br><br><br>

<?php include ('includes/footer.html'); ?>
