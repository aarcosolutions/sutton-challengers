<?php

abstract class ApiType
{
    const Fixtures = 0;
    const ScoreCard = 1;
}

//change the api type
$json = call_api(APiType::Fixtures);

//$json->matches for Fixtures
//$json->match_details for ScoreCard. 
echo build_table($json->matches);

//ToDo: password season and match_id
function call_api($apiType){

    $curl = curl_init();
    $baseurl = "http://www.play-cricket.com/api/v2";
    $apiToken = ""; //add api token string
    $siteId = ""; //add club/site id
    $url = "";
    switch($apiType){
        case 0:
            $url = "$baseurl/matches.json?site_id=$siteId&season=2017&api_token=$apiToken"; 
            break;
        case 1: 
            $url = "$baseurl/matches.json?match_id=3021224&api_token=$apiToken";
            break;
    }

    
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $json = json_decode($response);
        return $json;
    }
}

function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

?>