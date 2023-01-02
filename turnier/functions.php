<?php
function getProviderID($apikey, $name)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, "https://americas.api.riotgames.com/lol/tournament-stub/v4/providers?api_key=" . $apikey);
    curl_setopt($curl, CURLOPT_POSTFIELDS, '{"region": "EUW","url": "https://turnier.senivity.team/' . $name . '"}');
    $result = curl_exec($curl);

    curl_close($curl);
    return $result;
}

function createTurnierID($providerID, $name, $apikey)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, "https://americas.api.riotgames.com/lol/tournament-stub/v4/tournaments?api_key=" . $apikey);
    curl_setopt($curl, CURLOPT_POSTFIELDS, '{"name": "' . $name . '","providerId": ' . $providerID . '}');
    $result = curl_exec($curl);

    curl_close($curl);
    
    return $result;
}

function createTurnierToken($turnierID, $picktype, $maptype, $teamsize, $spectype, $summoners, $apikey)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, '{"allowedSummonerIds": [],"mapType": "' . $maptype . '","metadata": "","pickType": "' . $picktype . '","spectatorType": "' . $spectype . '","teamSize": ' . $teamsize . '}');
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'https://americas.api.riotgames.com/lol/tournament-stub/v4/codes?count=1&tournamentId=' . $turnierID . '&api_key=' . $apikey);
    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

?>