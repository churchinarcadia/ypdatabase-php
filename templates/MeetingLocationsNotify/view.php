<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php
                if (
                    $permissions['meeting_location_notify']['add'] ||
                    $permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['edit'] ||
                    $permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['delete']
                ) {
                    ?>
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?php
                }
                if ($permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['edit']) {
                    echo $this->Html->link(__('Edit Meeting Locations Notify'), ['action' => 'edit', $meetingLocationsNotify->id], ['class' => 'side-nav-item']);
                }
                if ($permissions['meeting_location_notify'][$meetingLocationsNotify->id]['can']['delete']) {
                    echo $this->Form->postLink(__('Delete Meeting Locations Notify'), ['action' => 'delete', $meetingLocationsNotify->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id), 'class' => 'side-nav-item']);
                }
                if (true) {
                    echo $this->Html->link(__('List Meeting Locations Notify'), ['action' => 'index'], ['class' => 'side-nav-item']);
                }
                if ($permissions['meeting_location_notify']['add']) {
                    echo $this->Html->link(__('New Meeting Locations Notify'), ['action' => 'add'], ['class' => 'side-nav-item']);
                }
            ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocationsNotify view content">
            <h3><?= h($meetingLocationsNotify->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($meetingLocationsNotify->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meeting Location') ?></th>
                    <td><?= $meetingLocationsNotify->has('meeting_location') ? $this->Html->link($meetingLocationsNotify->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meetingLocationsNotify->meeting_location->id]) : '' ?></td>
                </tr> 
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $meetingLocationsNotify->has('person') ? $this->Html->link($meetingLocationsNotify->person->id, ['controller' => 'People', 'action' => 'view', $meetingLocationsNotify->person->id]) : '' ?></td>
                </tr>
                <?php
                    if ($logged_in_user->user_type_id == 1) {
                        ?>
                        <tr>
                            <th><?= __('Creator') ?></th>
                            <td><?= $meetingLocationsNotify->has('meeting_location_notify_creator') ? $this->Html->link($meetingLocationsNotify->meeting_location_notify_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify->meeting_location_notify_creator->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= $this->Timezone->convert_timezone($meetingLocationsNotify->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modifier') ?></th>
                            <td><?= $meetingLocationsNotify->has('meeting_location_notify_modifier') ? $this->Html->link($meetingLocationsNotify->meeting_location_notify_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify->meeting_location_notify_modifier->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= $this->Timezone->convert_timezone($meetingLocationsNotify->modified) ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>
