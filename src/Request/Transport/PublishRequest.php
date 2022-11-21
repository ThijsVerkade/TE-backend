<?php

declare(strict_types=1);

namespace App\Request\Transport;

use DigitalRevolution\SymfonyRequestValidation\AbstractValidatedRequest;
use DigitalRevolution\SymfonyRequestValidation\ValidationRules;

class PublishRequest extends AbstractValidatedRequest
{
    protected function getValidationRules(): ?ValidationRules
    {
        return new ValidationRules([
            'request' => [
                'company_id' => 'int',
                'status' => 'required|int',
                'vehicles?.*.reference_id' => 'required|int',
                'vehicles?.*.status' => 'required|int',
                'vehicles?.*.type' => 'required|int',
                'vehicles?.*.closing_date' => 'required|string',
                'vehicles?.*.pickup_date_from' => 'required|string',
                'vehicles?.*.pickup_date_to' => 'required|string',
                'vehicles?.*.delivery_date_from' => 'required|string',
                'vehicles?.*.delivery_date_to' => 'required|string',
                'vehicles?.*.price_amount' => 'required|string',
                'vehicles?.*.price_currency' => 'required|string',

                'vehicles?.*.pickup_address.street_line' => 'required|string',
                'vehicles?.*.pickup_address.city' => 'required|string',
                'vehicles?.*.pickup_address.country' => 'required|string',
                'vehicles?.*.pickup_address.zip_code' => 'required|string',
                'vehicles?.*.pickup_address.latitude' => 'required|string',
                'vehicles?.*.pickup_address.longitude' => 'required|string',

                'vehicles?.*.delivery_address.street_line' => 'required|string',
                'vehicles?.*.delivery_address.city' => 'required|string',
                'vehicles?.*.delivery_address.country' => 'required|string',
                'vehicles?.*.delivery_address.zip_code' => 'required|string',
                'vehicles?.*.delivery_address.latitude' => 'required|string',
                'vehicles?.*.delivery_address.longitude' => 'required|string',
            ]
        ]);
    }
}
