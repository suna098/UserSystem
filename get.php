<?php

  header('Content-type: text/plain; charset=UTF-8');
  if( !$conn = mysqli_connect("127.0.0.1", "root", "kuwagata18","profile")) {
    print ("Connection failed.\n");
    exit;
  }

 
  $old = $_POST['year'].$_POST['month'].$_POST['day']; 
  $year = (int) ((date('Ymd')-$old)/10000);

  print $old;
  print $year;

  $conn->set_charset('utf8');
  $sql = "insert into profile(name, age, sex, academic, skill1, skill2, skill3, dispatch, del) values('" ;
  $sql .= $_POST['name'] ;
  $sql .= "',";
  $sql .= $year ;
  $sql .= ",'";
  $sql .= $_POST['sex'] ;
  $sql .= "','";
  $sql .= $_POST['academic'] ;
  $sql .= "','";
  $sql .= $_POST['skill1'] ;
  $sql .= "','";
  $sql .= $_POST['skill2'] ;
  $sql .= "','";
  $sql .= $_POST['skill3'] ;
  $sql .= "','";
  $sql .= $_POST['dispatch'] ;
  $sql .= "',";
  $sql .= "0" ;

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

