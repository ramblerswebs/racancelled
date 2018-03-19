<?php

$mapname = $_GET['walk'];
//error_reporting(E_ALL);  // uncomment line to enable debuging
//ini_set('display_errors', 1);   // uncomment line to enable debuging
$folder = "gpxfiles"; // folder that conatins gpxfiles
$gpx = "$folder/$mapname.gpx";
if (file_exists($gpx)) {
    RLicense::GoogleMapKey("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
    $map = new RLeafletGpxMap(); // standard software to read json feed and decode file
    $map->linecolour = '#782327'; // optionally set the route's line colour
    $map->displayPath($gpx);

    echo"<br />";

    echo "<a href=$folder/$mapname.gpx>Download the gpx file for this walk</a>";
} else {
    echo "ERROR - gpx file (".$gpx.") does not exist";
}
?>


