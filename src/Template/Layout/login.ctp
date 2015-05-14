<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Pullse Club<?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('../components/bootstrap/dist/css/bootstrap') ?>
    <?= $this->Html->css('style') ?>

    <?= $this->Html->script('../components/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../components/bootstrap/dist/js/bootstrap.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

</body>
</html>
