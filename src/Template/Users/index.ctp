<?= $this->assign('title', ' - Clientes') ?>

<?= $this->element('breadcrumb', [
    'title' => 'Clientes'
]) ?>

<?= $this->Flash->render() ?>

<div>
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
        <input
            type="text"
            name="q"
            class="form-control"
            placeholder="Pesquisar por nome"
            value="<?= $this->request->query('q') ?>">

        <label for="">Idade</label>
        <input
            type="text"
            class="form-control"
            style="width: 60px;"
            placeholder="De"
            name="idade_min"
            value="<?= $this->request->query('idade_min') ?>">
        <input
            type="text"
            class="form-control"
            style="width: 60px;"
            name="idade_max"
            placeholder="Até"
            value="<?= $this->request->query('idade_max') ?>">

        <button type="submit" class="btn btn-danger">
            <span class="glyphicon glyphicon-search"></span>
        </button>
    <?= $this->Form->end() ?>
</div>

<hr>

<br>

<div class="row">
    <?php foreach ($users as $user): ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                        <div class="media">
                            <div class="media-left">
                                <?= $this->Html->image(
                                    'https://graph.facebook.com/' . (string)$user->facebook_uid . '/picture?width=80&height=80',
                                    [
                                        'class' => 'img-rounded',
                                        'width' => 80,
                                        'height' => 80,
                                        'style' => 'background-color: #EEE;'
                                    ]
                                ) ?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?= $user->name ?>
                                </h4>
                                <span class="text-muted"><?= $user->email ?></span>
                                <br>
                                <span class="text-muted"><?= $user->dt_nascimento->diff(new \Datetime)->y ?> anos</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <?php if (count($users) < 1): ?>
        <div class="col-md-12">
            <h4>
                <em>Nenhum cliente cadastrado.</em>
            </h4>
        </div>
    <?php endif ?>
</div>

<?= $this->Paginator->numbers() ?>