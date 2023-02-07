<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType[]|\Cake\Collection\CollectionInterface $userTypes
 */
?>
<div class="userTypes index content">
    <?= $this->Html->link(__('New User Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Types') ?></h3>
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
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userTypes as $userType): ?>
                <tr>
                    <td><?= h($userType->id) ?></td>
                    <td><?= h($userType->name) ?></td>
                    <?php //TODO check for admin usertype ?>
                    <td><?= $userType->has('user_type_creator') ? $this->Html->link($userType->user_type_creator->username, ['controller' => 'Users', 'action' => 'view', $userType->user_type_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($userType->created) ?></td>
                    <td><?= $userType->has('user_type_modifier') ? $this->Html->link($userType->user_type_modifier->username, ['controller' => 'Users', 'action' => 'view', $userType->user_type_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($userType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userType->id]) ?>
                        <?php //TODO check for admin usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userType->id]) ?>
                        <? //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?>
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
