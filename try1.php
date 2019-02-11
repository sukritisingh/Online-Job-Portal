<?php
if(isset($_POST['submit'])){
$pos=$_POST['opt1'];
echo $pos;}
?>
<html>
<body>
<form method="POST" action="try1.php">
<input type="checkbox" name="opt1" value="Python"> Python
<input type="submit">
</form>
</body>
</html>