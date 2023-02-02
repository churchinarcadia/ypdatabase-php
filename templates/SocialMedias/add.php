<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMedia $socialMedia
 * @var \Cake\Collection\CollectionInterface|string[] $people
 * @var \Cake\Collection\CollectionInterface|string[] $socialMediaTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Social Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMedias form content">
            <?= $this->Form->create($socialMedia) ?>
            <fieldset>
                <legend><?= __('Add Social Media') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $people]);
                    echo $this->Form->control('social_media_type_id', ['options' => $socialMediaTypes]);
                    echo $this->Form->control('handle');
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
