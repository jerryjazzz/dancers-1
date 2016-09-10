<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Создание страны</h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name1">Имя:</label>
                        <input type="text" class="form-control" name="country_name" id="name1" value="<?=$_POST['country_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="name2">Название ENG:</label>
                        <input type="text" class="form-control" name="country_name_en" id="name2" value="<?=$_POST['country_name_en']?>">
                    </div>
                    <div class="form-group">
                        <label for="name3">Название UA:</label>
                        <input type="text" class="form-control" name="country_name_ua" id="name3" value="<?=$_POST['country_name_ua']?>">
                    </div>
                    <div class="form-group">
                        <label for="name4">Флаг:</label>
                        <input type="file" class="form-control" name="country_flag" id="name4" value="<?=$_POST['country_flag']?>">
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>