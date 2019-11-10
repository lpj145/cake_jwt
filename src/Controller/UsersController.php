<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Http\Response;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function token()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            /** @var User $entity */
            $entity = $result->getData();
            $expireTime = time() + HOUR;
            $tokenJwt = JWT::encode([
                'sub' => $entity->getIdentifier(),
                'exp' => $expireTime
            ],Security::getSalt());

            //Do  later
            //$this->Users->updateUserToken($entity, $tokenJwt);

            return $this->withJson([
                'token_type' => 'bearer',
                'token' => $tokenJwt,
                'token_expire' => $expireTime,
                'data' => [
                    'id' => $entity->getIdentifier(),
                    'name' => $entity->name,
                    'lastname' => $entity->lastname,
                    'role' => $entity->role
                ]
            ]);
        }

        return new Response([
            'status' => 401,
            'body' => 'Authentication needed!'
        ]);
    }

    public function ping()
    {
        return $this->withJson([
            'ack' => time()
        ]);
    }
}
