<?php
  session_start();
  require_once('atlas_header.php'); //The header
  require_once('atlas_fns.php'); //All the routines
  d_genes_header(); //Display header
  $phpscript = "genes.php";
?>
<?php
  /* Connect to the database */
  $database = "transcriptatlas";
  $table = "transcripts_summary";
  $db_conn = db_connect('localhost', $database);
  $gquery = 'select library_id from vw_libraryinfo WHERE species = "gallus"';
  $aquery = 'select library_id from vw_libraryinfo WHERE species = "alligator_mississippiensis"';
  $mquery = 'select library_id from vw_libraryinfo WHERE species = "mus_musculus"';
?>
<?php
$liblist = null;
  if (!empty($_REQUEST['geneinfo'] == "View Gallus")) {
    $result = $db_conn->query($gquery);
     while ($row = $result->fetch_assoc()) {
        $liblist .= $row['library_id'].",";
      }
    $liblist = rtrim($liblist, ",");
  }
  elseif (!empty($_REQUEST['geneinfo'] == "View Alligator")) {
    $result = $db_conn->query($aquery);
    while ($row = $result->fetch_assoc()) {
        $liblist .= $row['library_id'].",";
      }
     $liblist = rtrim($liblist, ",");
  }
  elseif (!empty($_REQUEST['geneinfo'] == "View Mouse")) {
    $result = $db_conn->query($mquery);
    while ($row = $result->fetch_assoc()) {
        $liblist .= $row['library_id'].",";
      }
     $liblist = rtrim($liblist, ",");
  }
  elseif (!empty($_REQUEST['geneinfo'] == "View All Genes")) {
    $_POST['search'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['search']));
    $query = 'select library_id from vw_libraryinfo WHERE library_id in ('.$_POST['search'].')';
    $result = $db_conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $liblist .= $row['library_id'].",";
      }
    $liblist = rtrim($liblist, ",");
  }
?>
<div class="question">
<?php
  echo '<form id="geneall" class="top-border" action="'.$phpscript.'" method="post">';
?>
    <p class="pages"><span>Input the library numbers :</span>
    <?php
  if (!empty($_POST['search'])) {
    echo '<input type="text" name="search" value="' . $_POST["search"] . '"/>';
  } else {
    echo '<input type="text" name="search" placeholder="Enter library ids separated by commas (,)" />';
  }
?> 
    <input type="submit" name="geneinfo" value="View All Genes" onclick="doit();"/>

    <p class="pages"><span>Download all Gallus genes and expression information : </span>
    <input type="submit" name="geneinfo" value="View Gallus" onclick="doit();"/> 

    <p class="pages"><span>Download all Alligator genes and expression information : </span>
    <input type="submit" name="geneinfo" value="View Alligator" onclick="doit();"/>
    
    <p class="pages"><span>Download all Mouse genes and expression information : </span>
    <input type="submit" name="geneinfo" value="View Mouse" onclick="doit();"/>
</form> </div>
<hr>
<?php
  if(!empty($db_conn) && !empty($_POST['geneinfo'])) {
    //echo "yes this is $liblist<br>";
    switch ($_POST['geneinfo']) {
      case "View All Genes":
        $thename = "GeneList";
        break;
      case "View Gallus":
        $thename = "GallusAll";
        break;
      case "View Alligator":
        $thename = "AlligatorAll";
        break;
      case "View Mouse":
        $thename = "MouseAll";
        break;
    }
    if (!empty($liblist)){
	$genelist = $thename."_".$explodedate.".txt";
	$output1 = "$base_path/OUTPUT/$genelist";
	$pquery = "perl $base_path/SQLscripts/outputgenequery.pl -1 ".$liblist." -2 ".$output1."";
      shell_exec($pquery);
      $filesize = explode("/", exec("du -k $output1")); //$filesizes = explode("/", $filesize);
      if ($filesize[0] > 1000 ){ //zip files larger than 1Mb
        shell_exec("gzip $output1");
        header('Location:results.php?file='.$output1.'.gz&name='.$thename.'.txt.gz');
      }
      else {
        header('Location:results.php?file='.$output1.'&name='.$thename.'.txt');
      }
    }
  }
?>

<?php
  $db_conn->close();
?>
  </div> <!--in header-->		
</body>
</html>
