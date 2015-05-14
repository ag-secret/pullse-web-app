<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Vip List Subscription'), ['action' => 'edit', $vipListSubscription->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vipListSubscription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vipListSubscription->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Vip List Subscription'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vip List Subscriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="vipListSubscriptions form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($vipListSubscription); ?>
    <fieldset>
        <legend><?= __('Edit Vip List Subscription') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('sexo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
