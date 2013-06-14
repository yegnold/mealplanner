<?php
// <script data-main="scripts/main" src="js/require-min.js"></script>
$this->Html->script('require-min', array('inline' => false, 'data-main' => $this->Html->url('/js/main.js')));
?>

<div id="left">
    <h2>Available Meals</h2>
    <ul id="meal-list">
        <?php foreach($default_meal_list as $meal) { ?>
        <li draggable="true" class="meal plannable-meal" id="plannable-meal-<?php echo $meal['Meal']['id']; ?>" data-id="<?php echo $meal['Meal']['id']; ?>" data-name="<?php echo h($meal['Meal']['name']); ?>"><?php echo h($meal['Meal']['name']); ?></li>
    <?php } ?>
    </ul>
	<a href="<?php echo $this->Html->url(array('controller' => 'meals', 'action' => 'index', 'admin' => true)); ?>">
		Add or Edit Meals &rarr;
	</a>
</div>

<div id="main">
	<h2>Planned Meals</h2>
	<form method="post" action="<?php echo $this->Html->url(array('action' => 'shopping_list')); ?>">
	<a class="arrow prev"  href="<?php echo $this->Html->url(array('action' => 'index', $previous_day)); ?>">
		&larr;
	</a>
    <table id="planner-table" data-scheduled_meals_path="<?php echo $this->Html->url(array('controller' => 'scheduled_meals')); ?>">
        <tr>
            <th><input type="submit" value="Shopping List For:" /></th>
            <?php foreach($days as $d_k => $date) { ?>
            <th<?php if($date == date('Y-m-d')) { ?> class="today"<?php } ?>>
                <label for="date_checkbox_<?php echo $d_k; ?>"><?php echo $this->Time->format('D j F', $date); ?></label>
				<input type="checkbox" id="date_checkbox_<?php echo $d_k; ?>" name="data[generate_shopping_list_dates][]" value="<?php echo h($date); ?>" <?php if(!empty($this->data['generate_shopping_list_dates']) && in_array($date, $this->data['generate_shopping_list_dates'])) { ?> checked="checked"<?php } ?> />
            </th>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo count($days) + 1; ?>" class="spacer">&nbsp;</td>
        </tr>
        <?php foreach($participants as $participant_id => $participant) { ?>
        <tr>
            <th class="row-heading">
                Lunch - <?php echo h($participant); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td class="slot<?php if($date == date('Y-m-d')) { ?> today<?php } ?>" data-date="<?php echo $date; ?>" data-participant_id="<?php echo $participant_id; ?>" data-meal_type="L">
                <?php
				if(array_key_exists($date, $scheduled_meals) 
						&& array_key_exists($participant_id, $scheduled_meals[$date])
						&& array_key_exists('L', $scheduled_meals[$date][$participant_id])
						&& count($scheduled_meals[$date][$participant_id]['L'])) {
						foreach($scheduled_meals[$date][$participant_id]['L'] as $scheduled_meal) {
							echo $this->element('Planner/scheduled_meal', array('scheduled_meal' => $scheduled_meal));
						}
				}
				?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="<?php echo count($days) + 1; ?>" class="spacer">&nbsp;</td>
        </tr>
        <?php foreach($participants as $participant_id => $participant) { ?>
        <tr>
            <th class="row-heading">
                Dinner - <?php echo h($participant); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td class="slot<?php if($date == date('Y-m-d')) { ?> today<?php } ?>" data-date="<?php echo $date; ?>" data-participant_id="<?php echo $participant_id; ?>" data-meal_type="D">
                <?php
				if(array_key_exists($date, $scheduled_meals) 
						&& array_key_exists($participant_id, $scheduled_meals[$date])
						&& array_key_exists('D', $scheduled_meals[$date][$participant_id])
						&& count($scheduled_meals[$date][$participant_id]['D'])) {
						
						foreach($scheduled_meals[$date][$participant_id]['D'] as $scheduled_meal) {
							echo $this->element('Planner/scheduled_meal', array('scheduled_meal' => $scheduled_meal));
						}
				}
				?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
		<tr>
            <td colspan="<?php echo count($days) + 1; ?>" class="spacer">&nbsp;</td>
        </tr>
    </table>
	
	<a class="arrow next"  href="<?php echo $this->Html->url(array('action' => 'index', $next_day)); ?>">
		&rarr;
	</a>
	</form>
	<div id="bin" class="bin">
		<br />
		Drag meals here to cancel
	</div>
	
	
	
	
</div>