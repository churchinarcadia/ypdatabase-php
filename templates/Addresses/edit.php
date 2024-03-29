<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php
                if ($permissions['address'][$address->id]['can']['delete']) {
                    ?>
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?php
                    echo $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $address->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']
                    );
                }
                echo $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']);
            ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <fieldset>
                <legend><?= __('Edit Address') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('direction');
                    echo $this->Form->control('street');
                    echo $this->Form->control('unit');
                    echo $this->Form->control('city');
                    echo $this->Form->control('state');
                    echo $this->Form->control('zip');
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
