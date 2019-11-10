<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ContainersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ContainersController Test Case
 *
 * @uses \App\Controller\ContainersController
 */
class ContainersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Containers',
        'app.Companies'
    ];


    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented!');
    }
}
