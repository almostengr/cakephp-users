<?php
declare(strict_types=1);

namespace CakephpUsers\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use CakephpUsers\Controller\AllController;

/**
 * CakephpUsers\Controller\AllController Test Case
 *
 * @uses \CakephpUsers\Controller\AllController
 */
class AllControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.CakephpUsers.All',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \CakephpUsers\Controller\AllController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \CakephpUsers\Controller\AllController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \CakephpUsers\Controller\AllController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \CakephpUsers\Controller\AllController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \CakephpUsers\Controller\AllController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
