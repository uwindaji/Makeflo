# to do
1. comment customers cars in service
2. verifier path app.js
3. desktop.php model
4. bdd pieces champ bar code

## Routeur 

- il lit la requete (url, parametres, etc)
- il associe à chaque requete un Controleur + une methode qui devra etre appelée pour cette requete (c'est ce qu'on appelle des routes)
- il donne une page 404 quand il recoit une requete qui n'est pas dans les routes connues

## Controleur

Il regroupe des fonctions qui repondent au routeur, sur une meme thématique

ex: EleveControleur.new() // charge rien en bdd + affiche une page (form) pour créer un element
    EleveControleur.index()  // charge les elements en bdd + affiche une page listant les elements 
    EleveControleur.edit() // charge l'element en bdd + affiche une page (form) permettant d'editer l'element
    EleveControleur.show() // charge l'element en bdd + affiche une page permettant de voir son contenu
    EleveControleur.update() // créer l'element en bdd + fait une redirection
    EleveControleur.delete() // supprime l'element + fait un redirection


