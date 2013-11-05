<head>
	<link rel="stylesheet" type="text/css" href="/css/default.css">
</head>

<!-- list the profile owner (me) -->
<?php if(isset($user_name)): ?>

    <h1>Yello, <?=$user_name?>!</h1>
    <h2>What have you been saying lately?</h2>
    <h2><a href="/posts">Yello out there?</a> |
    	<a href="/posts/add">Yello some more</a></h2>

<?php else: ?>
    <h1>No user has been specified</h1>
<?php endif; ?>

<!-- list out my posts -->
<?php foreach($posts as $post): ?>

	<strong><?=$post['first_name']?></strong>
	<?=$post['last_name']?><br>

	<?=$post['content']?><br><br>

<?php endforeach; ?>