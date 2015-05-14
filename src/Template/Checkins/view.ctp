<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Checkin'), ['action' => 'edit', $checkin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Checkin'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Checkins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Checkin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="checkins view col-lg-10 col-md-9 columns">
    <h2><?= h($checkin->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $checkin->has('user') ? $this->Html->link($checkin->user->name, ['controller' => 'Users', 'action' => 'view', $checkin->user->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Event') ?></h6>
                    <p><?= $checkin->has('event') ? $this->Html->link($checkin->event->name, ['controller' => 'Events', 'action' => 'view', $checkin->event->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($checkin->id) ?></p>
                    <h6 class="subheader"><?= __('Lat') ?></h6>
                    <p><?= $this->Number->format($checkin->lat) ?></p>
                    <h6 class="subheader"><?= __('Lng') ?></h6>
                    <p><?= $this->Number->format($checkin->lng) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($checkin->created) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
