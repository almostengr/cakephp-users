<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $userRole
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userRole->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="userRoles form content">
            <?= $this->Form->create($userRole) ?>
            <fieldset>
                <legend><?= __('Edit User Role') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('active');
                    echo $this->Form->control('sort_order');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
