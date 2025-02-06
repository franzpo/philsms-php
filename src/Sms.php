<?php
namespace Jaydoesphp\PhilsmsPhp;

class SMS
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send an SMS message
     *
     * @param string $recipient
     * @param string $message
     * @param string $senderId
     * @param string $type
     * @return array
     */
    public function sendMessage($recipient, $message, $senderId = 'PhilSMS', $type = 'plain')
    {
        return $this->client->request('POST', 'sms/send', [
            'recipient' => formatPhoneNumber($recipient),
            'sender_id' => $senderId,
            'type' => $type,
            'message' => $message
        ]);
    }
}
