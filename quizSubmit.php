<?php
require ('mysqli_connect.php');

if (isset($_POST['submit'])){
	$nameofuser = $_POST['nameofuser'];
	$totalQuestions = 10;
	$correctAnswers = 0;
	foreach($_POST as $key => $value) {
        if($key == 'nameofuser'){
			
        }else if ($key == 'submit') {
			
		}
        else{
            $tempAnswer = $_POST[$key];
			echo $tempAnswer .' <temp key> '. $key;
            // count total questions and correct answers
			$sqlAnswer = "select count(*) count from questions where ques_id = '$key' and correct_ans = '$tempAnswer'";
			$resultAnswer = mysqli_query($dbc, $sqlAnswer);
			$rowAnswer = mysqli_fetch_assoc($resultAnswer);
			$numAnswer = $rowAnswer['count'];
			if ($numAnswer < 1){
				// wrong answer
			}
			else {
				// correct answer
				$correctAnswers++;
			}
			
        }  
    }
	// Store score in db
	$sqlSubmit = "insert into leaderboard (names, score) values ('$nameofuser', '$correctAnswers/$totalQuestions')";
	if (mysqli_query($dbc, $sqlSubmit)){
		echo '
		<script>
			alert("Congrats on completing the quiz! \nYou may view your score at Leaderboard");
			window.location.href="quizResults";
		</script>';
	} else {
		echo '
	<script>
		alert("Please enter your name");
		window.location.href="quizStart";
	</script>';
	}

}