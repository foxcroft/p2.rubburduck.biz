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
				<?=$post['last_name']?></span><br>

				<?=$post['content']?><br>
				<?php $post_time = Time::display($post['created']);?>
				<span id="post_time"><?php echo $post_time;?></span>
				<br><br>

			<?php endforeach; ?>
		</p>

	
	<?php else: ?>
		<h1>YELLO!<br></h1>
		<h2><a href="/users/signup">Register</a> or <a href="/users/login">sign in</a></h2>
	<?php endif; ?>

</body>