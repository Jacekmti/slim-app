<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BaseTestCase
 *
 * @package Test
 */
abstract class BaseTestCase extends TestCase
{
    /** @var  App */
    private $app;

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $this->createApplication();
    }

    /**
     * Process the application given a request method and URI
     *
     * @param string            $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string            $requestUri    the request URI
     * @param array|object|null $requestData   the request data
     *
     * @param array             $headers
     *
     * @return ResponseInterface|Response
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function runApp($requestMethod, $requestUri, $requestData = null, $headers = [])
    {
        // Create a mock environment for testing with
        $environment = Environment::mock(
            array_merge(
                [
                    'REQUEST_METHOD'   => $requestMethod,
                    'REQUEST_URI'      => $requestUri,
                    'Content-Type'     => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                ],
                $headers
            )
        );
        // Set up a request object based on the environment
        $request = Request::createFromEnvironment($environment);
        // Add request data, if it exists
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }
        // Set up a response object
        $response = new Response();
        // Process the application and Return the response
        return $this->app->process($request, $response);
    }


    /**
     * Make a request to the Api
     *
     * @param       $requestMethod
     * @param       $requestUri
     * @param null  $requestData
     * @param array $headers
     *
     * @return ResponseInterface|Response
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function request($requestMethod, $requestUri, $requestData = null, $headers = [])
    {
        return $this->runApp($requestMethod, $requestUri, $requestData, $headers);
    }

    /**
     *
     */
    protected function createApplication()
    {
        // Use the application settings
        $settings = require __DIR__ . '/../bootstrap.php';
        // Instantiate the application
        $this->app = $app = new App($settings);

        // Register routes
        require __DIR__ . '/../src/routes.php';
    }
}