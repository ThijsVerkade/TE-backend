<?php

namespace App\Account\Domain;

interface IAccountRepository
{
    public function login(): void;
}
