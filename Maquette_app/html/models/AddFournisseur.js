
function AddFournisseur () {

    this.init = function () {

        body = document.querySelector('body');
        modal = document.querySelector('.modal-four');
        modalTitle = document.querySelector('.four-title');

        backModal = document.createElement('div');
        backModal.classList.add('modal-backdrop');
        backModal.classList.add('fade');
        backModal.classList.add('show');
        backModal.classList.add('four-backdrop');

        body.classList.add('modal-open');
        modal.classList.add('show');
        modal.style.display = "block";
        body.appendChild(backModal);
        modalTitle.innerHTML = '<span> Ajout fournisseur</span>';
        closeModal();
        evenement();
    };

    var evenement = function () {

        $('#submit-four').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();

            
            checkData();
        });
    };


    var checkData = function () {
        nom = $('#nom-f').val();
        tel = $('#tel-f').val();
        email = $('#email-f').val();
        adresse = $('#adresse-f').val();
        cp = $('#cp-f').val();
        ville = $('#ville-f').val();

        if (nom.length <= 3) {

            $('#nom-f').css( "background-color", orange );
            elemFocus('#nom-f');

        } else if (tel.length !== 10) {

            $('#tel-f').css( "background-color", orange );
            elemFocus('#tel-f');

        } else if (_email(email) === false) {

            $('#email-f').css( "background-color", orange );
            elemFocus('#email-f');

        } else if (adresse.length < 5) {

            $('#adresse-f').css( "background-color", orange );
            elemFocus('#adresse-f');
        }else if (cp.length !== 5) {

            $('#cp-f').css( "background-color", orange );
            elemFocus('#cp-f');
        }else if (ville.length < 3) {

            $('#ville-f').css( "background-color", orange );
            elemFocus('#ville-f');

        } else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('nom', nom);
        form_data.append('tel', tel);
        form_data.append('email', email);
        form_data.append('adresse', adresse);
        form_data.append('cp', cp);
        form_data.append('ville', ville);;
        form_data.append('request', 'AddFournisseur');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                //alert(result);
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

    var _email = function (x) {

        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var re =  reg.test(x);

        if (re === true){

            return true;
        }else {

            return false;
        }
    };

    var elemFocus = function (elem){

            $(elem).on('focus', function () {
                $(elem).css('background-color', 'white');
                
            });
    }

    var closeModal = function () {

        $('#button-four').on('click', function () {

            remove ();
        });        
        
        $('.close-four').on('click', function () {

            remove ();
        });

        $('.modal-backdrop').on('click', function () {

            remove ();
        });
    };

    var remove = function () {


            body = $('body');
            modal = $('.modal');
            backModal = $('.modal-backdrop');

            modal.removeClass('show');
            backModal.remove();
            body.removeClass('modal-open');
            modal.css('display', "none");
    }


}

var addfournisseur = new AddFournisseur ();