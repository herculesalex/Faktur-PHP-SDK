<?php

namespace opencode506\Faktur;

class Helpers {

    /**
     * Obtener los headers de los responses envíados por Hacienda
     *
     * @param [string] $response
     * @return void
     */
    public function get_headers_from_curl_response($response)
    {
        $headers = [];
        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0) {
                $headers['http_code'] = $line;
            } else {
                list ($key, $value) = explode(': ', $line);
                $headers[$key] = $value;
            }
        return $headers;
    }

}