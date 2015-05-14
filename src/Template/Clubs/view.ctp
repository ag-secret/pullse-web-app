<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="clubs view col-lg-10 col-md-9 columns">
    <h2><?= h($club->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($club->name) ?></p>
                    <h6 class="subheader"><?= __('Descricao') ?></h6>
                    <p><?= h($club->descricao) ?></p>
                    <h6 class="subheader"><?= __('Foto Capa') ?></h6>
                    <p><?= h($club->foto_capa) ?></p>
                    <h6 class="subheader"><?= __('Foto Perfil') ?></h6>
                    <p><?= h($club->foto_perfil) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($club->id) ?></p>
                    <h6 class="subheader"><?= __('Is Active') ?></h6>
                    <p><?= $this->Number->format($club->is_active) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($club->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($club->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Events') ?></h4>
    <?php if (!empty($club->events)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Data Inicio') ?></th>
                <th><?= __('Data Fim') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Imagem Capa') ?></th>
                <th><?= __('Descricao Lista Vip') ?></th>
                <th><?= __('Lista Vip Qtd Masc') ?></th>
                <th><?= __('Lista Vip Qtd Fem') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Club Id') ?></th>
                <th><?= __('Is Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($club->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->name) ?></td>
                <td><?= h($events->data_inicio) ?></td>
                <td><?= h($events->data_fim) ?></td>
                <td><?= h($events->descricao) ?></td>
                <td><?= h($events->imagem_capa) ?></td>
                <td><?= h($events->descricao_lista_vip) ?></td>
                <td><?= h($events->lista_vip_qtd_masc) ?></td>
                <td><?= h($events->lista_vip_qtd_fem) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->club_id) ?></td>
                <td><?= h($events->is_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Events', 'action' => 'view', $events->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Events', 'action' => 'edit', $events->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($club->users)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Facebook Uid') ?></th>
                <th><?= __('App Access Token') ?></th>
                <th><?= __('Facebook Access Token') ?></th>
                <th><?= __('Platform') ?></th>
                <th><?= __('Android Gcm Device Regid') ?></th>
                <th><?= __('Dt Nascimento') ?></th>
                <th><?= __('Sexo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Club Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Is Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($club->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->facebook_uid) ?></td>
                <td><?= h($users->app_access_token) ?></td>
                <td><?= h($users->facebook_access_token) ?></td>
                <td><?= h($users->platform) ?></td>
                <td><?= h($users->android_gcm_device_regid) ?></td>
                <td><?= h($users->dt_nascimento) ?></td>
                <td><?= h($users->sexo) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->club_id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Users', 'action' => 'view', $users->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Users', 'action' => 'edit', $users->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
