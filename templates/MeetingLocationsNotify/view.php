<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one or admin usertype ?>
            <?= $this->Html->link(__('Edit Meeting Locations Notify'), ['action' => 'edit', $meetingLocationsNotify->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Meeting Locations Notify'), ['action' => 'delete', $meetingLocationsNotify->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO check for steward or above usertype ?>
            <?= $this->Html->link(__('List Meeting Locations Notify'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Meeting Locations Notify'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
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
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $meetingLocationsNotify->has('meeting_location_notify_creator') ? $this->Html->link($meetingLocationsNotify->meeting_location_notify_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify->meeting_location_notify_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->converted_timezone($meetingLocationsNotify->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $meetingLocationsNotify->has('meeting_location_notify_modifier') ? $this->Html->link($meetingLocationsNotify->meeting_location_notify_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify->meeting_location_notify_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->converted_timezone($meetingLocationsNotify->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
