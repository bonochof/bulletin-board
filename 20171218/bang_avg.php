<?php

$s = new PDO( "mysql:host=localhost;dbname=DB_j1318;charset=utf8", "j1318" );

$q =<<< EOT
  select bang, AVG(uria)
  from tb
  where uria >= 50
  group by bang
  having AVG(uria) >= 120
  order by AVG(uria) desc
  ;
EOT;

$re = $s->query( $q );
while( $kekka = $re->fetch() ){
  echo "社員番号:";
  echo $kekka[0];
  echo " 売上平均:";
  echo $kekka[1];
  echo "<br>";
}

?>
