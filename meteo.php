<?php
$curl = curl_init("https://api.meteo-concept.com/api/ephemeride/0?token=d9bc4e58c57654595af8223cfd17b8e822e2de48779cc3253a61d12f28c0dbb0");
$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl));
} else {
}
curl_close($curl);
