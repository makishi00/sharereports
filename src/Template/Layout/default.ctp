<!DOCTYPE html>
<html>
<head lang="ja">
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
</head>
<body>
<div id="wrapper" class="container-fluid">


    <div id="contents" class="row">
        <?= $this->fetch('contents') ?>
    </div>



</div>
</body>
</html>



