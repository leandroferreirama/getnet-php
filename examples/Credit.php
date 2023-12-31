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
$tokenCard = new Token("5155901222280001", "1533", $getnet);
var_dump($tokenCard);
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
    ->setExpirationYear("23")
    ->setSecurityCode("123");
# $transaction->credit()->setNumberInstallments(3);
// Dados pessoais do comprador
$transaction->customer("1533")
    ->billingAddress();

$response = $getnet->authorize($transaction);

var_dump($response->getResponseJSON());