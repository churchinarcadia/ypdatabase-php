<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $people
 * @var \Cake\Collection\CollectionInterface|string[] $userTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    //TODO check for admin usertype
                    echo $this->Form->control('person_id', ['options' => $people, 'empty' => true]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    //TODO add password confirmation field

                    //TODO add options
                    //TODO check for admin usertype
                    echo $this->Form->control('status', ['options' => $statuses, 'empty' => true]);
                    echo $this->Form->control('user_type_id', ['options' => $userTypes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
