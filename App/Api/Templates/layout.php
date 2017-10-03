<?php
// header("Content-type:application/json");
    if(isset($json))
    {
        echo $json;
    }

    if(isset($photo))
    {
    	echo "<img src='". $photo->getChemin()."' alt='photo'/>";
    }
// echo "Dans le layout de l'API";

// echo '<pre>';
// print_r($GLOBALS);
// echo '</pre>';

?>
