<?php
$this->assign('title', '編集ページ');
?>

<?php $this->start('contents'); ?>
    <hedder>
        <a href="/sharereports/index">TOP</a>
        <h1>編集ページ</h1>
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
                        <th>レポートID</th>
                        <td>
                            <?= $report->id ?>
                            <?=
                            $this->Form->control("id",
                                [
                                    'type' => 'hidden',
                                    'label' => false,
                                ]
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>報告者名</th>
                        <td>
                            <?= $report->Users['us_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <?= $report->Users['us_mail'] ?>
                        </td>
                    </tr>
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
                                        'default' => $report->reportcate_id,
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
                                    'type' => 'text',
                                    'label' => false,
                                ]
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>レポート登録日時</th>
                        <td><?= $report->rp_created_at->i18nFormat('YYYY/MM/dd') ?></td>
                    </tr>
                </table>
            <?= $this->Form->control('編集', ['type' => 'submit']); ?>
            <?= $this->Form->end() ?>
            <?php
        }
        ?>
    </div>

<?php $this->end(); ?>