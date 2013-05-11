<div id="left">
    <h2>Meals</h2>
    <ul>
        <li>Meals listed here</li>
        <li>Meals listed here</li>
        <li>Meals listed here</li>
        <li>Meals listed here</li>
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
                Meal
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
                Meal
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</div>