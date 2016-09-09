<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Страны</h1>
                <form method="post">
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Название ENG</th>
                            <th>Название UA</th>
                            <th>Флаг</th>
                            <th>Города</th>
                            <th>Удалить</th>
                            <th>Изменить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($country) > 0)
                            foreach ($country as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['country_code'] ?></td>
                                    <td><?= $c['country_name'] ?></td>
                                    <td><?= $c['country_name_en'] ?></td>
                                    <td><?= $c['country_name_ua'] ?></td>
                                    <td><img src="<?= $config->BASE_URL . "/online/img/" . $c['country_flag'] ?>"
                                             class="img-flag"/></td>
                                    <td><a class="btn btn-info" href="/city/views/country/<?= $c['country_code'] ?>">Города</a></td>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['country_code'] ?>" class="btn btn-danger">Удалить</button>
                                    </td>
                                    <td><a href="/country/edit/id/<?= $c['country_code'] ?>" class="btn btn-success">Изменить</a>
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
                            <a href="<?= $config->BASE_URL ?>/country/views/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                </ul>
                <a href="/country/create" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>