<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocation[]|\Cake\Collection\CollectionInterface $meetingLocations
 */
?>
<div class="meetingLocations index content">
    <?= $this->Html->link(__('New Meeting Location'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meeting Locations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('notify') ?></th>
                    <?php //TODO check for serving one or adminstrator usertype ?>
                    <th><?= $this->Paginator->sort('notes') ?></th>
                    <?php //TODO check for administrator usertype ?>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingLocations as $meetingLocation): ?>
                <tr>
                    <td><?= h($meetingLocation->id) ?></td>
                    <td><?= h($meetingLocation->name) ?></td>
                    <td><?= $meetingLocation->has('address') ? $this->Html->link($meetingLocation->address->full_address, ['controller' => 'Addresses', 'action' => 'view', $meetingLocation->address->id]) : '' ?></td>
                    <td><?= h($meetingLocation->active) ?></td>
                    <td><?= h($meetingLocation->notify) ?></td>
                    <?php //TODO check for serving one or adminstrator usertype ?>
                    <td><?= h($meetingLocation->notes) ?></td>
                    <?php //TODO check for administrator usertype ?>
                    <td><?= $meetingLocation->has('meeting_location_creator') ? $this->Html->link($meetingLocation->meeting_location_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingLocation->meeting_location_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($meetingLocation->created) ?></td>
                    <td><?= $meetingLocation->has('meeting_location_modifier') ? $this->Html->link($meetingLocation->meeting_location_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingLocation->meeting_location_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($meetingLocation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingLocation->id]) ?>
                        <?php //TODO check for serving one or adminstrator usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingLocation->id]) ?>
                        <?php //TODO check for administrator usertype
                        //$this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocation->id)]) ?>
                    </td>
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
