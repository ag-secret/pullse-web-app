<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Ads Settings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="adsSettings form large-10 medium-9 columns">
    <?= $this->Form->create($adsSetting); ?>
    <fieldset>
        <legend><?= __('Add Ads Setting') ?></legend>
        <?php
            echo $this->Form->input('club_id', ['options' => $clubs]);
            echo $this->Form->input('intervalo_ad');
            echo $this->Form->input('intervalo_chk');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
