<?php
  session_start();
  require_once('atlas_fns.php'); //All the routines
?>

<!DOCTYPE html>
  <head>
    <link rel="STYLESHEET" type="text/css" href="stylefile.css">
    <link rel="icon" type="image/ico" href="images/atlas_ico.png"/>
  <div class="allofit">
    <table width=100%>
      <tr>
        <td width=30px></td>
        <td width=100px align="center">
          <a href="menu.php"><img src="images/atlas_main.png" alt="Transcriptome Atlas" ></a>
        </td>
        <td valign="center" align="right">
          <input type="button" class="goback" value="Return To Menu" onclick="window.location.href='menu.php'"><br>
          <input type="button" class="goback" value="Log Out" onclick="window.location.href='logout.php'">
        </td>
        <td width=50px></td>
      </tr>
    </table>
      </head>
    <body>
      <div class="container">
<?php
  d_ogeneexp_header(); //Display header
  $phpscript = "origeneexp.php";
?>
<?php
  /* Connect to the database */
  $database = "transcriptatlas";
  $db_conn = db_connect('localhost', $database);
?>
<?php
  
  if (!empty($_REQUEST['salute']) && (!empty($_POST['tissue'])) &&
      (!empty($_POST['species'])) && (!empty($_POST['search']))) {
    $_POST['tissue'] = $_POST['tissue'];
    $_POST['species'] = $_POST['species'];
    $_POST['gselect'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['search']));
  }
?>
<?php
  echo '<div class="question">';
  echo '<form id="querys" class="top-border" action="'.$phpscript.'" method="post">';
?>
    <p class="pages"><span>Specify your gene name: </span>
<?php
//  if (!empty($_POST['gselect'])) {
  //  echo '<input type="text" id="geneviews" name="search" value="' . $_POST["gselect"] . '"/></p>';
 // } else {
    echo '<input type="text" id="geneviews" name="search" placeholder="Enter Gene Name" /></p>';
 // }
?>                
    <p class="pages"><span>Species: </span>
    <select name="species" id="species" required>
      <option value="" selected disabled >Select A Species</option>
      <option value="gallus" <?php if ($_POST['species']=='gallus') echo 'selected="selected"'; ?> >gallus</option>
	<option value="mus_musculus" <?php if ($_POST['species']=='mus_musculus') echo 'selected="selected"'; ?> >mus_musculus</option>
	<option value="alligator_mississippiensis" <?php if ($_POST['species']=='alligator_mississippiensis') echo 'selected="selected"'; ?> >alligator_mississippiensis</option>
    </select>
    </p>
    <div id="gallus">
      <p class="pages"><span>Tissue of interest: </span>
      <select name="tissue" id="tissue">
        <option value="" selected disabled >Select A Tissue</option>
        <option value="liver">liver</option>
        <option value="embryonic_brain">embryonic brain</option>
        <option value="spleen">spleen</option>
        <option value="thymus">thymus</option>
        <option value="bursa">bursa</option>
        <option value="kidney">kidney</option>
        <option value="ileum">ileum</option>
        <option value="jejunum">jejunum</option>
        <option value="duodenum">duodenum</option>
        <option value="ovary">ovary</option>
        <option value="heart">heart</option>
        <option value="lung">lung</option>
        <option value="breast muscle">breast muscle</option>
        <option value="LMH">LMH</option>
        <option value="brain">brain</option>
        <option value="WLH">WLH</option>
        <option value="pineal">pineal</option>
        <option value="retina">retina</option>
        <option value="Hypothalamus">Hypothalamus</option>
        <option value="Pituitary">Pituitary</option>
        <option value="Primordial Germ Cell">Primordial Germ Cell</option>
        <option value="Abdominal Adipose">Abdominal Adipose</option>
        <option value="Cardiac Adipose">Cardiac Adipose</option>
      </select></p>
    </div>
    <div id="mus_musculus">
      <p class="pages"><span>Tissue of interest: </span>
      <select name="tissue" id="tissue">
        <option value="" selected disabled >Select A Tissue</option>
        <option value="lung">lung</option>
      </select></p>
    </div>
    <div id="alligator_mississippiensis">
      <p class="pages"><span>Tissue of interest: </span>
        <select name="tissue" id="tissue">
        <option value="" selected disabled >Select A Tissue</option>
        <option value="Adipose">Adipose</option>
        <option value="Belly_skin">Belly skin</option>
        <option value="Blood">Blood</option>
        <option value="cerebrum">cerebrum</option>
        <option value="chin_gland">chin_gland</option>
        <option value="eye">eye</option>
        <option value="heart">heart</option>
        <option value="kidney">kidney</option>
        <option value="liver">liver</option>
        <option value="midbrain">midbrain</option>
        <option value="olfactory_bulb">olfactory_bulb</option>
        <option value="ovary">ovary</option>
        <option value="spinal_cord">spinal_cord</option>
        <option value="spleen">spleen</option>
        <option value="stomach">stomach</option>
        <option value="testes">testes</option>
        <option value="thalmus">thalmus</option>
        <option value="throat_scent_gland">throat_scent_gland</option>
        <option value="tongue">tongue</option>
        <option value="tooth">tooth</option>
        <option value="white_matter">white_matter</option>
      </select></p>
    </div>
<center><input type="submit" name="salute" value="View Results" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a';this.form.submit();">
</center></form>
</div>
<hr>
<?php
  if (!empty($_POST['salute']) && (!empty($_POST['tissue'])) &&
      (!empty($_POST['species'])) && (!empty($_POST['search']))) {
    $pquery = "perl ".$base_path."/SQLscripts/outputgeneslist.pl -1 ".$_POST['gselect']." -2 ".$_POST['tissue']." -3 ".$_POST['species']."";
    $rquery = shell_exec($pquery);
    if (count(explode ("\n", $rquery)) <= 9){
      echo '<center>No results were found with your search criteria.<br>
      There is no expression values for the genes matching "'. $_POST["gselect"].'" in the "'.$_POST['tissue'].' tissue".<center>';
    } else {
      echo '<div class="gened"><p class="gened">Below are the FPKM values of the genes matching "<b>'. $_POST['gselect'] .'</b>"
        found in the "<b>'.$_POST['tissue'].'</b>" tissue of the "<b>'.$_POST['species'].'</b>" specie.</p>';
      echo $rquery;
    }
      echo '</div>';
  }
?>
  </div>
<?php
  $db_conn->close();
?>
  </div> <!--in header-->		
</body>
</html>
