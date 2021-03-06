<?php

echo "<html>";
$head = <<<EOH
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="home" content="このページはDB処理用ページです">
<meta name="keyword" content="掲示板, MySQL, PHP">
<title>たかたの掲示板</title>
<link rel="stylesheet" href="./kantan2.css" type="text/css">
</head>
EOH;
echo $head;
echo "<body>";
echo "<p><h1>たかたの掲示板</h1></p>";

try{
  /*** DB接続 ***/
  $s = new PDO("mysql:host=localhost;dbname=DB_j1318;charset=utf8", "j1318");

  /*** nameがhのvalueを変数$h_dに代入 ***/
  $h_d = $_POST["h"];

  /*** $h_dがsel, ins, del, serのどれかで条件分岐 ***/
  switch("$h_d"){
    case "sel":
      $re = $s->query("select * from tbk order by bang");
      break;
    case "ins":
      $a1_d = $_POST["a1"];
      $a2_d = $_POST["a2"];
      $s->query("insert into tbk(nama, mess) values('$a1_d', '$a2_d')");
      $re = $s->query("select * from tbk order by bang");
      break;
    case "del":
      $b1_d = $_POST["b1"];
      $s->query("delete from tbk where bang=$b1_d");
      $re = $s->query("select * from tbk order by bang");
      break;
    case "ser":
      $c1_d = $_POST["c1"];
      $re = $s->query("select * from tbk where mess like '%$c1_d%' order by bang");
      break;
    case "reb":
      $s->query("drop table if exists tbk");
      $s->query("create table tbk (bang INT AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(100), mess VARCHAR(100))");
      $re = $s->query("select * from tbk order by bang");
      break;
  }

  /*** queryの結果を表示 ***/
  echo "<table class='chat'>";
  while($kekka = $re->fetch()){
    echo "<tr><td class='num'>";
    echo $kekka[0];
    echo "</td><td>";
    echo $kekka[1];
    echo "</td><td>";
    echo "<div class='balloon'><p>";
    echo $kekka[2];
    echo "</p></div>";
    echo "</td></tr>";
  }
  echo "</table>";

  /*** トップページへのリンク ***/
  echo "<br><a href='kantan2.html' class='btn_blue'>トップメニューに戻ります</a>";
}
catch(Exception $e){
  var_dump($e);
}

echo "</body>";
echo "</html>";

?>
