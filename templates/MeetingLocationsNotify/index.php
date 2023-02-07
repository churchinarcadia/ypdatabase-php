<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Collection\CollectionInterface $meetingLocationsNotify
 */
?>
<div class="meetingLocationsNotify index content">
    <?php
        if ($permissions['meeting_location_notify']['add']) {
            echo $this->Html->link(__('New Meeting Locations Notify'), ['action' => 'add'], ['class' => 'button float-right']);
        }
    ?>
    <h3><?= __('Meeting Locations Notify') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_location_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <?php
                        if ($logged_in_user->user_type_id == 1) {
                            ?>
                            <th><?= $this->Paginator->sort('creator') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modifier') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <?php
                        }
                        if (in_array($logged_in_user->user_type_id, [1, 2, 3])) {
                            ?>
                            <th class="actions"><?= __('Actions') ?></th>
                            <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingLocationsNotify as $meetingLocationsNotify_entry): ?>
                <tr>
                    <td><?= h($meetingLocationsNotify_entry->id) ?></td>
                    <td><?= $meetingLocationsNotify_entry->has('meeting_location') ? $this->Html->link($meetingLocationsNotify_entry->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meetingLocationsNotify_entry->meeting_location->id]) : '' ?></td>
                    <td><?= $meetingLocationsNotify_entry->has('person') ? $this->Html->link($meetingLocationsNotify_entry->person->full_name, ['controller' => 'People', 'action' => 'view', $meetingLocationsNotify_entry->person->id]) : '' ?></td>
                    <?php
                        if ($logged_in_user->user_type_id == 1) {
                            ?>
                            <td><?= $meetingLocationsNotify_entry->has('meeting_location_notify_creator') ? $this->Html->link($meetingLocationsNotify_entry->meeting_location_notify_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify_entry->meeting_location_notify_creator->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meetingLocationsNotify_entry->created) ?></td>
                            <td><?= $meetingLocationsNotify_entry->has('meeting_location_notify_modifier') ? $this->Html->link($meetingLocationsNotify_entry->meeting_location_notify_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingLocationsNotify_entry->meeting_location_notify_modifier->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meetingLocationsNotify_entry->modified) ?></td>
                            <?php
                        }
                        if (
                            $permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['view'] ||
                            $permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['edit'] ||
                            $permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['delete']
                        ) {
                            ?>
                            <td class="actions">
                            <?php
                            if ($permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['view']) {
                                echo $this->Html->link(__('View'), ['action' => 'view', $meetingLocationsNotify_entry->id]);
                            }
                            if ($permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['edit']) {
                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $meetingLocationsNotify_entry->id]);
                            }
                            if ($permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['delete']) {
                                echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingLocationsNotify_entry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify_entry->id)]);
                            }
                            ?>
                            </td>
                            <?php
                        }
                    ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
