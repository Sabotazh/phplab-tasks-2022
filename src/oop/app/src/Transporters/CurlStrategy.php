<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $ch = curl_init();
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $response = curl_exec($ch);
        $charsetType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        curl_close($ch);

        $charset = null;
        if (($charsetType !== null && preg_match('%charset=([\w-]+)%i', $charsetType, $matches))
            || preg_match('%<meta[^>]+charset=[\'"]?([\w-]+)%i', $response, $matches)) {
            $charset = $matches[1];
        }

        if ($charset && strtoupper($charset) !== 'UTF-8') {
            $response = iconv($charset, 'UTF-8', $response);
        }

        return (string) $response;
    }
}
