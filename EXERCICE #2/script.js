/* Code Javascript 19-Octobre-2022 23:24 */


// fonction permettant de d'afficher le message en fonction du bouton cliqué
function buttonClick(valueClick) {

    var popup = document.getElementById('po_pup');

    // Boucle permettant de controller autant de bouton qu'on souhaite
    for (let index = 0; index < 4; index++) {
        if (index == valueClick) {
            const text = document.getElementById("text");
            document.getElementById("content").innerHTML = "<h3>Notification</h3><p><span id='test'>Vous Avez cliqué sur le Bouton " + index + "</span></p>" +
                "<button class='button button4 margin-top' onclick='closePopUp()'> Fermer</button>";
            popup.style.display = 'block';
            break
        }
    }

}


// fonction pour fermer le pop-up
function closePopUp() {
    var popup = document.getElementById('po_pup');
    popup.style.display = "none";
}