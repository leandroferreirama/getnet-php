<?php
use Getnet\API\Getnet;
use Getnet\API\Transaction;
use Getnet\API\Customer;
use Getnet\API\Boleto;
use Getnet\API\Order;


require_once '../config/bootstrap.test.php';

//Autenticação da API
$getnet = getnetServiceTest();
#$getnet->setDebug(true);

//Cria a transação
$transaction = new Transaction();
$transaction->setIdempotencyKey('1eb2412c-165a-41cd-b1d9-76c575d70a21');
$transaction->setRequestId('6eb2412c-165a-41cd-b1d9-76c575d70a28');

$data = $transaction->data()->setCurrency("BRL")->setAmount(75.50);
$data->order("123456")
->setProductType(Order::PRODUCT_TYPE_SERVICE)
->setSalesTax(0);
$data->payment();
$data->boleto("000001946598")
->setDocumentNumber("170500000019763")
->setExpirationDate(date('d/m/Y', strtotime("+2 days")))
->setProvider(Boleto::PROVIDER_SANTANDER)
->setInstructions("Não receber após o vencimento");

$data->customer("customer_210818263")
->setDocumentType(Customer::DOCUMENT_TYPE_CPF)
->setEmail("customer@email.com.br")
->setFirstName("Jax")
->setLastName("Teller")
->setName("Jax Teller")
->setPhoneNumber("5551999887766")
->setDocumentNumber("03597607918")
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

$response = $getnet->boletoV2($transaction);

var_dump($response);
/*
print_r($response->getStatus()."\n");*/

/*if ($response instanceof \Getnet\API\BoletoRespose) {
    print_r($response->getBoletoHtml()."\n");
}*/
