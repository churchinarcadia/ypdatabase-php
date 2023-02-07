<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting $meeting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one or admin usertype ?>
            <?= $this->Html->link(__('Edit Meeting'), ['action' => 'edit', $meeting->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Meeting'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO check for steward or above usertype ?>
            <?= $this->Html->link(__('List Meetings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for serving one usertype ?>
            <?= $this->Html->link(__('New Meeting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetings view content">
            <h3><?= h($meeting->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($meeting->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($meeting->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($meeting->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($meeting->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meeting Type') ?></th>
                    <td><?= $meeting->has('meeting_type') ? $this->Html->link($meeting->meeting_type->name, ['controller' => 'MeetingTypes', 'action' => 'view', $meeting->meeting_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Meeting Location') ?></th>
                    <td><?= $meeting->has('meeting_location') ? $this->Html->link($meeting->meeting_location->name, ['controller' => 'MeetingLocations', 'action' => 'view', $meeting->meeting_location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $meeting->has('meeting_creator') ? $this->Html->link($meeting->meeting_creator->username, ['controller' => 'Users', 'action' => 'view', $meeting->meeting_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meeting->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $meeting->has('meeting_modifier') ? $this->Html->link($meeting->meeting_modifier->username, ['controller' => 'Users', 'action' => 'view', $meeting->meeting_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meeting->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Meeting People') ?></h4>
                <?php if (!empty($meeting->meeting_people)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Meeting Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($meeting->meeting_people as $meetingPeople) : ?>
                        <tr>
                            <td><?= h($meetingPeople->id) ?></td>
                            <td><?= h($meetingPeople->meeting_id) ?></td>
                            <td><?= h($meetingPeople->person_id) ?></td>
                            <td><?= h($meetingPeople->creator) ?></td>
                            <td><?= h($meetingPeople->created) ?></td>
                            <td><?= h($meetingPeople->modifier) ?></td>
                            <td><?= h($meetingPeople->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MeetingPeople', 'action' => 'view', $meetingPeople->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MeetingPeople', 'action' => 'edit', $meetingPeople->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MeetingPeople', 'action' => 'delete', $meetingPeople->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingPeople->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
