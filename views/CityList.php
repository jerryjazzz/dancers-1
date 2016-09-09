<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Город</h1>
                <form method="post">
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Название ENG</th>
                            <th>Название UA</th>
                            <th>Удалить</th>
                            <th>Изменить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($city) > 0)
                            foreach ($city as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['city_code'] ?></td>
                                    <td><?= $c['city_name'] ?></td>
                                    <td><?= $c['city_name_en'] ?></td>
                                    <td><?= $c['city_name_ua'] ?></td>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['city_code'] ?>" class="btn btn-danger">Удалить</button>
                                    </td>
                                    <td><a href="/city/edit/id/<?= $c['city_code'] ?>" class="btn btn-success">Изменить</a>
                                    </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </form>
                <ul class="pagination">
                    <?php
                    if ($_GET['page'] < 3)
                        $s = 1;
                    elseif ($_GET['page'] > $pages - 3 && $pages - 3 > 0)
                        $s = $pages - 3;
                    else
                        $s = $_GET['page'] - 2;
                    $i = $s;
                    while ($i < $s + 5 and $i <= $pages) {
                        ?>
                        <li class="<?php if ($_GET['page'] == $i) echo "active" ?>">
                            <a href="<?= $config->BASE_URL ?>/city/views/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                </ul>
                <a href="/city/create" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>