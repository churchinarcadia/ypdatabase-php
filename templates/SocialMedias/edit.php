<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia $socialMedia
 * @var string[]|\Cake\Collection\CollectionInterface $people
 * @var string[]|\Cake\Collection\CollectionInterface $socialMediaTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php //TODO check for admin usertype
            /*
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $socialMedia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id), 'class' => 'side-nav-item']
            ) ?>
            */ ?>
            <?= $this->Html->link(__('List Social Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMedias form content">
            <?= $this->Form->create($socialMedia) ?>
            <fieldset>
                <legend><?= __('Edit Social Media') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $people, 'empty' => true]);
                    echo $this->Form->control('social_media_type_id', ['options' => $socialMediaTypes, 'empty' => true]);
                    echo $this->Form->control('handle');
                    echo $this->Form->control('notes');
                    //TODO check for admin usertype
                    echo $this->Form->control('creator', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('created');
                    echo $this->Form->control('modifier', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('modified');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
