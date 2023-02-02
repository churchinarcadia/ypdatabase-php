<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Edit Person') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('middle_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('district');
                    echo $this->Form->control('mobile_phone');
                    //TODO add options
                    echo $this->Form->control('call_or_text', ['options' => $call_or_text, 'empty' => true]);
                    echo $this->Form->control('email');
                    //TODO change to grade
                    echo $this->Form->control('hs_grad_year');
                    echo $this->Form->control('home_phone');
                    echo $this->Form->control('address_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('baptized');
                    echo $this->Form->control('active');
                    echo $this->Form->control('notes');
                    //TODO check for serving one or admin usertype
                    echo $this->Form->control('internal_notes');
                    //TODO add add new
                    echo $this->Form->control('father', ['options' => $people, 'empty' => true]);
                    //TODO add add new
                    echo $this->Form->control('mother', ['options' => $people, 'empty' => true]);
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
