<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Город</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="name1">Имя:</label>
                        <input type="text" class="form-control" name="club_firstname" id="name1"
                               value="<?= $_POST['club_firstname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name2">Фаимилия:</label>
                        <input type="text" class="form-control" name="club_lastname" id="name2"
                               value="<?= $_POST['club_lastname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name3">Имя EN:</label>
                        <input type="text" class="form-control" name="club_firstname_en" id="name3"
                               value="<?= $_POST['club_firstname_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name4">Фаимилия EN:</label>
                        <input type="text" class="form-control" name="club_lastname_en" id="name4"
                               value="<?= $_POST['club_lastname_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Дата рождения:</label>
                        <input type="date" class="form-control" name="club_birth" id="date"
                               value="<?= $_POST['club_birth'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Пол:</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" class="" name="club_sex" id="date" value="0" checked>
                            Мужской</label>
                        <label><input type="radio" class="" name="club_sex" id="date"
                                      value="1" <?php if ($_POST['club_sex'] == 1) echo "checked" ?>>
                            Женский</label>
                    </div>
                    <div class="form-group">
                        <label for="">Подтверждён:</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" class="" name="club_confirm" id="date" value="0" checked>
                            Нет</label>
                        <label><input type="radio" class="" name="club_confirm" id="date"
                                      value="1" <?php if ($_POST['club_confirm'] == 1) echo "checked" ?>> Да</label>
                    </div>
                    <div class="form-group">
                        <label for="club">Класс ST:</label>
                        <select class="form-control" name="class_st_code" id="class_code">
                            <?php
                            $clubs = $controller->model->getClass();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) {
                                    ?>
                                    <option value="<?=$c['class_code']?>" <?php if($_POST['class_st_code'] == $c['club_code']) echo "selected"?>><?=$c['class_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="club">Класс LA:</label>
                        <select class="form-control" name="class_la_code" id="class_code">
                            <?php
                            $clubs = $controller->model->getClass();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) {
                                    ?>
                                    <option value="<?=$c['class_code']?>" <?php if($_POST['class_la_code'] == $c['club_code']) echo "selected"?>><?=$c['class_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="club">Клуб:</label>
                        <select class="form-control" name="club_code" id="club">
                            <?php
                            $clubs = $controller->model->getClubs();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) {
                                    ?>
                                    <option value="<?=$c['club_code']?>" <?php if($_POST['club_code'] == $c['club_code']) echo "selected"?>><?=$c['club_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country_code">Страна:</label>
                        <select class="form-control" id="country_code">
                            <?php
                            $clubs = $controller->model->getCountry();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) {
                                    ?>
                                    <option value="<?=$c['country_code']?>" <?php if($_POST['country_code'] == $c['country_code']) echo "selected"?>><?=$c['country_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="club_index">Индекс:</label>
                        <input type="text" class="form-control" name="club_index" id="club_index"
                               value="<?= $_POST['club_index'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_index">Улица:</label>
                        <input type="text" class="form-control" name="club_street" id="club_street"
                               value="<?= $_POST['club_street'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="club_house">Дом:</label>
                        <input type="text" class="form-control" name="club_house" id="club_house"
                               value="<?= $_POST['club_house'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_flat">Квартира:</label>
                        <input type="text" class="form-control" name="club_flat" id="club_flat"
                               value="<?= $_POST['club_flat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_phone">Телефон:</label>
                        <input type="text" class="form-control" name="club_phone" id="club_phone"
                               value="<?= $_POST['club_phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_mail">Email:</label>
                        <input type="text" class="form-control" name="club_mail" id="club_mail"
                               value="<?= $_POST['club_mail'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_book">Номер классификационной книжки:</label>
                        <input type="text" class="form-control" name="club_book" id="club_book"
                               value="<?= $_POST['club_book'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_card">Номер карты:</label>
                        <input type="text" class="form-control" name="club_card" id="club_card"
                               value="<?= $_POST['club_card'] ?>">
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>