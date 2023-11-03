<?php

namespace App\Services\ExternalUser;

class ExternalUser implements ExternalUserI
{
    public readonly ?string $firstName;
    public readonly ?string $lastName;
    public readonly ?string $phone;
    public readonly ?string $email;
    public readonly ?string $country;

    /**
     * @param array $userData
     */
    public function __construct(array $userData)
    {
        $this->firstName = $userData['name']['first'] ?? null;
        $this->lastName = $userData['name']['last'] ?? null;
        $this->phone = $userData['phone'] ?? null;
        $this->email = $userData['email'] ?? null;
        $this->country = $userData['location']['country'] ?? null;
    }

    /**
     * Convert object to array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this;
    }
}
