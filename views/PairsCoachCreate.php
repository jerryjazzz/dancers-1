<?php
head();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Тренер для пары</h1>
                <?php
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="pair_statrdate">Тренер:</label>
                        <select class="selectpicker form-control" name="coach_code"  data-show-subtext="true" data-live-search="true"
                                data-live-search="true" id="club">
                            <?php
                            if (count($coach) > 0)
                                foreach ($coach as &$c) { ?>
                                    <option value="<?= $c['coach_code'] ?>"
                                            data-subtext="<?= $c['coach_firstname'] ?>"><?= $c['coach_lastname'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pair_coach_active">Активность:</label>
                        <select class="form-control" name="pair_coach_active"  data-show-subtext="true" data-live-search="true"
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