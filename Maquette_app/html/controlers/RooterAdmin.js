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
        var cge = 6; // cge variable = nombre de composant a charger
        this.display("._login", 'AdminLogin', cge);
        this.display("._modal", 'Alert', cge);
        this.display("._item", 'AddItem', cge);
        this.display("._demarque", 'AddItemDemarque', cge);
        this.display("._itemStaff", 'AddItemStaff', cge);
        this.display("._fournisseur", 'AddFournisseur', cge);

    };
    /**
     * @param {number} x
     * function qui vérif le chargement des element
     */
    var chargement = function (elem, x) {

        charge += 1;
        createScript(elem);
        if (charge === x) { //si tout les elements sont charger on lance la fonction evenement
            //createScript (elem);
            //_this.evenement();
            charge = 0; //et in initialise la variable charge
            

            
            //script.src = 'html/models/'+ elem + '.js';
        }
    };

    /**
     * @param {string} loader
     * @param {string} elem
     * @param {number} x
     * la fonction qui permet de charger les composant html
     */
    this.display = function (loader, elem, x) {
        // on charge les views html et si la vue et charger on appelle la methode chargement
        // avec le paramètre x
        $(loader).load('./html/views/' + elem + '.php', function () {
            chargement(elem, x);
        });
    };

    var createScript = function (elem) {

        var script = document.createElement('script');
        script.src = './html/models/'+ elem +'.js';
        var divScript = document.getElementById(elem + '-script');
        divScript.appendChild(script);

    }
    this.createEvent = function (elem) {

        var script = document.createElement('script');
        script.src = './html/models/'+ elem +'.js';
        var divScript = document.getElementById(elem + '-script');
        divScript.appendChild(script);

    }

    
}

var add_index = new RooterAdmin();
add_index.init();