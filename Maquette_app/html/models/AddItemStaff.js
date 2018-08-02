
function AddItemStaff () {


    var _val, valItem;


    this.init = function (type) {

        _val = type
        body = document.querySelector('body');
        modal = document.querySelector('.modal-item-staff');
        modalTitle = document.querySelector('.item-staff-title');

        backModal = document.createElement('div');
        backModal.classList.add('modal-backdrop');
        backModal.classList.add('fade');
        backModal.classList.add('show');
        backModal.classList.add('item-staff-backdrop');

        body.classList.add('modal-open');
        modal.classList.add('show');
        modal.style.display = "block";
        body.appendChild(backModal);
        modalTitle.innerHTML = '<span> Ajout ' + type + '</span>';
        closeModal();
        evenement();

    }


    var evenement = function () {

        $('#submit-AddItemStaff').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            checkData();
        });
    };

    var checkData = function () {

        valItem = $('#val-item-staff').val();

        if (valItem === '' ) {

            $('#val-item-staff').css( "background-color", orange );
            elemFocus('#val-item-staff');

        } else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('cat', _val);
        form_data.append('item', valItem);
        form_data.append('request', 'AddItemStaff');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {

                var _result = result.replace(' ','');

                if(_val === 'privilege'){


                    $("#" + _val).append('<div class="form-group form-check"><input type="checkbox" class="form-check-input" id='+_result+'><label class="form-check-label" for="exampleCheck1">'+result+'</label></div>');
                }else {

                        $("#" + _val).append("<option value="+_result+">"+result+"</option>");
                }


            }
        });
    };


    var elemFocus = function (elem){

            $(elem).on('focus', function () {
                $(elem).css('background-color', 'white');
                
            });
    }

    var vide = function () {

        var i = 0;
        var input = $('input');

        for (i = 0; i < input.length; i += 1) {

            input[i].value = "";
        }

    };

    var closeModal = function () {

        $('#button-item-staff').on('click', function () {

            remove ();
        });        
        
        $('.close-alert-staff').on('click', function () {

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
            backModal = $('.item-staff-backdrop');

            modal.removeClass('show');
            backModal.remove();
            body.removeClass('modal-open');
            modal.css('display', "none");
    }


}

var additemstaff = new AddItemStaff ();
