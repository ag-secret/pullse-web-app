<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Heart'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hearts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hearts form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($heart); ?>
    <fieldset>
        <legend><?= __('Add Heart') ?></legend>
        <?php
            echo $this->Form->input('user_id1');
            echo $this->Form->input('user_id2');
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('combination');
            echo $this->Form->input('combination_created');
            echo $this->Form->input('message');
            echo $this->Form->input('message_sender');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
