<?= $this->assign('title',' - Propagandas'); ?>

<?= $this->element('breadcrumb') ?>

<div>
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
        <input type="text" name="q" class="form-control" placeholder="Pesquisar por nome" value="<?= $this->request->query('q') ?>">

        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-search"></span>
        </button>

    <?= $this->Form->end() ?>
</div>

<hr>

<?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Configurações de Propaganda',
    [
        'controller' => 'AdsSettings',
        'action' => 'edit'
    ],
    [
        'escape' => false,
        'class' => 'btn btn-default pull-left'
    ]) ?>

<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Adicionar Propaganda',
    ['action' => 'add'],
    [
        'escape' => false,
        'class' => 'btn btn-danger pull-right'
    ]) ?>
<br style="clear: both;">
<br>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
    <!-- <thead>
        <tr>
            <th style="">
                <?= $this->Paginator->sort('Propaganda') ?>
            </th>
            <th style="width: 100px;"></th>
        </tr>
    </thead> -->
    <tbody>
    <?php foreach ($ads as $ad): ?>
        <tr>
            <td>
                <div class="media">
                    <div class="media-left">
                        <div style="width: 300px;" class="media-object">
                            <?php if ($ad->tipo === 0): ?>
                                <?= $this->Html->image($ad->imagem_fullpath, [
                                    'class' => 'img-responsive'
                                ]) ?>
                            <?php else: ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe
                                        id="video-placeholder"
                                        class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/<?= $ad->url?>">
                                    </iframe>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading" style="font-weight: bold;">
                            <?= h($ad->nome) ?>         
                        </h4>
                        <?php if ($ad->tipo === 0): ?>
                            Duração de <strong> <?= $this->Number->format($ad->tempo) ?> Segundos</strong>
                            <br>
                        <?php endif ?>
                        Exibido de <strong><?= h($ad->dt_inicio->format('d/m/y')) ?></strong> até <strong><?= h($ad->dt_fim->format('d/m/y')) ?></strong>
                        <br>
                        <?php if ($ad->ativo): ?>
                            <span class="label label-success">Ativo</span>
                        <?php else: ?>
                            <span class="label label-danger">Inativo</span>
                        <?php endif ?>
                    </div>
                </div>
            </td>
            <td class="text-center" style="width: 150px;">
                <div class="btn-group">
                    <?= $this->Html->link(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        [
                            'action' => 'edit',
                            $ad->id
                        ],
                        [
                            'escape' => false,
                            'title' => 'Editar',
                            'class' => 'btn btn-default btn-xs'
                        ])
                    ?>
                    <?= $this->Form->postLink(
                            $this->Html->icon('remove'),
                            ['action' => 'delete', $ad->id],
                            [
                                'confirm' => 'Você tem certeza que deseja deletar esta propaganda?',
                                'escape' => false,
                                'class' => 'btn btn-default btn-xs'
                            ]
                    ) ?>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?= $this->Paginator->numbers() ?>