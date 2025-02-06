<?php
namespace Jaydoesphp\PhilsmsPhp;

class Profile
{
    protected $client;

    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function create(Client $client)
    {
        return new self($client);
    }

    public function getProfile()
    {
        return $this->client->request('GET', 'me');
    }


    public function getBalance()
    {
        return $this->client->request('GET', 'balance');
    }
}
