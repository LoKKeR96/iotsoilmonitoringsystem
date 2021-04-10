<?php

// Connect to MySQL
include("connect.php");

// Retrieve Positions
include("getNodes.php");

$lat = $nodesPositions[0][1];
$long = $nodesPositions[0][2];

$APIKey = "2c1ba8abe4a199abd4b3a1dcf9440da6";
//$APIKey = "b6907d289e10d714a6e88b30761fae22";

//USING https://openweathermap.org/ for wheather data retrival.

$URL = "https://api.openweathermap.org/data/2.5/weather?units=metric&lat=".$lat."&lon=".$long."&appid=".$APIKey;

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $URL,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$weatherData = json_decode($resp);


//echo $resp;
?>