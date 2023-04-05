<?php
require ('mysqli_connect.php');

if (isset($_POST['submit'])){
	$nameofuser = $_POST['nameofuser'];
	$totalQuestions = 0;
	$correctAnswers = 0;
	foreach($_POST as $key => $value) {
        if($key == 'nameofuser'){
			
        }else if ($key == 'submit') {
			
		}
        else{
            $tempAnswer = $_POST[$key];
            // count total questions and correct answers
			$sqlAnswer = "select  count(*) count from questions where id = '$key' and answer = '$tempAnswer'";
			$resultAnswer = mysqli_query($con, $sqlAnswer);
			$rowAnswer = mysqli_fetch_assoc($resultAnswer);
			$numAnswer = $rowAnswer['count'];
			if ($numAnswer < 1){
				// wrong answer
			}
			else {
				// correct answer
				$correctAnswers++;
			}
			$totalQuestions++;
        }  
    }
	// Store score in db
	$sqlSubmit = "insert into user (name, score) values ('$nameofuser', '$correctAnswers/$totalQuestions')";
	if (mysqli_query($con, $sqlSubmit)){
		header("Location: quizStart.php?status=succes");
	} else {
		header("Location: quizStart.php?status=error");
	}
}