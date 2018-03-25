<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>常駐先情報新規入力</h1>
<form method="POST" action="get_work.php">
<table class="data" border="1">
<tr>
<th>常駐先</th>
<td><input type="text" name="name" size="15" /><br></td>
</tr>

<tr>
<th>勤務地</th>

<td>
<input type="text" name="locate" size="15" /><br>
</td>
</tr>

<tr>
<th>職種</th> 
<td><input type="text" name="occup" size="15" /><br></td>

</td>
</tr>

<tr>
<th>必要スキル1</th>
<td><input type="text" name="skill1" size="15" /><br></td>
</tr>

<tr>
<th>必要スキル2</th>
<td><input type="text" name="skill2" size="15" /><br></td>
</tr>

<tr>
<th>必要スキル3</th>
<td><input type="text" name="skill3" size="15" /><br></td>
</tr>


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

