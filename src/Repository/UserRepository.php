<?php

namespace App\Repository;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use App\Domain\User;
use Doctrine\ORM\EntityManager;
use Slim\Http;

/**
 * Class UserRepository
 *
 * @package App\Repository
 */
class UserRepository
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * UserRepository constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param Http\Request  $request
     * @param Http\Response $response
     *
     * @return Http\Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
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