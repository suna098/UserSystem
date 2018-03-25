<?php
  print $_POST['delete'];
  header('Content-type: text/plain; charset=UTF-8');
  if( !$conn = mysqli_connect("127.0.0.1", "root", "kuwagata18","profile")) {
    print ("Connection failed.\n");
    exit;
  }
  $conn->set_charset('utf8');
  $sql = "update profile set ";

  if($_POST['delete'] == '削除'){
	$sql .= "del = 1, ";
  }
  $sql .= "age = ".$_POST['age'];
  $sql .= ",academic = '" .$_POST['academic'];
  $sql .= "',skill1 = '" .$_POST['skill1'];
  $sql .= "',skill2 = '" .$_POST['skill2'];
  $sql .= "',skill3 = '" .$_POST['skill3'];
  $sql .= "',dispatch = '" .$_POST['dispatch'];
  $sql .= "' where name = '".$_POST['name']."' ";

  if ( !$result = mysqli_query($conn, $sql)) {
    print ("Failed : $sql\n");
    exit;
  }
  $row = mysqli_fetch_array($result);
  print $row[0] ."\n";

  mysqli_free_result($result);

  if (!mysqli_close($conn)) {
    print ("disconnect failed\n");
    exit;
  }
?>

