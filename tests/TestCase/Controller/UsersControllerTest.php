<?php
namespace App\Test\TestCase\Controller;

use App\Controller\Api\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testGet()
    {
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOnsiaWQiOiI1MGE2NTY5Ny01YjM4LTQ2NDEtOTUwYy00YTQ5MzQ1NjdmODEiLCJyb2xlIjoidXNlciIsImFjdGl2ZSI6dHJ1ZX0sImV4cCI6MTU2MjAwOTQ1Nn0.dscz2AowOZQDTfxAbvV6fnVcPhktbYtsgFNgqR5AEJs";
        $this->configRequest([
            'headers' => ['Authorization' => 'Bearer '.$token]
        ]);
        $this->get('/api/ping');
        $this->assertResponseOk();
    }
}
