<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Ads Setting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="adsSettings index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('club_id') ?></th>
            <th><?= $this->Paginator->sort('intervalo_ad') ?></th>
            <th><?= $this->Paginator->sort('intervalo_chk') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($adsSettings as $adsSetting): ?>
        <tr>
            <td><?= $this->Number->format($adsSetting->id) ?></td>
            <td>
                <?= $adsSetting->has('club') ? $this->Html->link($adsSetting->club->name, ['controller' => 'Clubs', 'action' => 'view', $adsSetting->club->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($adsSetting->intervalo_ad) ?></td>
            <td><?= $this->Number->format($adsSetting->intervalo_chk) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $adsSetting->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adsSetting->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adsSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsSetting->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
