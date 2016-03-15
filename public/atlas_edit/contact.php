<?php
  require_once('atlas_header.php'); //Display heads
  require_once('atlas_fns.php'); //All the routines
  echo "<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
  echo "<title>Contact</title>";
  echo '<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>';
  echo "<style type= 'text/css'></style>";
  echo '<table class="titlebutton"><tr><td>Contact  <img src="images/contact.png" width="45" height="45">
  </td></tr></table>
  <div class="explain"><p>If you have questions or comments about
  our application that we provide, we would be pleased to hear from you!</p></div>';
?>
<?php
  echo '<div class="contact">';
  echo '<form id="querys" class="top-border" action="send_form.php" method="post">';
?>
    <table width="100%">
      <tr>
        <td align="right" valign="top" width="160">
          <label for="yourname"> Your Name : </label>
        </td>
        <td>
          <input type="text" class="contact" name="yourname" required/>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">
          <label for="email"> Your Email : </label>
        </td>
        <td>
          <input type="text" class="contact" name="email" required/>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">
          <label for="comments"> Feedback / Question : </label>
        </td>
        <td>
          <textarea  name="comments" maxlength="1000" cols="50" rows="4"></textarea>
        </td>
      </tr>
      <td colspan=100%>
        <center>
          <input type="submit" class="contact" value="Send Feedback/Questions">
        </center>
      </td>
    </table>   
</form>
</div>
<br><br>
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