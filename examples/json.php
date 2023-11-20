<?php

{
    "idempotency_key": "{{$guid}}",
    "request_id": "{{$guid}}",
   
    "data": {
        "amount": 9000,
        "payment": {
            "payment_id": "{{$guid}}",
            "payment_method": "BOLETO"
        },
        "currency": "BRL",
        "order": {
            "order_id": "{{$guid}}",
            "sales_tax": 12,
            "product_type": "service"
        },
        "boleto": {
            "our_number": "19465980",
            "document_number": "000000000191",
            "expiration_date": "16/11/2030",
            "instructions": "Não receber após o vencimento",
            "provider": "santander",
            "guarantor_name": "Ze pequeno",
            "guarantor_document_type": "CPF",
            "guarantor_document_number": "78009200021"
        },
        "customer": {
            "first_name": "João",
            "last_name": "da Silva",
            "name": "João da Silva",
            "document_type": "CPF",
            "phone_number": "5511955554444",
            "email": "joaodasilva@dominio.com",
            "document_number": "000000000191",
            "billing_address": {
            "street": "Av. Brasil",
            "number": "1000",
            "complement": "Sala 1",
            "district": "São Geraldo",
            "city": "Porto Alegre",
            "state": "RS",
            "postal_code": "90230060"
            }
        },
        "additional_data": {
    
        }
    }
}