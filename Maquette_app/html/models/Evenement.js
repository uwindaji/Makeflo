function Evenement () {

    this.init = function () {


        evenement();
    }

    var evenement = function () {

        $('#m-addArticle').on('click', function () {
            display("._body", 'AddArticle');
        }); 
        
        $('#m-addStaff').on('click', function () {
            display("._body", 'AddStaff');
        });

        $('#m-demarque').on('click', function () {
            display("._body", 'AddDemarque');
        });
    }

    var display = function (loader, elem) { 
        // on charge les views html et si la vue et charger on appelle la methode chargement
        // avec le paramètre x

        if (sessionLogin === 'true'){
            $(loader).load('./html/views/' + elem + '.php', function () {
                createScript (elem);
            });
        } else {

            msg.init('alert', 'il faut connecter');
        }
        
    };

    /**
     * 
     * @param {string} elem 
     * function permet d'appeler script model qui gerer le view
     */
    var createScript = function (elem) {

        var script = document.createElement('script');
        script.src = './html/models/'+ elem +'.js';
        var divScript = document.getElementById(elem + '-script');
        divScript.appendChild(script);

    }
}

var evenement = new Evenement();
evenement.init();
