<?php

namespace App\Auth;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/**
 * Class RegisterController
 *
 * @package App\Auth
 */
class RegisterController
{
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function register(Request $request, Response $response)
    {
        return $response->withStatus(StatusCode::HTTP_UNPROCESSABLE_ENTITY);
    }
}
