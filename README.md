# Laravel MultiInfo

Polkomtel MultiInfo integration for sending SMS from Laravel applications

## Installation

### Require package

```sh
composer require dartui/multiinfo
```

### Service Provider

```php
'providers' => [
    ...
    Dartui\Multiinfo\ServiceProvider::class,
];
```

### Publish config

```sh
php artisan vendor:publish --provider=Dartui\\Multiinfo\\ServiceProvider
```

### Configure package

```php
'url'        => 'https://api1.multiinfo.plus.pl', // API base URL

'login'      => null, // API user login
'password'   => null, // API user password
'service_id' => null, // API user service id

'cert'       => [
    'path'     => null,  // Certificate absolute path on server
    'password' => null,  // Certificate password
    'type'     => 'P12', // Certificate type (PEM or P12)
],
```

## Usage

### Send SMS to single phone number

```php
$multiinfo = app('multiinfo');

$sendSms = $multiinfo->request('sendSms')
    ->setDestination('48123456789')
    ->setMessage('Hello world!')
    ->send();
    
$sendSms->getCode();        // status code
$sendSms->getDescription(); // response in text format

$sendSms->hasError();
$sendSms->getError();

$sendSms->getMessageId(); // sent SMS id
```

### Get oldest SMS sent to MultiInfo

```php
$multiinfo = app('multiinfo');

$getSms = $multiinfo->request('getSms')->send();

$getSms->getCode();        // status code
$getSms->getDescription(); // response in text format

$getSms->hasError();
$getSms->getError();

$getSms->getMessageId();   // received SMS id
$getSms->getSender();      // sender phone number
$getSms->getReceiver();    // receiver phone number
$getSms->getMessageType(); // message type id
$getSms->getMessage();     // message content
$getSms->getProtocol();    // protocol id
$getSms->getEncoding();    // encoding id
$getSms->getServiceId();   // service id
$getSms->getConnector();   // connector id
$getSms->getReceiveDate(); // received date
```
