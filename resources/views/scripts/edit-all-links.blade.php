<script>
    new TomSelect('#mass-edit',{
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
    });

    //font
    function font() {
        var font = document.getElementById('mass-edit').value;
        console.log(font);
        document.getElementById('title-text').style.fontFamily = font;
    }

    //text-color
    function textColor() {
        var textColor = document.getElementById('name_color').value;
        document.getElementById('title-text').style.color = textColor;
    }

    //font-size
    function fontSize() {
        var fontSize = document.getElementById('font-size').value;
        document.getElementById('title-text').style.fontSize = fontSize + 'rem';
    }

    //text-shadow
    function textShadow() {
        var textShadowColor = document.getElementById('text-shadow-color').value;
        var right = document.getElementById('text-shadow-color-right').value;
        var bottom = document.getElementById('text-shadow-color-bottom').value;
        var blur = document.getElementById('text-shadow-color-blur').value;

        var textShadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + textShadowColor;
        document.getElementById('title-text').style.textShadow = textShadow;
    }

    //bg-color
    function backgroundColor() {
        var bgColor = document.getElementById('bg-color').value;
        var transparency = document.getElementById('bg-transparency').value;

        let hex = bgColor.replace('#', '');
        if (hex.length === 3) {
            hex = `${hex[0]}${hex[0]}${hex[1]}${hex[1]}${hex[2]}${hex[2]}`;
        }

        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        var rgb = 'rgb(' + r+',' + ' ' + g+',' + ' ' + b+',' + ' ' + Number(transparency) + ')';
        document.getElementById('background').style.backgroundColor = rgb;
    }

    //link-shadow
    function linkShadow() {
        var shadowColor = document.getElementById('link-shadow-color').value;
        var right = document.getElementById('link-shadow-color-right').value;
        var bottom = document.getElementById('link-shadow-color-bottom').value;
        var blur = document.getElementById('link-shadow-color-blur').value;

        var shadow = right+'px' + ' ' + bottom+'px' + ' ' + blur+'px' + ' ' + shadowColor;
        document.getElementById('background').style.boxShadow = shadow;
    }

    //border round
    function borderRound() {
        var borderRadius = document.getElementById('border-round').value;
        document.getElementById('background').style.borderRadius = borderRadius + 'px';
    }

    //border
    function borderBoth() {
        var borderBoth = document.getElementById('border-both').value;
        document.getElementById('background').className = borderBoth;
    }

    //border color
    function borderColor() {
        var borderColor = document.getElementById('border-color').value;
        document.getElementById('background').style.borderColor = borderColor;
    }

    //bg color
    $( document ).ready(function() {
        $("#switch-bg").click(function() {
            var type = $(this).is(':checked');
            if(type) {
                $("#matureBlock").removeClass('bg-white').addClass('bg-black');
                $("#matureBlockText").removeClass('text-black').addClass('text-white');
            } else {
                $("#matureBlock").removeClass('bg-black').addClass('bg-white');
                $("#matureBlockText").removeClass('text-white').addClass('text-black');
            }
        })
    });

    function fontBold() {
        var bold = document.getElementById('dl-font-bold').value;
        if(bold == 'bold') {
            document.getElementById('title-text').style.fontWeight = 'bold';
        } else {
            document.getElementById('title-text').style.fontWeight = 'normal';
        }
    }
</script>
