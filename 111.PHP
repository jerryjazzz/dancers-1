<?php if (!$ajax && !$popup && !$as_module) { ?>
<?php
$simple_page = 'simplecheckout';
$heading_title .= $display_weight ? '&nbsp;(<span id="weight">'. $weight . '</span>)' : '';
include $simple_header;
?>

<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<style>
    <
    ?
    php if

    (
    $
    left_column_width

    )
    {
    ?
    >
    .simplecheckout-left-column {
        width: < ? php echo $ left_column_width ? >%;
    }

    @media only screen and (max-width: 768px) {
        .simplecheckout-left-column {
            width: 100%;
        }
    }

    <
    ?
    php

    }
    ?
    >
    <
    ?
    php if

    (
    $
    right_column_width

    )
    {
    ?
    >
    .simplecheckout-right-column {
        width: < ? php echo $ right_column_width ? >%;
    }

    @media only screen and (max-width: 768px) {
        .simplecheckout-right-column {
            width: 100%;
        }
    }

    <
    ?
    php

    }
    ?
    >
    <
    ?
    php if

    (
    $
    customer_with_payment_address

    )
    {
    ?
    >
    #simplecheckout_customer {
        margin-bottom: 0;
    }

    #simplecheckout_customer .simplecheckout-block-content {
        border-bottom-width: 0;
        padding-bottom: 0;
    }

    #simplecheckout_payment_address div.checkout-heading {
        display: none;
    }

    #simplecheckout_payment_address .simplecheckout-block-content {
        border-top-width: 0;
        padding-top: 0;
    }

    <
    ?
    php

    }
    ?
    >
    <
    ?
    php if

    (
    $
    customer_with_shipping_address

    )
    {
    ?
    >
    #simplecheckout_customer {
        margin-bottom: 0;
    }

    #simplecheckout_customer .simplecheckout-block-content {
        border-bottom-width: 0;
        padding-bottom: 0;
    }

    #simplecheckout_shipping_address div.checkout-heading {
        display: none;
    }

    #simplecheckout_shipping_address .simplecheckout-block-content {
        border-top-width: 0;
        padding-top: 0;
    }

    #total_sub_total {
        display: none;
    }

    #total_shipping {
        display: none;
    }

    #total_total {
        font-size: 32px;
    }

    #total_total span:first-of-type {
        display: none;
    }

    <
    ?
    php

    }
    ?
    >
    .main-block {
        display: none;

    }
</style>
<div class="simple-content">
    <?php } ?>
    <?php if (!$ajax || ($ajax && $popup)) { ?>
    <script type="text/javascript">
        (function ($) {
            <?php if (!$popup && !$ajax) { ?>
                $(function(){
                <?php } ?>
                if (typeof Simplecheckout === "function") {
                var simplecheckout_<?php echo $group ?> = new Simplecheckout({
                mainRoute: "checkout/simplecheckout",
                additionalParams: "<?php echo $additional_params ?>",
                additionalPath: "<?php echo $additional_path ?>",
                mainUrl: "<?php echo $action; ?>",
                mainContainer: "#simplecheckout_form_<?php echo $group ?>",
                currentTheme: "<?php echo $current_theme ?>",
                loginBoxBefore: "<?php echo $login_type == 'flat' ? '#simplecheckout_customer .simplecheckout-block-content:first' : '' ?>",
                displayProceedText: <?php echo $display_proceed_text ? 1 : 0 ?>,
                scrollToError: <?php echo $scroll_to_error ? 1 : 0 ?>,
                scrollToPaymentForm: <?php echo $scroll_to_payment_form ? 1 : 0 ?>,
                useAutocomplete: <?php echo $use_autocomplete ? 1 : 0 ?>,
                useGoogleApi: <?php echo $use_google_api ? 1 : 0 ?>,
                popup: <?php echo ($popup || $as_module) ? 1 : 0 ?>,
                agreementCheckboxStep: <?php echo $agreement_checkbox_step != '' ? $agreement_checkbox_step : '\'\''; ?>,
                enableAutoReloaingOfPaymentFrom: <?php echo $enable_reloading_of_payment_form ? 1 : 0 ?>,
                javascriptCallback: function() {<?php echo $javascript_callback ?>}
            });

                simplecheckout_<?php echo $group ?>.init();

                $(document).ajaxComplete(function(e, xhr, settings) {
                if (settings.url.indexOf("route=module/cart&remove") > 0 || (settings.url.indexOf("route=module/cart") > 0 && settings.type == "POST") || settings.url.indexOf("route=checkout/cart/add") > 0 || settings.url.indexOf("route=checkout/cart/remove") > 0) {
                window.resetSimpleQuantity = true;
                simplecheckout_<?php echo $group ?>.reloadAll();
            }
            });

                $(document).ajaxSend(function(e, xhr, settings) {
                if (settings.url.indexOf("checkout/simplecheckout&group") > 0 && typeof window.resetSimpleQuantity !== "undefined" && window.resetSimpleQuantity) {
                settings.data = settings.data.replace(/quantity.+?&/g,"")
                window.resetSimpleQuantity = false;
            }
            });
            }
                <?php if (!$popup && !$ajax) { ?>
            });
                <?php } ?>
            })(jQuery || $);
    </script>
    <?php } ?>
    <div id="simplecheckout_form_<?php echo $group ?>"
    <?php echo $display_error && $has_error ? 'data-error="true"' : '' ?> <?php echo $logged ? 'data-logged="true"' : '' ?>
    >
    <div class="simplecheckout">
        <?php if (!$cart_empty) { ?>
        <?php if ($steps_count > 1) { ?>
        <div id="simplecheckout_step_menu">
            <?php for ($i=1;$i<=$steps_count;$i++) { ?><span class="simple-step" data-onclick="gotoStep"
                                                             data-step="<?php echo $i; ?>"><?php echo $step_names[$i-1] ?></span><?php if ($i < $steps_count) { ?>
            <span class="simple-step-delimiter" data-step="<?php echo $i+1; ?>"><img
                    src="<?php echo $additional_path ?>catalog/view/image/next_gray.png"></span><?php } ?><?php } ?>
        </div>
        <?php } ?>
        <?php
				if($lang == "ru"){
                    $replace = array(
                        '{three_column}'     => '
        <div class="simplecheckout-three-column">',
            '{/three_column}' => '
        </div>
        ',
        '{left_column}' => '
        <div class="simplecheckout-left-column"><h3 class="cart-hh">ОФОРМЛЕНИЕ ЗАКАЗА</h3>',
            '{/left_column}' => '
        </div>
        ',
        '{right_column}' => '
        <div class="simplecheckout-right-column"><h3 class="cart-hh">ВАШ ЗАКАЗ</h3>',
            '{/right_column}' => '
        </div>
        ',
        '{step}' => '
        <div class="simplecheckout-step">',
            '{/step}' => '
        </div>
        ',
        '{customer}' => $simple_blocks['customer'],
        '{payment_address}' => $simple_blocks['payment_address'],
        '{shipping_address}' => $simple_blocks['shipping_address'],
        '{cart}' => $simple_blocks['cart'],
        '{shipping}' => $simple_blocks['shipping'],
        '{payment}' => $simple_blocks['payment'],
        '{agreement}' => $simple_blocks['agreement'],
        '{help}' => $simple_blocks['help'],
        '{summary}' => $simple_blocks['summary'],
        '{comment}' => $simple_blocks['comment'],
        '{payment_form}' => '
        <div class="simplecheckout-block" id="simplecheckout_payment_form">'.$simple_blocks['payment_form'].'</div>
        '
        );
        }else{
        $replace = array(
        '{three_column}' => '
        <div class="simplecheckout-three-column">',
            '{/three_column}' => '
        </div>
        ',
        '{left_column}' => '
        <div class="simplecheckout-left-column"><h3 class="cart-hh">ОФОРМЛЕННЯ ЗАМОВЛЕННЯ</h3>',
            '{/left_column}' => '
        </div>
        ',
        '{right_column}' => '
        <div class="simplecheckout-right-column"><h3 class="cart-hh">ВАШЕ ЗАМОВЛЕННЯ</h3>',
            '{/right_column}' => '
        </div>
        ',
        '{step}' => '
        <div class="simplecheckout-step">',
            '{/step}' => '
        </div>
        ',
        '{customer}' => $simple_blocks['customer'],
        '{payment_address}' => $simple_blocks['payment_address'],
        '{shipping_address}' => $simple_blocks['shipping_address'],
        '{cart}' => $simple_blocks['cart'],
        '{shipping}' => $simple_blocks['shipping'],
        '{payment}' => $simple_blocks['payment'],
        '{agreement}' => $simple_blocks['agreement'],
        '{help}' => $simple_blocks['help'],
        '{summary}' => $simple_blocks['summary'],
        '{comment}' => $simple_blocks['comment'],
        '{payment_form}' => '
        <div class="simplecheckout-block" id="simplecheckout_payment_form">'.$simple_blocks['payment_form'].'</div>
        '
        );
        }
        $find = array(
        '{three_column}',
        '{/three_column}',
        '{left_column}',
        '{/left_column}',
        '{right_column}',
        '{/right_column}',
        '{step}',
        '{/step}',
        '{customer}',
        '{payment_address}',
        '{shipping_address}',
        '{cart}',
        '{shipping}',
        '{payment}',
        '{agreement}',
        '{help}',
        '{summary}',
        '{comment}',
        '{payment_form}'
        );

        foreach ($simple_blocks as $key => $value) {
        $key_clear = $key;
        $key = '{'.$key.'}';
        if (!array_key_exists($key, $replace)) {
        $find[] = $key;
        $replace[$key] = '
        <div class="simplecheckout-block" id="'.$key_clear.'">'.$value.'</div>
        ';
        }
        }

        echo trim(str_replace($find, $replace, $simple_template));
        ?>
        <div id="simplecheckout_bottom" style="width:100%;height:1px;clear:both;"></div>
        <div class="simplecheckout-proceed-payment" id="simplecheckout_proceed_payment"
             style="display:none;"><?php echo $text_proceed_payment ?></div>
        <?php if ($display_agreement_checkbox) { ?>
        <div class="simplecheckout-warning-block" id="agreement_warning"
        <?php if ($display_error && $has_error) { ?>data-error="true"<?php } else { ?>style="display:none;"<?php } ?>
        ><?php echo $error_warning_agreement ?></div>
    <?php } ?>
    <?php if (!$block_order) { ?>
    <div class="simplecheckout-button-block buttons" id="buttons">
        <div class="simplecheckout-button-right">

            <button class="button btn-primary button_oc btn" data-onclick="priv" onclick="prov();"
                    id="simplecheckout_button_prov"><span><?php echo $button_prov; ?></span></button>
            <?php if ($display_agreement_checkbox) { ?><span id="agreement_checkbox"><label><input type="checkbox"
                                                                                                   name="agreement"
                                                                                                   value="1" <?php if ($agreement == 1) { ?>
            checked="checked"<?php } ?> /><?php echo $text_agreement; ?></label>&nbsp;</span><?php } ?>
            <?php if ($steps_count > 1) { ?>
            <button class="button btn-primary button_oc btn disbut" data-onclick="nextStep"
                    id="simplecheckout_button_next"><span><?php echo $button_next; ?></span></button>
            <?php } ?>
            <a class="button btn-primary button_oc bt" data-onclick="createOrder"
               id="simplecheckout_button_confirm"><span><?php echo $button_order; ?></span></a>
        </div>
        <div class="simplecheckout-button-left">
            <?php if ($display_back_button) { ?>
            <a class="button btn-primary button_oc btn" data-onclick="backHistory"
               id="simplecheckout_button_back"><span><?php echo $button_back; ?></span></a>
            <?php } ?>
            <?php if ($steps_count > 1) { ?>
            <a class="button btn-primary button_oc btn" data-onclick="previousStep"
               id="simplecheckout_button_prev"><span><?php echo $button_prev; ?></span></a>
            <?php } ?>
        </div>
        <div class="clear"></div>

    </div>

    <?php } ?>
    <?php } else { ?>
    <div class="content"><?php echo $text_error; ?></div>
    <div style="display:none;" id="simplecheckout_cart_total"><?php echo $cart_total ?></div>
    <?php if ($display_weight) { ?>
    <div style="display:none;" id="simplecheckout_cart_weight"><?php echo $weight ?></div>
    <?php } ?>
    <?php } ?>
</div>
</div>
<?php if (!$ajax && !$popup && !$as_module) { ?>
</div>
<?php // include $simple_footer ?>
<?php } ?>
<script>
    var val = "";
    $("#shipping_address_address_1").blur(function () {
        val = $(this).val() + ", Киев";
        geoc(val);
    });
    $('#simplecheckout_button_next').mouseenter(function () {
        v = $(".simplecheckout-methods-table input:checked").val();
        if (v == "flat.flat") {
            val = $("#shipping_address_address_1").val() + ", Киев";
            geoc(val);
        }
    });
    $(".simplecheckout-methods-table").click(function () {
        setTimeout(function () {
            v = $(".simplecheckout-methods-table input:checked").val();
            if (v == "flat.flat") {
                val = $("#shipping_address_address_1").val() + ", Киев";
                geoc(val);
            } else {
                $("#simplecheckout_button_next").removeClass("disbut");
            }
        }, 2000);
    });

</script>
<div class="msg"></div>
<script>
    $(document).ready(function () {
        wtime();
    });
    $("#customer_date_den").change(function () {
        wtime();
    });
    function wtime() {
        var day = $("#customer_date_den option:selected").val();
        if (day == "Сегодня" || day == "Сьогодні") {
            var now = new Date();
            var h = now.getHours() + 1;
            var m = now.getMinutes() + 30;
            if (h < 11) {
                h = 11;
                m = 60;
            }
            if (m >= 60) {
                m = 30;
                h++;
            } else {
                m = 0;
                h++;
            }
            var option = "";
            while (h <= 22) {
                if (m == 0)
                    option += "<option value='" + h + ":00'>" + h + ":00</option>"
                else
                    option += "<option value='" + h + ":" + m + "'>" + h + ":" + m + "</option>"
                m = m + 30;
                if (m == 60) {
                    h++;
                    m = 0;
                }
            }
        } else {
            var h = 12;
            var m = 30;
            var option = "";
            while (h <= 22) {
                if (m == 0)
                    option += "<option value='" + h + ":00'>" + h + ":00</option>"
                else
                    option += "<option value='" + h + ":" + m + "'>" + h + ":" + m + "</option>"
                m = m + 30;
                if (m == 60) {
                    h++;
                    m = 0;
                }
            }
        }
        $("#customer_data_time").html(option);
    }
    $(".simplecheckout-table-form-right #customer_now").change(function () {
        nw();
    });
    function nw() {
        var v = $(".simplecheckout-table-form-right #customer_now:checked").val();
        if (v == "Так" || v == "Да") {
            $("#customer_date_den").attr({"disabled": "disabled"});
            $("#customer_data_time").attr({"disabled": "disabled"});
        } else {
            $("#customer_date_den").removeAttr("disabled");
            $("#customer_data_time").removeAttr("disabled");
        }
    }
    nw();
    var zon = 1;
    var min = 200;
    var v = $(".simplecheckout-methods-table input:checked").val();
    <
    ? php
    if ($lang == "ru") {
        ?
    >
        function msg() {
            v = $(".simplecheckout-methods-table input:checked").val();
            if (v == "flat.flat") {
                if (zon == 0) {
                    mes = "Зона 2. Минимальный заказ: 300 грн.<br/> Доставка бесплатная.<br/> Время доставки: 75-100 мин.";
                    min = 300;
                } else if (zon == 1) {
                    mes = "Зона 1. Минимальный заказ 200 грн.<br/> Бесплатная доставка.<br/> Время доставки: 60-75 мин.";
                    min = 200;
                } else if (zon == 2) {
                    mes = "Зона 3. Минимальный заказ: 300 грн.<br/> Доставка бесплатная.<br/> Время доставки: 90-120 мин.";
                    min = 300;
                } else if (zon == 3) {
                    mes = "Зона 3. Минимальный заказ: 300 грн.<br/> Доставка бесплатная.<br/> Время доставки: 90-120 мин.";
                    min = 300;
                } else if (zon == 4) {
                    mes = "Зона 3. Минимальный заказ: 300 грн.<br/> Доставка бесплатная.<br/> Время доставки: 90-120 мин.";
                    min = 300;
                }
                cos = $(".simplecheckout-cart-total-value").html();
                cos = cos.split(" ");
                cos = cos[0];
                if (parseInt(cos) < min) {
                    $("#simplecheckout_button_next").addClass("disbut");
                    mes = "<h2>Сумма заказа слишком мала</h2><br/>" + mes;
                } else {
                    $("#simplecheckout_button_next").removeClass("disbut");
                }
                $(".msg").html(mes);
                $(".msg").css({"display": "block"});
                setTimeout(function () {
                    $(".msg").css({"display": "none"});
                }, 4000);
            } else if (v == "") {
                $(".msg").html("Выберите способ доставки");
                $(".msg").css({"display": "block"});
                setTimeout(function () {
                    $(".msg").css({"display": "none"});
                }, 4000);
            }
        }

        ymaps.ready(init);
        var myMap = null;
        var myPolygon = new Array();
        var myPlacemark = null;

        function geoc(adress) {
            myMap.geoObjects.remove(myPlacemark);
            ymaps.geocode(adress, {
                results: 1
            }).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0);
                var name = firstGeoObject.properties.get('name');
                coords = firstGeoObject.geometry.getCoordinates();
                console.log(coords);
                myPlacemark = new ymaps.Placemark(coords, {
                    iconContent: 'Вы',
                    balloonContent: 'Ваше расположение'
                }, {
                    preset: 'islands#violetStretchyIcon'
                });
                myMap.geoObjects.add(myPlacemark);
                var tr = false;
                for (i = 0; i < 5; i++) {
                    var result = ymaps.geoQuery(myPlacemark).searchIntersect(myPolygon[i]);
                    var len = result.getLength();
                    if (len > 0) {
                        tr = true;
                        zon = i;
                    }
                }
                name = name.replace("Киев", "");
                if (name.length > 2) {
                    $("#shipping_address_address_1").val(name);
                    if (tr) {
                        msg();
                    } else {
                        $(".msg").html("Не в зоне доставки!");
                        $("#simplecheckout_button_next").addClass("disbut");
                        $(".msg").css({"display": "block"});
                        setTimeout(function () {
                            $(".msg").css({"display": "none"});
                        }, 4000);
                    }
                } else {
                    $(".msg").html("Введите точный Адрес");
                    $("#simplecheckout_button_next").addClass("disbut");
                    $(".msg").css({"display": "block"});
                    setTimeout(function () {
                        $(".msg").css({"display": "none"});
                    }, 4000);
                }
            });
        }

        <?php } else {
        ?
    >

        function msg() {
            v = $(".simplecheckout-methods-table input:checked").val();
            if (v == "flat.flat") {
                if (zon == 0) {
                    mes = "Зона 2. Мінімальне замовлення: 300 грн. <br/> Доставка безкоштовна. <br/> Час доставки: 75-100 хв.";
                    min = 300;
                } else if (zon == 1) {
                    mes = "Зона 1. Мінімальне замовлення 200 грн. <br/> Безкоштовна доставка. <br/> Час доставки: 60-75 хв.";
                    min = 200;
                } else if (zon == 2) {
                    mes = "Зона 3. Мінімальне замовлення: 300 грн. <br/> Доставка безкоштовна. <br/> Час доставки: 90-120 хв.";
                    min = 300;
                } else if (zon == 3) {
                    mes = "Зона 3. Мінімальне замовлення: 300 грн. <br/> Доставка безкоштовна. <br/> Час доставки: 90-120 хв.";
                    min = 300;
                } else if (zon == 4) {
                    mes = "Зона 3. Мінімальне замовлення: 300 грн. <br/> Доставка безкоштовна. <br/> Час доставки: 90-120 хв.";
                    min = 300;
                }
                cos = $(".simplecheckout-cart-total-value").html();
                cos = cos.split(" ");
                cos = cos[0];
                if (parseInt(cos) < min) {
                    $("#simplecheckout_button_next").addClass("disbut");
                    mes = "<h2>Сума замовлення замала</h2><br/>" + mes;
                } else {
                    $("#simplecheckout_button_next").removeClass("disbut");
                }
                $(".msg").html(mes);
                $(".msg").css({"display": "block"});
                setTimeout(function () {
                    $(".msg").css({"display": "none"});
                }, 4000);
            } else if (v == "") {
                $(".msg").html("Виберіть спосіб доставки");
                $(".msg").css({"display": "block"});
                setTimeout(function () {
                    $(".msg").css({"display": "none"});
                }, 4000);
            }
        }

        ymaps.ready(init);
        var myMap = null;
        var myPolygon = new Array();
        var myPlacemark = null;

        function geoc(adress) {
            myMap.geoObjects.remove(myPlacemark);
            ymaps.geocode(adress, {
                results: 1
            }).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0);
                var name = firstGeoObject.properties.get('name');
                coords = firstGeoObject.geometry.getCoordinates();
                console.log(coords);
                myPlacemark = new ymaps.Placemark(coords, {
                    iconContent: 'Вы',
                    balloonContent: 'Ваше расположение'
                }, {
                    preset: 'islands#violetStretchyIcon'
                });
                myMap.geoObjects.add(myPlacemark);
                var tr = false;
                for (i = 0; i < 5; i++) {
                    var result = ymaps.geoQuery(myPlacemark).searchIntersect(myPolygon[i]);
                    var len = result.getLength();
                    if (len > 0) {
                        tr = true;
                        zon = i;
                    }
                }
                name = name.replace("Киев", "");
                if (name.length > 2) {
                    $("#shipping_address_address_1").val(name);
                    if (tr) {
                        msg();
                    } else {
                        $(".msg").html("Не в зоні доставки!");
                        $("#simplecheckout_button_next").addClass("disbut");
                        $(".msg").css({"display": "block"});
                        setTimeout(function () {
                            $(".msg").css({"display": "none"});
                        }, 4000);
                    }
                } else {
                    $(".msg").html("Введіть точну адресу");
                    $("#simplecheckout_button_next").addClass("disbut");
                    $(".msg").css({"display": "block"});
                    setTimeout(function () {
                        $(".msg").css({"display": "none"});
                    }, 4000);
                }
            });
        }

        <?php }
    ?
    >
    $(".msg").click(function () {
        $(".msg").css({"display": "none"});
    });
    function init() {
        myMap = new ymaps.Map("map", {
            center: [50.454337820438404, 30.483299865211215],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });
        var placemark = new ymaps.Placemark([50.43701779334488, 30.515635499999966], {
            iconContent: '',
            balloonContent: 'Мама Манана'
        }, {
            preset: 'islands#redFoodIcon'
        });
        myMap.geoObjects.add(placemark);

        // Создаем многоугольник, используя вспомогательный класс Polygon.
        myPolygon[0] = new ymaps.Polygon([
            // Указываем координаты вершин многоугольника.
            // Координаты вершин внешнего контура.
            [
                [50.51556704853426, 30.36173672622553],
                [50.51543707469035, 30.365159224928686],
                [50.517113025705946, 30.3708133215322],
                [50.52117610346844, 30.425208520353987],
                [50.521877188219506, 30.427477669180984],
                [50.52419753304928, 30.431702148379088],
                [50.52564234714745, 30.436098288954696],
                [50.52726322174368, 30.452824544371435],
                [50.52858313312186, 30.48392744010813],
                [50.5294379781969, 30.518248986663025],
                [50.52358547893055, 30.52235852484953],
                [50.52204016283943, 30.522634890872315],
                [50.52088445037243, 30.52238683578545],
                [50.51294282679189, 30.51407069598182],
                [50.509063985823865, 30.513801183222622],
                [50.50562272525324, 30.514990792167772],
                [50.502126471133636, 30.518111591603777],
                [50.50212823782013, 30.521960238575772],
                [50.500870935024466, 30.524092271778073],
                [50.494877973631915, 30.52897088701185],
                [50.489800532479045, 30.532998062365696],
                [50.484174922448545, 30.537454391161834],
                [50.48297024761398, 30.53798482261803],
                [50.48080708602127, 30.537906715592232],
                [50.47880813093725, 30.53714196305865],
                [50.475083943314196, 30.534426275677838],
                [50.467689464596404, 30.525218350623845],
                [50.45982810439073, 30.527211330415916],
                [50.457246133854035, 30.52914723939592],
                [50.450941066356776, 30.543504781288345],
                [50.44795262965424, 30.54999690672639],
                [50.44485522937627, 30.55558185570688],
                [50.44134653535323, 30.559965175048006],
                [50.43259643305756, 30.566879263959812],
                [50.4244478592199, 30.572291315823236],
                [50.42210418607321, 30.56926320033924],
                [50.41564741508147, 30.57018329652575],
                [50.41234350903105, 30.57037383185958],
                [50.40658101223436, 30.56685949212125],
                [50.40147611902623, 30.562143522744474],
                [50.39911382204529, 30.5595733205793],
                [50.377135057341754, 30.550649288222377],
                [50.365139072979346, 30.54914961041895],
                [50.36184490321722, 30.495741464514328],
                [50.350807759366226, 30.496192075628798],
                [50.34731170064594, 30.488810242443595],
                [50.348432899159796, 30.476983808665814],
                [50.34837563787331, 30.473237816661445],
                [50.357037367654996, 30.470098818003798],
                [50.35760862861808, 30.468622830729597],
                [50.358200473538126, 30.466556757471675],
                [50.35893222853102, 30.46747100458777],
                [50.3600895016985, 30.468149217310785],
                [50.36023574001619, 30.46562908886226],
                [50.3605261070793, 30.463226977610677],
                [50.36166961494378, 30.454903696879086],
                [50.3549334061019, 30.451976184328654],
                [50.356981287035154, 30.43800269082134],
                [50.36761229154192, 30.437548245014984],
                [50.37178101460504, 30.430722787935064],
                [50.3793539950937, 30.438693354454106],
                [50.38389378750939, 30.439282481764316],
                [50.39397340176734, 30.426210159889045],
                [50.39599492174819, 30.422871192096974],
                [50.39911785974079, 30.414463999155434],
                [50.401966301328535, 30.405670568116193],
                [50.406054808009735, 30.393614421025298],
                [50.41045833816275, 30.38636479248977],
                [50.42089556439807, 30.369741225878553],
                [50.433289406884, 30.36001533900245],
                [50.44948766876884, 30.357383993464577],
                [50.44923452139345, 30.35088967026396],
                [50.45032045207814, 30.350700226940226],
                [50.45022634043248, 30.348942535689563],
                [50.452077659154305, 30.34860105079843],
                [50.45325647049862, 30.348326075127517],
                [50.453248540196526, 30.34636533109027],
                [50.45401174595892, 30.345685366481813],
                [50.45382968871947, 30.342172989152974],
                [50.4612120174342, 30.333860774168986],
                [50.46108135300051, 30.329404259267324],
                [50.462467915168, 30.328506377487635],
                [50.46312009079264, 30.32541814292728],
                [50.46642930854061, 30.32481899833305],
                [50.47433686093961, 30.33073321996357],
                [50.47467523260338, 30.337617084776706],
                [50.4798558991477, 30.336788940431923],
                [50.48069595851365, 30.34924309512841],
                [50.47644596663876, 30.358821921761173],
                [50.482985282634836, 30.36179178538091],
                [50.49294041817672, 30.365414084032242],
                [50.50414561787241, 30.3641762199482],
                [50.51556704853426, 30.36173672622553]


            ]
        ], {
            // Описываем свойства геообъекта.
            // Содержимое балуна.
            hintContent: "Зона 1. Минимальный заказ 200 грн. Бесплатная доставка. Время доставки: 60-90 мин."
        }, {
            // Задаем опции геообъекта.
            // Цвет заливки.
            fillColor: '#FF222277',
            // Ширина обводки.
            strokeWidth: 2,
            strokeColor: '#FF2222',
        });
        // Добавляем многоугольник на карту.
        myMap.geoObjects.add(myPolygon[0]);
        // Создаем многоугольник, используя вспомогательный класс Polygon.
        myPolygon[1] = new ymaps.Polygon([
            // Указываем координаты вершин многоугольника.
            // Координаты вершин внешнего контура.
            [
                [50.44869714805867, 30.586472352679266],
                [50.45164762288679, 30.595299083582145],
                [50.454332935539874, 30.593586733458874],
                [50.458328521679434, 30.60855972148975],
                [50.46421834112737, 30.607572668572285],
                [50.46230423231858, 30.615222329699087],
                [50.46741796567296, 30.633681579272622],
                [50.47160859133024, 30.629089637439126],
                [50.47431997364556, 30.639346404712086],
                [50.46039957878074, 30.651741928507587],
                [50.45897564689164, 30.64643296737679],
                [50.45692091347763, 30.638536544036945],
                [50.454427716433116, 30.640167327118014],
                [50.44758941771685, 30.615163846538355],
                [50.45498750507704, 30.610142751262465],
                [50.45211060931218, 30.599370999858643],
                [50.44712357329417, 30.60512165598658],
                [50.44771201222798, 30.598964426172806],
                [50.446862529972435, 30.590553018702124]


            ]
        ], {
            // Описываем свойства геообъекта.
            // Содержимое балуна.
            hintContent: "Зона 2. Минимальный заказ: 300 грн. Доставка бесплатная. Время доставки: 90-120 мин."
        }, {
            // Задаем опции геообъекта.
            // Цвет заливки.
            fillColor: '#22ff2277',
            // Ширина обводки.
            strokeWidth: 2,
            strokeColor: '#22ff22',
        });
        // Добавляем многоугольник на карту.
        myMap.geoObjects.add(myPolygon[1]);
        // Создаем многоугольник, используя вспомогательный класс Polygon.
        myPolygon[2] = new ymaps.Polygon([
            // Указываем координаты вершин многоугольника.
            // Координаты вершин внешнего контура.
            [
                [50.43000343338412, 30.59271543618359],
                [50.44018186752654, 30.621527455218274],
                [50.431575348736494, 30.627363942034684],
                [50.43110870399828, 30.622852282240064],
                [50.439167163651405, 30.619820419226983],
                [50.43626449607398, 30.611057515494593],
                [50.43292047066692, 30.61277412926411],
                [50.42743794798658, 30.601358647696735],
                [50.42760243295418, 30.59251808678366]


            ]
        ], {
            // Описываем свойства геообъекта.
            // Содержимое балуна.
            hintContent: "Зона 2. Минимальный заказ: 300 грн. Доставка бесплатная. Время доставки: 90-120 мин."
        }, {
            // Задаем опции геообъекта.
            // Цвет заливки.
            fillColor: '#22ff2277',
            // Ширина обводки.
            strokeWidth: 2,
            strokeColor: '#22ff22',
        });
        // Добавляем многоугольник на карту.
        myMap.geoObjects.add(myPolygon[2]);
        // Создаем многоугольник, используя вспомогательный класс Polygon.
        myPolygon[3] = new ymaps.Polygon([
            // Указываем координаты вершин многоугольника.
            // Координаты вершин внешнего контура.
            [
                [50.39333537330746, 30.603662466850345],
                [50.39525571806479, 30.61284635051734],
                [50.39805379469952, 30.614992117729248],
                [50.39734057524843, 30.611988043632582],
                [50.40112600129744, 30.61250302776342],
                [50.402387742434925, 30.60829732402808],
                [50.40386887372057, 30.608125662651133],
                [50.402936315004276, 30.613790488090572],
                [50.40466441843886, 30.614562964286854],
                [50.41100829221562, 30.638389109320872],
                [50.407059103637486, 30.64044904584431],
                [50.40612660804001, 30.64928960675741],
                [50.40140387238887, 30.654688926005456],
                [50.39350355461754, 30.6538306191207],
                [50.39557727849056, 30.647928031836745],
                [50.39420562099928, 30.64269235983967],
                [50.392724186089204, 30.643636497412928],
                [50.391298876014346, 30.633439373776994],
                [50.38581150877204, 30.635713887021637],
                [50.38476883681522, 30.626658749387353],
                [50.393109567091436, 30.621423077390283],
                [50.39242370743952, 30.605587315366357],
                [50.39140861684676, 30.604900669858544],
                [50.39324673782471, 30.602540325925432]


            ]
        ], {
            // Описываем свойства геообъекта.
            // Содержимое балуна.
            hintContent: "Зона 2. Минимальный заказ: 300 грн. Доставка бесплатная. Время доставки: 90-120 мин."
        }, {
            // Задаем опции геообъекта.
            // Цвет заливки.
            fillColor: '#22ff2277',
            // Ширина обводки.
            strokeWidth: 2,
            strokeColor: '#22ff22',
        });
        // Добавляем многоугольник на карту.
        myMap.geoObjects.add(myPolygon[3]);
    }
    function prov() {
        v = $(".simplecheckout-methods-table input:checked").val();
        if (v == "free.free") {
            $("#simplecheckout_button_next").removeClass("disbut");
        } else if (v == "flat.flat") {
            val = $("#shipping_address_address_1").val();
            if (val.length > 0) {
                geoc(val + ", Киев");
            }
        } else {
            msg();
        }
    }
    setTimeout(function () {
        prov();
    }, 500);

</script>
<div id="nomap"></div>