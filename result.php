<?php
include('db.php');
$id = intval($_GET['id']);
$stmt = $db -> prepare("SELECT * FROM Submission WHERE id = ?");
$stmt -> execute([$id]);
$sub = $stmt -> fetch();
$stmt2 = $db -> prepare("SELECT title FROM Problems WHERE id = ?");
$stmt2 -> execute([$sub['problem_id']]);
$title = $stmt2 -> fetch();
echo $title;

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="uft-8">
   <title>Submission #<?= $id ?></title>
   <meta http-equiv="refresh" content="3">
</head>
<body>
   <h2>Submission Result: </h2>
   <p>Problem: <?= htmlspecialchars($sub['problem_id']) ?>
               <?= htmlspcialchars($title['title'])  ?>
   </p>
   <p>Status: <strong><?= htmlspecialchars($sub['status'])?></p>
   
   <?php if ($sub['status'] === 'Pending'): ?>
      <p> Running in the queue, please wait. </p>
   <?php else: ?>
      <pre><?= htmlspcialchars($sub['status']) ?> </pre>
   <?php endif; ?>
</body>
</html>
