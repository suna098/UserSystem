<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM work ";

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
<h1>常駐先情報</h1> 
 
 
<table border='1' id="data" class = "all"> 
<tr><th>名前 </th>       
        <th>勤務地</th>          
        <th>住所</th>          
        <th>必要スキル1</th>          
        <th>必要スキル2</th> 
	<th>必要スキル3</th>
</tr>
<?php 
foreach($rows as $row){
?> 
	<tr><td><?php echo $row['name']; ?> </td> 
        <td><?php echo $row['locate']; ?></td> 
        <td><?php echo $row['occup']; ?></td> 
 	<td><?php echo $row['skill1']; ?></td>
        <td><?php echo $row['skill2']; ?></td>
        <td><?php echo $row['skill3']; ?></td>
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
