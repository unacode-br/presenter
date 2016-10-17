<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('users', function ($collection) {
            $collection->increments('id');
            $collection->index('name');
            $collection->index('email');
            $collection->string('avatar', 250);
            $collection->index('provider');
            $collection->json('extras');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('users');
    }
}
