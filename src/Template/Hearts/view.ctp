<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Heart'), ['action' => 'edit', $heart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Heart'), ['action' => 'delete', $heart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $heart->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Hearts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Heart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hearts view col-lg-10 col-md-9 columns">
    <h2><?= h($heart->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Event') ?></h6>
                    <p><?= $heart->has('event') ? $this->Html->link($heart->event->name, ['controller' => 'Events', 'action' => 'view', $heart->event->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Message') ?></h6>
                    <p><?= h($heart->message) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($heart->id) ?></p>
                    <h6 class="subheader"><?= __('User Id1') ?></h6>
                    <p><?= $this->Number->format($heart->user_id1) ?></p>
                    <h6 class="subheader"><?= __('User Id2') ?></h6>
                    <p><?= $this->Number->format($heart->user_id2) ?></p>
                    <h6 class="subheader"><?= __('Combination') ?></h6>
                    <p><?= $this->Number->format($heart->combination) ?></p>
                    <h6 class="subheader"><?= __('Message Sender') ?></h6>
                    <p><?= $this->Number->format($heart->message_sender) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Combination Created') ?></h6>
                    <p><?= h($heart->combination_created) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($heart->created) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
