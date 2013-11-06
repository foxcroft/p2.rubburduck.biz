<head>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>

<body>

	<h1>The Yello Reel</h1>
	    <h2><a href="/users/profile">My Yello</a> |
	    	<a href="/posts/add">Yello Out</a> |
	    	<a href="/posts/users">Follo</a> | 
	    	<a href="/users/logout">Logoff</a></h2>

	<?php foreach($posts as $post): ?>

		<p>
			<span id="poster_name"><strong><?=$post['first_name']?></strong>
			<?=$post['last_name']?></span>
			<?php $post_time = Time::display($post['created']);?>
			<span id="post_time"><?php echo $post_time;?></span><br>
			<?=$post['content']?><br>

			<span id="sub_line">
				<?php if (isset($likes[$post['post_id']])): ?>
					YELLO!
				<?php else: ?>
					<a href="/posts/like/<?=$post['post_id']?>">LIKE</a>
				<?php endif; ?>
				| POPULARITY (<?=$post['tot_likes']?>)
			</spam>

		</p>

	<?php endforeach; ?>

</body>