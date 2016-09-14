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
                        <label for="club_name">Название клуба:</label>
                        <input type="text" class="form-control" name="club_name" id="club_name"
                               value="<?= $_POST['club_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_boss">Босс:</label>
                        <input type="text" class="form-control" name="club_boss" id="club_boss"
                               value="<?= $_POST['club_boss'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_name_en">Название клуба EN:</label>
                        <input type="text" class="form-control" name="club_name_en" id="club_name_en"
                               value="<?= $_POST['club_name_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_boss_en">Босс EN:</label>
                        <input type="text" class="form-control" name="club_boss_en" id="club_boss_en"
                               value="<?= $_POST['club_boss_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_boss_ua">Босс UA:</label>
                        <input type="text" class="form-control" name="club_boss_ua" id="club_boss_ua"
                               value="<?= $_POST['club_boss_ua'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_name_ua">Название клуба UA:</label>
                        <input type="text" class="form-control" name="club_name_ua" id="club_name_ua"
                               value="<?= $_POST['club_name_ua'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="club_city">Город:</label>
                        <input type="text" class="form-control" name="club_city" id="club_city"
                               value="<?= $_POST['club_city'] ?>">
                    </div>

                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"/>
                    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
                    <script>
                        $( "#club_city" ).autocomplete({
                            source: function( request, response ) {
                                var qs = request.term;
                                $.ajax( {
                                    type: "POST",
                                    url: "/ajax/city/",
                                    data: {
                                        q : qs,
                                    },
                                    dataType: "json",
                                    success: function( data ) {
                                        response( data );
                                    }
                                } );
                            },
                            minLength: 2,
                            select: function( event, ui ) {
                                console.log( "Selected: " + ui.item.label );
                            }
                        } );
                    </script>
                    <div class="form-group">
                        <label for="club_index">Индекс:</label>
                        <input type="text" class="form-control" name="club_index" id="club_index"
                               value="<?= $_POST['club_index'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_street">Улица:</label>
                        <input type="text" class="form-control" name="club_street" id="club_street"
                               value="<?= $_POST['club_street'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_street_en">Улица EN:</label>
                        <input type="text" class="form-control" name="club_street_en" id="club_street_en"
                               value="<?= $_POST['club_street_en'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_street_ua">Улица UA:</label>
                        <input type="text" class="form-control" name="club_street_ua" id="club_street_ua"
                               value="<?= $_POST['club_street_ua'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_phone">Телефон:</label>
                        <input type="text" class="form-control" name="club_phone" id="club_phone"
                               value="<?= $_POST['club_phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_fax">Факс:</label>
                        <input type="text" class="form-control" name="club_fax" id="club_fax"
                               value="<?= $_POST['club_fax'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_mail">EMAIL:</label>
                        <input type="text" class="form-control" name="club_mail" id="club_mail"
                               value="<?= $_POST['club_mail'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_site">Сайт:</label>
                        <input type="text" class="form-control" name="club_site" id="club_site"
                               value="<?= $_POST['club_site'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_logo">Лого:</label>
                        <input type="file" class="form-control" name="club_logo" id="club_logo"
                               value="<?= $_POST['club_logo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="club_pageinfo">Страничка с информацией:</label>
                        <textarea class="form-control" name="club_pageinfo"><?= $_POST['club_pageinfo'] ?></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?
footer();
?>