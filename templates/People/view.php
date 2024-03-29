<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one or admin usertype ?>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO check for steward usertype or above ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for serving one or admin usertype ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($person->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Middle Name') ?></th>
                    <td><?= h($person->middle_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($person->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($person->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= $this->Number->format($person->district) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile Phone') ?></th>
                    <td><?= h($person->mobile_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Call Or Text') ?></th>
                    <td><?= h($person->call_or_text) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Home Phone') ?></th>
                    <td><?= h($person->home_phone) ?></td>
                </tr>
                <?php //TODO change to grade ?>
                <tr>
                    <th><?= __('Hs Grad Year') ?></th>
                    <td><?= $this->Number->format($person->hs_grad_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $person->has('address') ? $this->Html->link($person->address->full_address, ['controller' => 'Addresses', 'action' => 'view', $person->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Father') ?></th>
                    <td><?= $person->has('father') ? $this->Html->link($person->father->full_name, ['controller' => 'People', 'action' => 'view', $person->father->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mother') ?></th>
                    <td><?= $person->has('mother') ? $this->Html->link($person->mother->full_name, ['controller' => 'People', 'action' => 'view', $person->mother->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Baptized') ?></th>
                    <td><?= $person->baptized ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $person->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $person->has('person_creator') ? $this->Html->link($person->person_creator->full_name, ['controller' => 'Users', 'action' => 'view', $person->person_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->convert_timezone($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $person->has('person_modifier') ? $this->Html->link($person->person_modifier->full_name, ['controller' => 'Users', 'action' => 'view', $person->person_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->convert_timezone($person->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($person->notes)); ?>
                </blockquote>
            </div>
            <?php //TODO check for serving one or admin usertype ?>
            <div class="text">
                <strong><?= __('Internal Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($person->internal_notes)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Meeting People') ?></h4>
                <?php if (!empty($person->meeting_people)) : ?>
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
                        <?php foreach ($person->meeting_people as $meetingPeople) : ?>
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
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($person->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('User Type Id') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->person_id) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->status) ?></td>
                            <td><?= h($users->user_type_id) ?></td>
                            <td><?= h($users->creator) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modifier) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
