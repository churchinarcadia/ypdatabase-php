<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting[]|\Cake\Collection\CollectionInterface $meetings
 */
?>
<div class="meetings index content">
    <?php
        if ($permissions['meeting']['add']) {
            echo $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'button float-right']);
        }
    ?>
    <h3><?= __('Meetings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th><?= $this->Paginator->sort('meeting_type_id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_location_id') ?></th>
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
                <?php foreach ($meetings as $meeting): ?>
                <tr>
                    <td><?= h($meeting->id) ?></td>
                    <td><?= h($meeting->date) ?></td>
                    <td><?= h($meeting->start_time) ?></td>
                    <td><?= h($meeting->end_time) ?></td>
                    <td><?= $meeting->has('meeting_type') ? $this->Html->link($meeting->meeting_type->name, ['controller' => 'MeetingTypes', 'action' => 'view', $meeting->meeting_type->id]) : '' ?></td>
                    <td><?= $meeting->has('meeting_location') ? $this->Html->link($meeting->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meeting->meeting_location->id]) : '' ?></td>
                    <?php
                        if ($logged_in_user->user_type_id == 1) {
                            ?>
                            <td><?= $meeting->has('meeting_creator') ? $this->Html->link($meeting->meeting_creator->username, ['controller' => 'Users', 'action' => 'view', $meeting->meeting_creator->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meeting->created) ?></td>
                            <td><?= $meeting->has('meeting_modifier') ? $this->Html->link($meeting->meeting_modifier->username, ['controller' => 'Users', 'action' => 'view', $meeting->meeting_modifier->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meeting->modified) ?></td>
                            <?php
                        }
                        if (
                            $permissions['meeting'][$meeting->id]['can']['view'] ||
                            $permissions['meeting'][$meeting->id]['can']['edit'] ||
                            $permissions['meeting'][$meeting->id]['can']['delete']
                        ) {
                            ?>
                            <td class="actions">
                            <?php
                            if ($permissions['meeting'][$meeting->id]['can']['view']) {
                                echo $this->Html->link(__('View'), ['action' => 'view', $meeting->id]);
                            }
                            if ($permissions['meeting'][$meeting->id]['can']['edit']) {
                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $meeting->id]);
                            }
                            if ($permissions['meeting'][$meeting->id]['can']['delete']) {
                                echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]);
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
