<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one or admin usertype?>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO check for steward or above usertype ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($address->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direction') ?></th>
                    <td><?= h($address->direction) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($address->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= h($address->unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($address->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zip') ?></th>
                    <td><?= h($address->zip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $address->has('address_creator') ? $this->Html->link($address->address_creator->username, ['controller' => 'Users', 'action' => 'view', $address->address_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->convert_timezone($address->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $address->has('address_modifier') ? $this->Html->link($address->address_modifier->username, ['controller' => 'Users', 'action' => 'view', $address->address_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->convert_timezone($address->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Meeting Locations') ?></h4>
                <?php if (!empty($address->meeting_locations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Notify') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->meeting_locations as $meetingLocations) : ?>
                        <tr>
                            <td><?= h($meetingLocations->id) ?></td>
                            <td><?= h($meetingLocations->name) ?></td>
                            <td><?= h($meetingLocations->address_id) ?></td>
                            <td><?= h($meetingLocations->active) ?></td>
                            <td><?= h($meetingLocations->notify) ?></td>
                            <td><?= h($meetingLocations->notes) ?></td>
                            <td><?= h($meetingLocations->creator) ?></td>
                            <td><?= h($meetingLocations->created) ?></td>
                            <td><?= h($meetingLocations->modifier) ?></td>
                            <td><?= h($meetingLocations->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MeetingLocations', 'action' => 'view', $meetingLocations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MeetingLocations', 'action' => 'edit', $meetingLocations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MeetingLocations', 'action' => 'delete', $meetingLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($address->people)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Middle Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Mobile Phone') ?></th>
                            <th><?= __('Call Or Text') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Hs Grad Year') ?></th>
                            <th><?= __('Home Phone') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Baptized') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Internal Notes') ?></th>
                            <th><?= __('District') ?></th>
                            <th><?= __('Father') ?></th>
                            <th><?= __('Mother') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->people as $people) : ?>
                        <tr>
                            <td><?= h($people->id) ?></td>
                            <td><?= h($people->first_name) ?></td>
                            <td><?= h($people->middle_name) ?></td>
                            <td><?= h($people->last_name) ?></td>
                            <td><?= h($people->gender) ?></td>
                            <td><?= h($people->mobile_phone) ?></td>
                            <td><?= h($people->call_or_text) ?></td>
                            <td><?= h($people->email) ?></td>
                            <td><?= h($people->hs_grad_year) ?></td>
                            <td><?= h($people->home_phone) ?></td>
                            <td><?= h($people->address_id) ?></td>
                            <td><?= h($people->baptized) ?></td>
                            <td><?= h($people->active) ?></td>
                            <td><?= h($people->notes) ?></td>
                            <td><?= h($people->internal_notes) ?></td>
                            <td><?= h($people->district) ?></td>
                            <td><?= h($people->father) ?></td>
                            <td><?= h($people->mother) ?></td>
                            <td><?= h($people->creator) ?></td>
                            <td><?= h($people->created) ?></td>
                            <td><?= h($people->modifier) ?></td>
                            <td><?= h($people->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $people->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $people->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $people->id], ['confirm' => __('Are you sure you want to delete # {0}?', $people->id)]) ?>
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
