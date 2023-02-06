<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $people
 * @var string[]|\Cake\Collection\CollectionInterface $userTypes
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
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            */ ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    //TODO change to password reset
                    echo $this->Form->control('person_id', ['options' => $people, 'empty' => true]);
                    //TODO check for admin usertype
                    //TODO add options
                    echo $this->Form->control('status', ['options' => $statuses, 'empty' => true]);
                    echo $this->Form->control('user_type_id', ['options' => $userTypes, 'empty' => true]);
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
