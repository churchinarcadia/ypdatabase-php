<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingPerson[]|\Cake\Collection\CollectionInterface $meetingPeople
 */
?>
<div class="meetingPeople index content">
    <?= $this->Html->link(__('New Meeting Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Meeting People') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetingPeople as $meetingPerson): ?>
                <tr>
                    <td><?= $this->Number->format($meetingPerson->id) ?></td>
                    <td><?= $meetingPerson->has('meeting') ? $this->Html->link($meetingPerson->meeting->id, ['controller' => 'Meetings', 'action' => 'view', $meetingPerson->meeting->id]) : '' ?></td>
                    <td><?= $meetingPerson->has('person') ? $this->Html->link($meetingPerson->person->id, ['controller' => 'People', 'action' => 'view', $meetingPerson->person->id]) : '' ?></td>
                    <td><?= $this->Number->format($meetingPerson->creator) ?></td>
                    <td><?= h($meetingPerson->created) ?></td>
                    <td><?= $this->Number->format($meetingPerson->modifier) ?></td>
                    <td><?= h($meetingPerson->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meetingPerson->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meetingPerson->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingPerson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingPerson->id)]) ?>
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
