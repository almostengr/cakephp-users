<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddRoleTypes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('user_roles');
        $table->insert(
            [
                'name' => 'Administrator',
                'active' => true,
                'sort_order' => 1,
            ]
        );
        $table->insert(
            [
                'name' => 'General',
                'active' => true,
                'sort_order' => 2,
            ]
        );
        $table->save();
    }
}
