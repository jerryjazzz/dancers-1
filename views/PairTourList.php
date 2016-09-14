<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Пары</h1>
                <form method="post">
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя М</th>
                            <th>Имя Ж</th>
                            <th>Создана</th>
                            <th>Окончена</th>
                            <th>Активность</th>
                            <th>Клуб</th>
                            <th>Тренеры</th>
                            <th>Удалить</th>
                            <th>Изменить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($pairs) > 0)
                            foreach ($pairs as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['pair_code'] ?></td>
                                    <td><?php
                                        $dancer = $controller->model->getOneDancer($c['man_code']);
                                        if ($dancer['dancer_code'])
                                            echo $dancer['dancer_firstname'] . " " . $dancer['dancer_lastname'];
                                        else
                                            echo "-";
                                        ?></td>
                                    <td><?php
                                        $dancer = $controller->model->getOneDancer($c['woman_code']);
                                        if ($dancer['dancer_code'])
                                            echo $dancer['dancer_firstname'] . " " . $dancer['dancer_lastname'];
                                        else
                                            echo "-";
                                        ?></td>
                                    <td><?= $c['pair_statrdate'] ?></td>
                                    <td><?= $c['pair_enddate'] ?></td>
                                    <td><?= $c['pair_active'] ?></td>
                                    <td><?php
                                        $club = $controller->model->getOneClub($c['club_code']);
                                        echo $club['club_name'];
                                        ?>
                                    </td>
                                    <td><a href="/paircoach/views/pair/<?= $c['pair_code'] ?>" class="btn btn-primary">Тренеры</a>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['pair_code'] ?>"
                                                class="btn btn-danger">Удалить
                                        </button>
                                    </td>
                                    <td>
                                        <?php
                                        if ($c['pair_active'] == 1) {
                                            ?>
                                            <button type="submit" name="off" value="<?= $c['pair_code'] ?>"
                                                    class="btn btn-default">Отключить
                                            </button>
                                        <?php } else {
                                            ?>
                                            <button type="submit" name="on" value="<?= $c['pair_code'] ?>"
                                                    class="btn btn-default">Включить
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <? } else {
                            echo "<tr><td colspan='9'>Пары ещё нет</td></tr>";
                        } ?>
                        </tbody>
                    </table>
                </form>
                <ul class="pagination">
                    <?php
                    if ($_GET['page'] > 4) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/pair/views/page/1">1</a>
                        </li>
                        <?
                    }
                    ?>
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
                            <a href="<?= $config->BASE_URL ?>/pair/views/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                    <?php
                    if ($_GET['page'] < $pages - 3 && $pages > 5) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/pair/views/page/<?= $pages ?>"><?= $pages ?></a>
                        </li>
                        <?
                    }
                    ?>
                </ul>
                <a href="/pairs/create/dancer/<?= $_GET['dancer'] ?>" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>