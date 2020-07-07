<?php
$curl_h = curl_init('http://discordapp.com/api/users/@me');

curl_setopt($curl_h, CURLOPT_HTTPHEADER, array(
     'User-Agent: MyCoolAuth v0.1',
     'Authorization: NzIyMzM1MTQ5NDA0MTkyODIw.Xuhmgw.SZfbikLok4FRqbHQY4L3htLcTaU
'
    )
);
curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl_h);
?>
