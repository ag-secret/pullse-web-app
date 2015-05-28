<?= $this->assign('title',' - Eventos'); ?>

<?= $this->Html->script('Events/index', ['inline' => false]) ?>

<?= $this->element('breadcrumb', ['title' => 'Eventos']) ?>

<?= $this->Flash->render() ?>

<div>
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
        <input type="text" name="q" class="form-control" placeholder="Pesquisar por nome" value="<?= $this->request->query('q') ?>">

        <label for="">De</label>
        <input type="date" class="form-control" name="data_inicio" value="<?= $this->request->query('data_inicio')?>">

        <label for="">Até</label>
        <input type="date" class="form-control" name="data_fim" value="<?= $this->request->query('data_fim')?>">

        <label for="">Ordenar por:</label>
        <select class="form-control" name="order" <?= $this->request->query('order') == 'DESC' ? 'selected' : '' ?>>
            <option value="DESC">
                Mais recentes
            </option>
            <option value="ASC" <?= $this->request->query('order') == 'ASC' ? 'selected' : '' ?> >
                Mais antigos
            </option>
        </select>

        <button type="submit" class="btn btn-danger">
            <span class="glyphicon glyphicon-search"></span>
        </button>

    <?= $this->Form->end() ?>
</div>

<hr>

<div class="alert alert-info clearfix">
    <?php if ($notificacao_ultimo_envio): ?>
        Última notificação de "agenda atualizada" <strong>à <?= $this->Time->timeAgoInWords($notificacao_ultimo_envio) ?></strong>.
    <?php else: ?>
        Notificação de agenda atualizada nunca enviada.
    <?php endif ?>
    <button
        type="button"
        id="send-notification"
        class="btn btn-primary btn-sm pull-right"
        data-ajax-url="<?= $this->Url->build(['controller' => 'GeneralSettings', 'action' => 'sendNotificacoesEvento', '_ext' => 'json'])?>">
        <span class="glyphicon glyphicon-send"></span> Enviar notificações
    </button>

    <div style="display: none;" id="loader-notification">
        <br style="clear: both;">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%">
                <span class="sr-only">Loading</span>
            </div>
        </div>
    </div>
</div>

<hr>

<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Criar evento',
    ['action' => 'add'],
    [
        'escape' => false,
        'class' => 'btn btn-danger pull-right'
    ]) ?>
<br style="clear: both;">
<br>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th style=""><?= $this->Paginator->sort('name', 'Evento') ?></th>
                <th style="width: 260px;">Lista VIP</th>
                <th style="width: 120px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left">
                                <?php
                                    $image = null;
                                    if ($event->imagem_capa) {
                                        $image = 'eventos/' . $event->id . '/' . $event->imagem_capa;
                                    }elseif ($event->facebook_img) {
                                        $image = $event->facebook_img;
                                    } else {
                                        $image = 'image_placeholder.png';
                                    }
                                ?>
                                <?= $this->Html->image($image, ['class' => 'media-object', 'width' => 150]) ?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?= $event->name ?>
                                    <small>
                                        <?= $this->BootstrapText->labelBoolean($event->is_active, 'Ativo', 'Inativo') ?>
                                    </small>
                                </h4>
                                <p class="text-muted">
                                    <span class="glyphicon glyphicon-time"></span> 
                                    De <?= $event->data_inicio->format('d/m/y \à\s h:m') ?>
                                    Até <?= $event->data_fim->format('d/m/y \à\s h:m') ?>
                                </p>
                                <p><?= $event->descricao ?></p>

                                <?php if (count($event->tags) > 0): ?>
                                    <br>
                                    <strong>Tags: </strong>
                                    <?php foreach ($event->tags as $value): ?>
                                        <span class="label label-default">
                                            <?= $value->name ?>
                                        </span>
                                        &nbsp;
                                    <?php endforeach ?>
                                <?php endif ?>

                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>Descrição:</strong>
                        <p>
                            <?= $event->descricao_lista_vip ? $event->descricao_lista_vip : '<em class="text-muted">Descrição não cadastrada.</em>' ?>
                        </p>
                        <strong>Qtd. Fem:</strong>
                        <h5>
                            <span class="label label-info">
                                <?= $event->vip_list_fem_subscriptions ?>
                                 / 
                                <?= $event->lista_vip_qtd_fem ?>
                            </span>
                        </h5>
                        <strong>Qtd. Masc:</strong>
                        <h5>
                            <span class="label label-info">
                                <?= $event->vip_list_masc_subscriptions ?>
                                 / 
                                <?= $event->lista_vip_qtd_masc ?>
                            </span>
                        </h5>
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', [
                            'controller' => 'Events',
                            'action' => 'edit',
                            $event->id
                        ],
                        [
                            'escape' => false,
                            'title' => 'Editar',
                        ])?>
                        &nbsp;
                        <?= $this->Form->postLink(
                                $this->Html->icon('remove'),
                                ['action' => 'delete', $event->id],
                                [
                                    'confirm' => 'Você tem certeza que deseja deletar este evento?',
                                    'escape' => false,
                                ]
                        ) ?>
                    </td>
                </tr>
            <?php endforeach ?>
            <?php if (count($events) < 1): ?>
                <tr>
                    <td colspan="10">
                        <em>Nenhum evento cadastrado.</em>
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?= $this->Paginator->numbers() ?>