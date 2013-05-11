<div id="left">
    <h2>Meals</h2>
    <ul id="meal-list">
        <?php foreach($default_meal_list as $meal) { ?>
        <li class="meal plannable-meal" id="meal-<?php echo $meal['Meal']['id']; ?>"><?php echo h($meal['Meal']['name']); ?></li>
    <?php } ?>
    </ul>
</div>

<div id="main">
    <table>
        <tr>
            <th></th>
            <?php foreach($days as $date) { ?>
            <th>
                <?php echo $this->Time->format('D j F', $date); ?>
            </th>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo count($days) + 1; ?>">&nbsp;</td>
        </tr>
        <?php foreach($participants as $participant) { ?>
        <tr>
            <th>
                Lunch - <?php echo h($participant['Participant']['name']); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td>
                <?php
				if(array_key_exists($date, $scheduled_meals) 
						&& array_key_exists($participant['Participant']['id'], $scheduled_meals[$date])
						&& array_key_exists('L', $scheduled_meals[$date][$participant['Participant']['id']])
						&& count($scheduled_meals[$date][$participant['Participant']['id']]['L'])) {
						foreach($scheduled_meals[$date][$participant['Participant']['id']]['L'] as $scheduled_meal) {
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
        <?php foreach($participants as $participant) { ?>
        <tr>
            <th>
                Dinner - <?php echo h($participant['Participant']['name']); ?>
            </th>
            <?php foreach($days as $date) { ?>
            <td>
                <?php
				if(array_key_exists($date, $scheduled_meals) 
						&& array_key_exists($participant['Participant']['id'], $scheduled_meals[$date])
						&& array_key_exists('D', $scheduled_meals[$date][$participant['Participant']['id']])
						&& count($scheduled_meals[$date][$participant['Participant']['id']]['D'])) {
						
						foreach($scheduled_meals[$date][$participant['Participant']['id']]['D'] as $scheduled_meal) {
							echo $this->element('Planner/scheduled_meal', array('scheduled_meal' => $scheduled_meal));
						}
				}
				?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</div>