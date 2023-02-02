<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SocialMediaType> $socialMediaTypes
 */
?>
<div class="socialMediaTypes index content">
    <?= $this->Html->link(__('New Social Media Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Social Media Types') ?></h3>
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
                    <?php //TODO check for steward usertype or higher ?>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socialMediaTypes as $socialMediaType): ?>
                <tr>
                    <td><?= h($socialMediaType->id) ?></td>
                    <td><?= h($socialMediaType->name) ?></td>
                    <td><?= $socialMediaType->has('social_media_type_creator') ? $this->Html->link($socialMediaType->social_media_type_creator->username, ['controller' => 'Users', 'action' => 'view', $socialMediaType->social_media_type_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($socialMediaType->created) ?></td>
                    <td><?= $socialMediaType->has('social_media_type_modifier') ? $this->Html->link($socialMediaType->social_media_type_modifier->username, ['controller' => 'Users', 'action' => 'view', $socialMediaType->social_media_type_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->converted_timezone($socialMediaType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $socialMediaType->id]) ?>
                        <?php //TODO check for serving one usertype or higher ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialMediaType->id]) ?>
                        <?php //TODO check for admin usertype
                        //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialMediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMediaType->id)]) ?>
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
