<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT * FROM profile where name  = '".$_POST['name']."'";
	$sql2 = "SELECT * FROM work";


	$statement = $dbh -> query($sql);
	$statement_work = $dbh -> query($sql2);	

	//レコード件数取得
	$row_count = $statement->rowCount();
	$row_count_work = $statement_work->rowCount();
	
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	while($row_work = $statement_work->fetch()){
                $rows_work[] = $row_work;
        }


	/*
	foreach ($statement as $row) {
		$rows[] = $row;
	}

	foreach ($statement_work as $row_work) {
                $rows_work[] = $row_work;
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
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>nameテーブル表示</h1> 
 
 
 
<?php 
foreach($rows as $row){
?>
<form method="POST" action="get_edit.php"> 
<table class="data" border='1'>
	<tr><th>名前</th><td><input type="text" name="name" value= <?php echo $row['name']; ?>  size="60"></input> </td> </tr>
        <tr><th>性別</th><td><input type="text" name="sex" value= <?php echo $row['sex']; ?>  size="60"></input></td> </tr>
 	<tr><th>年齢</th><td><input type="text" name="age" value= <?php echo $row['age']; ?>  size="60"></input></td> </tr>
        <tr><th>最終学歴</th><td><input type="text" name="academic" value= <?php echo $row['academic']; ?>  size="60"></input></td> </tr>
	<tr><th>スキル1</th><td><input type="text" name="skill1" value= <?php echo $row['skill1']; ?>  size="60"></input></td> </tr>
	<tr><th>スキル2</th><td><input type="text" name="skill2" value= <?php echo $row['skill2']; ?>  size="60"></input></td> </tr>
 	<tr><th>スキル3</th><td><input type="text" name="skill3" value= <?php echo $row['skill3']; ?>  size="60"></input></td> </tr>
 	<tr><th>派遣先</th><td>

        <select name="dispatch">
	<?php
	foreach($rows_work as $row_work){
	?>
  
        <option value= <?php echo $row_work['name']; ?>><?php echo $row_work['name'];?></option>
        

	<?php
	}
	?>
        </select></td></tr>
	<tr><td>削除</td><td> <select name="delete"><option value="表示">表示</option>
		<option value="削除">削除</option></select></td> </tr>


</table>
<center><input type="submit" class="square_btn"  value="送信"><br>
</form>

<br>
<br>
<?php 
} 
?>
<button type="button" class="square_btn"  onclick="location.href='./home.php'">
ホームに戻る
</button></center>
 
 
</body>
</html>
