<?php

class posts_controller extends base_controller {

	public function add() {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');

            // die('Not getting in that way! <br> <a href="/users/login">Log in</a>');

        }

		$this->template = View::instance("v_posts_add");
		$this->template->title = "Yello | Thoughts";

		echo $this->template;

	}

	public function p_add() {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');

            // die('Not getting in that way! <br> <a href="/users/login">Log in</a>');

        }

		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		DB::instance(DB_NAME)->insert('posts', $_POST);

		# check the post added to the database
		// print_r($_POST);

		Router::redirect("/users/profile");

	}

	public function index() {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');

            // die('Not getting in that way! <br> <a href="/users/login">Log in</a>');

        }

		$this->template->content = View::instance("v_posts_index");
		$this->template->title = 'Yello Reel';

		$q = 'SELECT 
				posts.content,
				posts.created,
				posts.post_id,
				posts.tot_likes,
				posts.user_id AS post_user_id,
				users_users.user_id AS follower_id,
        		users.first_name,
        		users.last_name
			FROM posts
			INNER JOIN users_users
				ON posts.user_id = users_users.user_id_followed
			INNER JOIN users
				ON posts.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;

		# old query type
		// $q = 'SELECT posts.*,
		// 		users.first_name,
		// 		users.last_name
		// 	FROM posts
		// 	INNER JOIN users
		// 		ON posts.user_id = users.user_id';

		$posts = DB::instance(DB_NAME)->select_rows($q);



		$q = 'SELECT *
				FROM posts_users
				WHERE user_id = '.$this->user->user_id;
		$likes = DB::instance(DB_NAME)->select_array($q, 'post_id');



		$this->template->content->posts = $posts;
		$this->template->content->likes = $likes;


		echo $this->template;

	}

	public function users() {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');

            // die('Not getting in that way! <br> <a href="/users/login">Log in</a>');

        }

		$this->template->content = View::instance("v_posts_users");
		$this->template->title = "Yello | Follo";

		$q = 'SELECT *
			FROM users';

		$users = DB::instance(DB_NAME)->select_rows($q);

		$q2 = 'SELECT *
			FROM users_users
			WHERE user_id = '.$this->user->user_id;

		$connections = DB::instance(DB_NAME)->select_array($q2, 'user_id_followed');

		$this->template->content->users = $users;
		$this->template->content->connections = $connections;

		echo $this->template;

	}

	public function follow($user_id_followed) {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');

            // die('Not getting in that way! <br> <a href="/users/login">Log in</a>');

        }

		# prepare the data array to be inserted
		$data = Array(
			"created" 			=> Time::now(),
			"user_id" 			=> $this->user->user_id,
			"user_id_followed" 	=> $user_id_followed
			);

		# do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# Send them back
		Router::redirect("/posts/users");

	}

	public function unfollow($user_id_followed) {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');
        }

		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;

		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# Send them back
		Router::redirect("/posts/users");

	}

	public function delete($post_id) {

		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');
        }

		# delete this post
		$where_condition = 'WHERE posts.post_id = '.$post_id;


		DB::instance(DB_NAME)->delete('posts', $where_condition);

		# send them back to profile (i.e. refresh)
		Router::redirect('/users/profile');

	}

	public function like($post_id) {
	
		# verify the user
        if (!$this->user) {
        
            # trying to sneak in without being logged in, route to homepage
            Router::redirect('/');
        }
	
		# prepare data to be inserted in post_users table
		$data = Array(
			"created"	=> Time::now(),
			"post_id"	=> $post_id,
			"user_id"	=> $this->user->user_id
			);

		DB::instance(DB_NAME)->insert('posts_users', $data);

		# locate the field for number of likes a post has
		$q = 'SELECT
				posts.tot_likes
				FROM posts
				WHERE posts.post_id = '.$post_id;
		$total_likes = DB::instance(DB_NAME)->select_field($q);
		
		# increase total likes by 1
		$total_likes = $total_likes + 1;

		# set the new likes total into the table
		$data = Array("tot_likes" => $total_likes);

		DB::instance(DB_NAME)->update('posts', $data, 'WHERE post_id = '.$post_id);

		// DB::instance(DB_NAME)->update


		Router::redirect('/posts');

	}
}