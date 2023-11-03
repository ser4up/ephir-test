<?php

namespace App\Services\ExternalUser;

interface ExternalUserServiceI
{
    public function getUsers(int $limit = 10): array;
}
