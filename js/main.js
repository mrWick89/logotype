// for panel
$(function() {
    $("#accordion").accordion({
        collapsible: true,
        heightStyle: "content",
        active: false
    });
});

// for modal
$(".popup__close").click(function() {
    $(".popup").removeClass("popup--show");
})

$(".page-wrapper").click(function() {
    $(".popup").removeClass("popup--show");
})

$(document).on('click', '.gallery__item._cat', function(){
    anons = $(this).find('#anons').text();
    caption = $(this).find('#caption p').text();
    permalink = $(this).find('#permalink').text();
    if (permalink.length > 0) {
        $('.contacts').addClass('o-proekte');
        $('.navbar__item._project').removeClass('hidden');
        $('.navbar__link-permalink').attr('href', permalink);
    } else {
        $('.contacts').removeClass('o-proekte');
        $('.navbar__item._project').addClass('hidden');
    }
    $('.panel__content-show').text(anons);
    $('.panel__content').text(caption);
});

var post_id = $('#post_id').text();
$('.navbar__item a#post_'+post_id).each(function() {
        $(this).closest('li').addClass('navbar__item--active');
});

$('.wpcf7-list-item').each(function(){
    $(this).html($(this).html().replace(/&nbsp;/gi,''));
});

$('.blank__file span.file').each(function(){
    $(this).prepend('<span class="blank__file-btn"> Выберите файл </span><mark> Файл не выбран </mark>');
});

$(document).on('click', 'span.blank__file-btn', function() {
    _mark = $(this).next().text();
    //alert(_mark);
    if (_mark != ' Файл не выбран ') {
        $(this).next().addClass('green');
    }
});

$('.wpcf7-file').on('change', function(){
    _val = $(this).val();
    if (_val) {
        $('.file mark').addClass('green');
    }
});

// for footer_map
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("f-map", {
            center: [53.916605, 27.523275],
            zoom: 15,
            controls: ['zoomControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),

    // Создаем геообъект с типом геометрии "Точка".
        myGeoObject = new ymaps.GeoObject({
            // Описание геометрии.
            geometry: {
                type: "Point",
                coordinates: [53.916605, 27.523275]
            },
            // Свойства.
            properties: {
                // Контент метки.
                iconContent: 'Collection',
                hintContent: 'Офис дизайн-студии Collection'
            }
        }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'islands#blackStretchyIcon'
        });

    myMap.geoObjects
        .add(myGeoObject)
}
