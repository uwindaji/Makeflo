function Alert() {

    var _this = this;

    this.init = function (type, msg) {

        body = document.querySelector('body');
        modal = document.querySelector('.modal');
        modalBody = document.querySelector('.modal-body');

        backModal = document.createElement('div');
        backModal.classList.add('modal-backdrop');
        backModal.classList.add('fade');
        backModal.classList.add('show');

        body.classList.add('modal-open');
        modal.classList.add('show');
        modal.style.display = "block";
        body.appendChild(backModal);

        if(type === 'info'){

            $('.modal-header').css('background-color', vert1);
            $('.modal-title').html(type);

        }else if(type === 'alert'){

            $('.modal-header').css('background-color', orange);
            $('.modal-title').html(type);

        }
        modalBody.innerHTML = '<span>' + msg + '</span>';
        closeModal();
    };

    var closeModal = function () {

        $('#button-alert').on('click', function () {

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


            body = $('body');
            modal = $('.modal');
            backModal = $('.modal-backdrop');

            modal.removeClass('show');
            backModal.remove();
            body.removeClass('modal-open');
            modal.css('display', "none");
    }

}

msg = new Alert();