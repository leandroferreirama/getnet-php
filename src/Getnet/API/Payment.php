<?php
namespace Getnet\API;

/**
 * Class Data
 *
 * @package Getnet\API
 */
class Payment implements \JsonSerializable
{
    use TraitEntity;
    
    private $payment_method = "BOLETO";
}