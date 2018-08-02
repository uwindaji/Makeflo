
function AddItem () {


    var valItem;
    var _val;
    this.init = function (val) {

        _val = val;

        body = document.querySelector('body');
        modal = document.querySelector('.modal-item');
        modalTitle = document.querySelector('.item-title');

        backModal = document.createElement('div');
        backModal.classList.add('modal-backdrop');
        backModal.classList.add('fade');
        backModal.classList.add('show');
        backModal.classList.add('item-backdrop');

        body.classList.add('modal-open');
        modal.classList.add('show');
        modal.style.display = "block";
        body.appendChild(backModal);
        closeModal();

        modalTitle.innerHTML = '<span> Ajout ' + val + '</span>';

        evenement();
    }

    var evenement = function () {

        $('#submit-AddItem').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            checkData();
        });
    };

    var checkData = function () {

        valItem = $('#val-item').val();

        if (valItem === '' ) {

            $('#val-item').css( "background-color", orange );
            elemFocus('#val-item');

        } else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('cat', _val);
        form_data.append('item', valItem);
        form_data.append('request', 'AddItem');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {

                if (result !== 'error'){


                        if(_val === 'couleur'){

                            kulor(result)
                        }else {

                            select(result);
                        }
                }else {

                    $(".message").html('erreur pour ajouter' + valItem);
                    $(".message").css("color", vert1);
                }

            }
        });
    };

    var kulor = function (result) {

        var i;
        var tok;
        var to;
        var res = result.split(" ");
        $(".message").html(valItem + ' ajouter avec success');
        $(".message").css("color", vert1);

        var elem = $("#" + _val);
        for (i = 0; i < res.length; i += 1) {

            to = "'" +res[i]+ "'";

            tok = 'onclick="colorCheck(this, ' + to + ')"';
            elem.append('<div class="color  mr-2 ml-2 mt-2" ' + tok + ' style="background-color: ' + res[i] + '"></div>');
        }
    }

    var select = function (result) {

        var i;
        var res = result.split(" ");
        $(".message").html(valItem + ' ajouter avec success');
        $(".message").css("color", vert1);

        var elem = $("#" + _val);
        for (i = 0; i < res.length; i += 1) {

            elem.append("<option value='" +  res[i] + "'>" +  res[i] + "</option>");
        }
    }

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

    var closeModal = function () {

        $('#button-item').on('click', function () {

            remove ();
        });        
        
        $('.close-alert').on('click', function () {

            remove ();
        });

        $('.modal-backdrop').on('click', function () {

            remove ();
        });
    };

    var remove = function () {


            $(".message").html('');
            $('#val-item').html('');
            body = $('body');
            modal = $('.modal');
            backModal = $('.item-backdrop');

            modal.removeClass('show');
            backModal.remove();
            body.removeClass('modal-open');
            modal.css('display', "none");
    }

}

var additem = new AddItem();