<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocation $meetingLocation
 * @var string[]|\Cake\Collection\CollectionInterface $addresses
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
                ['action' => 'delete', $meetingLocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocation->id), 'class' => 'side-nav-item']
            ) ?>
            */?>
            <?= $this->Html->link(__('List Meeting Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocations form content">
            <?= $this->Form->create($meetingLocation) ?>
            <fieldset>
                <legend><?= __('Edit Meeting Location') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
                    echo $this->Form->control('active');
                    echo $this->Form->control('notify');
                    echo $this->Form->control('notes');
                    //TODO check if admin usertype
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
