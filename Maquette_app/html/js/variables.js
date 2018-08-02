

var black = 'black'; 
var vert1 = '#09BAB5';
var vert2 = '#3BCCC8'; 
var vert3 = '#68D9D7';
var vert4 = '#98EBE8';
var vert5 = '#CAFCFC';
var orange = '#fdc02f';
var white = 'white';

var sessionLogin = false;

var color = null;
var elemColor = null;

var colorCheck = function (elem, couleur) {
        var i;
        var element = document.querySelectorAll('.color');

        for(i= 0; i<element.length; i += 1){

            element[i].style.border = "none";
        }
        elem.style.border = "solid 3px " + white + "";
        color = couleur;
        elemColor = elem;

}