<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meeting $meeting
 * @var string[]|\Cake\Collection\CollectionInterface $meetingTypes
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
                ['action' => 'delete', $meeting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id), 'class' => 'side-nav-item']
            ) ?>
            */?>
            <?= $this->Html->link(__('List Meetings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetings form content">
            <?= $this->Form->create($meeting) ?>
            <fieldset>
                <legend><?= __('Edit Meeting') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('start_time', ['empty' => true]);
                    echo $this->Form->control('end_time', ['empty' => true]);
                    echo $this->Form->control('meeting_type_id', ['options' => $meetingTypes, 'empty' => true]);
                    echo $this->Form->control('meeting_location_id', ['options' => $meetingLocations, 'empty' => true]);
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
