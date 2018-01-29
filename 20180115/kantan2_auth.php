<?php

session_start();
require_once("conf/config.php");

echo "<html>";
$head = <<<EOH
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="home" content="このページはセッション処理用ページです">
<meta name="keyword" content="掲示板, MySQL, PHP">
<title>たかたの掲示板</title>
<link rel="stylesheet" href="./kantan2.css" type="text/css">
</head>
EOH;
echo $head;
echo "<body>";
echo "<p><h1>たかたの掲示板</h1></p>";

$h_d = $_POST["h"];
echo "<form method='POST' action='kantan2_auth.php'>";
switch($h_d){
case "judge":
  if($_POST["id"] === $SESSID and $_POST["pwd"] === $SESSPWD){
    echo "ログイン成功";
    $_SESSION["login"] = $SESSID;
    break;
  }
  else{
    echo "IDまたはパスワードが違います";
  }
case "login":
  echo "<table class='login'><tr><td>ID</td><td><input type='text' name='id'></td></tr>";
  echo "<tr><td>パスワード</td><td><input type='text' name='pwd'></td></tr></table>";
  echo "<input type='image' value='ログイン' class='btn_black'>";
  echo "<input type='hidden' name='h' value='judge'>";
  break;
case "logout":
  echo "ログアウトしました";
  $_SESSION = array();
  session_destroy();
  break;
}
echo "</form>";

echo "<p><a href='kantan2_auth.php'></p>";

echo "<br><a href='kantan2.php' class='btn_blue'>トップメニューに戻ります</a>";

echo "</body>";
echo "</html>";

?>
