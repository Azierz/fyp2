<?php
$page_title = 'Assessment Starts!';
include ('includes/header.html');
?>

<div class="flex-container">
    
	<div style="text-align:center;">
		<h2 style=" font-size: 200%; ">MCQs Application</h2>
	</div>
	<div style="text-align:center;">
		Enter your name: <br> <input type="text" id="username"> <br><br>
		<button type="button" class="form-submit-button" onclick="takeQuiz()" id="btnTake">&nbsp;Take Quiz&nbsp;</button>
	</div>

</div>

	<div style="text-align:center;" id="quizsection"></div>
	<div style="text-align:center;" id="resultsection"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script>
retreiveResults();
var userName;
function takeQuiz(){
	var name = $("#username").val();
	$("#quizsection").replaceWith('<div style="text-align:center;" id="quizsection"></div>');
	if (name){
		$("#resultsection").hide();
		userName = name;
		$.ajax({
			url: 'quizRetreive.php',
			type: 'POST',
			data: {value: 'take', name: userName },
			success: function (result) {
				$("#quizsection").replaceWith(result);
			}
		});
	}
	else {
		retreiveResults();
		$("#resultsection").show();
	}
	
}

function retreiveResults(){
	$.ajax({
		url: 'quizResults.php',
		type: 'POST',
		data: {value: 'result'},
		success: function (result) {
			$("#resultsection").replaceWith(result);
		}
	});
}
</script> -->
</body>
</html>