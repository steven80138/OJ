<?php
include("db.php");
$problems = $db -> query("SELECT id, title FROM Problems") -> fetchALL();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset='utf-8'>
   <title>PO's OJ for test</title>
   <link rel="stylesheet" href="style.css">
<head>
<body>
  <h1>Problem list</h1>
  <table>
     <tr><th>ID</th><th>Title</th></tr>
     <?php foreach ($problems as $p): ?>
        <tr>
           <td><?= htmlspecialchars($p['id']) ?></td>
           <td><a href="problem.php?id=<? $p['id'] ?>">
              <?= htmlspecialchars($p['title']) ?>
           </a></td>
        </tr>
     <?php endforeach ?> 
  </table>
</body>
</html>
