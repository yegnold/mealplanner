<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
    ?>

	<?php
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
            <h1>Yarnold's Meal Planner</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<a style="color:#fff;" href="<?php echo $this->Html->url(array('controller' => 'planner', 'action' => 'index', 'admin' => false)); ?>">
				Back to planner
			</a>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
