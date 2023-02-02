<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingType $meetingType
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
                ['action' => 'delete', $meetingType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $meetingType->id), 'class' => 'side-nav-item']
            ) ?>
            */ ?>
            <?= $this->Html->link(__('List Meeting Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingTypes form content">
            <?= $this->Form->create($meetingType) ?>
            <fieldset>
                <legend><?= __('Edit Meeting Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('creator', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('created');
                    echo $this->Form->control('modifier', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('created');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
