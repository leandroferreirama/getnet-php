<?php
use Getnet\API\Getnet;
use Getnet\API\Transaction;
use Getnet\API\Token;
use Getnet\API\Customer;
use Getnet\API\Card;
use Getnet\API\Credit;
use Getnet\API\Order;


require_once '../config/bootstrap.test.php';

//Autenticação da API
$getnet = getnetServiceTest();

//Criar token Cartão
$cardService = new \Getnet\API\Service\CardService($getnet);

$card_number = '5155901222280001';
$customer_id = 'customer_210818263';

// Generate token
$cardToken = $cardService->generateCardToken($card_number, $customer_id);

$card = new Card($cardToken);
$card->setBrand(Card::BRAND_MASTERCARD)
    ->setExpirationMonth("12")
    ->setExpirationYear(date('y') + 1)
    ->setCustomerId($customer_id);

// Save
$tokenResponse = $cardService->saveCard($card);

// Get by card_id
$savedCard = $cardService->getCard($tokenResponse->getCardId());
var_dump($savedCard);

$tokenCard = new \Getnet\API\Entity\CardToken($savedCard->getNumberToken());


$transaction = new Transaction();
// Dados do pedido - Transação
$transaction->setSellerId($seller_id);
$transaction->setCurrency("BRL");
$transaction->setAmount(25.00);

// Detalhes do Pedido
$transaction->order("1533")
    ->setProductType(Order::PRODUCT_TYPE_SERVICE);

// Dados do método de pagamento do comprador
$transaction->credit()
    ->setAuthenticated(false)
    ->setDelayed(false)
    ->setSaveCardData(false)
    ->setTransactionType(Credit::TRANSACTION_TYPE_FULL)
    ->setNumberInstallments(1)
    ->card($tokenCard)
    ->setExpirationMonth("12")
    ->setExpirationYear(date('y') + 1)
    ->setSecurityCode("123");
# $transaction->credit()->setNumberInstallments(3);
// Dados pessoais do comprador
$transaction->customer("1533")
    ->billingAddress();

$response = $getnet->authorize($transaction);

var_dump($response->getResponseJSON());