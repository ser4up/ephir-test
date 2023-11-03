<?php

namespace App\Http\Controllers;

use App\Services\ExternalUser\ExternalUserServiceI;
use Illuminate\Http\Response;

class MainController extends Controller
{
    /**
     * @param ExternalUserServiceI $externalUserService
     * @param int|null $limit
     * @return Response
     */
    public function index(ExternalUserServiceI $externalUserService, ?int $limit = 10): Response
    {
        $externalUsers = $externalUserService->getUsers($limit);
        if (empty($externalUsers)) {
            return response()->xml([]);
        }

        return response()->xml([
            'user' => $externalUsers
        ]);
    }
}
