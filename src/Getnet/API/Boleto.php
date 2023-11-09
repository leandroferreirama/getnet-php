<?php
namespace Getnet\API;

/**
 * Class Boleto
 *
 * @package Getnet\API
 */
class Boleto implements \JsonSerializable
{
    use TraitEntity;

    const PROVIDER_SANTANDER = "santander";

    private $our_number;

    private $document_number;

    private $expiration_date;

    private $instructions;

    private $provider;

    /**
     *
     * @param string|null $our_number
     *
     */
    public function __construct($our_number = null)
    {
        if ($our_number) {
            $this->our_number = $our_number;
        }
    }

    /**
     *
     * @return mixed
     */
    public function getOurNumber()
    {
        return $this->our_number;
    }

    /**
     *
     * @param mixed $our_number
     * @return Boleto
     */
    public function setOurNumber($our_number)
    {
        $this->our_number = (string) $our_number;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->document_number;
    }

    /**
     *
     * @param mixed $document_number
     * @return Boleto
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = (string) $document_number;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     *
     * @param mixed $expiration_date
     * @return Boleto
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = (string) $expiration_date;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     *
     * @param mixed $instructions
     * @return Boleto
     */
    public function setInstructions($instructions)
    {
        $this->instructions = (string) $instructions;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     *
     * @param mixed $provider
     * @return Boleto
     */
    public function setProvider($provider)
    {
        $this->provider = (string) $provider;

        return $this;
    }
}