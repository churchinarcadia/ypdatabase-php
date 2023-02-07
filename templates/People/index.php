<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="people index content">
    <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('People') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('middle_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('mobile_phone') ?></th>
                    <th><?= $this->Paginator->sort('call_or_text') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <?php //TODO change to grade ?>
                    <th><?= $this->Paginator->sort('hs_grad_year') ?></th>
                    <th><?= $this->Paginator->sort('home_phone') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('baptized') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('district') ?></th>
                    <th><?= $this->Paginator->sort('father') ?></th>
                    <th><?= $this->Paginator->sort('mother') ?></th>
                    <?php //TODO check for admin usertype ?>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= h($person->first_name) ?></td>
                    <td><?= h($person->middle_name) ?></td>
                    <td><?= h($person->last_name) ?></td>
                    <td><?= h($person->gender) ?></td>
                    <td><?= h($person->mobile_phone) ?></td>
                    <td><?= h($person->call_or_text) ?></td>
                    <td><?= h($person->email) ?></td>
                    <?php //TODO change to grade ?>
                    <td><?= h($person->hs_grad_year) ?></td>
                    <td><?= h($person->home_phone) ?></td>
                    <td><?= $person->has('address') ? $this->Html->link($person->address->full_address, ['controller' => 'Addresses', 'action' => 'view', $person->address->id]) : '' ?></td>
                    <td><?= h($person->baptized) ?></td>
                    <td><?= h($person->active) ?></td>
                    <td><?= h($person->district) ?></td>
                    <td><?= $person->has('father') ? $this->Html->link($person->father->full_name, ['controller' => 'People', 'action' => 'view', $person->father->id]) : '' ?></td>
                    <td><?= $person->has('mother') ? $this->Html->link($person->mother->full_name, ['controller' => 'People', 'action' => 'view', $person->mother->id]) : '' ?></td>
                    <?php //TODO check for admin usertype ?>
                    <td><?= $person->has('person_creator') ? $this->Html->link($person->person_creator->full_name, ['controller' => 'Users', 'action' => 'view', $person->person_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($person->created) ?></td>
                    <td><?= $person->has('person_modifier') ? $this->Html->link($person->person_modifier->full_name, ['controller' => 'Users', 'action' => 'view', $person->person_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($person->modified) ?></td>
                    <?php //TODO check for steward usertype or higher ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                        <?php //TODO check for serving one or admin usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?php //TODO check for admin usertype
                        //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
