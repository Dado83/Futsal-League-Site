<?php

    function x(){
        return "u funkciji";
    }

if($_GET['f'] == 'getAll'){
    echo x();
};

if($_GET['f'] == 'db'){
    $db = mysqli_connect("localhost", "root","","futsal") or die("nema konekcije");
    if($db){
        echo "ima konekcija<br><br>";
    }

    $sql = "SELECT * FROM teams";
    $result = mysqli_query($db, $sql);
    $response = array();
    while($row = mysqli_fetch_object($result)){
        $response[] = $row;
    }
    echo $response[0]->team_name;
};


?>