<!DOCTYPE html>
<html>
    <head>
        <title>Autocomplete Textbox Demo | PHP | jQuery</title>
        <!-- load jquery ui css-->
        <link href="jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <!-- load jquery library -->
        <script src="jquery-1.11.3.min.js"></script>
        <!-- load jquery ui js file -->
        <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>

        <script type="text/javascript">
        $(function() {
            var availableTags = <?php include('autocomplete.php'); ?>;
            $("#species").autocomplete({
                source: availableTags,
                autoFocus:true
            });
        });
        </script>
    </head>
    <body>
        <label>Department Name</label></br>
        <input id="species" type="text" size="50" placeholder="enter" />
    </body>
</html>
