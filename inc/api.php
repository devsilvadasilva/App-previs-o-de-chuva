<?php

class Api
{
    public static function get($cidade, $dias = 1)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://api.weatherapi.com/v1/forecast.json?key=" . API_KEY . "&q=" . $cidade . "&days=" . $dias . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return [
                'status' => 'error',
                'message' => $err,
                'data' => null
            ];
        } else {
            return [
                'status' => 'success',
                'message' => null,
                'data' => $response
            ];
        }

    }
}

