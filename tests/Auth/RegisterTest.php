<?php

namespace Test\Auth;

use App\Auth\RegisterController;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Test\BaseTestCase;

/**
 * Class RegisterTest
 *
 * @package Test\Auth
 */
class RegisterTest extends BaseTestCase
{
    /**
     *
     */
    public function testRegisterClass()
    {
        $this->assertInstanceOf(RegisterController::class, new RegisterController());
    }

    /**
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function testRegisterUser()
    {
        $response = $this->request('POST', '/api/users', []);
        $this->assertEquals(422, $response->getStatusCode());
    }
}
