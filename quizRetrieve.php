<?php
require ('mysqli_connect.php');
$no=1;
$postname = $_POST['value'];
if (isset($_POST['value']) || isset($_POST['name'])){
	$take = $_POST['value'];
	$username = $_POST['name'];
	// if (empty($take) || !empty($username)){
		echo '
		<div class="flex-con" id="quizsection">
		<form action="quizSubmit.php" method="POST" id="quizform">
		<input type="hidden" name="nameofuser" value="'.$username.'">';
		// retreive mcq questions and their options
		$sqlMCQs = "SELECT * FROM questions";
		$resultMCQs = mysqli_query($dbc, $sqlMCQs);

		$num = mysqli_num_rows($resultMCQs);
		if ($num > 0) {
			// output data of each row
			while($rowMCQs = mysqli_fetch_assoc($resultMCQs)) {
				$id = $rowMCQs['ques_id'];
				$question = $rowMCQs['questions'];
				
				//retrieve the selected results from database   
			$qANS = "SELECT * FROM answers WHERE ques_id='$id'";  
			$rANS = mysqli_query($dbc, $qANS); 
			$num = mysqli_num_rows($rANS);

			echo '
			
			<br><div class="flex-container" style="margin: auto; border-radius: 25px; border: 2px solid black; padding: 20px; width: 800px">
			
			<h3>Question #'.$no.'</h3>
			
			<p style=" font-size: 150%; margin-top:-25">'.htmlspecialchars($question).'</p><br>
			
			<h3>Options</h3><br>';
			
			// output data of each row
			while($rowANS = mysqli_fetch_assoc($rANS)) {
				$ans = $rowANS['choices'];
				$ans_id = $rowANS['ans_num'];
				echo '
				<table style="margin-left:20">
					<tr>
						<td><input type="radio" name="'.$id.'" value="'.$ans_id.'" id="'.$ans_id.'"><br></td>
						<td><label for="'.$ans_id.'">'.htmlspecialchars($ans).'</label><br></td>
					</tr>
				</table>';
			}
			echo '</div><br>';
				$no++;
			}
		} else {
			echo "<h1>0 results</h1>";
		} 

	// }
	echo '</form></div><div class="flex-con">
	<button class="form-submit-button" style="width:100%" name="submit" type="submit" id="btnSubmit" form="quizform">Submit Quiz</button>';
	echo '';
	echo '</div>';
} else {
	echo '
	<script>
		alert("Please enter your name");
		window.location.href="quizStart";
	</script>';
}

	