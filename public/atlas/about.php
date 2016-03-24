<?php
  require_once("atlas_fns.php");
  session_start();
  atlas_authenticate();
?>
  <!DOCTYPE html>
  <head>
    <link rel="STYLESHEET" type="text/css" href="stylefile.css">
    <link rel="STYLESHEET" type="text/css" href="mainPage.css">
    <link rel="icon" type="image/ico" href="images/atlas_ico.png"/>
    <title>
      TranscriptAtlas
    </title>
  </head>
  <body>
  <div class="allofit">
    <table>
      <tr>
        <td width=30px></td>
        <td align="center">
          <a href="menu.php"><img src="images/atlas_main.png" alt="Transcriptome Atlas" ></a>
        </td>
      </tr>
    </table>
    <center>
      <div class="container">
        <table width=80%>
          <tr><td colspan="2" class="menu_header"><center><b>
            TranscriptAtlas is an integrated database connecting expression data
            from fRNAkenseq, curated metadata and variants using our Variants Analysis Pipeline.</b></center>
          <div style="margin:0 auto; padding-top:2pt;" align="right"><input type="button" class="goback" value="Log Out" onclick="window.location.href='logout.php'">
          </div></td></tr>
        </table>
        <table>
          <tr>
            <td align="right">
              <?php $eee = shell_exec("perl ".$base_path."/SQLscripts/summarystats.pl "); echo $eee;?>
            </td>
          </tr>
        </table>
                <div id="popup">
          <table>
            <tr>
              <td class="menu_button" colspan=100% align="center">
                <a href="about.php" class="TAbutton"><img src="images/instruct.png" width="45" height="45"><br>About
                <span><b>About:</b>
                    <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Shows detailed instructions on how to use the web page.</li></ul>
                </span></a>
              </td>
            </tr>
            <tr>
              <td class="menu_button">
                <a href="metadata.php" target=_blank class="TAbutton"><img src="images/metadata.gif" width="45" height="45"><br>Meta-data
                <span class="right"><b>Review Meta-data:</b>
                  <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Shows all the meta-data for the experiments done and sequenced at Schmidt's lab.</li></ul>
                </span></a>
              </td>
              <td class="menu_button">
                <a href="libfpkm.php" target=_blank class="TAbutton"><img src="images/libraries.png" width="45" height="45"><br>Libraries Expression
                <span><b>Libraries Expression Analysis:</b>
                  <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Provides the list of genes and their expression values of all the libraries specified.</li></ul>
                </span></a>
              </td>
            </tr>
            <tr>
              <td class="menu_button">
                <a href="geneexp.php" target=_blank class="TAbutton"><img src="images/genes.png" width="45" height="45"><br>Genes Expression
                <span class="right"><b>Gene Expression Results:</b>
                  <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Gives basic statistics on genes expression FPKM values based on tissues of interest and distinct lines.</li></ul>
                </span></a>
              </td>
              <td class="menu_button">
                <a href="variants.php" target=_blank class="TAbutton"><img src="images/variant.png" width="45" height="45"><br>Variants
                <span><b>Variants Annotation:</b>
                  <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Gives lists of variants and annotation information based on chromosomal location or gene specified.</li></ul>
                </span></a>
              </td>
            </tr>
            <tr>
              <td class="menu_button" colspan=100% align="center">
                <a href="contact.php" class="TAbutton"><img src="images/contact.png" width="45" height="45"><br>Contact
                <span><b>Contact:</b>
                    <ul style="margin: 0; padding-left:20px; list-style: none;"><li>Shows detailed instructions on how to use the web page.</li></ul>
                </span></a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </center>
    <p align="right" ><font size="1">- Created by Modupe Adetunji at the University of Delaware - </font></p>
  </div>
  </body>
</html>
<!--ca126279623-->




