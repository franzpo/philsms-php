
# 📡 philsms api for php

A PHP library for sending SMS messages using PhilSMS. Visit [PhilSMS](https://www.philsms.com/) to get your API key!

## 🚀 Installation

Require the package using **Composer**:

```bash
composer require jaydoesphp/philsms-php
```

## 📖 Usage Guide

This library provides an easy way to interact with the PhilSMS API to send SMS
messages and retrieve account details.

## ✉️ Send Outbound SMS

### 🔹 Endpoint

`POST /sms/send`

### 🔹 Required Parameters

| Parameter                | Type     | Description                                                            |
| ------------------------ | -------- | ---------------------------------------------------------------------- |
| `recipient`              | `string` | Recipient phone number(s) in philippine format (e.g., `639123456789`). |
| `message`                | `string` | The SMS message content. exclude any vulgar words                      |
| `sender_id` _(optional)_ | `string` | Sender ID (default: `PhilSMS`).                                        |
| `type` _(optional)_      | `string` | Message type (`plain` or `unicode`).                                   |

---

### ✅ Send SMS to a **Single Recipient**

```php
require 'vendor/autoload.php';

use Jaydoesphp\PhilsmsPhp\Client;

$client = new Client('your-api-key');

$response = $client->send('639123456789', 'Hello! This is a test message.');

print_r($response);
```

---

### ✅ Send SMS to **Multiple Recipients**

```php
require 'vendor/autoload.php';

use Jaydoesphp\PhilsmsPhp\Client;

$client = new Client('your-api-key');

$response = $client->send(
    '639123456789, 639987654321',
    'Hello! This is a message sent to multiple recipients.'
);

print_r($response);
```

---

## 📋 Retrieve Account Information

### 🔹 Get Profile Details

#### Endpoint: `GET /me`

```php
$response = $client->profile();
print_r($response);
```

### 🔹 Get Account Balance

#### Endpoint: `GET /balance`

```php
$response = $client->balance();
print_r($response);
```

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to
discuss your ideas.

## ⚡ License

This package is licensed under the **MIT License**.

## Contact

For any questions or inquiries, please contact
[jaydoesphp@gmail.com](mailto:jaydoesphp@gmail.com).
