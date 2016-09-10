<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Создание Города</h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name1">Имя:</label>
                        <input type="text" class="form-control" name="city_name" id="name1" value="<?=$_POST['city_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="name2">Название ENG:</label>
                        <input type="text" class="form-control" name="city_name_en" id="name2" value="<?=$_POST['city_name_en']?>">
                    </div>
                    <div class="form-group">
                        <label for="name3">Название UA:</label>
                        <input type="text" class="form-control" name="city_name_ua" id="name3" value="<?=$_POST['city_name_ua']?>">
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>