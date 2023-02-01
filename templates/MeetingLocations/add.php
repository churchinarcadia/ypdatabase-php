<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocation $meetingLocation
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Meeting Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocations form content">
            <?= $this->Form->create($meetingLocation) ?>
            <fieldset>
                <legend><?= __('Add Meeting Location') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
                    echo $this->Form->control('active');
                    echo $this->Form->control('notify');
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
