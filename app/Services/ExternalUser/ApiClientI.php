<?php

namespace App\Services\ExternalUser;

interface ApiClientI
{
    public function getExternalUser(): ?ExternalUserI;
}
