<?php
require_once 'vendor/autoload.php';

$client = new \YooKassa\Client();
dd($client);
$client->setAuth('917526', 'live_DSGEAy_p36CWUP8ybyH_64NDajvvasq9JBgnfWA_5AI');

try {
    $idempotenceKey = uniqid('', true);
    $response = $client->createPayment(
        array(
            'amount' => array(
                'value' => '1000.00',
                'currency' => 'RUB',
            ),
            'confirmation' => array(
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => 'https://womanslife.online/spasibo.html',
            ),
            'capture' => true,
            'description' => 'Заказ №72',
            'metadata' => array(
                'orderNumber' => 1001
            ),
            'receipt' => array(
                'customer' => array(
                    'full_name' => 'Ivanov Ivan Ivanovich',
                    'email' => 'email@email.ru',
                    'phone' => '79211234567',
                    'inn' => '6321341814'
                ),
                'items' => array(
                    array(
                        'description' => 'Переносное зарядное устройство Хувей',
                        'quantity' => '1.00',
                        'amount' => array(
                            'value' => 1000,
                            'currency' => 'RUB'
                        ),
                        'vat_code' => '2',
                        'payment_mode' => 'full_payment',
                        'payment_subject' => 'commodity',
                        'country_of_origin_code' => 'CN',
                        'product_code' => '44 4D 01 00 21 FA 41 00 23 05 41 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 12 00 AB 00',
                        'customs_declaration_number' => '10714040/140917/0090376',
                        'excise' => '20.00',
                        'supplier' => array(
                            'name' => 'string',
                            'phone' => 'string',
                            'inn' => 'string'
                        )
                    ),
                )
            )
        ),
        $idempotenceKey
    );
    
    //получаем confirmationUrl для дальнейшего редиректа
    $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
} catch (\Exception $e) {
    $response = $e;
}

if (!empty($response)) {
    print_r($response);
}
?>