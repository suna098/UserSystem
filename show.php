<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM profile where (skill1 like '%".$_POST['skill1']."%'";
        $sql .= "or skill2 like '%" .$_POST['skill1']."%'";
        $sql .= "or skill3 like '%" .$_POST['skill1']."%'";
        $sql .= ") and age < ".$_POST['age'];

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
 
 
 
<?php 
foreach($rows as $row){
?> 
<table border='1' class="data">
	<tr><th>名前</th><td><?php echo $row['name']; ?> </td> </tr>
        <tr><th>性別</th><td><?php echo $row['sex']; ?></td> </tr>
        <tr><th>年令</th><td><?php echo $row['age']; ?></td> </tr>
        <tr><th>最終学歴</th><td><?php echo $row['academic']; ?></td> </tr>
        <tr><th>スキル(言語等)</th><td><?php echo $row['skill1'].'<br>'; echo $row['skill2'].'<br>'; echo $row['skill3'].'<br>';?></td> </tr>
</table>

<br>
<br>
<?php 
} 
?>

<center> 
<button type="button" class="square_btn"  onclick="location.href='./home.php'">
ホームに戻る
</button>
</center>
 
</body>
</html>
