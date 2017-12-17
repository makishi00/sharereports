<?php
$this->assign('title', 'TOP');
?>

<?php $this->start('contents'); ?>
    <hedder>
        <h1>トップページ</h1>
        <span><?= $userName ?></span>
        <a href="/auth/logout">ログアウト</a>
    </hedder>

    <div>
        <h2>レポートリスト</h2>
        <?php
        if($reportsState === null) {
            echo '情報が存在しません。';
        } else {
        ?>
            <table border="1">
                <tr>
                    <th>作業日</th>
                    <th>作業内容の最初の10文字</th>
                    <th>報告者名</th>
                    <th>詳細</th>

                </tr>
                <?php
                //テーブル表示
                foreach ($reports as $key => $vlue) {

                    echo "<tr>";
                    echo "<td>";
                    echo $vlue->rp_date->i18nFormat('YYYY/MM/dd');
                    echo "</td>";
                    echo "<td>";
                    mb_strlen($vlue->rp_content) > 10 ? print(substr($vlue->rp_content, 0, 10)) : print($vlue->rp_content);
                    echo "</td>";
                    echo "<td>";
                    echo $vlue->Users['us_name'];
                    echo "</td>";
                    echo "<td>";
                    echo "<button><a href='/sharereports/details/$vlue->id'>詳細を見る</a></button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>

            </table>
            <?= $this->Paginator->first('<<first'); ?>
            <?= $this->Paginator->prev('<prev'); ?>
            <?= $this->Paginator->numbers(); ?>
            <?= $this->Paginator->next('next>'); ?>
            <?= $this->Paginator->last('last>>'); ?>
        <?php
        }
        ?>

    </div>

<?php $this->end(); ?>