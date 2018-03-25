<?php

  header('Content-type: text/plain; charset=UTF-8');
  if( !$conn = mysqli_connect("127.0.0.1", "root", "kuwagata18","profile")) {
    print ("Connection failed.\n");
    exit;
  }
  $conn->set_charset('utf8');
  $sql = "insert into work(name, locate, occup, skill1, skill2, skill3, member) values('" ;
  $sql .= $_POST['name'] ;
  $sql .= "','";
  $sql .= $_POST['locate'] ;
  $sql .= "','";
  $sql .= $_POST['occup'] ;
  $sql .= "','";
  $sql .= $_POST['skill1'] ;
  $sql .= "','";
  $sql .= $_POST['skill2'] ;
  $sql .= "','";
  $sql .= $_POST['skill3'] ;
  $sql .= "','";
  $sql .= $_POST['member'] ;
  $sql .= "'";

  $sql .= ");";

  header('Content-type: text/plain; charset=UTF-8');

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

