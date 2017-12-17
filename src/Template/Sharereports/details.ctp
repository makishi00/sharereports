<?php
$this->assign('title', '詳細ページ');
?>

<?php $this->start('contents'); ?>
    <hedder>
        <h1>詳細ページ</h1>
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
            <table border="1">
                    <tr>
                        <th>レポートID</th>
                        <td><?= $report->id ?></td>
                    </tr>
                    <tr>
                        <th>報告者名</th>
                        <td><?= $report->Users['us_name'] ?></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><?= $report->Users['us_mail'] ?></td>
                    </tr>
                    <tr>
                        <th>作業日</th>
                        <td><?= $report->rp_date->i18nFormat('YYYY/MM/dd') ?></td>
                    </tr>
                    <tr>
                        <th>作業開始時刻</th>
                        <td><?= $report->rp_time_from->i18nFormat('HH:mm'); ?></td>
                    </tr>
                    <tr>
                        <th>作業終了時刻</th>
                        <td><?= $report->rp_time_to->i18nFormat('HH:mm'); ?></td>
                    </tr>
                    <tr>
                        <th>作業種類名</th>
                        <td><?= $report->Reportcates['rc_name'] ?></td>
                    </tr>
                    <tr>
                        <th>作業内容</th>
                        <td><?= $report->rp_content ?></td>
                    </tr>
                    <tr>
                        <th>レポート登録日時</th>
                        <td><?= $report->rp_created_at->i18nFormat('YYYY/MM/dd') ?></td>
                    </tr>
            </table>
            <a href="/sharereports/edit/<?= $report->id ?>">編集</a>
            <a href="/sharereports/delete/<?= $report->id ?>">削除</a>
        <?php
        }
        ?>
    </div>

<?php $this->end(); ?>