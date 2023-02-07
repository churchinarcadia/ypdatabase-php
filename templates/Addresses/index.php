<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="addresses index content">
    <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Addresses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('full_address') ?></th>
                    <?php //TODO Add check for Admin usertype ?>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= h($address->id) ?></td>
                    <td><?= h($address->full_address) ?></td>
                    <?php //TODO Add check for Admin usertype ?>
                    <td><?= $address->has('address_creator') ? $this->Html->link($address->address_creator->username, ['controller' => 'Users', 'action' => 'view', $address->address_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($address->created) ?></td>
                    <td><?= $address->has('address_modifier') ? $this->Html->link($address->address_modifier->username, ['controller' => 'Users', 'action' => 'view', $address->address_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($address->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                        <?php //TODO add check for serving one or admin usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                        <?php //TODO add check for admin usertype
                        //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
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
