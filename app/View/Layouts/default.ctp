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
	<link href='http://fonts.googleapis.com/css?family=Ruda:400,700' rel='stylesheet' type='text/css'>
	<?php
        echo $this->Html->css('mealplanner');
		echo $this->Html->css('mealplanner.print', null, array('media' => 'print'));

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
			
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
