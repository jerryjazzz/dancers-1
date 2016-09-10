<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Пара</h1>
                <?php
                $dancer = $controller->model->getOneDancer($_GET['dancer']);
                ?>
                <form method="post">
                    <?php if ($dancer['dancer_sex'] == 0) { ?>
                        <div class="form-group">
                            <label for="man_code">Мужчина:</label>
                            <input type="hidden" value="<?= $_GET['dancer'] ?>" name="man_code"/>
                            <input type="text" class="form-control" value="<?= $dancer['dancer_firstname']." ".$dancer['dancer_lastname']?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="woman_code">Код женщины:</label>
                            <input type="text" class="form-control" name="woman_code" placeholder="Код женщины"/>
                        </div>
                    <?php }else{?>
                        <div class="form-group">
                            <label for="woman_code">Женщина:</label>
                            <input type="hidden" value="<?= $_GET['dancer'] ?>" name="woman_code"/>
                            <input type="text" class="form-control" value="<?= $dancer['dancer_firstname']." ".$dancer['dancer_lastname']?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="man_code">Код мужщины:</label>
                            <input type="text" class="form-control" name="man_code" placeholder="Код мужщины"/>
                        </div>
                    <?} ?>
                    <div class="form-group">
                        <label for="pair_statrdate">Клуб:</label>
                        <select class="selectpicker form-control" name="club_code"  data-show-subtext="true" data-live-search="true"
                                data-live-search="true" id="club">
                            <?php
                            $clubs = $controller->model->getClubs();
                            if (count($clubs) > 0)
                                foreach ($clubs as &$c) { ?>
                                    <option value="<?= $c['club_code'] ?>"
                                            data-subtext="<?= $c['club_code'] ?>"><?= $c['club_name'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pair_active">Активность:</label>
                        <select class="form-control" name="pair_active"  data-show-subtext="true" data-live-search="true"
                                data-live-search="true" id="pair_active">
                            <option value="1">Активны</option>
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