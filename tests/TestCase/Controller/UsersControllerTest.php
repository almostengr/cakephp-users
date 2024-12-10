<?php
declare(strict_types=1);

namespace CakephpUsers\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use CakephpUsers\Controller\UsersController;

/**
 * CakephpUsers\Controller\UsersController Test Case
 *
 * @uses \CakephpUsers\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.CakephpUsers.Users',
        'plugin.CakephpUsers.UserRoles',
        'plugin.CakephpUsers.RequestedSelections',
        'plugin.CakephpUsers.SelectionOptions',
        'plugin.CakephpUsers.ShowStatuses',
        'plugin.CakephpUsers.Shows',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UsersController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UsersController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UsersController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \CakephpUsers\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
