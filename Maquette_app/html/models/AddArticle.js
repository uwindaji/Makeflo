function  AddArticle () {

    var _this = this;
    var  nom, code, prixAchat, prixVente, vaP, qt, gains, marque, genre, categorie, saison, matiere, type, fournisseur, taille, emplacement, desc, image;

    this.init = function () {

        initial();
        evenement();
        calcul();
        
    };

    var evenement = function () {

        $('#submit-AddArticle').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            checkData();
        });
    };

    var checkData = function () {

        nom = $('#nom').val();
        code =  $('#code').val();
        prixAchat =  $('#prix-achat').val();
        prixVente =  $('#prix-vente').val();
        valP =  $('#val-p').val();
        qt =  $('#qt').val();
        gainTotale =  $('#gain-totale').val();
        marque =  $('#marque').val();
        genre = $('#genre').val();
        categorie =  $('#categorie').val();
        saison =  $('#saison').val();
        matiere =  $('#matiere').val();
        type =  $('#type').val();
        fournisseur =  $('#fournisseur').val();
        taille =  $('#taille').val();
        emplacement =  $('#emplacement').val();
        desc =  $('#color').val();
        image =  $('#image').val();

        if (nom === '' ) {

            $('#nom').css( "background-color", orange );
            elemFocus('#nom');
            msg.init('alert', 'Champs nom est vide')

        } else if (code === '') {

            $('#code').css( "background-color", orange );
            elemFocus('#code');
            msg.init('alert', 'Champs code est vide')

        } else if (prixAchat === '') {

            $('#prix-achat').css( "background-color", orange );
            elemFocus('#prix-achat');
            msg.init('alert', 'Champs prix achat est vide')

        } else if (prixVente === '') {

            $('#prix-vente').css( "background-color", orange );
            elemFocus('#prix-vente');
            msg.init('alert', 'Champs Prix vente est vide')

        } else if (qt === '') {

            $('#qt').css( "background-color", orange );
            elemFocus('#qt');
            msg.init('alert', 'Champs Quantité est vide');

        } else if (gainTotale === '') {

            $('#gain-totale').css( "background-color", orange );
            elemFocus('#gain-totale');
            msg.init('alert', 'Champs Gains totale est vide');

        }else if (marque === '') {

            $('#marque').css( "background-color", orange );
            elemFocus('#marque');
            msg.init('alert', 'Champs Marque est vide');

        }else if (genre === '') {

            $('#genre').css( "background-color", orange );
            elemFocus('#genre');
            msg.init('alert', 'Champs Genre est vide');

        }else if (categorie === '') {

            $('#categorie').css( "background-color", orange );
            elemFocus('#categorie');
            msg.init('alert', 'Champs Categorie est vide');

        } else if (saison === '') {

            $('#saison').css( "background-color", orange );
            elemFocus('#saison');
            msg.init('alert', 'Champs Saison est vide');

        } else if (matiere === '') {

            $('#matiere').css( "background-color", orange );
            elemFocus('#matiere');
            msg.init('alert', 'Champs Matiere est vide');

        } else if (type === '') {

            $('#type').css( "background-color", orange );
            elemFocus('#type');
            msg.init('alert', 'Champs Type est vide');

        } else if (fournisseur === '') {

            $('#fournisseur').css( "background-color", orange );
            elemFocus('#fournisseur');
            msg.init('alert', 'Champs Fournisseur est vide');

        } else if (taille === '') {

            $('#taille').css( "background-color", orange );
            elemFocus('#taille');
            msg.init('alert', 'Champs Taille est vide');

        } else if (emplacement === '') {

            $('#emplacement').css( "background-color", orange );
            elemFocus('#emplacement');
            msg.init('alert', 'Champs Emplacement est vide');

        } else if (color === null) {

            $('#color').css( "background-color", orange );
            elemFocus('#color');
            msg.init('alert', 'Il faut choisir une couleur');

        } else if (desc === '') {

            $('#image').css( "background-color", orange );
            elemFocus('#image');
            msg.init('alert', 'Champs Description est vide');

        } else if (image === '') {

            $('#image').css( "background-color", orange );
            elemFocus('#image');
            msg.init('alert', 'Il faut choisir une image');

        }  else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('nom', nom);
        form_data.append('code', code);
        form_data.append('prixAchat', prixAchat);
        form_data.append('prixVente', prixVente);
        form_data.append('qt', qt);
        form_data.append('marque', marque);
        form_data.append('genre', genre);
        form_data.append('categorie', categorie);
        form_data.append('saison', saison);
        form_data.append('matiere', matiere);
        form_data.append('type', type);
        form_data.append('fournisseur', fournisseur);
        form_data.append('taille', taille);
        form_data.append('emplacement', emplacement);
        form_data.append('color', color);
        form_data.append('desc', desc);
        form_data.append('image', image);
        form_data.append('request', 'AddArticle');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                // alert(result);   
            }
        });
    };

    var calcul = function () {    // function a riviser calcule poucentage

        _prixAchat =  $('#prix-achat');
        _prixVente =  $('#prix-vente');
        _valP =  $('#val-p');
        _qt =  $('#qt');
        _gainTotale = $('#gain-totale');
        _tva = $('#tva');

        _prixVente.keyup(function() {

            prixAchat =  $('#prix-achat').val();
            prixVente =  $('#prix-vente').val();

            if (_prixAchat !== ''){

                _valP.val((((Number(prixVente) * 100) / Number(prixAchat)) / 100));
                _tva.val((Number(prixVente) * 20) / 100);
            }

        });

        _valP.keyup(function() {

            prixAchat =  $('#prix-achat').val();
            valP =  $('#val-p').val();

            if (_prixAchat !== ''){

                _prixVente.val(Number(prixAchat) + ((Number(valP) * Number(prixAchat)) / 100));
                _tva.val((Number(_prixVente) * 20) / 100);
            }

        });

        _qt.keyup(function() {

            prixAchat =  $('#prix-achat').val();
            prixVente =  $('#prix-vente').val();
            qt =  $('#qt').val();

            if (prixAchat !== '' && prixVente !== '' ){

                var gTotale = (Number(prixVente) - Number(prixAchat)) * Number(qt);
                _gainTotale.val((Number(gTotale) * 200) / 100);
            }

        });
    };

        //methode pour vider formulaire
    var vide = function () {

        var i = 0;
        var input = $('input');

        for (i = 0; i < input.length; i += 1) {

            input[i].value = "";
        }

        $('textarea').value = "";

    };

    var elemFocus = function (elem){

            $(elem).on('focus', function () {
                $(elem).css('background-color', 'white');
                
            });
    }


    var initial = function () {

        var form_data = new FormData();
        form_data.append('request', 'initAddArticle');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                //alert(result);   // recuperation select en format json
            }
        });
    }



}

var addarticle = new AddArticle();
    addarticle.init();