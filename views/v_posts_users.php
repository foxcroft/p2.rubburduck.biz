<head>
	<link rel="stylesheet" type="text/css" href="/css/default.css">
</head>

<body>

	<h1>Yello, Friends!</h1>
	    <h2><a href="/posts">The Yello Reel</a> |
	    	<a href="/users/profile">My Yello</a> | 
	    	<a href="/posts/add">Yello Out</a> |
	    	<a href="/posts/users">Follo</a> | 
	    	<a href="/users/logout">Logoff</a></h2>
    <br>	
	
	<p>Feel like follo-ing anyone new?</p>
	<br>

	<?php foreach($users as $user): ?>

		<h2 class="follow">
			<?=$user['first_name']?>
			<?=$user['last_name']?><br>
		</h2>

		<p class="follow">
			<?php if (isset($connections[$user['user_id']])): ?>
				<a href='/posts/unfollow/<?=$user['user_id']?>'>UNFOLLO</a>
			<?php else: ?>
				<a href='/posts/follow/<?=$user['user_id']?>'>FOLLO</a>
			<?php endif; ?>
		</p>
		<br>


	<?php endforeach; ?>
</body>