<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CollationPassword extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {

        $this->table('users')
            ->changeColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('users')
            ->changeColumn('password', 'string', [
                'default' => null,
                'length' => 100,
                'null' => false,
            ])
            ->update();
    }
}
