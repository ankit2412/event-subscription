<?php
$form_id = get_post_meta($_REQUEST['post'], 'event_subscription_from_id', true);
$entries = GFAPI::get_entries( $form_id );

if(!empty($entries)){
    echo '<table broder="0">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Email</th>';
    echo '<th>Phone</th>';
    echo '<th>Country</th>';
    echo '<th>City</th>';
    echo '<th>Pincode</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($entries as $entry ){
        echo '<tr>';
        echo '<td>'.$entry['2.3'].'</td>';
        echo '<td>'.$entry['3.6'].'</td>';
        echo '<td>'.$entry['4'].'</td>';
        echo '<td>'.$entry['5'].'</td>';
        echo '<td>'.$entry['6'].'</td>';
        echo '<td>'.$entry['7'].'</td>';
        echo '<td>'.$entry['8'].'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
else{
    echo '<p>No user subscribed for this event yet!!!!';
}