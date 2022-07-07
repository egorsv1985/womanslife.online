<?php
require_once 'vendor/autoload.php';
//use YooKassa\Client;

    //$client = new Client();
	$client = new \YooKassa\Client();
$client->setAuth('917526', 'live_ZpQqHaearLwkIYHUM7mNNg8Fos6dwQ1wg4nQzwwgYiw');
  //  $client->setAuth('<Идентификатор магазина>', '<Секретный ключ>');
    $payment = $client->createPayment(
        array(
            'amount' => array(
                'value' => 120.0,
                'currency' => 'RUB',
            ),
			'receipt' => array(
                'customer' => array(
                    'full_name' => $_REQUEST['name'],
                    'email' => $_REQUEST['email'],
                    'phone' => $_REQUEST['phone'],
                ),
			),
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => 'https://womanslife.online/spasibo.html',
            ),
            'capture' => true,
            'description' => "Имя: ". $_REQUEST['name'] ."; Почта: ".$_REQUEST['email']."; ".$_REQUEST['phone'],
        ),
        uniqid('', true)
    );

	header("Location: ".$payment['_confirmation']['_confirmationUrl']);
?>