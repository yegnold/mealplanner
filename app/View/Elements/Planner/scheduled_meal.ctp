<span draggable="true" 
	  class="meal scheduled-meal<?php if($scheduled_meal['ScheduledMeal']['is_disabled']) { ?> disabled-meal<?php } ?>" 
	  data-date="<?php echo $scheduled_meal['ScheduledMeal']['date']; ?>" 
	  data-id="<?php echo $scheduled_meal['ScheduledMeal']['id']; ?>"
	  data-meal_id="<?php echo $scheduled_meal['ScheduledMeal']['meal_id']; ?>"
	  data-meal_type="<?php echo $scheduled_meal['ScheduledMeal']['meal_type']; ?>"
	  data-is_disabled="<?php echo $scheduled_meal['ScheduledMeal']['is_disabled']; ?>"
	  data-participant_id = "<?php echo $scheduled_meal['ScheduledMeal']['participant_id']; ?>"
	  >
	<?php if($scheduled_meal['ScheduledMeal']['is_disabled']) { ?>
		- &nbsp; -
	<?php } else { ?>
		<?php echo h($scheduled_meal['Meal']['name']); ?>
	<?php } ?>
</span>