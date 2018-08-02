function  AdminLogin () {

    var  email, password;

    this.init = function () {

        evenement();
    };

    var evenement = function () {

        $('#submit-AdminLogin').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            sendData();
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
}

var adminLogin = new AdminLogin();
    adminLogin.init();