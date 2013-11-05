<head>
	<link rel="stylesheet" type="text/css" href="/css/default.css">
</head>

<body>

	<h1>Yello, Friends!</h1>
    <h2><a href="/users/profile">Back to My Yello</a> |
    	<a href="/users/logout">Logoff</a></h2>
    <br>	
	
	<p>Feel like follo-ing anyone new?</p>
	<br>

	<?php foreach($users as $user): ?>

		<span id="poster_name"><h2 class="follow">
			<?=$user['first_name']?>
			<?=$user['last_name']?></span><br>
		</h2>

		<p class="follow">
			<?php if (isset($connections[$user['user_id']])): ?>
				<a href='/posts/unfollow/<?=$user['user_id']?>'>FOLLO</a>
			<?php else: ?>
				<a href='/posts/follow/<?=$user['user_id']?>'>UNFOLLO</a>
			<?php endif; ?>
		</p>
		<br>


	<?php endforeach; ?>
</body>