<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Collection\CollectionInterface $meetingLocationsNotify
 */
?>
<div class="meetingLocationsNotify index content">
    <?= $this->Html->link(__('New Meeting Locations Notify'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meeting Locations Notify') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_location_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingLocationsNotify as $meetingLocationsNotify): ?>
                <tr>
                    <td><?= $this->Number->format($meetingLocationsNotify->id) ?></td>
                    <td><?= $meetingLocationsNotify->has('meeting_location') ? $this->Html->link($meetingLocationsNotify->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meetingLocationsNotify->meeting_location->id]) : '' ?></td>
                    <td><?= $meetingLocationsNotify->has('person') ? $this->Html->link($meetingLocationsNotify->person->id, ['controller' => 'People', 'action' => 'view', $meetingLocationsNotify->person->id]) : '' ?></td>
                    <td><?= $this->Number->format($meetingLocationsNotify->creator) ?></td>
                    <td><?= h($meetingLocationsNotify->created) ?></td>
                    <td><?= $this->Number->format($meetingLocationsNotify->modifier) ?></td>
                    <td><?= h($meetingLocationsNotify->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingLocationsNotify->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingLocationsNotify->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingLocationsNotify->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id)]) ?>
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
