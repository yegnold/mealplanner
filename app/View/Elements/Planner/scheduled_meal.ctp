<span class="meal scheduled-meal<?php if($scheduled_meal['ScheduledMeal']['is_disabled']) { ?> disabled-meal<?php } ?>" id="planned-meal-<?php echo $scheduled_meal['ScheduledMeal']['id']; ?>">
	<?php if($scheduled_meal['ScheduledMeal']['is_disabled']) { ?>
		- &nbsp; -
	<?php } else { ?>
		<?php echo h($scheduled_meal['Meal']['name']); ?>
	<?php } ?>
</span>