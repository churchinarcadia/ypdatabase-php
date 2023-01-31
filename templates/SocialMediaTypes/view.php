<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialMediaType $socialMediaType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Social Media Type'), ['action' => 'edit', $socialMediaType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Social Media Type'), ['action' => 'delete', $socialMediaType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMediaType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Social Media Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Social Media Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socialMediaTypes view content">
            <h3><?= h($socialMediaType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($socialMediaType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($socialMediaType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $socialMediaType->creator === null ? '' : $this->Number->format($socialMediaType->creator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifier') ?></th>
                    <td><?= $socialMediaType->modifier === null ? '' : $this->Number->format($socialMediaType->modifier) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($socialMediaType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($socialMediaType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($socialMediaType->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Social Medias') ?></h4>
                <?php if (!empty($socialMediaType->social_medias)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Social Media Type Id') ?></th>
                            <th><?= __('Handle') ?></th>
                            <th><?= __('Creator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modifier') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($socialMediaType->social_medias as $socialMedias) : ?>
                        <tr>
                            <td><?= h($socialMedias->id) ?></td>
                            <td><?= h($socialMedias->person_id) ?></td>
                            <td><?= h($socialMedias->social_media_type_id) ?></td>
                            <td><?= h($socialMedias->handle) ?></td>
                            <td><?= h($socialMedias->creator) ?></td>
                            <td><?= h($socialMedias->created) ?></td>
                            <td><?= h($socialMedias->modifier) ?></td>
                            <td><?= h($socialMedias->modified) ?></td>
                            <td><?= h($socialMedias->notes) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SocialMedias', 'action' => 'view', $socialMedias->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SocialMedias', 'action' => 'edit', $socialMedias->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SocialMedias', 'action' => 'delete', $socialMedias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedias->id)]) ?>
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
