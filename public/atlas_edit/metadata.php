<?php
  session_start();
  require_once('atlas_header.php'); //The header
  require_once('atlas_fns.php'); //All the routines
  d_metadata_header(); //Display header
  $phpscript = "metadata.php";
?>
<?php
  /* Connect to the database */
  $database = "transcriptatlas";
  $table = "bird_libraries";
  $db_conn = db_connect('localhost', $database);
?>
<?php
  $query = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
  $result = $db_conn->query($query);
  // create array of primary keys
  $primary_key = null;
  while ($row = $result->fetch_assoc()) {
    $primary_key = $row['Column_name'];
  }
  if (!$primary_key) {
    echo "<div><strong>NO PRIMARY KEY!\nFUNCTIONS WILL NOT WORK AS EXPECTED!</strong></div>";
  }
?>
<?php
  //create query for DB display
  if (!empty($_REQUEST['order'])) {
    // if the sort option was used
    $_SESSION['sort'] = $_POST['sort'];
    $_SESSION['dir'] = $_POST['dir'];
    $_SESSION['num_recs'] = $_POST['num_recs'];

    $terms = explode(",", $_POST['search']);
    $is_term = false;
    foreach ($terms as $term) {
      if (trim($term) != "") {
        $is_term = true;
      }
    }
    $_SESSION['select'] = $terms;
    $_SESSION['column'] = $_POST['column'];

    $query = ("SELECT * FROM $table ");
    if ($is_term) {
      $query .= "WHERE ";
    }
    foreach ($_SESSION['select'] as $term) {
      if (trim($term) == "") {
        continue;
      }
      $query .= $_SESSION['column'] . " LIKE '%" . trim($term) . "%' OR ";
    }
    $query = rtrim($query, " OR ");
    $query .= " ORDER BY " . $_SESSION['sort'] . " " . $_SESSION['dir'];

    $result = $db_conn->query($query);
    $num_total_result = $result->num_rows;
    if ($_SESSION['num_recs'] != "all") {
      $query .= " limit " . $_SESSION['num_recs'];
    }
    unset($_SESSION['txt_query']);
  } elseif (!empty($_SESSION['sort'])) {
    $is_term = false;
    foreach ($_SESSION['select'] as $term) {
      if (trim($term) != "") {
        $is_term = true;
      }
    }
    $query = ("SELECT * FROM $table ");
    if ($is_term) {
      $query .= "WHERE ";
    }
    foreach ($_SESSION['select'] as $term) {
      if (trim($term) == "") {
        continue;
      }
      $query .= $_SESSION['column'] . " LIKE '%" . trim($term) . "%' OR ";
    }
    $query = rtrim($query, " OR ");
    $query .= " ORDER BY " . $_SESSION['sort'] . " " . $_SESSION['dir'];
    $result = $db_conn->query($query);
    $num_total_result = $result->num_rows;

    if ($_SESSION['num_recs'] != "all") {
      $query .= " limit " . $_SESSION['num_recs'];
    }
  }
  $result = $db_conn->query($query);
  if ($db_conn->errno) {
    echo "<div id=\"index-error\"";
    echo "<span><strong>Error with query.</strong></span>";
    echo "<span><strong>Error number: </strong>$db_conn->errno</span>";
    echo "<span><strong>Error string: </strong>$db_conn->error</span>";
    echo "</div>";
  }
  $num_results = $result->num_rows;
  if (empty($_SESSION['sort'])) {
    $num_total_result = $num_results;
  }
?>
<?php
  echo '<form id="sort" class="top-border" action="'.$phpscript.'" method="post">';
?>
    <div class="question">
    <p class="pages"><span>Search for: </span>
    <input type="text" name="search" size="35" placeholder="Enter variable(s) separated by commas (,)"
	<?php
		if(!empty($db_conn))
		{
			echo 'value="' . implode(",", $_SESSION[$table]["select"]) .'"'; 
		} 
	?>
    />
    <span> in </span>
    <select name="column">
      <option value="library_id">library_id</option>
      <?php
        if (empty($_SESSION['column'])) {
          $_SESSION['library_id'] = "library_id";
        }
        if ($_SESSION['column'] == "bird_id") {
          echo '<option selected value="bird_id">bird_id</option>';
        } else {
          echo '<option value="bird_id">bird_id</option>';
        }
        if ($_SESSION['column'] == "species") {
          echo '<option selected value="species">species</option>';
        } else {
          echo '<option value="species">species</option>';
        }
        if ($_SESSION['column'] == "line") {
          echo '<option selected value="line">line</option>';
        } else {
          echo '<option value="line">line</option>';
        }
        if ($_SESSION['column'] == "tissue") {
          echo '<option selected value="tissue">tissue</option>';
        } else {
          echo '<option value="tissue">tissue</option>';
        }
        if ($_SESSION['column'] == "method") {
          echo '<option selected value="method">method</option>';
        } else {
          echo '<option value="method">method</option>';
        }
        if ($_SESSION['column'] == "chip_result") {
          echo '<option selected value="chip_result">chip_result</option>';
        } else {
          echo '<option value="chip_result">chip_result</option>';
        }
        if ($_SESSION['column'] == "scientist") {
          echo '<option selected value="scientist">scientist</option>';
        } else {
          echo '<option value="scientist">scientist</option>';
        }
        if ($_SESSION['column'] == "notes") {
          echo '<option selected value="notes">notes</option>';
        } else {
          echo '<option value="notes">notes</option>';
        }
      ?> 
    </select></p><p class="pages">
    <span>Sort by:</span>
    <select name="sort">
      <option value="library_id">library_id</option>
      <?php
        if (empty($_SESSION['sort'])) {
          $_SESSION['library_id'] = "library_id";
        }
        if ($_SESSION['sort'] == "bird_id") {
          echo '<option selected value="bird_id">bird_id</option>';
        } else {
          echo '<option value="bird_id">bird_id</option>';
        }
        if ($_SESSION['sort'] == "species") {
          echo '<option selected value="species">species</option>';
        } else {
          echo '<option value="species">species</option>';
        }
        if ($_SESSION['sort'] == "line") {
          echo '<option selected value="line">line</option>';
        } else {
          echo '<option value="line">line</option>';
        }
        if ($_SESSION['sort'] == "tissue") {
          echo '<option selected value="tissue">tissue</option>';
        } else {
          echo '<option value="tissue">tissue</option>';
        }
        if ($_SESSION['sort'] == "method") {
          echo '<option selected value="method">method</option>';
        } else {
          echo '<option value="method">method</option>';
        }
        if ($_SESSION['sort'] == "index_") {
          echo '<option selected value="index_">index</option>';
        } else {
          echo '<option value="index_">index</option>';
        }
        if ($_SESSION['sort'] == "chip_result") {
          echo '<option selected value="chip_result">chip_result</option>';
        } else {
          echo '<option value="chip_result">chip_result</option>';
        }
        if ($_SESSION['sort'] == "scientist") {
          echo '<option selected value="scientist">scientist</option>';
        } else {
          echo '<option value="scientist">scientist</option>';
        }
        if ($_SESSION['sort'] == "date") {
          echo '<option selected value="date">date</option>';
        } else {
          echo '<option value="date">date</option>';
        }
        if ($_SESSION['sort'] == "notes") {
          echo '<option selected value="notes">notes</option>';
        } else {
          echo '<option value="notes">notes</option>';
        }
      ?> 
    </select> <!--if ascending or descending-->
    <select name="dir">
      <option value="asc">ascending</option>
      <?php
        if (empty($_SESSION['dir'])) {
          $_SESSION['asc'] = "asc";
        }
        if ($_SESSION['dir'] == "desc") {
          echo '<option selected value="desc">descending</option>';
        } else {
          echo '<option value="desc">descending</option>';
        }
      ?>
      </select>
    <span>and show</span>
    <select name="num_recs">
      <option value="10">10</option>
      <?php
        if (empty($_SESSION['num_recs'])) {
          $_SESSION['num_recs'] = "10";
        }
        if ($_SESSION['num_recs'] == "20") {
          echo '<option selected value="20">20</option>';
        } else {
          echo '<option value="20">20</option>';
        }
        if ($_SESSION['num_recs'] == "50") {
          echo '<option selected value="50">50</option>';
        } else {
          echo '<option value="50">50</option>';
        }
        if ($_SESSION['num_recs'] == "all") {
          echo '<option selected value="all">all</option>';
        } else {
          echo '<option value="all">all</option>';
        }
      ?> 
    </select>
    <span>records.</span>
    <input type="submit" name="order" value="Go" onClick="this.value='Sending… Please Wait'; style.backgroundColor = '#75684a';this.form.submit();"/></p></div>
</form><hr>
<?php
  if(!empty($db_conn) && (!empty($_POST['order']) || !empty($_POST['meta_data']) || !empty($_POST['downloadvalues']))) {
    if ($num_total_result == 0){
      echo '<center>No results were found with your search criteria.<br>
      There are no "'.implode(",", $_SESSION["select"]).'" in "'.$_SESSION['column'].'".<center>';
    }else {
      echo '<div id="db-display" class="top-border">';
      echo '<form action="' . $action . '" method="post">';
      echo "<span>" . $num_results . " out of " . $num_total_result . " search results displayed. ";
      echo '<input type="submit" name="downloadvalues" value="Download Selected Values"/></span><br>';
      if(!empty($_POST['meta_data']) && isset($_POST['downloadvalues'])) {
        foreach($_POST['meta_data'] as $check) {
          $dataline .= $check.",";
        }
        $dataline = rtrim($dataline, ",");
        $listfile = "metadata_".$explodedate.".txt";
        $output1 = "$base_path/OUTPUT/$listfile";
        $pquery = "perl ".$base_path."/SQLscripts/outputmetadata.pl -1 ".$dataline." -2 ".$output1."";
        shell_exec($pquery); 
        header("Location:results.php?file=$output1&name=metadata.txt");
      }
      meta_display($phpscript, $result, $primary_key);
    }
  }
?>
  </div>
<?php
  $db_conn->close();
?>
  </div> <!--in header-->		
</body>
</html>
