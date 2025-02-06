<?php
namespace Jaydoesphp\PhilsmsPhp;

class SMS
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

    public function postOutboundMessage($recipient, $message, $senderId, $type)
    {
        if (!is_array($recipient)) {
            $recipient = [$recipient];
        }

        $formattedRecipients = array_map('formatPhoneNumber', $recipient);

        return $this->client->request('POST', 'sms/send', [
            'recipient' => implode(',', $formattedRecipients),
            'sender_id' => $senderId,
            'type' => $type,
            'message' => $message
        ]);
    }
}

