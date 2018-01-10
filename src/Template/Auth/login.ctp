<?php
$this->assign('title', 'ログインページ');
?>

<?php $this->start('contents'); ?>

    <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading col-md-12">
                <h2 class="panel-title">ログインフォーム</h2>
            </div>
            <div class="panel-body">
                <?= $this->Flash->render() ?>
                <?php
                echo $this->Form->create(null);
                    echo $this->Form->control('us_mail', ['type' => 'email', 'label' => 'メールアドレス']);
                    echo $this->Form->control('us_password', ['type' => 'password', 'label' => 'パスワード']);
                    echo $this->Form->control('ログイン', ['type' => 'submit', 'class' => 'col-sm-offset-8']);
                echo $this->Form->end()
                ?>
            </div>
        </div>
    </div>

<?php $this->end(); ?>


