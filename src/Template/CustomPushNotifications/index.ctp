<?= $this->assign('title', ' - Notificações Push') ?>
<?= $this->Html->script('CustomPushNotifications/index', ['inline' => false]) ?>

<?= $this->element('breadcrumb', ['title' => 'Notificações Push']) ?>

<?= $this->Flash->render() ?>

<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Criar notificação',
    ['action' => 'add'],
    [
        'escape' => false,
        'class' => 'btn btn-danger pull-right'
    ]) ?>

<br style="clear: both;">

<br>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 250px;">
                    <?= $this->Paginator->sort('title', 'Título') ?>
                </th>
                <th>
                    <?= $this->Paginator->sort('message', 'Mensagem') ?>
                </th>
                <th style="width: 140px;" class="text-center">Último envio</th>
                <th style="width: 80px;"></th>
                <th style="width: 80px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notifications as $notification): ?>
                <tr>
                    <td>
                        <?= $notification->title ?>
                    </td>
                    <td>
                        <?= $notification->message ?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <h4>
                        <span class="label label-success">
                            <?php if (!($notification->last_sended)): ?>
                                Nunca enviado
                            <?php else: ?>
                                <?= $this->Time->timeAgoInWords($notification->last_sended) ?>
                            <?php endif ?>
                        </span>
                        </h4>
                    </td>
                    <td style="vertical-align: middle">
                        <button
                            data-url="<?= $this->Url->build(['controller' => 'CustomPushNotifications', 'action' => 'send', '_ext' => 'json', $notification->id])?>"
                            id="send-notification"
                            type="button"
                            class="btn btn-block btn-primary">
                            <span class="glyphicon glyphicon-send"></span> Enviar notificação
                        </button>
                        
                        <div style="display: none; margin-top: 10px;" id="loader">
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?= $this->Html->link(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            ['action' => 'edit', $notification->id],
                            ['escape' => false, 'class' => '']
                        ) ?>
                        &nbsp;
                        <?= $this->Form->postLink(
                            '<span class="glyphicon glyphicon-remove"></span>',
                            ['action' => 'delete', $notification->id],
                            ['escape' => false, 'confirm' => 'Você realmente deseja deletar esta notificação?']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach ?>
            <?php if (count($notifications) == 0): ?>
                <tr>
                    <td colspan="10"><em>Nenhuma notificação criada até agora.</em></td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>