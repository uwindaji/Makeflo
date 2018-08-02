function  AdminLogin () {

    var  email, password;

    this.init = function () {

        evenement();
    };

    var evenement = function () {

        $('#submit-AdminLogin').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();

            email = $('#email-login').val();
            password = $('#password-login').val();
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

                if(result === 'false'){

                    msg.init('alert', 'erreur de connexion');
                }else if (result === 'true'){

                    msg.init('info', 'connexion success');
                    sessionLogin = result;

                    $( "#user-id" ).trigger( "click" );

                        add_index.display("._menu", 'AdminMenu');
                        add_index.createEvent('Evenement')
                    vide();
                }
                
                
            }
        });
    };

    var vide = function () {

        var i = 0;
        var input = $('input');

        for (i = 0; i < input.length; i += 1) {

            input[i].value = "";
        }

    };
}

var adminLogin = new AdminLogin();
    adminLogin.init();