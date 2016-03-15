<?php
//Very important!!!
require_once('atlas_fns.php');
$base_path = "/home/modupeore17/public/atlas";
$date = shell_exec("date +%Y-%m-%d-%T");
$explodedate = substr($date,0,-1);
?>

<?php
function d_metadata_header() {
  echo "<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
  echo "<title>Metadata</title>";
  echo '<script type="text/javascript" src="/code.jquery.com/jquery-1.8.3.js"></script>';
  echo "<style type= 'text/css'></style>";
  ?>
  <script type="text/javascript">
    function selectAll(source) {
      checkboxes = document.getElementsByName('meta_data[]');
      for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
    }
  </script></style>
  <?PHP
  atlas_authenticate();
  echo '<table class="titlebutton"><tr><td>Meta-Data Information  <img src="images/metadata.gif" width="45" height="45">
  </td></tr></table>
  <div class="explain"><p>View and download metadata information.</p></div>';
}
?>
<?php
function d_genes_header() {
  echo "<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
  echo "<title>Gene List</title>";
  echo '<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>';
  echo "<style type= 'text/css'></style>";
  ?>
  <script type="text/javascript">
    function doit() {
      alert("Click OK to submit and wait for file to download");	
      document.geneall.submit();
    }
  </script>
  <?PHP
  atlas_authenticate();
  echo '<table class="titlebutton"><tr><td>Gene Lists  <img src="images/libraries.png" width="45" height="45">
  </td></tr></table>
  <div class="explain"><p>Provide a list of library IDs to compare the FPKM values
        of all the genes.<br>This provides a
        tab-delimited <em>".txt"</em> file to easily compare the genes FPKM values
        across different samples.</p></div>';
}
?>
<?php
function d_geneexp_header() {
  echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
  echo "<title>Gene Expression</title>";
  echo '<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>';
  echo '<link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />';
  echo '<script src="jquery-1.11.3.min.js"></script>';
  echo '<script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>';
  ?>
  <script type="text/javascript">
    $(function() {
      var availableTags = <?php include('autocomplete.php'); ?>;
      $("#geneviews").autocomplete({
        source: availableTags,
        autoFocus:true
      });
    });
    $(function () {
        toggleFields(); 
        $("#species").change(function () {
          toggleFields();
        });
      });
      function toggleFields() {
        if ($("#species").val() === "gallus")
          $("#gallus").show();
        else
          $("#gallus").hide();
        if($("#species").val() === "mus_musculus")
          $("#mus_musculus").show();
        else
          $("#mus_musculus").hide();
        if($("#species").val() === "alligator_mississippiensis")
          $("#alligator_mississippiensis").show();
        else
          $("#alligator_mississippiensis").hide();  
      }
    
  </script>
  <?PHP
  atlas_authenticate();
  echo '<table class="titlebutton"><tr><td>Gene Expression Values  <img src="images/genes.png" width="45" height="45">
  </td></tr></table>
  <div class="explain"><p>View the expression (FPKM) values of the genes of interest<br>
      Provide a gene name and the species and the tissue.</p></div>';
}
?>
<?php
function d_var_header() {
  echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
  echo "<title>Variant analysis</title>";
  echo '<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>';
echo "<style type= 'text/css'>";
  echo '</style>';
  ?>
  <script type='text/javascript'>
    $(window).load(function(){
      $(document).ready(function () {
        toggleFields(); 
        $("#search").change(function () {
          toggleFields();
        });
      });
      function toggleFields() {
        if ($("#search").val() === "Chromosomal_Location")
          $("#Chromosomal_Location").show();
        else
          $("#Chromosomal_Location").hide();
        if($("#search").val() === "Gene_Name")
          $("#Gene_Name").show();
        else
          $("#Gene_Name").hide();  
      }
    });
    $(window).load(function(){
      $(document).ready(function () {
        toggleFields(); 
        $("#species").change(function () {
          toggleFields();
        });
      });
      function toggleFields() {
        if ($("#species").val() === "gallus")
          $("#gallus").show();
        else
          $("#gallus").hide();
        if($("#species").val() === "mus_musculus")
          $("#mus_musculus").show();
        else
          $("#mus_musculus").hide();
        if($("#species").val() === "alligator_mississippiensis")
          $("#alligator_mississippiensis").show();
        else
          $("#alligator_mississippiensis").hide();  
      }
    });
  </script>
  <?PHP
  atlas_authenticate();
  echo '<table class="titlebutton"><tr><td>Variants Information  <img src="images/variant.png" width="45" height="45">
  </td></tr></table>
  <div class="explain"><p>View variants based on chromosomal location or specific gene of interest.<br>
        The results provdes the list of variants and gene-annotation information.</p></div>';
}
?>
<?php
function db_connect($host, $db='information_schema') {
  if ($db) {
    $db_conn = new mysqli($host, 'frnakenstein', 'maryshelley', $db);
  } else {
    $db_conn = new mysqli($host, 'frnakenstein', 'maryshelley');
  }

  if (mysqli_connect_errno()) {
    throw new Exception("Connection to database failed: " . mysqli_connect_error());
    return false;
  }
  return $db_conn;
}
?>

<?php
function meta_display($action, $result, $primary_key) {
  $num_rows = $result->num_rows;
  echo '<br><table class="metadata"><tr>';
  echo '<th align="left" width=40pt><font size="2">Select All</font><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>';
  $meta = $result->fetch_field_direct(0); echo '<th class="metadata" id="' . $meta->name . '">' . library_id . '</th>';
  $meta = $result->fetch_field_direct(1); echo '<th class="metadata" id="' . $meta->name . '">' . bird_id . '</th>';
  $meta = $result->fetch_field_direct(2); echo '<th class="metadata" id="' . $meta->name . '">' . species . '</th>';
  $meta = $result->fetch_field_direct(3); echo '<th class="metadata" id="' . $meta->name . '">' . line . '</th>';
  $meta = $result->fetch_field_direct(4); echo '<th class="metadata" id="' . $meta->name . '">' . tissue . '</th>';
  $meta = $result->fetch_field_direct(5); echo '<th class="metadata" id="' . $meta->name . '">' . method . '</th>';
  $meta = $result->fetch_field_direct(6); echo '<th class="metadata" id="' . $meta->name . '">' . index . '</th>';
  $meta = $result->fetch_field_direct(7); echo '<th class="metadata" id="' . $meta->name . '">' . chip_result . '</th>';
  $meta = $result->fetch_field_direct(8); echo '<th class="metadata" width="80pt" id="' . $meta->name . '">' . scientist . '</th>';
  $meta = $result->fetch_field_direct(9); echo '<th class="metadata" id="' . $meta->name . '">' . date . '</th>';
  $meta = $result->fetch_field_direct(10); echo '<th class="metadata" width=20% id="' . $meta->name . '">' . notes . '</th></tr>';

  for ($i = 0; $i < $num_rows; $i++) {
    if ($i % 2 == 0) {
      echo "<tr class=\"odd\">";
    } else {
      echo "<tr class=\"even\">";
    }
    $row = $result->fetch_assoc();
    echo '<td><input type="checkbox" name="meta_data[]" value="'.$row[$primary_key].'"></td>';
    $j = 0;
    while ($j < $result->field_count) {
      $meta = $result->fetch_field_direct($j);
      echo '<td headers="' . $meta->name . '" class="metadata"><center>' . $row[$meta->name] . '</center></td>';
      $j++;
    }
    echo "</tr>";
  }
  echo "</table></form>";
}
?>
<?php
function atlas_authenticate() {
  if($_SESSION['user_is_logged_in'] == false){
    header('Location: https://geco.iplantcollaborative.org/modupeore17/atlas/index.php');
  }
}
?>

<?php
/*function atlas_authenticate() {
$ini = parse_ini_file("../config.ini.php", true);
$admin = $ini['login']['admin'];
$def_path = $ini['login']['default'];
session_start();

if ( (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) || 
   (isset($_SESSION['SESSION_TIMEOUT']) && (time() - $_SESSION['SESSION_TIMEOUT'] > 5400)) ) {
    session_unset();     // unset $_SESSION variable for the run-time      
    session_destroy();   // destroy session data in storage                 
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if(empty($_SESSION['user_name']) && !($_SESSION['user_is_logged_in']))
{
  header('Location: '.$def_path);
}
}*/
?>
