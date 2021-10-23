$(document).ready(function(){
    /*
    var MercoSulMaskBehavior = function (val) {
        var myMask = 'AAA0A00';
        var mercosul = /([A-Za-z]{3}[0-9]{1}[A-Za-z]{1})/;
        var normal = /([A-Za-z]{3}[0-9]{2})/;
        var replaced = val.replace(/[^\w]/g, '');
        if (normal.exec(replaced)) {
            myMask = 'AAA-0000';
        } else if (mercosul.exec(replaced)) {
            myMask = 'AAA0A00';
        }
        return myMask;
    },
    mercoSulOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(MercoSulMaskBehavior.apply({}, arguments), options);
        }
    };
    $(function() {
        $('.placa').bind('paste', function(e) {
            $(this).unmask();
        });
        $('.placa').bind('input', function(e) {
            $('.placa').mask(MercoSulMaskBehavior, mercoSulOptions);
        });
    }); */




    $('.placa').mask('AAA 0U00', {
        translation: {
            'A': {
                pattern: /[A-Za-z]/
            },
            'U': {
                pattern: /[A-Za-z0-9]/
            },
        },
        onKeyPress: function (value, e, field, options) {
            // Convert to uppercase
            e.currentTarget.value = value.toUpperCase();

            // Get only valid characters
            let val = value.replace(/[^\w]/g, '');

            // Detect plate format
            let isNumeric = !isNaN(parseFloat(val[4])) && isFinite(val[4]);
            let mask = 'AAA 0U00';
            if(val.length > 4 && isNumeric) {
                mask = 'AAA-0000';
            }
            $(field).mask(mask, options);
        }
    });
})