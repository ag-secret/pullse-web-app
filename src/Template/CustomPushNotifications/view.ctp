<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Custom Push Notification'), ['action' => 'edit', $customPushNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custom Push Notification'), ['action' => 'delete', $customPushNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customPushNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custom Push Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custom Push Notification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customPushNotifications view large-10 medium-9 columns">
    <h2><?= h($customPushNotification->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($customPushNotification->title) ?></p>
            <h6 class="subheader"><?= __('Message') ?></h6>
            <p><?= h($customPushNotification->message) ?></p>
            <h6 class="subheader"><?= __('Club') ?></h6>
            <p><?= $customPushNotification->has('club') ? $this->Html->link($customPushNotification->club->name, ['controller' => 'Clubs', 'action' => 'view', $customPushNotification->club->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($customPushNotification->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($customPushNotification->created) ?></p>
            <h6 class="subheader"><?= __('Last Sended') ?></h6>
            <p><?= h($customPushNotification->last_sended) ?></p>
        </div>
    </div>
</div>
