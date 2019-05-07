<?php

namespace src\Repository;

use src\Domain\User;
use Doctrine\ORM\EntityManager;
use Slim\Http;

class UserRepository
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function __invoke(Http\Request $request, Http\Response $response)
    {
        //TODO: validation of incoming params
        $newRandomUser = new User(
            $request->getParam('name', 'no-name'),
            $request->getParam('email', 'no-reply'));
        $this->em->persist($newRandomUser);
        $this->em->flush();
        return $response->withJson($newRandomUser, 201);
    }
}