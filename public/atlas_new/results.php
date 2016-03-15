<?php
if (!empty($_GET['file'])) {
  //echo $_GET['file']; echo "<br>"; echo $_GET['name'] ;
    // Security, down allow to pass ANY PATH in your server
  header('Content-disposition: attachment; filename="'.$_GET['name'].'"');
  header('Content-type: text/plain');
  readfile($_GET['file']);
  shell_exec ("rm -f ".$_GET['file']); 
} else {
    return;
}
?>
