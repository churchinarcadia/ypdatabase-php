<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia $socialMedia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for serving one and admin usertype ?>
            <?= $this->Html->link(__('Edit Social Media'), ['action' => 'edit', $socialMedia->id], ['class' => 'side-nav-item']) ?>
            <?php //TODO check for admin usertype ?>
            <?= $this->Form->postLink(__('Delete Social Media'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id), 'class' => 'side-nav-item']) ?>
            <?php //TODO check for steward usertype or higher ?>
            <?= $this->Html->link(__('List Social Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Social Media'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMedias view content">
            <h3><?= h($socialMedia->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= h($socialMedia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $socialMedia->has('person') ? $this->Html->link($socialMedia->person->full_name, ['controller' => 'People', 'action' => 'view', $socialMedia->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Social Media Type') ?></th>
                    <td><?= $socialMedia->has('social_media_type') ? $this->Html->link($socialMedia->social_media_type->name, ['controller' => 'SocialMediaTypes', 'action' => 'view', $socialMedia->social_media_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Handle') ?></th>
                    <td><?= h($socialMedia->handle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $socialMedia->has('social_media_creator') ? $this->Html->link($socialMedia->social_media_creator->username, ['controller' => 'Users', 'action' => 'view', $socialMedia->social_media_creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Timezone->converted_timezone($socialMedia->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $socialMedia->has('social_media_modifier') ? $this->Html->link($socialMedia->social_media_modifier->username, ['controller' => 'Users', 'action' => 'view', $socialMedia->social_media_modifier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Timezone->converted_timezone($socialMedia->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($socialMedia->notes)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
