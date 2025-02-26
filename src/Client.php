<?php
namespace Jaydoesphp\PhilsmsPhp;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

final class Client
{
    protected $httpClient;
    protected $apiKey;

    private $sms;
    private $profile;
    private $baseUri = "https://app.philsms.com/api/v3/";

    public function __construct($apiKey)
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->baseUri,
            'timeout' => 5.0,
        ]);

        $this->apiKey = $apiKey;
        $this->sms = Sms::create($this);
        $this->profile = Profile::create($this);
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

    /**
     * send sms
     * 
     * @param string|array $recipient
     * @param string $message
     * @param string $senderId
     * @param string $type
     * 
     * @return array
     */
    public function send($recipient, $message, $senderId = 'PhilSMS', $type = 'plain')
    {
        return $this->sms->postOutboundMessage($recipient, $message, $senderId, $type);
    }

    /**
     * get profile details
     * 
     * @return array
     */
    public function profile()
    {
        return $this->profile->getProfile();
    }

    /**
     * get profile balance
     * 
     * @return array
     */
    public function balance()
    {
        return $this->profile->getBalance();
    }
}
