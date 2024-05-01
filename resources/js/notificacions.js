import {notificacionsBadge, $solAmicsBadge, divSolAmics} from './constantChatFriends.js';


/**
* Funció per sumar el nombre de notificacions al badge de notificacions totals
*/
function sumarNotificacions() {
    notificacionsBadge.innerHTML = parseInt(notificacionsBadge.innerHTML) + 1;
    notificacionsBadge.style.display = "block";
}

var notificacions = {
    /**
    * Funció per netejar les notificacions d'un usuari
    * @param {int} friendId id de l'usuari amic
    */
    cleanUserNotifications: function (friendId) {

        let friendBadge = document.getElementById("b-" + friendId);
        friendBadge.style.display = "none";

        // Restar el nombre de missatges no llegits al total de notificacions
        notificacionsBadge.innerHTML = parseInt(notificacionsBadge.innerHTML) - parseInt(friendBadge.innerHTML);

        friendBadge.innerHTML = 0;

        if (notificacionsBadge.innerHTML == 0) {
            notificacionsBadge.style.display = "none";
        }

    },

    /**
     * Funció per sumar una notificació a un usuari i al total de notificacions
     * @param {int} friendId id de l'usuari amic
     */
    sumarNotificacionsUser: function (friendId) {
        let $friendBagde = $(`#b-${friendId}`);
        $friendBagde.html(parseInt($friendBagde.html()) + 1);
        $friendBagde.show();
        sumarNotificacions();
    },
    /**
     * Funció per esborrar les notificacions d'un usuari
     * @param {int} friendId id de l'usuari amic 
     */
    cleanUserNotifications: function (friendId) {
        let friendBadge = document.getElementById("b-" + friendId);
        friendBadge.style.display = "none";

        // Restar el nombre de missatges no llegits al total de notificacions
        notificacionsBadge.innerHTML = parseInt(notificacionsBadge.innerHTML) - parseInt(friendBadge.innerHTML);

        friendBadge.innerHTML = 0;

        if (notificacionsBadge.innerHTML == 0) {
            notificacionsBadge.style.display = "none";
        }
    },
    /**
     * Funció per sumar una notificació de sol·licitud d'amistat
     */
    sumarSolAmics: function () {
        $solAmicsBadge.html(parseInt($solAmicsBadge.html()) + 1);
        $solAmicsBadge.show();
    },
    /**
     * Funció per restar una notificació de sol·licitud d'amistat
     */
    restarSolAmics: function () {
        $solAmicsBadge.html(parseInt($solAmicsBadge.innerHTML) - 1);
        if ($solAmicsBadge.innerHTML == 0) {
            $solAmicsBadge.hide();
            $(divSolAmics).append($('<div>', { class: "text-center fw-bold" }).text("No tens sol·licituds d'amistat pendents"));
        }
    }
    
}


export default notificacions;