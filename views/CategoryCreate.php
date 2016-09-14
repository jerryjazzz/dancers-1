<?php
global $config;
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Клуб</h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class_name">Название класса:</label>
                        <input type="text" class="form-control" name="class_name" id="class_name"
                               value="<?= $_POST['class_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_name_en">Название класса EN:</label>
                        <input type="text" class="form-control" name="class_name_en" id="class_name_en"
                               value="<?= $_POST['class_name_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_name_ua">Название класса UA:</label>
                        <input type="text" class="form-control" name="class_name_ua" id="class_name_ua"
                               value="<?= $_POST['class_name_ua'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_add1">Добавочный класс 1:</label>
                        <input type="text" class="form-control" name="class_add1" id="class_add1"
                               value="<?= $_POST['class_add1'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_add2">Добавочный класс 2:</label>
                        <input type="text" class="form-control" name="class_add2" id="class_add2"
                               value="<?= $_POST['class_add2'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_pos">Позиция в списке присвоения класса:</label>
                        <input type="text" class="form-control" name="class_pos" id="class_pos"
                               value="<?= $_POST['class_pos'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_regpos">Позиция в списке Регистрации:</label>
                        <input type="text" class="form-control" name="class_regpos" id="class_regpos"
                               value="<?= $_POST['class_regpos'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_letter">Буква обозначающая класс:</label>
                        <input type="text" class="form-control" name="class_letter" id="class_letter"
                               value="<?= $_POST['class_letter'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_letter_en">Буква обозначающая класс EN:</label>
                        <input type="text" class="form-control" name="class_letter_en" id="class_letter_en"
                               value="<?= $_POST['class_letter_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_letter_ua">Буква обозначающая класс UA:</label>
                        <input type="text" class="form-control" name="class_letter_ua" id="class_letter_ua"
                               value="<?= $_POST['class_letter_ua'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="class_outsum">Cумма баллов для перехода в следующий класс:</label>
                        <input type="text" class="form-control" name="class_outsum" id="class_outsum"
                               value="<?= $_POST['class_outsum'] ?>">
                    </div>

                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>