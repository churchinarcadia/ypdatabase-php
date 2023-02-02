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
                    <?php //TODO check for admin usertype ?>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <?php //TODO check for steward usertype or above ?>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingTypes as $meetingType): ?>
                <tr>
                    <td><?= h($meetingType->id) ?></td>
                    <td><?= h($meetingType->name) ?></td>
                    <?php //TODO check for admin usertype ?>
                    <td><?= $meetingType->has('meeting_type_creator') ? $this->Html->link($meetingType->meeting_type_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingType->meeting_type_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($meetingType->created) ?></td>
                    <td><?= $meetingType->has('meeting_type_modifier') ? $this->Html->link($meetingType->meeting_type_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingType->meeting_type_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($meetingType->modified) ?></td>
                    <?php //TODO check for steward usertype or above ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingType->id]) ?>
                        <?php //TODO check for serving one or admin usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingType->id]) ?>
                        <?php //TODO check for admin usertype
                        //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingType->id)]) ?>
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
