<?php if($user): ?>
	Hi, <?=$user->first_name;?>
<?php else: ?>
	Welcome to the fun spot! Register or sign in
<?php endif; ?>
