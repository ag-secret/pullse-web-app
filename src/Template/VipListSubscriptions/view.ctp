<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Vip List Subscription'), ['action' => 'edit', $vipListSubscription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vip List Subscription'), ['action' => 'delete', $vipListSubscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vipListSubscription->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Vip List Subscriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vip List Subscription'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="vipListSubscriptions view col-lg-10 col-md-9 columns">
    <h2><?= h($vipListSubscription->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Event') ?></h6>
                    <p><?= $vipListSubscription->has('event') ? $this->Html->link($vipListSubscription->event->name, ['controller' => 'Events', 'action' => 'view', $vipListSubscription->event->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $vipListSubscription->has('user') ? $this->Html->link($vipListSubscription->user->name, ['controller' => 'Users', 'action' => 'view', $vipListSubscription->user->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Sexo') ?></h6>
                    <p><?= h($vipListSubscription->sexo) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($vipListSubscription->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
