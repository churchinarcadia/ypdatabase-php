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
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('mobile_phone') ?></th>
                    <th><?= $this->Paginator->sort('call_or_text') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('hs_grad_year') ?></th>
                    <th><?= $this->Paginator->sort('home_phone') ?></th>
                    <th><?= $this->Paginator->sort('home_address') ?></th>
                    <th><?= $this->Paginator->sort('baptized') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('district') ?></th>
                    <th><?= $this->Paginator->sort('father') ?></th>
                    <th><?= $this->Paginator->sort('mother') ?></th>
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
                    <td><?= h($person->last_name) ?></td>
                    <td><?= h($person->gender) ?></td>
                    <td><?= h($person->mobile_phone) ?></td>
                    <td><?= h($person->call_or_text) ?></td>
                    <td><?= h($person->email) ?></td>
                    <td><?= $this->Number->format($person->hs_grad_year) ?></td>
                    <td><?= h($person->home_phone) ?></td>
                    <td><?= h($person->home_address) ?></td>
                    <td><?= h($person->baptized) ?></td>
                    <td><?= h($person->active) ?></td>
                    <td><?= $this->Number->format($person->district) ?></td>
                    <td><?= $this->Number->format($person->father) ?></td>
                    <td><?= $this->Number->format($person->mother) ?></td>
                    <td><?= $this->Number->format($person->creator) ?></td>
                    <td><?= h($person->created) ?></td>
                    <td><?= $this->Number->format($person->modifier) ?></td>
                    <td><?= h($person->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
