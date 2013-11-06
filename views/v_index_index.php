<head>

	<link rel="stylesheet" type="text/css" href="css/default.css">

</head>

<body>

	<?php if($user): ?>

		<h1>LISTEN to that noise, <?=$user->first_name;?>!</h1>

		<h2>But wouldn't you prefer <span id="your_spot"><a href="/users/profile">your spot</a></span>, where you can control it?</h2>

		<!-- list out my posts -->
		<p>
			<?php foreach($posts as $post): ?>

				<span id="poster_name"><strong><?=$post['first_name']?></strong>
				<?=$post['last_name']?></span>
				<?php $post_time = Time::display($post['created']);?>
				<span id="post_time"><?php echo $post_time;?></span><br>

				<?=$post['content']?>
				<br><br>

			<?php endforeach; ?>
		</p>

	
	<?php else: ?>
		<h1 id="main_page">YELLO!<br></h1>
		<h2 id="main_page"><a href="/users/signup">Register</a> or <a href="/users/login">Sign in</a></h2>
	<?php endif; ?>

	<br><br><br>

	<h2>Two +1 Features:</h2>
	<p><strong>Delete Post</strong> -- This feature appears on the main profile page for any user.
		Accessible (after logging in) by visiting
		<a href="p2.rubburduck.biz/users/profile">p2.rubburduck.biz/users/profile</a>,
		or clicking My Yello from most pages. It appears as 'DELETE' beneath posts.</p>
	<p><strong>Like Post</strong> -- This feature appears on the Yello Reel page
		(which shows all posts by people the user is following). Accessible (after logging in) by visiting
		<a href="p2.rubburduck.biz/posts/users">p2.rubburduck.biz/posts/users</a>,
		or clicking Yello Reel from most pages. It appears as 'LIKE' beneath posts.</p>

</body>