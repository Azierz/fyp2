<?php
$page_title = 'Leaderboard';
include ('includes/header.html');
require ('mysqli_connect.php');

$no = 1;
if (!isset($_POST['value'])){
	echo '<div id="vcontent">
	<h1 align="center">Leaderboard</h1><br/>';
	// Table header:
    echo '<table align="center" cellspacing="0" cellpadding="0">
    <tr>
        <th align="left">No</td>
        <th align="left">Name</td>
        <th align="left">Score</td>
    </tr>
    ';
		$sqlScore = "select * from leaderboard ORDER BY score DESC";
		$resultScore = mysqli_query($dbc, $sqlScore);
		while ($rowScore = mysqli_fetch_assoc($resultScore)){
			$name = $rowScore['names'];
			$score = $rowScore['score'];
			echo '
			<tr>
				<td>'.$no.'</td>
				<td>'.$name.'</td>
				<td>'.$score.'</td>
			</tr>';
			$no++;
		}
		echo '
	</table>';
		echo '</div>';
}

include ('includes/footer.html'); ?>