<script>
    //Проверка на показ дополнительный опций при редактировании логотипа
    var vidFileLength = $("#logotype-upload")[0].files.length; //если загрузчик пуст
    if(vidFileLength === 0){
        $('#logo_properties').hide();
    }
    $( document ).ready(function(){ //Если не пуст
        $('#logotype-upload').on('change', function(){
            $('#logo_properties').show();
        });
    });

    @if($user->settings->logotype)
        $('#logo_properties').show();
    @endif

    //Выбор шрифта для имени
    new TomSelect('#select-font-name',{
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
                            '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                        '</div>';
            },
            item: function(data, escape) {
                return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
            }
        }
    });

    //Загрузка фонового изображения
    document.getElementById('banner').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('banner-block').style.background = "url(" + e.target.result + ") no-repeat center center fixed";
                document.getElementById('banner-block').style.backgroundSize = "cover";
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    //Загрузка аватара
    document.getElementById('avatar').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('ava-img').setAttribute('src', e.target.result);
                $('#default-block').hide();
                $('#logo-block').hide();
                $('#ava-block').show();

                $('#def-logo').hide();
                $('#def-ava').hide();

                $('#user-name').show();
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    //Загрузка логотипа
    document.getElementById('logotype-upload').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('logo-img').setAttribute('src', e.target.result);
                $('#default-block').hide();
                $('#ava-block').hide();
                $('#logo-block').show();

                $('#def-ava').hide();
                $('#def-logo').hide();

                $('#user-name').hide();
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    //Размер логотипа
    var logoSizeDefault = document.getElementById('logo-size').value;
    $("#logo-size-value").html(logoSizeDefault)
    function logoSize() {
        var logoSizeValue = document.getElementById('logo-size').value;
        $("#logo-size-value").html(logoSizeValue);
        document.getElementById('logo').style.width = logoSizeValue + 'px';
        document.getElementById('logo-img').style.width = logoSizeValue + 'px';
    }

    //Тень и цвет тени для логотипа
    var rightDef = document.getElementById('logotype_shadow_color_right').value;
    var bottomDef = document.getElementById('logotype_shadow_color_bottom').value;
    var blurDef = document.getElementById('logotype_shadow_color_blur').value;
    $("#logotype_shadow_color_right_value").html(rightDef)
    $("#logotype_shadow_color_bottom_value").html(bottomDef)
    $("#logotype_shadow_color_blur_value").html(blurDef)
    function logoColorShadow() {
        var textShadowColor = document.getElementById('logotype_shadow_color').value;
        var right = document.getElementById('logotype_shadow_color_right').value;
        var bottom = document.getElementById('logotype_shadow_color_bottom').value;
        var blur = document.getElementById('logotype_shadow_color_blur').value;

        $("#logotype_shadow_color_right_value").html(right)
        $("#logotype_shadow_color_bottom_value").html(bottom)
        $("#logotype_shadow_color_blur_value").html(blur)

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;

        document.getElementById('logo').style.setProperty("-webkit-filter", "drop-shadow(" + textShadow +")");
        document.getElementById('logo-img').style.setProperty("-webkit-filter", "drop-shadow(" + textShadow +")");
    }

    //Отображение аватара или логотипа
    function typeImg(type) {
        if(type === 'avatar') {
            var ava = $("#avatar").val();
            if(ava) {
                $('#default-block').hide();
                $('#logo-block').hide();
                $('#ava-block').show();
                $('#def-logo').hide();
                $('#def-ava').hide();
                $('#user-name').show();
            } else {
                $('#default-block').hide();
                $('#logo-block').hide();
                $('#ava-block').hide();
                $('#def-logo').hide();
                $('#def-ava').show();
                $('#user-name').show();
            }
        } else {
            var logo = $("#logotype-upload").val();
            if(logo) {
                $('#default-block').hide();
                $('#logo-block').show();
                $('#ava-block').hide();
                $('#def-logo').hide();
                $('#def-ava').hide();
                $('#user-name').hide();
            } else {
                $('#default-block').hide();
                $('#logo-block').hide();
                $('#ava-block').hide();
                $('#def-logo').show();
                $('#def-ava').hide();
                $('#user-name').hide();
            }
        }
    }

    //Отображение имени юзера
    var logo = "{{$user->settings->avatar_vs_logotype}}";
    if(logo == 'avatar') {
        $('#user-name').show();
    } else {
        $('#user-name').hide();
    }

    //Отображение иконки верификации
    var isVerify = "{{$user->verify}}"
    if(isVerify == 1) {
        $("#verify-block").show();
        $("#verify-default").show();
        $("#verify-upload").hide();
    }

    //Загрузка иконки верификации
    document.getElementById('verify-icon').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('verify').setAttribute('src', e.target.result);
                $("#verify-default").hide();
                $("#verify-upload").show();
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    //Выбор шрифта для имени
    function fontName() {
        var font = document.getElementById('select-font-name').value;
        document.getElementById('user-name').style.fontFamily = font;
    }

    //Выбор цвета шрифта для имени
    function nameColor() {
        var textColor = document.getElementById('name_color').value;
        document.getElementById('user-name').style.color = textColor;
    }

    //Выбор размера шрифта для имени
    function nameSize() {
        var fontSize = document.getElementById('name-size').value;
        document.getElementById('user-name').style.fontSize = fontSize + 'rem';
    }

    //Выбор толщины шрифта для имени
    function nameBold() {
        var bold = document.getElementById('name-bold').value;
        if(bold == 1) {
            document.getElementById('user-name').style.fontWeight = 'bold';
        }
    }

    //Тень и цвет тени для имени
    var rightNameDef = document.getElementById('name-shadow-right').value;
    var bottomNameDef = document.getElementById('name-shadow-bottom').value;
    var blurNameDef = document.getElementById('name-shadow-blur').value;
    $("#name-size-value-r").html(rightNameDef)
    $("#name-size-value-b").html(bottomNameDef)
    $("#name-size-value-bl").html(blurNameDef)

    function nameShadow() {
        var textShadowColor = document.getElementById('name-shadow').value;
        var right = document.getElementById('name-shadow-right').value;
        var bottom = document.getElementById('name-shadow-bottom').value;
        var blur = document.getElementById('name-shadow-blur').value;

        $("#name-size-value-r").html(right)
        $("#name-size-value-b").html(bottom)
        $("#name-size-value-bl").html(blur)

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('user-name').style.textShadow = textShadow;
    }

    @if($user->description)
        //Шрифт для описания
        new TomSelect('#select-font-description',{
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
                        '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                }
            }
        });

        //Загрузка шрифта для описания
        function fontDescr() {
            var font = document.getElementById('select-font-description').value;
            document.getElementById('user-description').style.fontFamily = font;
        }

        //Цвет описания
        function descrColor() {
            var color = document.getElementById('description_color').value;
            document.getElementById('user-description').style.color = color;
        }

        //Размер
        function descrSize() {
            var fontSize = document.getElementById('descr-size').value;
            document.getElementById('user-description').style.fontSize = fontSize + 'rem';
        }

        //Толщина
        function descrBold() {
            var bold = document.getElementById('descr-bold').value;
            if(bold == 1) {
                document.getElementById('user-description').style.fontWeight = 'bold';
            }
        }

        //Тень и цвет тени
        var rightDescrDef = document.getElementById('descr-shadow-right').value;
        var bottomDescrDef = document.getElementById('descr-shadow-bottom').value;
        var blurDescrDef = document.getElementById('descr-shadow-blur').value;
        $("#descr-size-value-r").html(rightDescrDef)
        $("#descr-size-value-b").html(bottomDescrDef)
        $("#descr-size-value-bt").html(blurDescrDef)

        function descrShadow() {
            var textShadowColor = document.getElementById('descr-shadow-color').value;
            var right = document.getElementById('descr-shadow-right').value;
            var bottom = document.getElementById('descr-shadow-bottom').value;
            var blur = document.getElementById('descr-shadow-blur').value;

            $("#descr-size-value-r").html(right)
            $("#descr-size-value-b").html(bottom)
            $("#descr-size-value-bt").html(blur)

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('user-description').style.textShadow = textShadow;
        }
    @endif

    //Выбор фонового цвета
    function backgroundColor() {
        var color = document.getElementById('bg-color').value;
        document.getElementById('banner-block').style.backgroundColor = color;
        document.getElementById('banner-block').style.background = color;
        document.getElementById('banner-block').style.backgroundSize = null;
    }

    //Выбор цвета для иконки верификации
    function verifyColor() {
        var color = document.getElementById('verify-color').value;
        document.getElementById('v-icon').style.color = color;
    }

    //Отображение бара с иконками
    var bar = "{{$user->settings->social_links_bar}}";
    var position = "{{$user->settings->links_bar_position}}";
    if(bar == 1) {
        $("#bar").show();
        $("#block-with-links").hide();
        $("#block-withOut-links").show();
        if(position == 'top') {
            $("#top-bar").show();
            $("#bottom-bar").hide();
        } else {
            $("#top-bar").hide();
            $("#bottom-bar").show();
        }
    } else {
        $("#bar").hide();
        $("#top-bar").hide();
        $("#bottom-bar").hide();
        $("#block-with-links").show();
        $("#block-withOut-links").hide();
    }
    function linkBar() {
        var barStatus = document.getElementById('social_links_bar').value;
        var barPosition = document.getElementById('links_bar_position').value;

        if(barStatus == 1) {

            $("#bar").show();

            $("#block-with-links").hide();
            $("#block-withOut-links").show();

            if(barPosition == 'top') {
                $("#top-bar").show();
                $("#bottom-bar").hide();
            } else {
                $("#top-bar").hide();
                $("#bottom-bar").show();
            }
        } else {
            $("#bar").hide();

            $("#top-bar").hide();
            $("#bottom-bar").hide();

            $("#block-with-links").show();
            $("#block-withOut-links").hide();
        }
    }

    //Диаметр иконок бара
    var sizeDefIcon = document.getElementById('round-links-width').value;
    $("#icon-size-def").html(sizeDefIcon)
    function iconSize() {
        var size = document.getElementById('round-links-width').value;
        $("#icon-size-def").html(size)
        document.getElementById('iconBottom').style.width = size + 'px';
        document.getElementById('iconTop').style.width = size + 'px';
    }

    //Тень и параметры тени для иконок бара
    var barShadowDefRight = document.getElementById('bar-shadow-right').value;
    var barShadowDefBottom = document.getElementById('bar-shadow-bottom').value;
    var barShadowDefBlur = document.getElementById('bar-shadow-blur').value;
    $("#icon-size-right").html(barShadowDefRight)
    $("#icon-size-bottom").html(barShadowDefBottom)
    $("#icon-size-blur").html(barShadowDefBlur)
    function barShadow() {
        var textShadowColor = document.getElementById('bar-shadow-color').value;
        var right = document.getElementById('bar-shadow-right').value;
        var bottom = document.getElementById('bar-shadow-bottom').value;
        var blur = document.getElementById('bar-shadow-blur').value;

        $("#icon-size-right").html(right)
        $("#icon-size-bottom").html(bottom)
        $("#icon-size-blur").html(blur)

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('iconBottom').style.setProperty("-webkit-filter", "drop-shadow(" + textShadow +")");
        document.getElementById('iconTop').style.setProperty("-webkit-filter", "drop-shadow(" + textShadow +")");
    }

    //Показать лого черри или нет
    var logoDef = document.getElementById('show-logo').value;
    if(logoDef == 1) {
        $("#footer").show();
    } else {
        $("#footer").hide();
    }
    function showChrry() {
        var logo = document.getElementById('show-logo').value;
        if(logo == 1) {
            $("#footer").show();
        } else {
            $("#footer").hide();
        }
    }

    //Тип страницы
    var userPageType = "{{$user->type}}";
    if(userPageType == 'Links') {
        $("#drawer-btn").hide()
    }

    @if($user->type == 'Events')
        //Выбор шрифта для блока подписки
        new TomSelect('#follow-block-font',{
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
                                '<span style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</span>' +
                            '</div>';
                },
                item: function(data, escape) {
                    return  '<h4 style="font-size: 2.5rem; font-family:' + escape(data.font) +'">' + escape(data.title) + '</h4>';
                }
            }
        });

        //Выбор анимации для кнопки подписки
        var animationDef = document.getElementById('follow-animation').value;
        $("#eventModalBtn").addClass(animationDef);
        function followAnimation() {
            var animation = document.getElementById('follow-animation').value;
            $("#eventModalBtn").removeClass(animationDef);
            $("#eventModalBtn").addClass(animation);
        }

        //Скорость анимации
        function animationSpeed() {
            var speed = document.getElementById('follow_border_animation_speed').value;
            document.getElementById('eventModalBtn').style.animationDuration = speed + 's';
        }

        //Показать доп настройки для кнопки сбора подписчиков
        var valDef = $("#event_followers").val();
        if(valDef == 1) {
            $("#follower-settings").show();
            $("#drawer-btn").show();
        } else {
            $("#follower-settings").hide();
            $("#drawer-btn").hide();
        }
        function eventFollowers() {
            var val = $("#event_followers").val();
            if(val == 1) {
                $("#follower-settings").show();
                $("#drawer-btn").show();
                console.log('on')
            } else {
                $("#follower-settings").hide();
                $("#drawer-btn").hide();
                console.log('off')
            }
        }

        //Округление углов кнопки
        var drawerRadiusDef = document.getElementById('drawer-radius').value;
        $("#eventModalBtn").addClass(drawerRadiusDef);
        function drawerRadius() {
            var radius = document.getElementById('drawer-radius').value;
            $("#eventModalBtn").removeClass(drawerRadiusDef);
            eventModalBtn
        }

        //Цвет кнопки
        function drawerBtnColor() {
            var color = document.getElementById('drawer-btn-color').value;
            document.getElementById('eventModalBtn').style.backgroundColor = color;
        }

        //Тень и параметры тени кнопки
        var drawerShadowRightDef = document.getElementById('drawer-shadow-right').value;
        var drawerShadowTopDef = document.getElementById('drawer-shadow-top').value;
        var drawerShadowBlurDef = document.getElementById('drawer-shadow-blur').value;

        $("#drawer-shadow-right-def").html(drawerShadowRightDef)
        $("#drawer-shadow-top-def").html(drawerShadowTopDef)
        $("#drawer-shadow-blur-def").html(drawerShadowBlurDef)

        function shadowDrawerBtn() {
            var textShadowColor = document.getElementById('drawer-shadow-color').value;
            var right = document.getElementById('drawer-shadow-right').value;
            var top = document.getElementById('drawer-shadow-top').value;
            var blur = document.getElementById('drawer-shadow-blur').value;

            $("#drawer-shadow-right-def").html(right)
            $("#drawer-shadow-top-def").html(top)
            $("#drawer-shadow-blur-def").html(blur)

            var boxShadow = right + 'px' + ' ' +  top + 'px' + ' ' + blur + 'px' + ' ' + textShadowColor;
            document.getElementById('eventModalBtn').style.boxShadow = boxShadow;
        }

        //Обводка кнопки
        var widthDef = document.getElementById('border-both-event').value;
        $("#eventModalBtn").addClass(widthDef);
        function eventFollowBtnWidth() {
            var width = document.getElementById('border-both-event').value;
            $("#eventModalBtn").removeClass(widthDef);
            $("#eventModalBtn").addClass(width);
        }

        //Цвет обводки кнопки
        function eventbtnBorderColor() {
            var color = document.getElementById('border-color-drawer').value;
            document.getElementById('eventModalBtn').style.borderColor = color;
        }

        //Текст кнопки
        $('#drawer-btn-text').keyup(function() {
            var val = $('#drawer-btn-text').val();
            $('#drawer-text').html(val);
        });

        //Размер тектста кнопки
        var fontSizeDef = document.getElementById('drawer-text-size').value;
        $("#drawer-text").addClass(fontSizeDef);
        function drawerTextSize() {
            var fontSize = document.getElementById('drawer-text-size').value;
            $("#drawer-text").removeClass(fontSizeDef);
            $("#drawer-text").addClass(fontSize);
        }

        //Выбор шрифта
        function fontDrawer() {
            var font = document.getElementById('follow-block-font').value;
            document.getElementById('drawer-text').style.fontFamily = font;
        }

        //Цвет шрифта
        function drawerTextColor() {
            var color = document.getElementById('drawer-text-color').value;
            document.getElementById('drawer-text').style.color = color;
        }

        //Параметры тени текста кнопки
        var drawerShadowTextRightDef = document.getElementById('drawer-text-btn-shadow-right').value;
        var drawerShadowTextBottomDef = document.getElementById('drawer-text-btn-shadow-bottom').value;
        var drawerShadowTextBlurDef = document.getElementById('drawer-text-btn-shadow-blur').value;

        $("#drawer-text-btn-r").html(drawerShadowTextRightDef);
        $("#drawer-text-btn-b").html(drawerShadowTextBottomDef);
        $("#drawer-text-btn-bl").html(drawerShadowTextBlurDef);

        function drawerTextBtnShadow() {
            var textShadowColor = document.getElementById('drawer-text-btn-shadow-color').value;
            var right = document.getElementById('drawer-text-btn-shadow-right').value;
            var bottom = document.getElementById('drawer-text-btn-shadow-bottom').value;
            var blur = document.getElementById('drawer-text-btn-shadow-blur').value;

            $("#drawer-text-btn-r").html(right);
            $("#drawer-text-btn-b").html(bottom);
            $("#drawer-text-btn-bl").html(blur);

            var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
            document.getElementById('drawer-text').style.textShadow = textShadow;
        }

        //Спасибо после подписки
        $(document).ready(function(){
            $('#eventFollowBtn').click(function(e){
                $("#closeFollowModal").click();
                $("#followModalBtn").click();
            });
        });

        //Текст благодарности
        $('#cong-message').keyup(function() {
            var val = $('#cong-message').val();
            $('#cong-text').html(val);

            $("#cong-text-def").hide();
            $("#cong-text").show();
        });

        //Гифка
        document.getElementById('congratulation_gif').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cong-gif').show();
                    document.getElementById('gif-cong').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        //Показывать кастомное спасибо или лефолтное
        var onOffDef = document.getElementById('show_logo_gif').value;
        if(onOffDef == 1) {
            $("#cong-text").show();
            $('#cong-gif').show();
            $("#cong-text-def").hide();
        } else {
            $("#cong-text").hide();
            $('#cong-gif').hide();
            $("#cong-text-def").show();
        }
        function congDefOff() {
            var onOff = document.getElementById('show_logo_gif').value;
            if(onOff == 1) {
                $("#cong-text").show();
                $('#cong-gif').show();
                $("#cong-text-def").hide();
            } else {
                $("#cong-text").hide();
                $('#cong-gif').hide();
                $("#cong-text-def").show();
            }
        }
    @endif
</script>
