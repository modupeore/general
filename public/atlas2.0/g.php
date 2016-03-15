<?php
$newarray = array(
    "foo","bar",
    "bars","foos", "toos", "fours"
);
$ccc = count($newarray);
$i=0; $k=1;
while ($i < count($newarray)){
  echo "$k and $i<br>";
$sokey["$newarray[$i]"] = $newarray[$k];
      $k = $k+2; $i = $i+2;
      //echo "$newarrary[$ii]<br>";
      /*foreach ($newarray as $abc){
      $ii = $ii + 1;
      echo "$ii $abc<br>";*/
    }$cc=0; //echo $sokey["LIVER"]."<br>".$sokey["spleen"]."<br>";
    foreach ($sokey as $abc => $def ){
      $cc = $cc + 1;
      echo "$cc $abc and $def<br><br><br>";
    }

?>
