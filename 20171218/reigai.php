<?php

try{
  $s = new PDO( "mysql:host=localhost;dbname=DB_j1318;charset=utf8", "j1318" );
  $s->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  echo "接続OK!<br>";
  $s->query( 'insert into tb1 values("K888", "エスキュー花子", 555)' );
  $re = $s->query( "select * from tb_bad" );
  while( $kekka = $re->fetch() ){
    echo $kekka[0];
    echo ":";
    echo $kekka[1];
    echo ":";
    echo $kekka[2];
    echo "<br>";
  }
}
catch( PDOException $e ){
  echo "次がエラーの内容です:".$e->getMessage();
}

?>
