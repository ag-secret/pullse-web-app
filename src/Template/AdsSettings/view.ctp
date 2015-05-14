<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ads Setting'), ['action' => 'edit', $adsSetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ads Setting'), ['action' => 'delete', $adsSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsSetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ads Setting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="adsSettings view large-10 medium-9 columns">
    <h2><?= h($adsSetting->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Club') ?></h6>
            <p><?= $adsSetting->has('club') ? $this->Html->link($adsSetting->club->name, ['controller' => 'Clubs', 'action' => 'view', $adsSetting->club->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($adsSetting->id) ?></p>
            <h6 class="subheader"><?= __('Intervalo Ad') ?></h6>
            <p><?= $this->Number->format($adsSetting->intervalo_ad) ?></p>
            <h6 class="subheader"><?= __('Intervalo Chk') ?></h6>
            <p><?= $this->Number->format($adsSetting->intervalo_chk) ?></p>
        </div>
    </div>
</div>
