<?php
    $connection = mysqli_connect("localhost","frnakenstein", "maryshelley","transcriptatlas") or die("Error " . mysqli_error($connection));
  
    //fetch department names from the department table
    $sql = 'select distinct gene_short_name as species from genes_fpkm';
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    $dname_list = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $dname_list[] = $row['species'];
    }
    echo json_encode($dname_list);
?>
