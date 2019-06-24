<?php
namespace App\Controller\Api;


use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Controller\Controller;
use Cake\Event\Event;


/**
 * Class AppController
 * @package App\Controller\Api
 * @property AuthenticationComponent $Authentication
 */
class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function beforeFilter(Event $event)
    {
        return parent::beforeFilter($event);
    }

    protected function responseWithJson(array $data)
    {
        return $this->response
            ->withType('json')
            ->withStringBody(json_encode($data))
        ;
    }
}