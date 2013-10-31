<?php foreach($posts as $post): ?>

	<strong><?=$post['first_name']?></strong>
	<?=$post['last_name']?><br>

	<?=$post['content']?><br><br>

<?php endforeach; ?>