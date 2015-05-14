<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ad'), ['action' => 'edit', $ad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ads view large-10 medium-9 columns">
    <h2><?= h($ad->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($ad->nome) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($ad->url) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($ad->id) ?></p>
            <h6 class="subheader"><?= __('Tipo') ?></h6>
            <p><?= $this->Number->format($ad->tipo) ?></p>
            <h6 class="subheader"><?= __('Tempo') ?></h6>
            <p><?= $this->Number->format($ad->tempo) ?></p>
            <h6 class="subheader"><?= __('Ordem') ?></h6>
            <p><?= $this->Number->format($ad->ordem) ?></p>
            <h6 class="subheader"><?= __('Ativo') ?></h6>
            <p><?= $this->Number->format($ad->ativo) ?></p>
            <h6 class="subheader"><?= __('Lixeira') ?></h6>
            <p><?= $this->Number->format($ad->lixeira) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Dt Inicio') ?></h6>
            <p><?= h($ad->dt_inicio) ?></p>
            <h6 class="subheader"><?= __('Dt Fim') ?></h6>
            <p><?= h($ad->dt_fim) ?></p>
        </div>
    </div>
</div>
