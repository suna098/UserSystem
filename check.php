<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM profile where del != 1";

	$statement = $dbh -> query($sql);
	
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
<link rel="stylesheet" type="text/css" href="style.css">
<title>nameテーブル表示</title>
<meta charset="utf-8">
</head>
<body>
<h1>社員データ表示</h1> 
 
 
<table border='1'  class="all"> 
<tr><th>名前 </td>       
        <th>性別</th>          
        <th>年齢</th>          
        <th>最終学歴</th>          
        <th>スキル</th> </tr>
<?php 
foreach($rows as $row){
?> 
	<tr><td><?php echo $row['name']; ?> </td> 
        <td><?php echo $row['sex']; ?></td> 
        <td><?php echo $row['age']; ?></td> 
        <td><?php echo $row['academic']; ?></td> 
        <td><?php echo $row['skill1'].'<br>'; echo $row['skill2'].'<br>'; echo $row['skill3'].'<br>';?></td> </tr>

<br>
<br>
<?php 
} 
?>
</table>
<center> 
<button type="button" class="square_btn"  onclick="location.href='./home.php'">
ホームに戻る
</button>
</center>
 
</body>
</html>
