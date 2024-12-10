<?php
declare(strict_types=1);

namespace CakephpUsers\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use CakephpUsers\Controller\UserRolesController;

/**
 * CakephpUsers\Controller\UserRolesController Test Case
 *
 * @uses \CakephpUsers\Controller\UserRolesController
 */
class UserRolesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.CakephpUsers.UserRoles',
        'plugin.CakephpUsers.Users',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UserRolesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UserRolesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UserRolesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UserRolesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UserRolesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
