<?= $this->assign('title', ' - Usuários') ?>

<?= $this->element('breadcrumb', [
    'title' => 'Usuários'
]) ?>

<?= $this->Flash->render() ?>

<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Criar usuário',
    ['action' => 'add'],
    [
        'escape' => false,
        'class' => 'btn btn-danger pull-right'
    ]) ?>

<br style="clear: both;">

<br>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th style="width: 250px;">
                <?= $this->Paginator->sort('Email') ?>
            </th>
            <th>
                <?= $this->Paginator->sort('name', 'Nome') ?>
            </th>
            <th style="width: 110px;" class="text-center">
                <?= $this->Paginator->sort('is_active', 'Status') ?>
            </th>
            <th style="width: 80px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admUsers as $user): ?>
            <tr>
                <td>
                    <?= $user->username ?>
                </td>
                <td>
                    <?= $user->name ?>
                </td>
                <td class="text-center">
                    <?= $this->BootstrapText->labelBoolean($user->is_active, 'Ativo', 'Inativo') ?>
                </td>
                <td class="text-center">
                    <?= $this->Html->link(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        ['action' => 'edit', $user->id],
                        ['escape' => false]
                    ) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>