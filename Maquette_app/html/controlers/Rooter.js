/*jslint this:true ()*/
/*global  $ Add*/

/**
 * la class Add_index qui charge les composant html
 */
function Rooter() {

    'use strict';
    var charge = 0;

    // la methode init le constructeur de la class
    this.init = function () {
        var cge = 3; // cge variable = nombre de composant a charger
        display("._menu", 'Menu', cge);
        display("._login", 'Login', cge);
        display("._modal", 'Alert', cge);
        createScript('Alert');

    };
    /**
     * @param {number} x
     * function qui vérif le chargement des element
     */
    var chargement = function (x) {

        charge += 1;
        if (charge === x) { //si tout les elements sont charger on lance la fonction evenement
            //createScript (elem);
            //_this.evenement();
            charge = 0; //et in initialise la variable charge

            //evenement.init();
            //script.src = 'html/models/'+ elem + '.js';
        }
    };

    /**
     * @param {string} loader
     * @param {string} elem
     * @param {number} x
     * la fonction qui permet de charger les composant html
     */
    var display = function (loader, elem, x) {
        // on charge les views html et si la vue et charger on appelle la methode chargement
        // avec le paramètre x
        $(loader).load('./html/views/' + elem + '.php', function () {
            chargement(x);
        });
    };

    var createScript = function (elem) {

        var script = document.createElement('script');
        script.src = './html/models/'+ elem +'.js';
        var divScript = document.getElementById(elem + '-script');
        divScript.appendChild(script);

    }

    
}

var index = new Rooter();
index.init();