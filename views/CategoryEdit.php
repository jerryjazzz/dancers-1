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
                        <label for="category_name">Название категориии:</label>
                        <input type="text" class="form-control" name="category_name" id="category_name"
                               value="<?= $_POST['category_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_name_en">Название категориии EN:</label>
                        <input type="text" class="form-control" name="category_name_en" id="category_name_en"
                               value="<?= $_POST['category_name_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_name_ua">Название категориии UA:</label>
                        <input type="text" class="form-control" name="category_name_ua" id="category_name_ua"
                               value="<?= $_POST['category_name_ua'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_minage">Нижний допустимый возраст  категории (в полных годах):</label>
                        <input type="text" class="form-control" name="category_minage" id="category_minage"
                               value="<?= $_POST['category_minage'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_maxage">Верхний допустимый возраст  категории (в полных годах):</label>
                        <input type="text" class="form-control" name="category_maxage" id="category_maxage"
                               value="<?= $_POST['category_maxage'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_pos">Индекс позиции категории в списке:</label>
                        <input type="text" class="form-control" name="category_pos" id="category_pos"
                               value="<?= $_POST['category_pos'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_solo">Соло:</label>
                        <select class="form-control" name="category_solo" id="category_solo">
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>