<?php
// header("Content-type:application/json");
    if(isset($json))
    {
        echo $json;
    }

    if(isset($photo) && !is_null($photo->getChemin()))
    {
    	echo "<img src='". $photo->getChemin()."' alt=''/>";
    }

    if(isset($audio) && !is_null($audio->getChemin()))
    {
    	echo "<audio controls>";
            echo "<source src=".$audio->getChemin()." type='audio/mpeg'>";
        	echo "Your browser does not support the audio element.";
        echo "</audio>";
    }
// echo "Dans le layout de l'API";

// echo '<pre>';
// print_r($GLOBALS);
// echo '</pre>';

?>
