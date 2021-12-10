<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingPerson $meetingPerson
 * @var \Cake\Collection\CollectionInterface|string[] $meetings
 * @var \Cake\Collection\CollectionInterface|string[] $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Meeting People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingPeople form content">
            <?= $this->Form->create($meetingPerson) ?>
            <fieldset>
                <legend><?= __('Add Meeting Person') ?></legend>
                <?php
                    echo $this->Form->control('meeting_id', ['options' => $meetings]);
                    echo $this->Form->control('person_id', ['options' => $people]);
                    echo $this->Form->control('creator');
                    echo $this->Form->control('modifier');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
