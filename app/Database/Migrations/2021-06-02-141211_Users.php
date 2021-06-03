<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama'       	 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat'         => [
				'type'       => 'TEXT',
			],
			'tempat_lahir'   => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tanggal_lahir'  => [
				'type'       => 'DATE',
			],
			'jenis_kelamin'  => [
				'type' => 'ENUM("laki-laki","perempuan")',
				'default' => 'laki-laki',
				'null' => FALSE,
			],
			'telepon'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'avatar'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
