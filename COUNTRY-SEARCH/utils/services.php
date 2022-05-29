<?php

/*
    @param string $url
    @param string $user_agent
    @param array $http_header
    @return array
*/
function get_api_data(string $url, string $user_agent, array $http_header)  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);

    $result = curl_exec($ch);

    if ($result === false) {
        echo 'Error' . ' ' . curl_error($ch);
    } else {
        return $result;
    }
}

function get_country_from_api(): array {
    global $country_name;

    $country_json = get_api_data(
        url: 'https://restcountries.com/v3.1/name/'.$country_name,
        user_agent: '',
        http_header: []
    );

    $country = json_decode($country_json, true);

    return $country;
}

function get_country_props(array $country): array {
    $country_props = [];

    $country_props['name'] = $country[0]['name']['common'];
    $country_props['population'] = $country[0]['population'];
    $country_props['capital'] = $country[0]['capital'][0];
    $country_props['region'] = $country[0]['region'];
    $country_props['sub_region'] = $country[0]['subregion'];
    $country_props['flag'] = $country[0]['flags']['png'];

    return $country_props;
}

function download_country_img(array $country_props): string {
    global $ext;

    $country_flag_url = $country_props['flag'];
    $pathinfo = pathinfo($country_flag_url);
    $ext = $pathinfo['extension'];
    $filename = 'images/'.$pathinfo['filename'];
    $img = @file_get_contents($country_flag_url, true);
    file_put_contents($filename.'.'.$ext, $img);

    return $filename;
}

function get_country_from_db() {
    global $country_name_to_query;
    global $conn;

    $sql = "SELECT * from countries WHERE name = {$country_name_to_query}";
    $result = mysqli_query($conn, $sql);
    $country = mysqli_fetch_row($result);

    return $country;
}

function get_countries_from_db(): array {
    global $conn;

    $sql = "SELECT * from countries";
    $result = mysqli_query($conn, $sql);
    $countries = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $countries;
}