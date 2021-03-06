<div id="left">
    
</div>

<div id="main">
	<?php if(!empty($shopping_list)) { ?>
	<h2>Generated Shopping List</h2>
	<p class="small-print-intro">
		Covering dates:
		<?php
		$dates_for_display = array();
		foreach($this->data['generate_shopping_list_dates'] as $date_covered) { 
			$dates_for_display[] =  $this->Time->format('D j F Y', $date_covered);
		}
		echo implode(', ', $dates_for_display);
		?>
	</p>
	<p class="small-print-intro"><a href="<?php echo $this->Html->url(array('action' => 'index')); ?>">go back to planner</a></p>
	<?php $shopping_list_halved = array_chunk($shopping_list, ceil(count($shopping_list)/2), true); ?>
	<?php foreach($shopping_list_halved as $half_shopping_list)  { ?>
	<ul class="shopping-list">
		<?php foreach($half_shopping_list as $shopping_list_item) { 
			?>
		<li><?php echo h($shopping_list_item['name']); ?> 
			<br />
			<small><?php echo $shopping_list_item['instances']; ?> uses</small><br />
			<ul class="use-list"">
			<?php foreach($shopping_list_item['meals'] as $meal_using_ingredient) {
				?>
				<li>
				<?php echo h($meal_using_ingredient['Participant']['name']); ?> - <?php echo ($meal_using_ingredient['ScheduledMeal']['meal_type'] == 'L' ? 'Lunch' : 'Dinner'); ?> <?php echo $this->Time->format('D j F', $meal_using_ingredient['ScheduledMeal']['date']); ?> - <?php echo h($meal_using_ingredient['Meal']['name']); ?>
				</li>
				<?php
			} ?>
			</ul>
		</li>
			<?php
		} ?>
	</ul>
	<?php } ?>
	<?php } ?>
</div>