<?php
include('db.php');
$problem_id =  intval($_GET['problem_id']);
$code = $_POST['code'];

$stmt = $db -> prepare("INSERT INTO Submission (problem_id, code)
			VALUES(?, ?)");
$stmt -> execute([$problem_id, $code]);

$submission_id = $db -> lastInsertID();
header("Location: result.php?id=$submission_id");
exit;
?>
