<?php
include 'db.php';
$id = intval($_GET['id']);
$stmt = $db -> prepare("SELECT * FROM Problems WHERE id = ?");
$stmt -> execute([$id]);
$problem = $stmt -> fetch();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset='utf-8'>
   <title><?= htmlspecialchars($problem['title']) ?></title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <h2><?= htmlspecialchars($problem['title']) ?></h2>
   <pre> Description: <?= htmlspecialchars($problem['description']) ?></pre>
   <pre> Input format: <?= htmlspecialchars($problem['input_format']) ?></pre>
   <pre> Sample input: <?= htmlspecialchars($problem['sample_input']) ?></pre>
   <pre> Sample output: <?= htmlspecialchars($problem['sample_output']) ?></pre>
   
   <h3>Upload the code</h3>
   <form action="submit.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="problem_id" value="<?= $problen['id'] ?>">
      
      </label><br><br>
      <textarea name="code" rows="100" cols="80" placeholder="Input your code..."></textarea><br>
      <button type="submit">Upload</button>
   </form>
</body>
</html>
