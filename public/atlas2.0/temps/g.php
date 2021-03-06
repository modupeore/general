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
        <title>Autocomplete Textbox Demo | PHP | jQuery</title>
        <!-- load jquery ui css-->
        <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <!-- load jquery library -->
        <script src="jquery-1.11.3.min.js"></script>
        <!-- load jquery ui js file -->
        <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>

        <script type="text/javascript">
        $(function() {
            var availableTags = <?php include('pautho.php'); ?>;
            $("#genename").autocomplete({
                source: availableTags,
                autoFocus:true
            });
        });
        </script>
    </head>
    <body>
        <label>Department Name</label></br>
        <input name="gselect" id="genename" type="text" size="50" placeholder="enter" />
    </body>
</html>

