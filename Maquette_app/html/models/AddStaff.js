function  AddStaff () {

    var _this = this;
    var  nom, prenom, dateN, email, email2, tel, adresse, cp, ville, dEmbauche, dSortie, metier, secteur, privilege, password, password2;

    var categorie = ['metier', 'secteur', 'privilege']

    this.init = function () {

        var i ; 

        evenement();

        for(i = 0; i<categorie.length; i += 1){

            checkInfo(categorie[i]);

        }

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
        dateN = $('#date-n').val();
        email =  $('#email').val();
        email2 =  $('#email2').val();
        tel =  $('#tel').val();
        adresse =  $('#adresse').val();
        cp =  $('#cp').val();
        ville = $('#ville').val();
        dEmbauche =  $('#date-emb').val();
        dSortie =  $('#date-sortie').val();
        metier =  $('#metier').val();
        secteur =  $('#secteur').val();
        privilege = $('#privilege').val();
        password =  $('#password').val();
        password2 =  $('#password2').val();


        if (nom.length <= 3) {

            $('#nom').css( "background-color", orange );
            elemFocus('#nom');
            msg.init('alert', 'Champs Nom est vide');

        } else if (prenom.length < 3) {

            $('#prenom').css( "background-color", orange );
            elemFocus('#prenom');
            msg.init('alert', 'Champs Préom est vide');

        } else if (dateN === '') {

            $('#date-n').css( "background-color", orange );
            elemFocus('#date-n');
            msg.init('alert', 'Champs Date est vide');

        } else if (_email(email) === false) {

            $('#email').css( "background-color", orange );
            elemFocus('#email');
            msg.init('alert', 'E-mail non valide');

        } else if (email !== email2) {

            $('#email2').css( "background-color", orange );
            elemFocus('#email2');
            msg.init('alert', 'Les E-mail ne sont pas identique');

        } else if (tel.length !== 10) {

            $('#tel').css( "background-color", orange );
            elemFocus('#tel');
            msg.init('alert', 'tél non valide');

        } else if (adresse.length < 5) {

            $('#adresse').css( "background-color", orange );
            elemFocus('#adresse');
            msg.init('alert', 'Adresse non valide');

        }else if (cp.length !== 5) {

            $('#cp').css( "background-color", orange );
            elemFocus('#cp');
            msg.init('alert', 'Code postale non valide');

        }else if (ville.length < 3) {

            $('#ville').css( "background-color", orange );
            elemFocus('#ville');
            msg.init('alert', 'Ville non valide');

        } else if (dEmbauche === '') {

            $('#date-emb').css( "background-color", orange );
            elemFocus('#date-emb');
            msg.init('alert', 'Date embauche non valide');

        } else if (metier === '') {

            $('#date-sortie').css( "background-color", orange );
            elemFocus('#date-sortie');
            msg.init('alert', 'Champs Secteur est vide');

        } else if (secteur === '') {

            $('#date-sortie').css( "background-color", orange );
            elemFocus('#date-sortie');
            msg.init('alert', 'Champs Secteur est vide');

        } else if (_password(password) === false) {

            $('#password').css( "background-color", orange );
            elemFocus('#password');
            msg.init('alert', 'Mot de passe non valide</br>le mot de passe doit</br>contenire 8 charchtere</br>majiscule et minuscule</br> et au moins un chiffre');

        } else if (password2 !== password) {

            $('#password2').css( "background-color", orange );
            elemFocus('#password2');
            msg.init('alert', 'Les mots de passe ne sont pas identique');

        } else {

            sendData();
            //vide();       //______________________________________________________________
        }
    };

    var sendData = function () {


        var form_data = new FormData();

        form_data.append('nom', nom);
        form_data.append('prenom', prenom);
        form_data.append('dateN', dateN);
        form_data.append('email', email);
        form_data.append('tel', tel);
        form_data.append('adresse', adresse);
        form_data.append('cp', cp);
        form_data.append('ville', ville);
        form_data.append('dEmbauche', dEmbauche);
        form_data.append('dSortie', dSortie);
        form_data.append('metier', metier);
        form_data.append('secteur', secteur);
        form_data.append('priv', privilege);
        form_data.append('password', password);
        form_data.append('request', 'AddStaff');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                //console.log(result);
            }
        });
    };


    var checkInfo = function (cat) {

        var i;

        var form_data = new FormData();
        form_data.append('cat', cat);
        form_data.append('request', 'CheckStaff');

        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {

                var res = JSON.parse(result);


                switch(cat){

                    case 'metier':
                        for(i = 0; i<res.length; i += 1){
                            $("#" + cat).append("<option value="+res[i].metier+">"+res[i].metier+"</option>")
                        }
                    break;

                    case 'secteur':
                        for(i = 0; i<res.length; i += 1){
                            $("#" + cat).append("<option value="+res[i].secteur+">"+res[i].secteur+"</option>")
                        }
                    break;
                    case 'privilege':
                        for(i = 0; i<res.length; i += 1){

                            $("#" + cat).append("<option value="+res[i].privilege+">"+res[i].privilege+"</option>")
                        }
                    break;
                }
            }
        });

    }


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

var addstaff = new AddStaff();
    addstaff.init();