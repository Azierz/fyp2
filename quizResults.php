<?php
require ('mysqli_connect.php');

$no = 1;
if (isset($_POST['value'])){
	echo '<div style="text-align:center;" id="resultsection"><p style="color: red;">Enter your name and click Take Quiz button!</p><br>';
	echo '<table style="width:30%; border-collapse: collapse; margin: auto;"><thead><tr><th style="border: 1px solid black; border-collapse: collapse; ">#</th><th style="border: 1px solid black; border-collapse: collapse; ">Name</th><th style="border: 1px solid black; border-collapse: collapse; ">Score</th></tr></thead><tbody>';
	$sqlScore = "select * from user";
	$resultScore = mysqli_query($con, $sqlScore);
	while ($rowScore = mysqli_fetch_assoc($resultScore)){
		$name = $rowScore['name'];
		$score = $rowScore['score'];
		echo '<tr><td style="border: 1px solid black; border-collapse: collapse; ">'.$no.'</td><td style="border: 1px solid black; border-collapse: collapse; ">'.$name.'</td><td style="border: 1px solid black; border-collapse: collapse; ">'.$score.'</td></tr>';
		$no++;
	}
	echo '</tbody></table>';
	echo '</div>';
}