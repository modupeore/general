<?php
require_once("atlas_header.php");
?>
<form name="contactform" method="post" action="send_form.php">
  <table width="800px">
    <tr>
      <td valign="top">
        <label for="first_name">First Name *</label>
      </td>
      <td valign="top">
        <input type="text" name="first_name">
      </td>
    </tr>
    <tr>
      <td valign="top"">
        <label for="last_name">Last Name *</label>
      </td>
      <td valign="top">
        <input  type="text" name="last_name">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="email">Email Address *</label>
      </td>
      <td valign="top">
        <input  type="text" name="email">
      </td>
    </tr>
    <tr> 
      <td valign="top">
        <label for="comments">Comments *</label>
      </td>
      <td valign="top">
        <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
      </td>
    </tr>
    <tr> 
      <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
      </td>
    </tr> 
  </table> 
</form>

</div> <!-- in header -->
</body>
</html>
