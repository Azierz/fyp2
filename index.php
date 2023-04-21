<?php
$page_title = 'Home Page';
include ('includes/iheader.html');

?>
	
    <div style="width:150vh;">
    
	<!-- <table  style="text-align:center;">

	    <tr>
	        <td><h4>Reading Hub</h4></td>
			<td><h4>Assessment Hub</h4></td>
			<td><h4>Testing Hub</h4></td>
	    </tr>
		<tr>
	        <td><h2><p>This section will provide you with informations regarding Cross-Site Scripting (XSS) Attack and some methods on how to prevent them</p></h2></td>
			<td><h2><p>This section will be used to test your understanding regarding this topic</p></h2></td>
			<td><h2><p>Testing Hub</p></h2></td>
	    </tr>
		
	</table> -->
    	
	
	
	
<h1>Cross-Site Scripting (XSS) Learning Hub</h1>

	<h2><p>Section 1 - Reading Hub</p></h2>
	<h3>This section will provide you with informations regarding Cross-Site Scripting (XSS) Attack and some methods on how to prevent them.</h3>
	
	<h2><p>Section 2 - Testing Hub</p></h2>
	<h3>This section will allow you to play around with a dummy website for you to try and attack with and without the prevention system. Do you think you can made a successful attack ? </h3>

	<h2><p>Section 3 - Assessment Hub</p></h2>
	<h3>This section will be used to test your understanding regarding this topic</h3>

</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php
include ('includes/footer.html');
?>


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