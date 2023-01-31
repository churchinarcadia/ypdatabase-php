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
                    <th><?= $this->Paginator->sort('notes') ?></th>
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
                    <td><?= $this->Number->format($meetingLocation->id) ?></td>
                    <td><?= h($meetingLocation->name) ?></td>
                    <td><?= $meetingLocation->has('address') ? $this->Html->link($meetingLocation->address->id, ['controller' => 'Addresses', 'action' => 'view', $meetingLocation->address->id]) : '' ?></td>
                    <td><?= h($meetingLocation->active) ?></td>
                    <td><?= h($meetingLocation->notify) ?></td>
                    <td><?= h($meetingLocation->notes) ?></td>
                    <td><?= $this->Number->format($meetingLocation->creator) ?></td>
                    <td><?= h($meetingLocation->created) ?></td>
                    <td><?= $this->Number->format($meetingLocation->modifier) ?></td>
                    <td><?= h($meetingLocation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingLocation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingLocation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocation->id)]) ?>
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
