<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);
	
	$sql = "SELECT name FROM profile ";
	$statement = $dbh -> query($sql);
	
	//レコード件数取得
	$row_count = $statement->rowCount();
	
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	/*
	foreach ($statement as $row) {
		$rows[] = $row;
	}
	*/
	
	//データベース接続切断
	$dbh = null;
    
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>セレクト
</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>編集する作業者の名前を選択してください</h1> 
 
<table class="data">
</tr>
<form method="POST" action="edit.php"> 


<td><select name="name" style="width: 200px">
<?php
foreach($rows as $row){
?>

<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>

<?php
}
?>
</select>
</td>
<td><input type="submit" class="square_btn"  value="送信"> </td>
</form>
</tr>
</table>
</body>
</html>
