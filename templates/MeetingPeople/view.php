<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingPerson $meetingPerson
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one usertype ?>
            <?= $this->Html->link(__('Edit Meeting Person'), ['action' => 'edit', $meetingPerson->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Meeting Person'), ['action' => 'delete', $meetingPerson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingPerson->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Meeting People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Html->link(__('New Meeting Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingPeople view content">
            <h3><?= h($meetingPerson->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($meetingPerson->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meeting') ?></th>
                    <td><?= $meetingPerson->has('meeting') ? $this->Html->link($meetingPerson->meeting->identifier, ['controller' => 'Meetings', 'action' => 'view', $meetingPerson->meeting->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $meetingPerson->has('person') ? $this->Html->link($meetingPerson->person->full_name, ['controller' => 'People', 'action' => 'view', $meetingPerson->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $meetingPerson->has('meeting_people_creator') ? $this->Html->link($meetingPerson->meeting_people_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingPerson->meeting_people_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meetingPerson->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $meetingPerson->has('meeting_people_modifier') ? $this->Html->link($meetingPerson->meeting_people_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingPerson->meeting_people_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meetingPerson->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
