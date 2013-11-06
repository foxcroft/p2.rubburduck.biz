<head>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>

<body>

	<h1>The Yello Reel</h1>
	<h2><a href="/users/profile">My Yello</a> |
    	<a href="/posts/add">Yello something</a> | <a href="/users/logout">Logoff</a></h2>

	<?php foreach($posts as $post): ?>

		<p>
			<span id="poster_name"><strong><?=$post['first_name']?></strong>
			<?=$post['last_name']?><br></span>
			<?=$post['content']?><br>

			<?php if (isset($likes[$post['post_id']])): ?>
				LIKE CITY
			<?php else: ?>
				<a href="/posts/like/<?=$post['post_id']?>">LIKE</a>
			<?php endif; ?>

		</p>

	<?php endforeach; ?>

</body>