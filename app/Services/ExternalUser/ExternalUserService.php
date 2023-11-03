<?php

namespace App\Services\ExternalUser;

class ExternalUserService implements ExternalUserServiceI
{
    /**
     * @param ApiClientI $client
     */
    public function __construct(private ApiClientI $client)
    {
        
    }

    /**
     * It returns needed amount of external users
     * 
     * @param int $limit
     * @return array
     */
    public function getUsers(int $limit = 10): array
    {
        $externalUsers = [];

        while ($limit-- > 0) {
            $externalUser = $this->client->getExternalUser();
            if (empty($externalUser)) {
                continue;
            }

            $externalUsers[] = $externalUser->toArray();
        }

        // Sort and return external users
        return collect($externalUsers)->sortBy('lastName')->reverse()->toArray();
    }
}
