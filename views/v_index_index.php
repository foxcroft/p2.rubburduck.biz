<head>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
	<?php if($user): ?>
		<h2>Hi, <?=$user->first_name;?></h2>
	<?php else: ?>
		<h1>YELLO!<br></h1>
		<h2><a href="/users/signup">Register</a> or <a href="/users/login">sign in</a></h2>
	<?php endif; ?>
</body>