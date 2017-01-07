<?php

class Role extends Model {
	private $name;

	function __construct($values) {
		$this->name = $values['name'];
	}

	static function getTableName() {
		return "roles";
	}

	protected function has_and_belongs_to_many() {
		return [
			"users" => [
				"class_name" => "User",
				"join_table" => "roles_users",
				"foreign_key" => "role_id",
				"association_key" => "user_id"],
		];
	}

	protected function has_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}
}