<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MeetingType $meetingType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Meeting Type'), ['action' => 'edit', $meetingType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Meeting Type'), ['action' => 'delete', $meetingType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Meeting Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Meeting Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="meetingTypes view content">
            <h3><?= h($meetingType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($meetingType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($meetingType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $this->Number->format($meetingType->creator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $this->Number->format($meetingType->modifier) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($meetingType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($meetingType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($meetingType->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Meetings') ?></h4>
                <?php if (!empty($meetingType->meetings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Meeting Type Id') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($meetingType->meetings as $meetings) : ?>
                        <tr>
                            <td><?= h($meetings->id) ?></td>
                            <td><?= h($meetings->date) ?></td>
                            <td><?= h($meetings->start_time) ?></td>
                            <td><?= h($meetings->end_time) ?></td>
                            <td><?= h($meetings->meeting_type_id) ?></td>
                            <td><?= h($meetings->creator) ?></td>
                            <td><?= h($meetings->created) ?></td>
                            <td><?= h($meetings->modifier) ?></td>
                            <td><?= h($meetings->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Meetings', 'action' => 'view', $meetings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Meetings', 'action' => 'edit', $meetings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meetings', 'action' => 'delete', $meetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
