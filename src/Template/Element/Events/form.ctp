<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <button type="button" class="btn btn-primary" id="facebook">
            Carregar eventos do Facebook
        </button>
    </div>
</div>

<div class="row" style="display: none;" id="container-loader">
    <br>
    <div class="col-md-6 col-md-offset-2">
        <div class="progress">
            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="">Carregando eventos</span>
            </div>
        </div>
    </div>
</div>

<div class="row" style="display: none;" id="container-combo-eventos">
    <br>
    <label class="col-md-2 control-label">Evento do Facebook</label>
    <div class="col-md-6">
        <select class="form-control" id="eventos-facebook">
        </select>
    </div>
</div>

<br>
<?= $this->Form->input('imagem_capa_placeholder', [
    'type' => 'file',
    'label' => 'Imagem',
    'help' => 'A imagem deve conter no máximo 1 MB e estar no formato JPG ou PNG.'
]) ?>

<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div id="cont-facebook-image" style="<?= !$event->facebook_img ? 'display: none' : '' ?>">
            <div style="margin: 10px 0;">
                <strong> ou </strong>
            </div>
            <button
                type="button"
                class="btn btn-danger"
                id="use-facebook-image"
                style="<?= $event->facebook_img ? 'display: none' : '' ?>">
                Usar imagem do Facebook
            </button>
        </div>
        <button type="button" class="btn btn-default" id="use-mypc-image" style="display: none;">
            Escolher imagem do seu computador
        </button>
        <div id="cont-image">
            <?php if ($event->facebook_img): ?>
                <img src="<?= $event->facebook_img ?>" alt="">
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->Form->input('facebook_img', ['type' => 'hidden']) ?>

<br>

<?= $this->Form->input('name', ['label' => 'Nome']) ?>
<?= $this->Form->input('descricao', ['type' => 'textarea', 'rows' => 10]) ?>

<div class="form-group">
    <label for="" class="col-md-2 control-label">Data de início</label>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                <?= $this->Form->day('data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
            <div class="col-md-3">
                <?= $this->Form->month('data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
            <div class="col-md-3">
                <?= $this->Form->year('data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="" class="control-label col-md-2">Horário de início</label>    
    <div class="col-md-8">
    <?= $this->Form->input('data_inicio', [
        'type' => 'time', 'label' => false, 'class' => 'form-control'
    ]) ?>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-md-2 control-label">Data de término</label>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                <?= $this->Form->day('data_fim', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
            <div class="col-md-3">
                <?= $this->Form->month('data_fim', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
            <div class="col-md-3">
                <?= $this->Form->year('data_fim', ['label' => false, 'class' => 'form-control']) ?>          
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="" class="control-label col-md-2">Horário de Término</label>    
    <div class="col-md-8">
    <?= $this->Form->input('data_fim', [
        'type' => 'time', 'label' => false, 'class' => 'form-control'
    ]) ?>
    </div>
</div>


<hr>

<h4>Lista VIP</h4>
<?= $this->Form->input('lista_vip_qtd_fem', ['type' => 'text', 'label' => 'Qtd. Feminino', 'default' => 0, 'style' => 'width: 80px']) ?>
<?= $this->Form->input('lista_vip_qtd_masc', ['type' => 'text', 'label' => 'Qtd. Masculino', 'default' => 0, 'style' => 'width: 80px']) ?>

<div id="cont-vip-list-date" style="<?= $event->lista_vip_qtd_fem > 0 || $event->lista_vip_qtd_masc > 0 ? '' : 'display: none;' ?>">
    <?= $this->Form->input('descricao_lista_vip', ['type' => 'textarea', 'rows' => 4]) ?>

    <div class="form-group">
        <label for="" class="col-md-2 control-label">Data de início</label>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-2">
                    <?= $this->Form->day('lista_vip_data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
                <div class="col-md-3">
                    <?= $this->Form->month('lista_vip_data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
                <div class="col-md-3">
                    <?= $this->Form->year('lista_vip_data_inicio', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
            </div>
        </div>
    </div>

<div class="form-group">
    <label for="" class="control-label col-md-2">Horário de Início</label>    
    <div class="col-md-8">
    <?= $this->Form->input('lista_vip_data_inicio', [
        'type' => 'time', 'label' => false, 'class' => 'form-control'
    ]) ?>
    </div>
</div>

    <div class="form-group">
        <label for="" class="col-md-2 control-label">Data de Término</label>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-2">
                    <?= $this->Form->day('lista_vip_data_fim', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
                <div class="col-md-3">
                    <?= $this->Form->month('lista_vip_data_fim', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
                <div class="col-md-3">
                    <?= $this->Form->year('lista_vip_data_fim', ['label' => false, 'class' => 'form-control']) ?>          
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="" class="control-label col-md-2">Horário de Término</label>    
        <div class="col-md-8">
        <?= $this->Form->input('lista_vip_data_fim', [
            'type' => 'time', 'label' => false, 'class' => 'form-control'
        ]) ?>
        </div>
    </div>
</div>

<hr>

<?= $this->Form->input('tag_string', ['label' => 'Tags', 'help' => 'Separar as tags com vírgula']) ?>

<hr>

<br>

<?= $this->Form->input('is_active', ['type' => 'checkbox', 'label' => 'Publicar']) ?>

<hr>
<br>