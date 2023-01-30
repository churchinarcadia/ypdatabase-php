<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingPerson $meetingPerson
 * @var string[]|\Cake\Collection\CollectionInterface $meetings
 * @var string[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $meetingPerson->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $meetingPerson->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Meeting People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingPeople form content">
            <?= $this->Form->create($meetingPerson) ?>
            <fieldset>
                <legend><?= __('Edit Meeting Person') ?></legend>
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
