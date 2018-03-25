<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=test;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);
	
	$sql = "SELECT * FROM profile ";
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
<h1>検索条件(スキル,年齢上限)入力画面</h1> 

<table class="data"> 
<tr>
<th>
   年齢上限
</th>

<td><form method="POST" action="show.php">
<input type="text" name="age" size="15" ></td>
</tr>

<tr>
<th>
   スキル 
</th>

<td><form method="POST" action="show.php"> 
<input type="text" name="skill1" size="15" ></td>
</tr>

<tr>
<td><input type="submit" value="送信" class="square_btn"> </td>
<td><button type="button" class="square_btn"  onclick="location.href='./home.php'">
ホームに戻る
</button>
</td>
</tr>
</form>
</table>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>nameテーブル表示</title>
<meta charset="utf-8">
</head>
<body>




</body>
</html>

