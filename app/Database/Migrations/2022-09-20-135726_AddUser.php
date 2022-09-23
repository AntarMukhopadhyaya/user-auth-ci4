<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "user_id" => [
                "type" => "INT",
                "null" => false,
                "auto_increment" => true,
                "unsigned" => true
            ],
            "first_name" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "last_name" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false
            ],
            "user_name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => false
            ],
            "user_email" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => false
            ],
            "user_phone_number" => [
                "type" => "VARCHAR",
                "constraint" => 50,
                "null" => true
            ],
            "user_password" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => false
            ],
            "created_at datetime default current_timestamp",
            "updated_at datetime default current_timestamp on update current_timestamp",
        ]);
        $this->forge->addPrimaryKey("user_id");

        $this->forge->createTable("users");
    }

    public function down()
    {
        //
        $this->forge->dropTable("users");
    }
}