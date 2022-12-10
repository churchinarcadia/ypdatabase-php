<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingType[]|\Cake\Collection\CollectionInterface $meetingTypes
 */
?>
<div class="meetingTypes index content">
    <?= $this->Html->link(__('New Meeting Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meeting Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingTypes as $meetingType): ?>
                <tr>
                    <td><?= $this->Number->format($meetingType->id) ?></td>
                    <td><?= h($meetingType->name) ?></td>
                    <td><?= $this->Number->format($meetingType->creator) ?></td>
                    <td><?= h($meetingType->created) ?></td>
                    <td><?= $this->Number->format($meetingType->modifier) ?></td>
                    <td><?= h($meetingType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingType->id)]) ?>
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
