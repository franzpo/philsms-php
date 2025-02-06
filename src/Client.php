<?php
namespace Jaydoesphp\PhilsmsPhp;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class Client
{
    protected $httpClient;
    protected $apiKey;
    protected $baseUri = "https://app.philsms.com/api/v3/";

    public function __construct($apiKey)
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->baseUri,
            'timeout' => 5.0,
        ]);
        $this->apiKey = $apiKey;
    }

    public function request($method, $endpoint, $data = [])
    {
        try {
            $response = $this->httpClient->request($method, $endpoint, [
                'json' => $data,
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
