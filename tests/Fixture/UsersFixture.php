<?php
declare(strict_types=1);

namespace CakephpUsers\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_role_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'password_token' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-12-10 02:18:42',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'modified' => '2024-12-10 02:18:42',
                'modified_by' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
