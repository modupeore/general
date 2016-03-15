<?php
  session_start();
  require_once('atlas_header.php'); //Display heads
  require_once('atlas_fns.php'); //All the routines
  d_var_header(); //Display header
  $phpscript = "variants.php";
?>
<?php
  /* Connect to the database */
  $database = "transcriptatlas";
  $db_conn = db_connect('localhost', $database);

?>
<?php
  /* Initializing all variables */
  if (!empty($_POST['species'])) {
    $_POST['species'] = $_POST['species'];
  }
  if ((!empty($_POST['vcgreveal'])) && ((!empty($_POST['gchromposend'])) &&
      (!empty($_POST['gchrompos'])) && (!empty($_POST['gchromposbegin'])))) { /* Gallus */
    $_POST['chromposend'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gchromposend']));
    $_POST['chrompos'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gchrompos']));
    $_POST['chromposbegin'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gchromposbegin']));
    $_POST['gselect'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gselect']));
  }
  if ((!empty($_POST['vcmreveal'])) && ((!empty($_POST['mchromposend'])) &&
      (!empty($_POST['mchrompos'])) && (!empty($_POST['mchromposbegin'])))) { /* Mouse */
    $_POST['chromposend'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['mchromposend']));
    $_POST['chrompos'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['mchrompos']));
    $_POST['chromposbegin'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['mchromposbegin']));
    $_POST['gselect'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gselect']));
  }
  if ((!empty($_POST['vcareveal'])) && ((!empty($_POST['achromposend'])) &&
      (!empty($_POST['achrompos'])) && (!empty($_POST['achromposbegin'])))) { /* Alligator */
    $_POST['chromposend'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['achromposend']));
    $_POST['chrompos'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['achrompos']));
    $_POST['chromposbegin'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['achromposbegin']));
  }
  if (!empty($_POST['vgreveal']) && !empty($_POST['gselect'])) { /* GeneName */
    $_POST['gselect'] = mysqli_real_escape_string($db_conn, htmlentities($_POST['gselect']));
  }
?>
<?php
  echo '<div class="question">';
  echo '<form id="query" class="top-border" action="'.$phpscript.'" method="post">';
?>
    <p class="pages"><span> Specify species of interest </span>
      <select name="species" id="species" required>
        <option value="" selected disabled >Select A Species</option>
        <option value="gallus" <?php if ($_POST['species']=='gallus') echo 'selected="selected"'; ?> >gallus</option>
        <option value="mus_musculus" <?php if ($_POST['species']=='mus_musculus') echo 'selected="selected"'; ?> >mus_musculus</option>
        <option value="alligator_mississippiensis" <?php if ($_POST['species']=='alligator_mississippiensis') echo 'selected="selected"'; ?> >alligator_mississippiensis</option>
      </select>
    </p>
    <p class="pages"><span> View Variants based on </span>
      <select name="search" id="search" required>
        <option value="" selected disabled >Select A Search Criteria</option>
        <option value="Chromosomal_Location" <?php if ($_POST['search']=='Chromosomal_Location') echo 'selected="selected"'; ?> >Chromosomal Location</option>
        <option value="Gene_Name" <?php if ($_POST['search']=='Gene_Name') echo 'selected="selected"'; ?> >Gene Name</option>
      </select>
    </p>
    <div class=indent>
      <div id="Chromosomal_Location">
        <div id="gallus">
          <p class="pages"><span>Specify the following : </span> </p> 
          <p class="pages"><span>Chromosome: </span>
            <select name="gchrompos" id="gchrompos">
            <option value="" selected disabled >Select A Chromosome</option>
            <option value="chr1"<?php if ($_POST['gchrompos']=='chr1') echo 'selected="selected"'; ?> >chr1</option>
            <option value="chr2"<?php if ($_POST['gchrompos']=='chr2') echo 'selected="selected"'; ?> >chr2</option>
            <option value="chr3"<?php if ($_POST['gchrompos']=='chr3') echo 'selected="selected"'; ?> >chr3</option>
            <option value="chr4"<?php if ($_POST['gchrompos']=='chr4') echo 'selected="selected"'; ?> >chr4</option>
            <option value="chr5"<?php if ($_POST['gchrompos']=='chr5') echo 'selected="selected"'; ?> >chr5</option>
            <option value="chr6"<?php if ($_POST['gchrompos']=='chr6') echo 'selected="selected"'; ?> >chr6</option>
            <option value="chr7"<?php if ($_POST['gchrompos']=='chr7') echo 'selected="selected"'; ?> >chr7</option>
            <option value="chr8"<?php if ($_POST['gchrompos']=='chr8') echo 'selected="selected"'; ?> >chr8</option>
            <option value="chr9"<?php if ($_POST['gchrompos']=='chr9') echo 'selected="selected"'; ?> >chr9</option>
            <option value="chr10"<?php if ($_POST['gchrompos']=='chr10') echo 'selected="selected"'; ?> >chr10</option>
            <option value="chr11"<?php if ($_POST['gchrompos']=='chr11') echo 'selected="selected"'; ?> >chr11</option>
            <option value="chr12"<?php if ($_POST['gchrompos']=='chr12') echo 'selected="selected"'; ?> >chr12</option>
            <option value="chr13"<?php if ($_POST['gchrompos']=='chr13') echo 'selected="selected"'; ?> >chr13</option>
            <option value="chr14"<?php if ($_POST['gchrompos']=='chr14') echo 'selected="selected"'; ?> >chr14</option>
            <option value="chr15"<?php if ($_POST['gchrompos']=='chr15') echo 'selected="selected"'; ?> >chr15</option>
            <option value="chr16"<?php if ($_POST['gchrompos']=='chr16') echo 'selected="selected"'; ?> >chr16</option>
            <option value="chr17"<?php if ($_POST['gchrompos']=='chr17') echo 'selected="selected"'; ?> >chr17</option>
            <option value="chr18"<?php if ($_POST['gchrompos']=='chr18') echo 'selected="selected"'; ?> >chr18</option>
            <option value="chr19"<?php if ($_POST['gchrompos']=='chr19') echo 'selected="selected"'; ?> >chr19</option>
            <option value="chr20"<?php if ($_POST['gchrompos']=='chr20') echo 'selected="selected"'; ?> >chr20</option>
            <option value="chr21"<?php if ($_POST['gchrompos']=='chr21') echo 'selected="selected"'; ?> >chr21</option>
            <option value="chr22"<?php if ($_POST['gchrompos']=='chr22') echo 'selected="selected"'; ?> >chr22</option>
            <option value="chr23"<?php if ($_POST['gchrompos']=='chr23') echo 'selected="selected"'; ?> >chr23</option>
            <option value="chr24"<?php if ($_POST['gchrompos']=='chr24') echo 'selected="selected"'; ?> >chr24</option>
            <option value="chr25"<?php if ($_POST['gchrompos']=='chr25') echo 'selected="selected"'; ?> >chr25</option>
            <option value="chr26"<?php if ($_POST['gchrompos']=='chr26') echo 'selected="selected"'; ?> >chr26</option>
            <option value="chr27"<?php if ($_POST['gchrompos']=='chr27') echo 'selected="selected"'; ?> >chr27</option>
            <option value="chr28"<?php if ($_POST['gchrompos']=='chr28') echo 'selected="selected"'; ?> >chr28</option>
            <option value="chrLGE22C19W28_E50C23"<?php if ($_POST['gchrompos']=='chrLGE22C19W28_E50C23') echo 'selected="selected"'; ?> >chrLGE22C19W28_E50C23</option>
            <option value="chrLGE64"<?php if ($_POST['gchrompos']=='chrLGE64') echo 'selected="selected"'; ?> >chrLGE64</option>
            <option value="chrMT"<?php if ($_POST['gchrompos']=='chrMT') echo 'selected="selected"'; ?> >chrMT</option>
            <option value="chrW"<?php if ($_POST['gchrompos']=='chrW') echo 'selected="selected"'; ?> >chrW</option>
            <option value="chrZ"<?php if ($_POST['gchrompos']=='chrZ') echo 'selected="selected"'; ?> >chrZ</option>
            </select>
          <span>Starting position: </span>
            <?php
              if (!empty($_POST['gchromposbegin'])) {
                echo '<input class = "vartext" type="text" name="gchromposbegin" value="' . $_POST["gchromposbegin"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="gchromposbegin" placeholder="Enter starting position" />';
              }
            ?>
          <span>Ending position: </span>
            <?php
              if (!empty($_POST['gchromposend'])) {
                echo '<input class = "vartext" type="text" name="gchromposend" value="' . $_POST["gchromposend"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="gchromposend" placeholder="Enter ending position" />';
              }
            ?>
          </p>
          <br>
          <center><input type="submit" name="vcgreveal" value="View Results" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a'; this.form.submit();"></center>
        </div> <!--div gallus -->  
        <div id="mus_musculus">
          <p class="pages"><span>Specify the following : </span> </p> 
          <p class="pages"><span>Chromosome: </span>
            <select name="mchrompos" id="mchrompos">
            <option value="" selected disabled >Select A Chromosome</option>
            <option value="NC_000067.6"<?php if ($_POST['mchrompos']=='NC_000067.6') echo 'selected="selected"'; ?> >NC_000067.6</option>
            <option value="NC_000068.7"<?php if ($_POST['mchrompos']=='NC_000068.7') echo 'selected="selected"'; ?> >NC_000068.7</option>
            <option value="NC_000069.6"<?php if ($_POST['mchrompos']=='NC_000069.6') echo 'selected="selected"'; ?> >NC_000069.6</option>
            <option value="NC_000070.6"<?php if ($_POST['mchrompos']=='NC_000070.6') echo 'selected="selected"'; ?> >NC_000070.6</option>
            <option value="NC_000071.6"<?php if ($_POST['mchrompos']=='NC_000071.6') echo 'selected="selected"'; ?> >NC_000071.6</option>
            <option value="NC_000072.6"<?php if ($_POST['mchrompos']=='NC_000072.6') echo 'selected="selected"'; ?> >NC_000072.6</option>
            <option value="NC_000073.6"<?php if ($_POST['mchrompos']=='NC_000073.6') echo 'selected="selected"'; ?> >NC_000073.6</option>
            <option value="NC_000074.6"<?php if ($_POST['mchrompos']=='NC_000074.6') echo 'selected="selected"'; ?> >NC_000074.6</option>
            <option value="NC_000075.6"<?php if ($_POST['mchrompos']=='NC_000075.6') echo 'selected="selected"'; ?> >NC_000075.6</option>
            <option value="NC_000076.6"<?php if ($_POST['mchrompos']=='NC_000076.6') echo 'selected="selected"'; ?> >NC_000076.6</option>
            <option value="NC_000077.6"<?php if ($_POST['mchrompos']=='NC_000077.6') echo 'selected="selected"'; ?> >NC_000077.6</option>
            <option value="NC_000078.6"<?php if ($_POST['mchrompos']=='NC_000078.6') echo 'selected="selected"'; ?> >NC_000078.6</option>
            <option value="NC_000079.6"<?php if ($_POST['mchrompos']=='NC_000079.6') echo 'selected="selected"'; ?> >NC_000079.6</option>
            <option value="NC_000080.6"<?php if ($_POST['mchrompos']=='NC_000080.6') echo 'selected="selected"'; ?> >NC_000080.6</option>
            <option value="NC_000081.6"<?php if ($_POST['mchrompos']=='NC_000081.6') echo 'selected="selected"'; ?> >NC_000081.6</option>
            <option value="NC_000082.6"<?php if ($_POST['mchrompos']=='NC_000082.6') echo 'selected="selected"'; ?> >NC_000082.6</option>
            <option value="NC_000083.6"<?php if ($_POST['mchrompos']=='NC_000083.6') echo 'selected="selected"'; ?> >NC_000083.6</option>
            <option value="NC_000084.6"<?php if ($_POST['mchrompos']=='NC_000084.6') echo 'selected="selected"'; ?> >NC_000084.6</option>
            <option value="NC_000085.6"<?php if ($_POST['mchrompos']=='NC_000085.6') echo 'selected="selected"'; ?> >NC_000085.6</option>
            <option value="NC_000086.7"<?php if ($_POST['mchrompos']=='NC_000086.7') echo 'selected="selected"'; ?> >NC_000086.7</option>
            <option value="NC_000087.7"<?php if ($_POST['mchrompos']=='NC_000087.7') echo 'selected="selected"'; ?> >NC_000087.7</option>
            <option value="NC_005089.1"<?php if ($_POST['mchrompos']=='NC_005089.1') echo 'selected="selected"'; ?> >NC_005089.1</option>
          </select>
          <span>Starting position: </span>
            <?php
              if (!empty($_POST['mchromposbegin'])) {
                echo '<input class = "vartext" type="text" name="mchromposbegin" value="' . $_POST["mchromposbegin"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="mchromposbegin" placeholder="Enter starting position" />';
              }
            ?>
          <span>Ending position: </span>
            <?php
              if (!empty($_POST['mchromposend'])) {
                echo '<input class = "vartext" type="text" name="mchromposend" value="' . $_POST["mchromposend"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="mchromposend" placeholder="Enter ending position" />';
              }
            ?>
          </p>
          <br>
          <center><input type="submit" name="vcmreveal" value="View Results" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a'; this.form.submit();"></center>
        </div> <!--div mouse --> 
        <div id="alligator_mississippiensis">
          <p class="pages"><span>Specify the following : </span> </p> 
          <p class="pages"><span>Chromosome: </span>
            <?php
              if (!empty($_POST['achrompos'])) {
                echo '<input class = "vartext" type="text" name="achrompos" value="' . $_POST["achrompos"] . '"/>';
              } else {
                echo '<input type="text" name="achrompos" placeholder="Chromosome number (like: scaffold-1)" />';
              }
            ?>
          <span>Starting position: </span>
            <?php
              if (!empty($_POST['achromposbegin'])) {
                echo '<input class = "vartext" type="text" name="achromposbegin" value="' . $_POST["achromposbegin"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="achromposbegin" placeholder="Enter starting position" />';
              }
            ?>
          <span>Ending position: </span>
            <?php
              if (!empty($_POST['achromposend'])) {
                echo '<input class = "vartext" type="text" name="achromposend" value="' . $_POST["achromposend"] . '"/>';
              } else {
                echo '<input class = "vartext" type="text" name="achromposend" placeholder="Enter ending position" />';
              }
            ?>
          </p>
          <br>
          <center><input type="submit" name="vcareveal" value="View Results" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a'; this.form.submit();"></center>
        </div> <!--div alligator -->
      </div> <!--div chromosome --> 
      <div id="Gene_Name">
        <p class="pages"><span>Specify your gene name: </span>
        <?php
          if (!empty($_POST['gselect'])) {
            echo '<input type="text" name="gselect" id="genename" value="' . $_POST["gselect"] . '"/>';
          } else {
            echo '<input type="text" name="gselect" id="genename" placeholder="Enter Gene Name" />';
          }
        ?>
        </p><br>
        <center><input type="submit" name="vgreveal" value="View Results" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a'; this.form.submit();"></center>
      </div> <!--div gene name -->
    </div> <!-- div indent -->
</form>
</div>
<hr>
<?php
  if ( (isset($_POST['vcgreveal']) || isset($_POST['vcareveal']) || isset($_POST['vcmreveal']))
      && (!empty($_POST['chromposend'])) && (!empty($_POST['chrompos'])) && (!empty($_POST['chromposbegin'])) ) {
    $Vlist = "Voutput_".$explodedate.".par"; $output1 = "$base_path/OUTPUT/$Vlist";
    $pquery = 'perl '.$base_path.'/SQLscripts/fboutputvariantinfo.pl -c '.$_POST['chrompos'].' -b '.$_POST['chromposbegin'].' -e '.$_POST['chromposend'].' -s '.$_POST['species'].' -o '.$output1.'';
    shell_exec($pquery); $rquery = file_get_contents($output1);
    if (count(explode ("\n", $rquery)) <= 13){
      echo '<center>No results were found with your search criteria.<center>';
    } else {
      echo '<div class="gened"><p class="gened">Below are the variants found.</p>';
      echo $rquery;
    }
    echo '</div>';
 //   shell_exec ("rm -f ".$output1); 
  }
  elseif (isset($_POST['vgreveal']) && !empty($_POST['gselect'])) {
    $Vlist = "Voutput_".$explodedate.".par"; $output1 = "$base_path/OUTPUT/$Vlist";
    $pquery = 'perl '.$base_path.'/SQLscripts/fboutputvariantinfo.pl -g '.$_POST['gselect'].' -s '.$_POST['species'].' -o '.$output1.'';
    shell_exec($pquery);
    $rquery = file_get_contents($output1);
    if (count(explode ("\n", $rquery)) <= 13){
      echo '<center>No results were found with your search criteria.<center>';
    } else {
      echo '<div class="gened"><p class="gened">Below are the variants found.</p>';
      echo $rquery;
    }
    echo '</div>';
 //   shell_exec ("rm -f ".$output1);
  }
?>
  </div>
<?php
  $db_conn->close();
?>
  </div> <!--in header-->
  
</body>
</html>


