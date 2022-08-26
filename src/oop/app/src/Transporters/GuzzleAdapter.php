<?php

namespace src\oop\app\src\Transporters;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7;

class GuzzleAdapter implements TransportInterface
{

    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function getContent(string $url): string
    {
        $body = '';
        $client = new Client();
        try {
            $response = $client->get($url);
            $body = $response->getBody();
        } catch (ClientException $e) {
            echo Psr7\Message::toString($e->getRequest());
            echo Psr7\Message::toString($e->getResponse());
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } finally {
            $content = $body;
        }

        return (string) $content;
    }
}
