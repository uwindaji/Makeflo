function  AddAdmin () {

    var _this = this;
    var  nom, prenom, email, email2, tel, adresse, cp, ville, dEmbauche, dSortie, password, password2;

    this.init = function () {

        evenement();
    };

    var evenement = function () {

        $('#submit-AddStaff').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            checkData();
        });
    };

    var checkData = function () {

        nom = $('#nom').val();
        prenom =  $('#prenom').val();
        email =  $('#email').val();
        email2 =  $('#email2').val();
        tel =  $('#tel').val();
        dateN =  $('#date-n').val();
        adresse =  $('#adresse').val();
        cp =  $('#cp').val();
        ville = $('#ville').val();
        dEmbauche =  $('#date-emb').val();
        dSortie =  $('#date-sortie').val();
        password =  $('#password').val();
        password2 =  $('#password2').val();

        if (nom.length <= 3) {

            $('#nom').css( "background-color", orange );
            elemFocus('#nom');
            msg.init('alert', 'nom est vide');

        } else if (prenom.length < 3) {

            $('#prenom').css( "background-color", orange );
            elemFocus('#prenom');

        } else if (_email(email) === false) {

            $('#email').css( "background-color", orange );
            elemFocus('#email');

        } else if (email !== email2) {

            $('#email2').css( "background-color", orange );
            elemFocus('#email2');

        } else if (tel.length !== 10) {

            $('#tel').css( "background-color", orange );
            elemFocus('#tel');

        } else if (dateN === '') {

            $('#date-n').css( "background-color", orange );
            elemFocus('#date-n');

        }else if (adresse.length < 5) {

            $('#adresse').css( "background-color", orange );
            elemFocus('#adresse');
        }else if (cp.length !== 5) {

            $('#cp').css( "background-color", orange );
            elemFocus('#cp');
        }else if (ville.length < 3) {

            $('#ville').css( "background-color", orange );
            elemFocus('#ville');
        } else if (dEmbauche === '') {

            $('#date-emb').css( "background-color", orange );
            elemFocus('#date-emb');
        } else if (_password(password) === false) {

            $('#password').css( "background-color", orange );
            elemFocus('#password');
        } else if (password2 !== password) {

            $('#password2').css( "background-color", orange );
            elemFocus('#password2');
        } else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('nom', nom);
        form_data.append('prenom', prenom);
        form_data.append('email', email);
        form_data.append('tel', tel);
        form_data.append('adresse', adresse);
        form_data.append('cp', cp);
        form_data.append('ville', ville);
        form_data.append('dEmbauche', dEmbauche);
        form_data.append('dSortie', dSortie);
        form_data.append('password', password);
        form_data.append('request', 'AddAdmin');
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


    var _email = function (x) {

        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var re =  reg.test(x);

        if (re === true){

            return true;
        }else {

            return false;
        }
    };

    var _password = function (x) {

        var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        var re =  reg.test(x);

        if (re === true){

            return true;
        }else {

            return false;
        }
    };

        //methode pour vider formulaire
    var vide = function () {

        var i = 0;
        var input = $('input');

        for (i = 0; i < input.length; i += 1) {

            input[i].value = "";
        }

    };

    var elemFocus = function (elem){

            $(elem).on('focus', function () {
                $(elem).css('background-color', 'white');
                
            });
    }


}

var addstaff = new AddAdmin();
    addstaff.init();