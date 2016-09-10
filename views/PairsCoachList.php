<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Тренер пары</h1>
                <form method="post">
                    <table class="table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Начало</th>
                            <th>Окончение</th>
                            <th>Активность</th>
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
                                        $trainer = $controller->model->getOneCoach($c['coach_code']);
                                        if ($trainer['coach_code'])
                                            echo $trainer['coach_firstname'] . " " . $trainer['coach_lastname'];
                                        else
                                            echo "-";
                                        ?></td>
                                    <td><?= $c['pair_coach_startdate'] ?></td>
                                    <td><?= $c['pair_coach_enddate'] ?></td>
                                    <td><?= $c['pair_coach_active'] ?></td>
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
                <a href="/paircoach/create/pair/<?= $_GET['pair'] ?>" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>