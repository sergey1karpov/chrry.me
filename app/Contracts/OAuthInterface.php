<?php

namespace App\Contracts;

interface OAuthInterface
{
    public function OAuth(): string;
    public function OAuthCallback(): void;
}
