<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Клубы</h1>
                <table class="table-striped">
                    <thead>
                    <tr class="filter">
                        <form method="post"
                              onsubmit="document.location.href = '/clubs/views/name/'+name.value; return false;">
                            <th colspan="2"><input type="text" placeholder="Название" id="name" name="name"
                                                   class="form-control" value="<?= $_GET['name'] ?>"/></th>
                            <th colspan="1">
                                <button class="btn btn-success">Поиск</button>
                            </th>
                        </form>
                        <th>
                            <button class="btn btn-danger" onclick="document.location.href = '/clubs/views';">
                                Сбросить
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Удалить</th>
                        <th>Изменить</th>
                    </tr>
                    </thead>
                    <form method="post">
                        <tbody>
                        <?php
                        if (count($clubs) > 0)
                            foreach ($clubs as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['club_code'] ?></td>
                                    <td><?= $c['club_name'] ?></td>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['club_code'] ?>"
                                                class="btn btn-danger">Удалить
                                        </button>
                                    </td>
                                    <td><a href="/clubs/edit/id/<?= $c['club_code'] ?>" class="btn btn-success">Изменить</a>
                                    </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </form>
                </table>
                <ul class="pagination">
                    <?php
                    if ($_GET['page'] > 4) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/clubs/views/name/<?=$_GET['name']?>/page/1">1</a>
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
                            <a href="<?= $config->BASE_URL ?>/clubs/views/name/<?=$_GET['name']?>/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                    <?php
                    if ($_GET['page'] < $pages - 3 && $pages > 5) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/clubs/views/name/<?=$_GET['name']?>/page/<?= $pages ?>"><?= $pages ?></a>
                        </li>
                        <?
                    }
                    ?>
                </ul>
                <a href="/clubs/create/" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>