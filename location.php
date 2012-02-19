<?php
$latitude = (float) $_POST['latitude'];
$longitude = (float) $_POST['longitude'];

// If the user wasn't geolocated, fall back to their location from FB.
/*if (!$latitude || !$longitude) {
    $request_url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($user->location);

    $response = file_get_contents($request_url);
    $address = json_decode($response, true);

    $latitude = $address["results"][0]["geometry"]["location"]["lat"];
    $longitude = $address["results"][0]["geometry"]["location"]["long"];
}*/

if ($user->location == null || $user->location == "" || true) {
    $request_url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=false&latlng=" . $latitude . "," . $longitude;

    $response = file_get_contents($request_url);
    $address = json_decode($response, true);

    foreach ($address['results'][0]['address_components'] as $result) {
        foreach ($result['types'] as $type) {
            if ($type == "locality") {
                $user->location = $result["long_name"];
            }
        }
    }
}

$id = $user->id;

$_SESSION['locationset'] = true;

$query = "UPDATE users SET latitude='$latitude', longitude='$longitude', location='$user->location' where id='$id';";
mysql_query($query);

$user->latitude = $latitude;
$user->longitude = $longitude;

Stats::poll("location", $latitude, $longitude, $user->location, "", $user->id);

// Old code to reverse lookup.
/*
$request_url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=false&latlng=" . $latitude . "," . $longitude;

$response = file_get_contents($request_url);
$address = json_decode($response, true);

//var_dump($address['results'][0]['address_components']);
foreach ($address['results'][0]['address_components'] as $result) {
    foreach ($result['types'] as $type) {
        if ($type == "locality" || $type =="political") {
            var_dump($result);
        }
    }
}
*/
