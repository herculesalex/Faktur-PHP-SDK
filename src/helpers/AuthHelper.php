<?php

namespace Faktur\Helpers;

class AuthHelper {

    /**
     * Obtener los headers de los responses envíados por Hacienda
     *
     * @param [string] $response
     * @return void
     */
    public static function getHeadersFromCurlResponse($response)
    {
        $headers = [];
        $headerText = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $headerText) as $i => $line)
            if ($i === 0) 
                return $headers['http_code'] = $line;
            
            list ($key, $value) = explode(': ', $line);
            $headers[$key] = $value;
            
        return $headers;
    }

}