<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingPerson[]|\Cake\Collection\CollectionInterface $meetingPeople
 */
?>
<div class="meetingPeople index content">
    <?php
        if ($permissions['meeting_people']['add']) {
            echo $this->Html->link(__('New Meeting Person'), ['action' => 'add'], ['class' => 'button float-right']);
        }
    ?>
    <h3><?= __('Meeting People') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('meeting_id') ?></th>
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
                <?php foreach ($meetingPeople as $meetingPerson): ?>
                <tr>
                    <td><?= h($meetingPerson->id) ?></td>
                    <td><?= $meetingPerson->has('meeting') ? $this->Html->link($meetingPerson->meeting->identifier, ['controller' => 'Meetings', 'action' => 'view', $meetingPerson->meeting->id]) : '' ?></td>
                    <td><?= $meetingPerson->has('person') ? $this->Html->link($meetingPerson->person->full_name, ['controller' => 'People', 'action' => 'view', $meetingPerson->person->id]) : '' ?></td>
                    <?php
                        if ($logged_in_user->user_type_id == 1) {
                            ?>
                            <td><?= $meetingPerson->has('meeting_people_creator') ? $this->Html->link($meetingPerson->meeting_people_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingPerson->meeting_people_creator->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meetingPerson->created) ?></td>
                            <td><?= $meetingPerson->has('meeting_people_modifier') ? $this->Html->link($meetingPerson->meeting_people_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingPerson->meeting_people_modifier->id]) : '' ?></td>
                            <td><?= $this->Timezone->convert_timezone($meetingPerson->modified) ?></td>
                            <?php
                        }
                        if (
                            $this->permissions['meeting_person'][$meetingPerson->id]['can']['view'] ||
                            $this->permissions['meeting_person'][$meetingPerson->id]['can']['edit'] ||
                            $this->permissions['meeting_person'][$meetingPerson->id]['can']['delete']
                        ) {
                            ?>
                            <td class="actions">
                            <?php
                            if ($this->permissions['meeting_person'][$meetingPerson->id]['can']['view']) {
                                echo $this->Html->link(__('View'), ['action' => 'view', $meetingPerson->id]);
                            }
                            if ($this->permissions['meeting_person'][$meetingPerson->id]['can']['edit']) {
                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $meetingPerson->id]);
                            }
                            if ($this->permissions['meeting_person'][$meetingPerson->id]['can']['delete']) {
                                echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $meetingPerson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingPerson->id)]);
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
