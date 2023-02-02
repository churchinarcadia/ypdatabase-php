<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
 * @var \Cake\Collection\CollectionInterface|string[] $meetingLocations
 * @var \Cake\Collection\CollectionInterface|string[] $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Meeting Locations Notify'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocationsNotify form content">
            <?= $this->Form->create($meetingLocationsNotify) ?>
            <fieldset>
                <legend><?= __('Add Meeting Locations Notify') ?></legend>
                <?php
                    echo $this->Form->control('meeting_location_id', ['options' => $meetingLocations]);
                    echo $this->Form->control('person_id', ['options' => $people]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?php //TODO add add and add another button ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
