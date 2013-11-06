<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		if($user) {
			Router::redirect('/users/profile');
		}

		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');

		# Collect all posts for main page display	
        $q = 'SELECT 
                posts.content,
                posts.created,
                posts.user_id,
                users.first_name,
                users.last_name
            FROM posts
            INNER JOIN users
                ON posts.user_id = users.user_id
            WHERE posts.user_id = users.user_id';

        $posts = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content->posts = $posts;

			
		# Now set the <title> tag
			$this->template->title = "Yello!";
	
		# CSS/JS includes
			/*
			$client_files_head = Array("");
	    	$this->template->client_files_head = Utils::load_client_files($client_files);
	    	
	    	$client_files_body = Array("");
	    	$this->template->client_files_body = Utils::load_client_files($client_files_body);   
	    	*/
	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	
} # End of class
