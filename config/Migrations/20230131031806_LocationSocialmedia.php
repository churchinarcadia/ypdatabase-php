<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class LocationSocialmedia extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('meeting_people')
            ->dropForeignKey([], 'meetingpeople_person_fk')
            ->dropForeignKey([], 'meetingpeople_modifier_fk')
            ->dropForeignKey([], 'meetingpeople_meeting_fk')
            ->dropForeignKey([], 'meetingpeople_creator_fk')
            ->update();
        $this->table('meeting_types')
            ->dropForeignKey([], 'meetingtypes_modifier_fk')
            ->dropForeignKey([], 'meetingtypes_creator_fk')
            ->update();
        $this->table('meetings')
            ->dropForeignKey([], 'meetings_modifier_fk')
            ->dropForeignKey([], 'meetings_meetingtype_fk')
            ->dropForeignKey([], 'meetings_creator_fk')
            ->update();
        $this->table('people')
            ->dropForeignKey([], 'people_mother_fk')
            ->dropForeignKey([], 'people_modifier_fk')
            ->dropForeignKey([], 'people_father_fk')
            ->dropForeignKey([], 'people_creator_fk')
            ->update();

        $this->table('people')
            ->removeColumn('home_address')
            ->update();
        $this->table('user_types')
            ->dropForeignKey([], 'usertypes_modifier_fk')
            ->dropForeignKey([], 'usertypes_creator_fk')
            ->update();
        $this->table('users')
            ->dropForeignKey([], 'users_usertype_fk')
            ->dropForeignKey([], 'users_person_fk')
            ->dropForeignKey([], 'users_modifier_fk')
            ->dropForeignKey([], 'users_creator_fk')
            ->update();

        $this->table('users')
            ->removeColumn('active')
            ->update();
        $this->table('addresses')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('number', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('direction', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => true,
            ])
            ->addColumn('street', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('unit', 'string', [
                'default' => null,
                'limit' => 4,
                'null' => true,
            ])
            ->addColumn('city', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('state', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('zip', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('creator', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modifier', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'modifier',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->create();

        $this->table('meeting_locations')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('address_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('active', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('notify', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('notes', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('creator', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modifier', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'address_id',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'modifier',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->addIndex(
                [
                    'address_id',
                ]
            )
            ->create();

        $this->table('meeting_locations_notify')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('meeting_location_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('person_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('creator', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modifier', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'person_id',
                ]
            )
            ->addIndex(
                [
                    'modifier',
                ]
            )
            ->addIndex(
                [
                    'meeting_location_id',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->create();

        $this->table('social_media_types')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('description', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('creator', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modifier', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'modifier',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->create();

        $this->table('social_medias')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('person_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('social_media_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('handle', 'string', [
                'default' => null,
                'limit' => 25,
                'null' => false,
            ])
            ->addColumn('creator', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modifier', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('notes', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'social_media_type_id',
                ]
            )
            ->addIndex(
                [
                    'person_id',
                ]
            )
            ->addIndex(
                [
                    'modifier',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->create();

        $this->table('addresses')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('meeting_locations')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'address_id',
                'addresses',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('meeting_locations_notify')
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'meeting_location_id',
                'meeting_locations',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('social_media_types')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('social_medias')
            ->addForeignKey(
                'social_media_type_id',
                'social_media_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('meetings')
            ->addColumn('meeting_location_id', 'integer', [
                'after' => 'meeting_type_id',
                'default' => null,
                'length' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'meeting_location_id',
                ],
                [
                    'name' => 'meetings_location_fk',
                ]
            )
            ->update();

        $this->table('people')
            ->addColumn('middle_name', 'string', [
                'after' => 'first_name',
                'default' => null,
                'length' => 20,
                'null' => true,
            ])
            ->addColumn('address_id', 'integer', [
                'after' => 'home_phone',
                'default' => null,
                'length' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'address_id',
                ],
                [
                    'name' => 'people_address_fk',
                ]
            )
            ->update();

        $this->table('users')
            ->addColumn('status', 'string', [
                'after' => 'password',
                'default' => null,
                'length' => 10,
                'null' => true,
            ])
            ->update();

        $this->table('meeting_people')
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'modifier',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'meeting_id',
                'meetings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'creator',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('meeting_types')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('meetings')
            ->addForeignKey(
                'meeting_location_id',
                'meeting_locations',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'modifier',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'meeting_type_id',
                'meeting_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('people')
            ->addForeignKey(
                'address_id',
                'addresses',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'mother',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'father',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('user_types')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'user_type_id',
                'user_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SET_NULL',
                ]
            )
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
        $this->table('addresses')
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('meeting_locations')
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )
            ->dropForeignKey(
                'address_id'
            )->save();

        $this->table('meeting_locations_notify')
            ->dropForeignKey(
                'person_id'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'meeting_location_id'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('social_media_types')
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('social_medias')
            ->dropForeignKey(
                'social_media_type_id'
            )
            ->dropForeignKey(
                'person_id'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('meeting_people')
            ->dropForeignKey(
                'person_id'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'meeting_id'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('meeting_types')
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('meetings')
            ->dropForeignKey(
                'meeting_location_id'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'meeting_type_id'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('people')
            ->dropForeignKey(
                'address_id'
            )
            ->dropForeignKey(
                'mother'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'father'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('user_types')
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'user_type_id'
            )
            ->dropForeignKey(
                'person_id'
            )
            ->dropForeignKey(
                'modifier'
            )
            ->dropForeignKey(
                'creator'
            )->save();

        $this->table('meetings')
            ->removeIndexByName('meetings_location_fk')
            ->update();

        $this->table('meetings')
            ->removeColumn('meeting_location_id')
            ->update();

        $this->table('people')
            ->removeIndexByName('people_address_fk')
            ->update();

        $this->table('people')
            ->addColumn('home_address', 'string', [
                'after' => 'home_phone',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->removeColumn('middle_name')
            ->removeColumn('address_id')
            ->update();

        $this->table('users')
            ->addColumn('active', 'boolean', [
                'after' => 'password',
                'default' => '1',
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('status')
            ->update();

        $this->table('meeting_people')
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'modifier',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'meeting_id',
                'meetings',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('meeting_types')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('meetings')
            ->addForeignKey(
                'modifier',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'meeting_type_id',
                'meeting_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('people')
            ->addForeignKey(
                'mother',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'father',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('user_types')
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'user_type_id',
                'user_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'person_id',
                'people',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'modifier',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('addresses')->drop()->save();
        $this->table('meeting_locations')->drop()->save();
        $this->table('meeting_locations_notify')->drop()->save();
        $this->table('social_media_types')->drop()->save();
        $this->table('social_medias')->drop()->save();
    }
}
