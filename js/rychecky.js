// Filtrovací funkce pro jQuery Isotope
var filterFns = {};
var $ = jQuery;


/**
 * Just jQuery thing.
 */

$(function () {
    if ($('.portfolio').length > 0) { // jQuery Isotope pro filtrování a řazení portfolia
        initialize_isotope();
    }

    if ($('#gmap-iframe').length > 0) { // Na stránce Kontaktu...
        gmap_resize(); // Změní velikost Google Maps iframe
        $(window).on('resize', gmap_resize); // Změna velikosti iframe při každé změně okna
    }

    $('.timeline .event').on('mouseover click', timeline_type_focus); // Zvýraznění
});


/**
 * Zobrazuje modální dialog pro jednu položku portfolia. Stahuje informace přes AJAX.
 * @param {number} portfolio_id ID portfolia
 */

function portfolio(portfolio_id) {
    var modal = $('#portfolio-modal'); // Modální dialog

    $.ajax({
        type: 'GET',
        url: '/ajax.php',
        data: {
            'action': 'portfolio',
            'portfolio_id': portfolio_id // ID portfolia odeslané v požadavku
        },
        success: function (data, textStatus, xhr) {
            var obj = JSON.parse(data); // Parsuje odpověď

            modal.find('.modal-title').html(obj.title); // Nastavuje nadpis dialogu
            modal.find('.modal-body').html(obj.body); // Nastavuje tělo dialogu
        }
    });

    modal.modal('show'); // Zobrazí dialog
}


/**
 * Inicializuje jQuery Isotope (https://isotope.metafizzy.co/) pro filtrování a řazení portfolia.
 */

function initialize_isotope() {
    var $container = $('.isotope').isotope({
        itemSelector: '.portfolio',
        layoutMode: 'fitRows',
        getSortData: {
            name: '[data-name]', // Řazení dle jména
            age: function (item) { // Řazení dle stáří
                return parseInt($(item).data('age'));
            },
            size: function (item) { // Řazení dle rozsahu
                return parseInt($(item).data('size'));
            }
        }
    });

    // Filtruje portfolio přes Isotope po kliknutí na tlačítko filtrace
    $('#filters .btn').on('click', function () {
        var filterValue = $(this).attr('data-filter');
        filterValue = filterFns[filterValue] || filterValue;
        $container.isotope({filter: filterValue});
    });

    // Řazení dle definovaných funkcí
    $('#sorts .btn').on('click', function () {
        var sortByValue = $(this).attr('data-sort-by');
        $container.isotope({sortBy: sortByValue});
    });

    // Zvýraznění tlačítek filtrování a řazení
    $('#filters .btn, #sorts .btn').on('click', function () {
        $(this).addClass('btn-light').removeClass('btn-dark');
        $(this).siblings('.btn').addClass('btn-dark').removeClass('btn-light'); // Zvýraznění tlačítka
    });
}


/**
 * Zvýrazňuje události stejného typu v timeline (např. všechny vzdělání)
 */

function timeline_type_focus() {
    var type = $(this).data('type');

    $('.event').css({'opacity': 0.4});
    $(this).css({'opacity': 1.0});
    $('.event[data-type="' + type + '"]').css({'opacity': 0.9});

    // Při odjetí kuzoru vrací průhlednost
    $(this).on('mouseleave', function () {
        $('.event').css({'opacity': 1.0});
    });
}


/**
 *  Mění velikost Google Maps v <iframe> tak, aby byla vždy přes celý .container. Vypadá to hezky. :)
 */

function gmap_resize() {
    var container = $('#content');
    var iframe = $('#gmap-iframe');
    var width = parseInt(container.css('width')); // Šířka kontejneru

    var css = { // Nové CSS pro iframe
        'width': width + 'px',
        'margin-left': '-' + container.css('padding-left'),
        'margin-bottom': '-' + container.css('padding-bottom')
    };

    iframe.css(css);
}