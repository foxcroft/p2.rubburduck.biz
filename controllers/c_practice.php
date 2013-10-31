<?php

class practice_controller extends base_controller {
	
	public function test_db () {

		# test insert for practice
		$qry = 'INSERT INTO users
				SET first_name = "Finn",
				last_name = "McKinnon"';


		# test update for practice
		$qry2 = 'UPDATE users
				SET email = "McFinn@gmail.com"
				WHERE first_name = "Finn"';

		# DB::instance(DB_NAME)->query($qry2);


		# test the insert_row method
		$new_user = Array(
			'first_name' => 'Marcelline',
			'last_name' => 'McKinnon',
			'email' => 'marcymac@gmail.com'
			);

		# DB::instance(DB_NAME)->insert('users', $new_user);

		$_POST['first_name'] = 'Marcelline';

		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		$qry3 = 'SELECT email
				FROM users
				WHERE first_name = "'.$_POST['first_name'].'"';

		echo DB::instance(DB_NAME)->select_field($qry3);

	}

}