<?php

require ('mysqli_connect.php');
$no = 1;
if (isset($_POST['value'])){
	$take = $_POST['value'];
	$username = $_POST['name'];
	if (!empty($take) || !empty($username)){
		echo '<div style="text-align:center;" id="quizsection">';
		echo '<form action="quizSubmit.php" method="POST">';
		echo '<input type="hidden" name="nameofuser" value="'.$username.'">';
		// retreive mcq questions and their options
		$sqlMCQs = "SELECT * FROM questions";
		$resultMCQs = mysqli_query($con, $sqlMCQs);
		while ($rowMCQs = mysqli_fetch_assoc($resultMCQs)){
			$id = $rowMCQs['id'];
			$question = $rowMCQs['question'];
			$op1 = $rowMCQs['op1'];
			$op2 = $rowMCQs['op2'];
			$op3 = $rowMCQs['op3'];
			$answer = $rowMCQs['answer'];
			
			echo '<br><div style="margin: auto; border-radius: 25px; border: 2px solid black; padding: 20px; width: 800px">';
			echo '<h3>Question #'.$no.'</h3><br>';
			echo '<p style=" font-size: 150%; ">'.$question.'</p><br>';
			echo '<h3>Options</h3><br>';
			echo '<input type="radio" name="'.$id.'" value="'.$op1.'" id="'.$op1.'" checked>'.$op1.' &nbsp; &nbsp;';
			echo '<input type="radio" name="'.$id.'" value="'.$op2.'" id="'.$op2.'">'.$op2.' &nbsp; &nbsp;';
			echo '<input type="radio" name="'.$id.'" value="'.$op3.'" id="'.$op3.'">'.$op3.' &nbsp; &nbsp;';
			echo '</div>';
			$no++;
		}
		echo '<br><button style="font-size: 120%;" name="submit" type="submit" id="btnSubmit">&nbsp;Submit Quiz&nbsp;</button>';
		echo '</form>';
		echo '</div>';
	}
	
}