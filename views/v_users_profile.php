<head>
	<link rel="stylesheet" type="text/css" href="/css/default.css">
</head>

<body>

	<!-- list the profile owner (me) -->
	<?php if(isset($user_name)): ?>

	    <h1>Yello, <?=$user_name?>!</h1>
	    <h2><a href="/posts">The Yello Reel</a> |
	    	<a href="/posts/add">Yello Out</a> |
	    	<a href="/posts/users">Follo</a> | 
	    	<a href="/users/logout">Logoff</a></h2>
	    <br>
	    <h2>What have you been saying lately?</h2>

	<?php else: ?>
	    <h1>No user has been specified</h1>
	<?php endif; ?>

	<!-- list out my posts -->
	<p>
		<?php foreach($posts as $post): ?>

			<span id="poster_name"><strong><?=$post['first_name']?></strong>
			<?=$post['last_name']?></span>

			<?php $post_time = Time::display($post['created']);?>
			<span id="post_time"><?php echo $post_time;?></span><br>

			<?=$post['content']?><br>
			<a href="/posts/delete/<?=$post['post_id']?>" id="sub_line">DELETE</a>

			<br><br>

		<?php endforeach; ?>
	</p>

</body>