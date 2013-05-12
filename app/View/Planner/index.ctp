<?php
// <script data-main="scripts/main" src="js/require-min.js"></script>
$this->Html->script('require-min', array('inline' => false, 'data-main' => $this->Html->url('/js/main.js')));
?>

<div id="left">
    <h2>Meals</h2>
    <ul id="meal-list">
        <?php foreach($default_meal_list as $meal) { ?>
        <li draggable="true" class="meal plannable-meal" id="meal-<?php echo $meal['Meal']['id']; ?>"><?php echo h($meal['Meal']['name']); ?></li>
    <?php } ?>
    </ul>
</div>

<div id="main">
	<form method="post" action="<?php echo $this->Html->url(array('action' => 'shopping_list')); ?>">
    <table id="planner-table">
        <tr>
            <th></th>
            <?php foreach($days as $d_k => $date) { ?>
            <th>
                <label for="date_checkbox_<?php echo $d_k; ?>"><?php echo $this->Time->format('D j F', $date); ?></label>
				<input type="checkbox" id="date_checkbox_<?php echo $d_k; ?>" name="data[generate_shopping_list_dates][]" value="<?php echo h($date); ?>" <?php if(!empty($this->data['generate_shopping_list_dates']) && in_array($date, $this->data['generate_shopping_list_dates'])) { ?> checked="checked"<?php } ?> />
            </th>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo count($days) + 1; ?>">&nbsp;</td>
        </tr>
        <?php foreach($participants as $participant_id => $participant) { ?>
        <tr>
            <th class="row-heading">
                Lunch - <?php echo h($participant); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td>
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
            <td colspan="<?php echo count($days) + 1; ?>">&nbsp;</td>
        </tr>
        <?php foreach($participants as $participant_id => $participant) { ?>
        <tr>
            <th class="row-heading">
                Dinner - <?php echo h($participant); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td>
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
    </table>
		
	<div id="bin">
		<br />
		Drag meals here to cancel
	</div>
	<p>
		<input type="submit" value="Show Shopping List for Selected Days" />
	</p>
	</form>
	
	
</div>