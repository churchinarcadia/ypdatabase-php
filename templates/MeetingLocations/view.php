<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocation $meetingLocation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO Check for serving one usertype ?>
            <?= $this->Html->link(__('Edit Meeting Location'), ['action' => 'edit', $meetingLocation->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO Check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Meeting Location'), ['action' => 'delete', $meetingLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocation->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO available for steward and above ?>
            <?= $this->Html->link(__('List Meeting Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for serving one usertype ?>
            <?= $this->Html->link(__('New Meeting Location'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocations view content">
            <h3><?= h($meetingLocation->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($meetingLocation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($meetingLocation->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $meetingLocation->has('address') ? $this->Html->link($meetingLocation->address->full_address, ['controller' => 'Addresses', 'action' => 'view', $meetingLocation->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $meetingLocation->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify') ?></th>
                    <td><?= $meetingLocation->notify ? __('Yes') : __('No'); ?></td>
                </tr>
                <?php //TODO Check for serving one or admin usertype?>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= h($meetingLocation->notes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $meetingLocation->has('meeting_location_creator') ? $this->Html->link($meetingLocation->meeting_location_creator->username, ['controller' => 'Users', 'action' => 'view', $meetingLocation->meeting_location_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meetingLocation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $meetingLocation->has('meeting_location_modifier') ? $this->Html->link($meetingLocation->meeting_location_modifier->username, ['controller' => 'Users', 'action' => 'view', $meetingLocation->meeting_location_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->convert_timezone($meetingLocation->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Meeting Locations Notify') ?></h4>
                <?php if (!empty($meetingLocation->meeting_locations_notify)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Meeting Location Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($meetingLocation->meeting_locations_notify as $meetingLocationsNotify) : ?>
                        <tr>
                            <td><?= h($meetingLocationsNotify->id) ?></td>
                            <td><?= h($meetingLocationsNotify->meeting_location_id) ?></td>
                            <td><?= h($meetingLocationsNotify->person_id) ?></td>
                            <td><?= h($meetingLocationsNotify->creator) ?></td>
                            <td><?= h($meetingLocationsNotify->created) ?></td>
                            <td><?= h($meetingLocationsNotify->modifier) ?></td>
                            <td><?= h($meetingLocationsNotify->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MeetingLocationsNotify', 'action' => 'view', $meetingLocationsNotify->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MeetingLocationsNotify', 'action' => 'edit', $meetingLocationsNotify->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MeetingLocationsNotify', 'action' => 'delete', $meetingLocationsNotify->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Meetings') ?></h4>
                <?php if (!empty($meetingLocation->meetings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Meeting Type Id') ?></th>
                            <th><?= __('Meeting Location Id') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($meetingLocation->meetings as $meetings) : ?>
                        <tr>
                            <td><?= h($meetings->id) ?></td>
                            <td><?= h($meetings->date) ?></td>
                            <td><?= h($meetings->start_time) ?></td>
                            <td><?= h($meetings->end_time) ?></td>
                            <td><?= h($meetings->meeting_type_id) ?></td>
                            <td><?= h($meetings->meeting_location_id) ?></td>
                            <td><?= h($meetings->creator) ?></td>
                            <td><?= h($meetings->created) ?></td>
                            <td><?= h($meetings->modifier) ?></td>
                            <td><?= h($meetings->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Meetings', 'action' => 'view', $meetings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Meetings', 'action' => 'edit', $meetings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meetings', 'action' => 'delete', $meetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetings->id)]) ?>
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
