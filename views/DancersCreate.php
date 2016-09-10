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
                        <input type="text" class="form-control" name="dancer_firstname" id="name1"
                               value="<?= $_POST['dancer_firstname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name2">Фаимилия:</label>
                        <input type="text" class="form-control" name="dancer_lastname" id="name2"
                               value="<?= $_POST['dancer_lastname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name3">Имя EN:</label>
                        <input type="text" class="form-control" name="dancer_firstname_en" id="name3"
                               value="<?= $_POST['dancer_firstname_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name4">Фаимилия EN:</label>
                        <input type="text" class="form-control" name="dancer_lastname_en" id="name4"
                               value="<?= $_POST['dancer_lastname_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Дата рождения:</label>
                        <input type="date" class="form-control" name="dancer_birth" id="date"
                               value="<?= $_POST['dancer_birth'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Пол:</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" class="" name="dancer_sex" id="date" value="0" checked>
                            Мужской</label>
                        <label><input type="radio" class="" name="dancer_sex" id="date"
                                      value="1" <?php if ($_POST['dancer_sex'] == 1) echo "checked" ?>>
                            Женский</label>
                    </div>
                    <div class="form-group">
                        <label for="">Подтверждён:</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" class="" name="dancer_confirm" id="date" value="0" checked>
                            Нет</label>
                        <label><input type="radio" class="" name="dancer_confirm" id="date"
                                      value="1" <?php if ($_POST['dancer_confirm'] == 1) echo "checked" ?>> Да</label>
                    </div>
                    <div class="form-group">
                        <label for="club">Класс:</label>
                        <select class="form-control" name="class_code" id="class_code">
                            <?php
                            $clubs = $controller->model->getClass();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) {
                                    ?>
                                    <option value="<?=$c['class_code']?>" <?php if($_POST['class_code'] == $c['club_code']) echo "selected"?>><?=$c['class_name']?></option>
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
                        <label for="dancer_index">Индекс:</label>
                        <input type="text" class="form-control" name="dancer_index" id="dancer_index"
                               value="<?= $_POST['dancer_index'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_index">Улица:</label>
                        <input type="text" class="form-control" name="dancer_street" id="dancer_street"
                               value="<?= $_POST['dancer_street'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="dancer_house">Дом:</label>
                        <input type="text" class="form-control" name="dancer_house" id="dancer_house"
                               value="<?= $_POST['dancer_house'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_flat">Квартира:</label>
                        <input type="text" class="form-control" name="dancer_flat" id="dancer_flat"
                               value="<?= $_POST['dancer_flat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_phone">Телефон:</label>
                        <input type="text" class="form-control" name="dancer_phone" id="dancer_phone"
                               value="<?= $_POST['dancer_phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_mail">Email:</label>
                        <input type="text" class="form-control" name="dancer_mail" id="dancer_mail"
                               value="<?= $_POST['dancer_mail'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_book">Номер классификационной книжки:</label>
                        <input type="text" class="form-control" name="dancer_book" id="dancer_book"
                               value="<?= $_POST['dancer_book'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dancer_card">Номер карты:</label>
                        <input type="text" class="form-control" name="dancer_card" id="dancer_card"
                               value="<?= $_POST['dancer_card'] ?>">
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>