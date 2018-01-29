<?php

echo "<form method='POST' action='radio_uke.php'>";
echo "あなたの年齢を選択して，送信ボタンをクリックしてください．<br>";
$i = 1;
$c = 1;
while( $i <= 100 ){
  echo "<input type='radio' name='r' value='$i'>$i  ";
  if( $c == 10 ){
    echo "<br>";
    $c = 0;
  }
  $i++;
  $c++;
}
echo "<input type='submit' value='送信'>";
echo "</form>";

?>
