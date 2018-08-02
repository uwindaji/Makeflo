function  Login () {

    var  email, password;

    this.init = function () {

        evenement();
        collapse();
    };

    var evenement = function () {

        $('#submit-AdminLogin').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            //sendData();
        });
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('email', email);
        form_data.append('password', password);
        form_data.append('request', 'AdminLogin');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                msg.init('info', result);
            }
        });
    };

    var collapse = function () {

        $('.collapse').collapse('hide').on('show.bs.collapse', function (e) {
            var id = $(this).attr('id');
            $('div[data-target="#' + id + '"]').find('.only-expanded').show();
            $('div[data-target="#' + id + '"]').find('.only-collapsed').hide();

        }).on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('div[data-target="#' + id + '"]').find('.only-expanded').hide();
            $('div[data-target="#' + id + '"]').find('.only-collapsed').show();
        })
    }
}

var login = new Login();
    login.init();