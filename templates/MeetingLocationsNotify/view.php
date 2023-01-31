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
            <?= $this->Html->link(__('Edit Meeting Locations Notify'), ['action' => 'edit', $meetingLocationsNotify->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Meeting Locations Notify'), ['action' => 'delete', $meetingLocationsNotify->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Meeting Locations Notify'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Meeting Locations Notify'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocationsNotify view content">
            <h3><?= h($meetingLocationsNotify->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Meeting Location') ?></th>
                    <td><?= $meetingLocationsNotify->has('meeting_location') ? $this->Html->link($meetingLocationsNotify->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meetingLocationsNotify->meeting_location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $meetingLocationsNotify->has('person') ? $this->Html->link($meetingLocationsNotify->person->id, ['controller' => 'People', 'action' => 'view', $meetingLocationsNotify->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($meetingLocationsNotify->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $this->Number->format($meetingLocationsNotify->creator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $this->Number->format($meetingLocationsNotify->modifier) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($meetingLocationsNotify->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($meetingLocationsNotify->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
