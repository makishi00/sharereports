<?php
$this->assign('title', '新規登録');
?>

<?php $this->start('contents'); ?>
    <hedder>
        <h1>新規登録ページ</h1>
        <span><?= $userName ?></span>
        <a href="/auth/logout">ログアウト</a>
    </hedder>

    <div>
        <h2>レポートリスト</h2>
        <?= $this->Flash->render() ?>
        <?php
        if($report === null) {
            echo '不正なアクセスです。';
        } else {
            ?>
            <?= $this->Form->create($report); ?>
            <table border="1">
                <tr>
                    <th>作業日</th>
                    <td>
                        <?=
                        $this->Form->control("rp_date",
                            [
                                'type' => 'date',
                                'label' => false,
                                'dateFormat' => 'YMD',
                                'monthNames' => false,
                                'empty' => array('year' => '年', 'month' => '月', 'day' => '日'),
                            ]
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>作業開始時刻</th>
                    <td>
                        <?=
                        $this->Form->control("rp_time_from",
                            [
                                'type' => 'time',
                                'label' => false,
                            ]
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>作業終了時刻</th>
                    <td>
                        <?=
                        $this->Form->control("rp_time_to",
                            [
                                'type' => 'time',
                                'label' => false,
                            ]
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>作業種類名</th>
                    <td>
                        <?=
                        $this->Form->input('reportcate_id',
                            [
                                'type' => 'select',
                                'options' => $reportcateOption,
                                'id' => "id_name",
                                'class' => 'class_name',
                                'label' => false
                            ]
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>作業内容</th>
                    <td>
                        <?=
                        $this->Form->control("rp_content",
                            [
                                'type' => 'textarea',
                                'label' => false,
                            ]
                        );
                        ?>
                    </td>
                </tr>

            </table>
            <?= $this->Form->control('追加', ['type' => 'submit']); ?>
            <?= $this->Form->end() ?>
            <?php
        }
        ?>
    </div>

<?php $this->end(); ?>