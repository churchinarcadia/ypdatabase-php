<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting[]|\Cake\Collection\CollectionInterface $meetings
 */
?>
<div class="meetings index content">
    <?= $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
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
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetings as $meeting): ?>
                <tr>
                    <td><?= $this->Number->format($meeting->id) ?></td>
                    <td><?= h($meeting->date) ?></td>
                    <td><?= h($meeting->start_time) ?></td>
                    <td><?= h($meeting->end_time) ?></td>
                    <td><?= $meeting->has('meeting_type') ? $this->Html->link($meeting->meeting_type->name, ['controller' => 'MeetingTypes', 'action' => 'view', $meeting->meeting_type->id]) : '' ?></td>
                    <td><?= $this->Number->format($meeting->meeting_location_id) ?></td>
                    <td><?= $this->Number->format($meeting->creator) ?></td>
                    <td><?= h($meeting->created) ?></td>
                    <td><?= $this->Number->format($meeting->modifier) ?></td>
                    <td><?= h($meeting->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meeting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meeting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?>
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
