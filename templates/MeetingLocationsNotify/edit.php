<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingLocationsNotify $meetingLocationsNotify
 * @var string[]|\Cake\Collection\CollectionInterface $meetingLocations
 * @var string[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php
                if ($permissions['meeting_location_notify'][$meetingLocationsNotify_entry->id]['can']['delete']) {

                }
                ?>
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?php
                echo $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $meetingLocationsNotify->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $meetingLocationsNotify->id), 'class' => 'side-nav-item']
                );
            }
            echo $this->Html->link(__('List Meeting Locations Notify'), ['action' => 'index'], ['class' => 'side-nav-item']);
            ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingLocationsNotify form content">
            <?= $this->Form->create($meetingLocationsNotify) ?>
            <fieldset>
                <legend><?= __('Edit Meeting Locations Notify') ?></legend>
                <?php
                    echo $this->Form->control('meeting_location_id', ['options' => $meetingLocations]);
                    echo $this->Form->control('person_id', ['options' => $people]);
                    if ($logged_in_user->user_type_id == 1) {
                        echo $this->Form->control('creator', ['options' => $users, 'empty' => true]);
                        echo $this->Form->control('created');
                        echo $this->Form->control('modifier', ['options' => $users, 'empty' => true]);
                        echo $this->Form->control('modified');
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
