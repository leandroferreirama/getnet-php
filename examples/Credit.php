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
$tokenCard = new Token("5155901222280001", "customer_210818263", $getnet);

$transaction = new Transaction();
// Dados do pedido - Transação
$transaction->setSellerId($seller_id);
$transaction->setCurrency("BRL");
$transaction->setAmount(99903.03);

// Detalhes do Pedido
$transaction->order("123456")
    ->setProductType(Order::PRODUCT_TYPE_SERVICE);

// Dados do método de pagamento do comprador
$transaction->credit()
    ->setAuthenticated(false)
    ->setDelayed(false)
    ->setSaveCardData(true)
    ->setTransactionType(Credit::TRANSACTION_TYPE_INSTALL_NO_INTEREST)
    ->setNumberInstallments(3)
    ->card($tokenCard)
    ->setExpirationMonth("12")
    ->setExpirationYear("23")
    ->setSecurityCode("123");
# $transaction->credit()->setNumberInstallments(3);
// Dados pessoais do comprador
$transaction->customer("customer_210818263")
    ->billingAddress()
    ->setCity("São Paulo")
    ->setComplement("Sons of Anarchy")
    ->setCountry("Brasil")
    ->setDistrict("Centro")
    ->setNumber("1000")
    ->setPostalCode("90230060")
    ->setState("SP")
    ->setStreet("Av. Brasil");
#var_dump($transaction);
$response = $getnet->authorize($transaction);

var_dump($response);