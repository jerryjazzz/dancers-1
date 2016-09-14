<?php
head();
?>
    <div category="container">
        <div category="row">
            <div category="col-md-12">
                <h1>Классы</h1>
                <table category="table-striped">
                    <thead>
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
                        if (count($category) > 0)
                            foreach ($category as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['category_code'] ?></td>
                                    <td><?= $c['category_name'] ?></td>
                                    <td>
                                        <button type="submit" name="del" value="<?= $c['category_code'] ?>"
                                                category="btn btn-danger">Удалить
                                        </button>
                                    </td>
                                    <td><a href="/category/edit/id/<?= $c['category_code'] ?>" category="btn btn-success">Изменить</a>
                                    </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </form>
                </table>
                <ul category="pagination">
                    <?php
                    if ($_GET['page'] > 4) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/category/views/page/1">1</a>
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
                        <li category="<?php if ($_GET['page'] == $i) echo "active" ?>">
                            <a href="<?= $config->BASE_URL ?>/category/views/page/<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?
                        $i++;
                    }
                    ?>
                    <?php
                    if ($_GET['page'] < $pages - 3 && $pages > 5) {
                        ?>
                        <li>
                            <a href="<?= $config->BASE_URL ?>/category/views/page/<?= $pages ?>"><?= $pages ?></a>
                        </li>
                        <?
                    }
                    ?>
                </ul>
                <a href="/category/create/" category="add btn btn-success">Создать</a>
            </div>
        </div>
    </div>
<?
footer();
?>