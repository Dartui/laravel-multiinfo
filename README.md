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
    'is_nss'   => false, // Whether cURL is using NSS or no
    'nicename' => null,  // Nicename of certificate (required for NSS)
    'path'     => null,  // Certificate absolute path on server or path to NSS DB
    'password' => null,  // Certificate password
    'type'     => 'P12', // Certificate type (PEM or P12)
],
```

## Usage (Request and Response)

Each response inherit this methods:

```php
$response->getCode();        // status code
$response->getDescription(); // response in text format

$response->hasError();
$response->getError();
```

### Send SMS to single phone number

#### Request
```php
$multiinfo = app('multiinfo');

$sendSms = $multiinfo->request('sendSms')
    ->setDestination('48123456789') // required
    ->setMessage('Hello world!')    // required
    ->setOrigin('New Origin')       // optional
    ->send();
```

#### Response

```php
$sendSms->getMessageId(); // sent SMS id
```

### Get oldest SMS sent to MultiInfo

#### Request
```php
$multiinfo = app('multiinfo');

$getSms = $multiinfo->request('getSms')
    ->setManualConfirmation(true) // optional, default false
    ->setDeleteContent(true)      // optional, default false
    ->setTimeout(5000)            // optional
    ->send();
```

#### Response

```php
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

### Confirm receiving SMS

#### Request

```php
$multiinfo = app('multiinfo');

$confirmSms = $multiinfo->request('confirmSms')
    ->setMessageId(123456)   // required
    ->setDeleteContent(true) // optional, default false
    ->send();
```

#### Response

This response do not have any additional methods.

### Send SMS to multiple phone numbers with different messages

#### Request

```php
$multiinfo = app('multiinfo');

$package = $multiinfo->request('package')
    ->setMessage('Hello world!')  // default message
    ->setOrigin('New Origin')     // optional
    ->addDestination('123456789')
    ->addDestination('234567890') // to this numbers will be send default message
    ->addDestination('987654321', 'Hello another world!') // personalized message
    ->send();
```

#### Response

```php
$package->getPackageId(); // sent package id
```