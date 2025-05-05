<?php
$get_ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
// won't work on local machine. but, on online server it works fine!
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json/$get_ip");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
$result = json_decode($result);

if($result->status=='success'){
    $city_name = $result->city; //city name
    $country_name = $result->country; //country name
    $ip_address = $result->query; //ip address
}
