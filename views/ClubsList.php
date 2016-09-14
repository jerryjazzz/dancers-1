<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Танцоры</h1>
                <table class="table-striped">
                    <thead>
                    <tr class="filter">
                        <form method="post"
                              onsubmit="document.location.href = '/dancers/views/name/'+name.value+'/lastname/'+lastname.value+'/club/'+club.value; return false;">
                            <th colspan="2"><input type="text" placeholder="Имя" id="name" name="name"
                                                   class="form-control" value="<?= $_GET['name'] ?>"/></th>
                            <th colspan="2"><input type="text" placeholder="Фамилия" id="lastname" class="form-control"
                                                   value="<?= $_GET['lastname'] ?>"/></th>
                            <th colspan="2">
                                <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                        data-live-search="true" id="club">
                                    <option value=""
                                            data-subtext="" selected>Все</option>
                                    <?php
                                    $clubs = $controller->model->getClubs();
                                    if (count($clubs) > 0)
                                        foreach ($clubs as &$c) { ?>
                                            <option value="<?= $c['club_code'] ?>"
                                                    data-subtext="<?= $c['club_code'] ?>" <?php if($_GET['club']==$c['club_code']) echo "selected";?>><?= $c['club_name'] ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </th>
                            <th></th>
                            <th colspan="1">
                                <button class="btn btn-success">Поиск</button>
                            </th>
                        </form>
                        <th>
                            <button class="btn btn-danger" onclick="document.location.href = '/dancers/views';">
                                Сбросить
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>День Рождения</th>
                        <th>Класс</th>
                        <th>Клуб</th>
                        <th>Удалить</th>
                        <th>Изменить</th>
                    </tr>
                    </thead>
                    <form method="post">
                        <tbody>
                        <?php
                        if (count($dancers) > 0)
                            foreach ($dancers as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['dancer_code'] ?></td>
                                    <td><?= $c['dancer_firstname'] ?></td>
                                    <td><?= $c['dancer_lastname'] ?></td>
                                    <td><?= $c['dancer_birth'] ?></td>
                                    <td><?= $c['class_code'] ?></td>
                                    <td><?= $c['dancer_club'] ?></td>
                                    <td><a href="/pairs/views/dancer/<?= $c['dancer_code'] ?>" class="btn btn-primary">Пары</a>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['dancer_code'] ?>"
                                                class="btn btn-danger">Удалить
                                        </button>
                                    </td>
                                    <td><a href="/dancers/edit/id/<?= $c['dancer_code'] ?>" class="btn btn-success">Изменить</a>
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
                            <a href="<?= $config->BASE_URL ?>/dancers/views/name/<?=$_GET['name']?>/lastname/<?=$_GET['lastname']?>/club/<?=$_GET['club']?>/page/1">1</a>
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
                            <a href="<?= $config->BASE_URL ?>/dancers/views/name/<?=$_GET['name']?>/lastname/<?=$_GET['lastname']?>/club/<?=$_GET['club']?>/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                    <?php
                    if ($_GET['page'] < $pages - 3 && $pages > 5) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/dancers/views/name/<?=$_GET['name']?>/lastname/<?=$_GET['lastname']?>/club/<?=$_GET['club']?>/page/<?= $pages ?>"><?= $pages ?></a>
                        </li>
                        <?
                    }
                    ?>
                </ul>
                <a href="/dancers/create/" class="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>