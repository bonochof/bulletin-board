<?php

$s = new PDO( "mysql:host=localhost;dbname=DB_j1318;charset=utf8", "j1318" );
echo "接続OK!<br>";
$s->query( "insert into tb1 values('K888', 'エスキュー花子', 25)" );
$re = $s->query( "select * from tb1" );
while( $kekka = $re->fetch() ){
  echo $kekka[0];
  echo ":";
  echo $kekka[1];
  echo ":";
  echo $kekka[2];
  echo "<br>";
}

?>
