<script>
    let fields = [
        'de_city_font',
        'de_location_font',
        'de_date_font',
        'de_time_font',
        'de_oc_city_font',
        'de_oc_location_font',
        'de_oc_date_font',
        'de_oc_time_font',
        'de_oc_title_font',
        'de_oc_description_font',
        'de_oc_btn_text_font',
    ];

    fields.forEach(function(field) {
        new TomSelect('#'+ field, {
            valueField: 'font',
            searchField: 'title',
            maxOptions: 150,
            options: [
                    @foreach($allFontsInFolder as $font)
                {id: {{$font->getInode()}}, title: '{{ stristr($font->getFilename(), '.', true)}}', font: '{{ stristr($font->getFilename(), '.', true) }}'},
                @endforeach
            ],
            render: {
                option: function(data, escape) {
                    return  '<div>' +
                        '<span style="font-size: 1.6rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return  '<h4 style="font-size: 1.2rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                }
            }
        })
    })

    let dateFiled = '26.11.2023';

    //bg color
    $( document ).ready(function() {
        $("#switch-bg").click(function() {
            var type = $(this).is(':checked');
            if(type) {
                $(".matureBlock").removeClass('bg-white bg-black').addClass('bg-black');
            } else {
                $(".matureBlock").removeClass('bg-black bg-white').addClass('bg-white');
            }
        })
    });

    $( document ).ready(function() {
        $("#switch-bg2").click(function() {
            var type = $(this).is(':checked');
            if(type) {
                $(".matureBlock2").removeClass('bg-white bg-black').addClass('bg-black');
            } else {
                $(".matureBlock2").removeClass('bg-black bg-white').addClass('bg-white');
            }
        })
    });

    //++++++++++++++++++++++++++++++ City
    //city font close
    function fontClose() {
        var font = document.getElementById('de_city_font').value;
        document.getElementById('open-city-field').style.fontFamily = font;
    }
    //city font size close
    document.getElementById('open-city-field').style.fontSize = 0.8 + 'rem';
    function fontSizeClose() {
        var fontSize = document.getElementById('de_city_font_size').value;
        document.getElementById('open-city-field').style.fontSize = fontSize + 'rem';
    }
    //city font color close
    function fontColorClose() {
        var textColor = document.getElementById('de_city_font_color').value;
        document.getElementById('open-city-field').style.color = textColor;
    }
    //city font text-shadow
    function textShadowClose() {
        var textShadowColor = document.getElementById('de_city_text_shadow_color').value;
        var right = document.getElementById('de_city_text_shadow_right').value;
        var bottom = document.getElementById('de_city_text_shadow_bottom').value;
        var blur = document.getElementById('de_city_text_shadow_blur').value;

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('open-city-field').style.textShadow = textShadow;
    }
    //++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++ Location
    //location font close
    function fontCloseLocation() {
        var font = document.getElementById('de_location_font').value;
        document.getElementById('open-location-field').style.fontFamily = font;
    }
    //location font size close
    document.getElementById('open-location-field').style.fontSize = 0.8 + 'rem';
    function fontSizeCloseLocation() {
        var fontSize = document.getElementById('de_location_font_size').value;
        document.getElementById('open-location-field').style.fontSize = fontSize + 'rem';
    }
    //location font color close
    function fontColorCloseLocation() {
        var textColor = document.getElementById('de_location_font_color').value;
        document.getElementById('open-location-field').style.color = textColor;
    }
    //location font text-shadow
    function textShadowCloseLocation() {
        var textShadowColor = document.getElementById('de_location_text_shadow_color').value;
        var right = document.getElementById('de_location_text_shadow_right').value;
        var bottom = document.getElementById('de_location_text_shadow_bottom').value;
        var blur = document.getElementById('de_location_text_shadow_blur').value;

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('open-location-field').style.textShadow = textShadow;
    }
    //++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++ Date
    //date font close
    function fontCloseDate() {
        var font = document.getElementById('de_date_font').value;
        document.getElementById('open-date-field').style.fontFamily = font;
    }
    //date font size close
    document.getElementById('open-date-field').style.fontSize = 0.8 + 'rem';
    function fontCloseDateSize() {
        var fontSize = document.getElementById('de_date_font_size').value;
        document.getElementById('open-date-field').style.fontSize = fontSize + 'rem';
    }
    //date font color close
    function fontColorCloseDate() {
        var textColor = document.getElementById('de_date_font_color').value;
        document.getElementById('open-date-field').style.color = textColor;
    }
    //date font text-shadow
    function textShadowCloseDate() {
        var textShadowColor = document.getElementById('de_date_text_shadow_color').value;
        var right = document.getElementById('de_date_text_shadow_right').value;
        var bottom = document.getElementById('de_date_text_shadow_bottom').value;
        var blur = document.getElementById('de_date_text_shadow_blur').value;

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('open-date-field').style.textShadow = textShadow;
    }
    //data type
    function closeDateType() {
        var type = document.getElementById('de_date_format').value;
        if(type == 1) { //31.12.2015
            $('#open-date-field').html(dateFiled);
        } else if(type == 2) { //31.12
            let dateArr = dateFiled.split(".");
            let formattedDate = dateArr[0] + "." + dateArr[1];
            $('#open-date-field').html(formattedDate);
        } else if(type == 3) { //Dec. 31, 2015
            let dateArr = dateFiled.split(".");
            console.log(dateArr[1])
            switch (dateArr[1]) {
                case '01':
                    $('#open-date-field').html('Jan. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '02':
                    $('#open-date-field').html('Feb. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '03':
                    $('#open-date-field').html('Mar. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '04':
                    $('#open-date-field').html('Apr. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '05':
                    $('#open-date-field').html('May ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '06':
                    $('#open-date-field').html('Jun. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '07':
                    $('#open-date-field').html('Jul. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '08':
                    $('#open-date-field').html('Aug. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '09':
                    $('#open-date-field').html('Sep. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '10':
                    $('#open-date-field').html('Oct. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '11':
                    $('#open-date-field').html('Nov. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
                case '12':
                    $('#open-date-field').html('Dec. ' + dateArr[0] + ', ' + dateArr[2]);
                    break;
            }
        }
    }
    //++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++ Time
    //time font close
    function fontCloseTime() {
        var font = document.getElementById('de_time_font').value;
        document.getElementById('open-time-field').style.fontFamily = font;
    }
    //time font size close
    document.getElementById('open-time-field').style.fontSize = 0.8 + 'rem';
    function fontCloseTimeSize() {
        var fontSize = document.getElementById('de_time_font_size').value;
        document.getElementById('open-time-field').style.fontSize = fontSize + 'rem';
    }
    //time font color close
    function fontColorCloseTime() {
        var textColor = document.getElementById('de_time_font_color').value;
        document.getElementById('open-time-field').style.color = textColor;
    }
    //time font text-shadow
    function textShadowCloseTime() {
        var textShadowColor = document.getElementById('de_time_text_shadow_color').value;
        var right = document.getElementById('de_time_text_shadow_right').value;
        var bottom = document.getElementById('de_time_text_shadow_bottom').value;
        var blur = document.getElementById('de_time_text_shadow_blur').value;

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('open-time-field').style.textShadow = textShadow;
    }
    //show time
    function timeShow() {
        var time = document.getElementById('de_show_card_time').value;
        if(time == 1) {
            $("#open-time-field").show()
        } else {
            $("#open-time-field").hide()
        }
    }
    //++++++++++++++++++++++++++++++ Other settings Close
    //bg color
    function bgCloseColor() {
        var bgColor = document.getElementById('de_background_color_hex').value;
        var transparency = document.getElementById('de_transparency').value;

        let hex = bgColor.replace('#', '');
        if (hex.length === 3) {
            hex = `${hex[0]}${hex[0]}${hex[1]}${hex[1]}${hex[2]}${hex[2]}`;
        }

        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        var rgb = 'rgb(' + r+',' + ' ' + g+',' + ' ' + b+',' + ' ' + Number(transparency) + ')';
        @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
        document.getElementById('bg-block').style.backgroundColor = rgb;
        @endif
        @if($user->eventSettings->close_card_type == 4)
        document.getElementById('bg-4').style.backgroundColor = rgb;
        @endif
    }
    //border round
    function bgRound() {
        var radius = document.getElementById('de_event_round').value;
        @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
        document.getElementById('bg-block').style.borderRadius = radius + 'px';
        @elseif($user->eventSettings->close_card_type == 3)
        document.getElementById('block-3-img').style.borderRadius = radius + 'px';
        @elseif($user->eventSettings->close_card_type == 4)
        document.getElementById('bg-round-card').style.borderRadius = radius + 'px';
        @endif
    }
    //text-position
    function textPosition() {
        var position = document.getElementById('de_text_position').value;
        @if($user->eventSettings->close_card_type == 1)
        $("#card-1-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
        $("#card-1-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
        @elseif($user->eventSettings->close_card_type == 2)
        $("#card-2-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
        $("#card-2-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
        $("#card-2-position-3").removeClass('justify-center justify-start justify-end').addClass(position);
        @elseif($user->eventSettings->close_card_type == 3)
        $("#card-3-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
        $("#card-3-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
        @elseif($user->eventSettings->close_card_type == 4)
        $("#card-4-position-1").removeClass('justify-center justify-start justify-end').addClass(position);
        $("#card-4-position-2").removeClass('justify-center justify-start justify-end').addClass(position);
        @endif
    }
    //card shadow
    function cardShadow() {
        var color = document.getElementById('de_event_card_shadow_color').value;
        var r = document.getElementById('de_event_card_shadow_right').value;
        var b = document.getElementById('de_event_card_shadow_bottom').value;
        var bl = document.getElementById('de_event_card_shadow_blur').value;

        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;

        @if($user->eventSettings->close_card_type == 1 || $user->eventSettings->close_card_type == 2)
        document.getElementById('bg-block').style.boxShadow = cardColor;
        @elseif($user->eventSettings->close_card_type == 3)
        document.getElementById('block-3-img').style.boxShadow = cardColor;
        @elseif($user->eventSettings->close_card_type == 4)
        document.getElementById('bg-round-card').style.boxShadow = cardColor;
        @endif
    }
    //border color
    function borderColor() {
        var borderColor = document.getElementById('de_border_color').value;
        document.getElementById('bg-block').style.borderColor = borderColor;
    }
    //border
    function border() {
        var border = document.getElementById('de_border').value;
        $("#bg-block").removeClass('border border-2 border-4 border-8').addClass(border);
    }
    ///////////////////////////////////////////////////////////
    ///////////Open Card //////////
    ///////////////////////////////////////////////////////////
    //open city font
    function openCityFont() {
        var font = document.getElementById('de_oc_city_font').value;
        document.getElementById('city-field').style.fontFamily = font;
    }
    //open city font size
    document.getElementById('city-field').style.fontSize = 0.8 + 'rem';
    function openCityFontSize() {
        var size = document.getElementById('de_oc_city_font_size').value;
        document.getElementById('city-field').style.fontSize = size + 'rem';
    }
    //font color
    function openCityFontColor() {
        var color = document.getElementById('de_oc_city_font_color').value;
        document.getElementById('city-field').style.color = color;
    }
    //font shadow
    function openCityFontShadow() {
        var color = document.getElementById('de_oc_city_font_shadow_color').value;
        var r = document.getElementById('de_oc_city_font_shadow_right').value;
        var b = document.getElementById('de_oc_city_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_city_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('city-field').style.textShadow = cardColor;
    }

    //open location font
    function openLocationFont() {
        var font = document.getElementById('de_oc_location_font').value;
        document.getElementById('location-field').style.fontFamily = font;
    }
    //open location font size
    document.getElementById('location-field').style.fontSize = 0.8 + 'rem';
    function openLocationFontSize() {
        var size = document.getElementById('de_oc_location_font_size').value;
        document.getElementById('location-field').style.fontSize = size + 'rem';
    }
    //open location font color
    function openLocationFontColor() {
        var color = document.getElementById('de_oc_location_font_color').value;
        document.getElementById('location-field').style.color = color;
    }
    //open location font shadow
    function openLocationFontShadow() {
        var color = document.getElementById('de_oc_location_font_shadow_color').value;
        var r = document.getElementById('de_oc_location_font_shadow_right').value;
        var b = document.getElementById('de_oc_location_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_location_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('location-field').style.textShadow = cardColor;
    }

    //open date font
    function openDateFont() {
        var font = document.getElementById('de_oc_date_font').value;
        document.getElementById('date-field').style.fontFamily = font;
    }
    //open date font size
    document.getElementById('date-field').style.fontSize = 0.8 + 'rem';
    function openDateFontSize() {
        var size = document.getElementById('de_oc_date_font_size').value;
        document.getElementById('date-field').style.fontSize = size + 'rem';
    }
    //open date font color
    function openDateFontColor() {
        var color = document.getElementById('de_oc_date_font_color').value;
        document.getElementById('date-field').style.color = color;
    }
    //open date font shadow
    function openDateFontShadow() {
        var color = document.getElementById('de_oc_date_font_shadow_color').value;
        var r = document.getElementById('de_oc_date_font_shadow_right').value;
        var b = document.getElementById('de_oc_date_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_date_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('date-field').style.textShadow = cardColor;
    }

    //open time font
    function openTimeFont() {
        var font = document.getElementById('de_oc_time_font').value;
        document.getElementById('time-field').style.fontFamily = font;
    }
    //open time font size
    document.getElementById('time-field').style.fontSize = 0.8 + 'rem';
    function openTimeFontSize() {
        var size = document.getElementById('de_oc_time_font_size').value;
        document.getElementById('time-field').style.fontSize = size + 'rem';
    }
    //open time font color
    function openTimeFontColor() {
        var color = document.getElementById('de_oc_time_font_color').value;
        document.getElementById('time-field').style.color = color;
    }
    //open time font shadow
    function openTimeFontShadow() {
        var color = document.getElementById('de_oc_time_font_shadow_color').value;
        var r = document.getElementById('de_oc_time_font_shadow_right').value;
        var b = document.getElementById('de_oc_time_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_time_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('time-field').style.textShadow = cardColor;
    }

    //open title position
    function titlePosition() {
        var position = document.getElementById('de_oc_title_position').value;
        $('#title-position').removeClass('text-center text-end text-start').addClass(position);
    }
    //open title font
    function openTitleFont() {
        var font = document.getElementById('de_oc_title_font').value;
        document.getElementById('title-field').style.fontFamily = font;
    }
    //open title font size

    document.getElementById('title-field').style.fontSize = 0.8 + 'rem';
    function openTitleFontSize() {
        var size = document.getElementById('de_oc_title_font_size').value;
        document.getElementById('title-field').style.fontSize = size + 'rem';
    }

    //open title font color
    function openTitleFontColor() {
        var color = document.getElementById('de_oc_title_font_color').value;
        document.getElementById('title-field').style.color = color;
    }
    //open title font shadow
    function openTitleFontShadow() {
        var color = document.getElementById('de_oc_title_font_shadow_color').value;
        var r = document.getElementById('de_oc_title_font_shadow_right').value;
        var b = document.getElementById('de_oc_title_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_title_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('title-field').style.textShadow = cardColor;
    }

    //open descr position
    function descrPosition() {
        var position = document.getElementById('de_oc_description_position').value;
        $('#descr-position').removeClass('text-center text-end text-start').addClass(position);
    }
    //open descr font
    function openDescrFont() {
        var font = document.getElementById('de_oc_description_font').value;
        document.getElementById('description-field').style.fontFamily = font;
    }
    //open descr font size
    document.getElementById('description-field').style.fontSize = 0.8 + 'rem';
    function openDescrFontSize() {
        var size = document.getElementById('de_oc_description_font_size').value;
        document.getElementById('description-field').style.fontSize = size + 'rem';
    }
    //open descr font color
    function openDescrFontColor() {
        var color = document.getElementById('de_oc_description_font_color').value;
        document.getElementById('description-field').style.color = color;
    }
    //open descr font shadow
    function openDescrFontShadow() {
        var color = document.getElementById('de_oc_description_font_shadow_color').value;
        var r = document.getElementById('de_oc_description_font_shadow_right').value;
        var b = document.getElementById('de_oc_description_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_description_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('description-field').style.textShadow = cardColor;
    }

    //open other position
    function otherPosition() {
        var position = document.getElementById('de_oc_text_position').value;
        @if($user->eventSettings->open_card_type == 1)
        $('#pos-1-1').removeClass('justify-center justify-end justify-start').addClass(position);
        $('#pos-1-2').removeClass('justify-center justify-end justify-start').addClass(position);
        $('#pos-1-3').removeClass('justify-center justify-end justify-start').addClass(position);
        @elseif($user->eventSettings->open_card_type == 2)
        $('#pos-2-1').removeClass('justify-center justify-end justify-start').addClass(position);
        $('#pos-2-2').removeClass('justify-center justify-end justify-start').addClass(position);
        @elseif($user->eventSettings->open_card_type == 3)
        // $('#pos-3-1').removeClass('justify-center justify-end justify-start').addClass(position);
        $('#pos-3-2').removeClass('justify-center justify-end justify-start').addClass(position);
        $('#pos-3-3').removeClass('justify-center justify-end justify-start').addClass(position);
        @endif
    }
    //bg color
    function openOtherBgColor() {
        var color = document.getElementById('de_oc_bg_color').value;
        @if($user->eventSettings->open_card_type == 1)
        document.getElementById('title-position').style.backgroundColor = color;
        document.getElementById('descr-position').style.backgroundColor = color;
        @elseif($user->eventSettings->open_card_type == 2)
        document.getElementById('title-position').style.backgroundColor = color;
        document.getElementById('pos-2-1').style.backgroundColor = color;
        document.getElementById('pos-2-2').style.backgroundColor = color;
        document.getElementById('descr-position').style.backgroundColor = color;
        @elseif($user->eventSettings->open_card_type == 3)
        document.getElementById('pos-3-1').style.backgroundColor = color;
        document.getElementById('pos-3-2').style.backgroundColor = color;
        document.getElementById('pos-3-3').style.backgroundColor = color;
        document.getElementById('descr-position').style.backgroundColor = color;
        @endif
    }
    //open btn font
    function openBtnFont() {
        var font = document.getElementById('de_oc_btn_text_font').value;
        document.getElementById('ticket-link-text-field').style.fontFamily = font;
    }
    //open btn font size
    document.getElementById('ticket-link-text-field').style.fontSize = 0.8 + 'rem';
    function openBtnFontSize() {
        var size = document.getElementById('de_oc_btn_text_font_size').value;
        document.getElementById('ticket-link-text-field').style.fontSize = size + 'rem';
    }
    //open btn color
    function openBgFontColor() {
        var color = document.getElementById('de_oc_btn_color').value;
        document.getElementById('ticket-link-text-field').style.backgroundColor = color;
    }
    //open btn font color
    function openBtnFontColor() {
        var color = document.getElementById('de_oc_btn_text_color').value;
        document.getElementById('ticket-link-text-field').style.color = color;
    }
    //open btn font shadow
    function openBtnFontShadow() {
        var color = document.getElementById('de_oc_btn_text_font_shadow_color').value;
        var r = document.getElementById('de_oc_btn_text_font_shadow_right').value;
        var b = document.getElementById('de_oc_btn_text_font_shadow_bottom').value;
        var bl = document.getElementById('de_oc_btn_text_font_shadow_blur').value;
        var cardColor = r+'px' + ' ' + b+'px' + ' ' + bl+'px' + ' ' + color;
        document.getElementById('ticket-link-text-field').style.textShadow = cardColor;
    }
</script>
