<?php
header("Content-type: text/html; charset=utf-8");

$dsn = 'mysql:host=127.0.0.1;dbname=profile;charset=utf8';
$user = 'root';
$password = 'kuwagata18';

try{
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT name FROM profile ";
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
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>社員情報新規入力</h1>
<form method="POST" action="get.php">
<table class="data" >
<tr>
<th>名前</th>
<td><input type="text" name="name" size="15" /><br></td>
</tr>

<tr>
<th>生年月日</th>

<td>
<select name="year">
    <option value="">--</option>
    <?php foreach(range(1920,2016) as $year): ?>
    <option value="<?=$year?>"><?=$year?></option>
    <?php endforeach; ?>
</select>
年
<select name="month">
    <option value="">--</option>
    <?php foreach(range(1,12) as $month): ?>
    <option value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
    <?php endforeach; ?>
</select>
月
<select name="day">
    <option value="">--</option>
    <?php foreach(range(1,31) as $day): ?>
    <option value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
    <?php endforeach; ?>
</select>
日

<br>
</td>
</tr>



<tr>
<th>性別</th> 
<td><input type="radio" name="sex" value="male">男
<input type="radio" name="sex" value="female"> 女<br></td>
</tr>

<tr>
<th>住所</th>
<td><input type="text" name="locate" size="15" /><br></td>
</tr>


<tr>
<th>最終学歴</th>
<td><input type="text" name="academic" size="15" /><br></td>
</tr>

<tr>
<th>スキル1</th>
<td><input type="text" name="skill1" size="15" /><br></td>
</tr>

<tr>
<th>スキル2</th>
<td><input type="text" name="skill2" size="15" /><br></td>
</tr>

<tr>
<th>スキル3</th>
<td><input type="text" name="skill3" size="15" /><br></td>


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


<tr>
<td><input type="submit" value="送信" class="square_btn" ></td>
<td><button type="button" class="square_btn"  onclick="location.href='./home.php'">
homeに戻る
</button>
</td>
</tr>

</table>
</form>
</body>
</html>

