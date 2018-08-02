/*jslint this:true ()*/
/*global  $ Add*/

/**
 * la class Add_index qui charge les composant html
 */
function RooterAdmin() {

    'use strict';
    var charge = 0;

    // la methode init le constructeur de la class
    this.init = function () {
        var cge = 8; // cge variable = nombre de composant a charger
        display("._menu", 'AdminMenu', cge);
        display("._login", 'AdminLogin', cge);
        display("._body", 'AddArticle', cge);
        display("._modal", 'Alert', cge);
        display("._item", 'AddItem', cge);
        display("._demarque", 'AddItemDemarque', cge);
        display("._itemStaff", 'AddItemStaff', cge);
        display("._fournisseur", 'AddFournisseur', cge);

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
            createScript('Alert');
            createScript('AddItem');
            createScript('AddItemDemarque');
            createScript('AddItemStaff');
            createScript('AddFournisseur');

            evenement.init();
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
        $(loader).load('./html/views/' + elem + '.html', function () {
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

var add_index = new RooterAdmin();
add_index.init();