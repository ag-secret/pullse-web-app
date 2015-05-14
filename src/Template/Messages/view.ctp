<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="messages view col-lg-10 col-md-9 columns">
    <h2><?= h($message->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Mensagem') ?></h6>
                    <p><?= h($message->mensagem) ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $message->has('user') ? $this->Html->link($message->user->name, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($message->id) ?></p>
                    <h6 class="subheader"><?= __('Is Active') ?></h6>
                    <p><?= $this->Number->format($message->is_active) ?></p>
                    <h6 class="subheader"><?= __('Is Read') ?></h6>
                    <p><?= $this->Number->format($message->is_read) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($message->created) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
