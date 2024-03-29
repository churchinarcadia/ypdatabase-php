<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia[]|\Cake\Collection\CollectionInterface $socialMedias
 */
?>
<div class="socialMedias index content">
    <?= $this->Html->link(__('New Social Media'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Social Medias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('social_media_type_id') ?></th>
                    <th><?= $this->Paginator->sort('handle') ?></th>
                    <?php //TODO check for admin usertype ?>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socialMedias as $socialMedia): ?>
                <tr>
                    <td><?= h($socialMedia->id) ?></td>
                    <td><?= $socialMedia->has('person') ? $this->Html->link($socialMedia->person->full_name, ['controller' => 'People', 'action' => 'view', $socialMedia->person->id]) : '' ?></td>
                    <td><?= $socialMedia->has('social_media_type') ? $this->Html->link($socialMedia->social_media_type->name, ['controller' => 'SocialMediaTypes', 'action' => 'view', $socialMedia->social_media_type->id]) : '' ?></td>
                    <td><?= h($socialMedia->handle) ?></td>
                    <?php //TODO check for admin usertype ?>
                    <td><?= $socialMedia->has('social_media_creator') ? $this->Html->link($socialMedia->social_media_creator->username, ['controller' => 'Users', 'action' => 'view', $socialMedia->social_media_creator->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($socialMedia->created) ?></td>
                    <td><?= $socialMedia->has('social_media_modifier') ? $this->Html->link($socialMedia->social_media_modifier->username, ['controller' => 'Users', 'action' => 'view', $socialMedia->social_media_modifier->id]) : '' ?></td>
                    <td><?= $this->Timezone->convert_timezone($socialMedia->modified) ?></td>
                    <?php //TODO check for steward usertype or higher ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $socialMedia->id]) ?>
                        <?php //TODO check for serving one or admin usertype ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialMedia->id]) ?>
                        <?php //TODO check for admin usertype
                        //<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]) ?>
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
