<?php

class Database extends \Laravel\Database {

	public static function tableExists($table)
	{
		$exists = \DB::only(
			'SELECT COUNT(*) as `exists`
			FROM information_schema.tables
			WHERE table_name IN (?)	AND table_schema = database()',
			$table
		);

		return (bool)$exists;
	}

}