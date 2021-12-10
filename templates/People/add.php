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
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Add Person') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('mobile_phone');
                    echo $this->Form->control('call_or_text');
                    echo $this->Form->control('email');
                    echo $this->Form->control('hs_grad_year');
                    echo $this->Form->control('home_phone');
                    echo $this->Form->control('home_address');
                    echo $this->Form->control('baptized');
                    echo $this->Form->control('active');
                    echo $this->Form->control('notes');
                    echo $this->Form->control('internal_notes');
                    echo $this->Form->control('district');
                    echo $this->Form->control('father');
                    echo $this->Form->control('mother');
                    echo $this->Form->control('creator');
                    echo $this->Form->control('modifier');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
