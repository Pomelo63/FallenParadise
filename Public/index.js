function openMe() {
    var divtoshow = document.querySelector('.div-to-show');
    var nmbjoueur = 300;
    for (let i = 0; i < nmbjoueur; i++) { // une boucle for (Pour), let i = 0 je défini la variable i avec une valeur de 0; i < ligne.length tnat que i inférieur au nombre de ligne de mon tableau, i++ enfin de boucle j'increment +1 à i 
        divtoshow.insertAdjacentHTML('beforeend', `<div>nom du joueur ${i}</div>`);
    }
}

function filterPlayer(event, players) {
    var lvlfilter = event.value;
    var divtoshow = document.querySelector('.div-to-show');
    divtoshow.innerHTML = "";
    divtoshow.insertAdjacentHTML('beforeend', `
        <div class="parent">
     <div class="part1">Nom</div>
     <div class="part2">Lvl</div>
     <div class="part3">Reputation</div>
     <div class="part4">Gold</div>
 </div>`)
    for (let i = 0; i < players.length; i++) {
        if (players[i].player_level < lvlfilter) {

        }
        else {
            divtoshow.insertAdjacentHTML('beforeend', `
            <div class="parent">
                <div class="part1">${players[i].player_name}</div>
                <div class="part2">${players[i].player_level}</div>
                <div class="part3">${players[i].player_reputation}</div>
                <div class="part4">${players[i].player_gold}</div>
            </div>`)
        }
    }
}

function sortLvl(event, players) {
    if (event.classList.contains('fa-caret-up')) {
        sortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return b.player_level - a.player_level;
        })
    } else {
        unSortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return a.player_level - b.player_level;
        })
    }
    setOrder(sortedplayers)
}

function sortRep(event, players) {
    if (event.classList.contains('fa-caret-up')) {
        sortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return b.player_reputation - a.player_reputation;
        })
    } else {
        unSortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return a.player_reputation - b.player_reputation;
        })
    }
    setOrder(sortedplayers)
}

function sortPO(event, players) {
    if (event.classList.contains('fa-caret-up')) {
        sortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return b.player_gold - a.player_gold;
        })
    } else {
        unSortCaret(event);
        sortedplayers = players.sort(function (a, b) {
            return a.player_gold - b.player_gold;
        })
    }
    setOrder(sortedplayers)
}

function sortCaret(event) {
    var caretDownNumber = document.querySelectorAll('.fa-caret-down');
    for (let i = 0; i < caretDownNumber.length; i++) {
        caretDownNumber[i].classList.remove('fa-caret-down');
        caretDownNumber[i].classList.add('fa-caret-up');
    }
    event.classList.remove('fa-caret-up');
    event.classList.add('fa-caret-down');
}
function unSortCaret(event) {
    var caretUpNumber = document.querySelectorAll('.fa-caret-up');
    for (let i = 0; i < caretUpNumber.length; i++) {
        caretUpNumber[i].classList.add('fa-caret-down');
        caretUpNumber[i].classList.remove('fa-caret-up');
    }
    event.classList.add('fa-caret-up');
    event.classList.remove('fa-caret-down');
}

function setOrder(arrayPlayers) {
    var divtoshow = document.querySelector('.div-to-show');
    divtoshow.innerHTML = "";
    divtoshow.insertAdjacentHTML('beforeend', `
               <div class="flex-box">
            <div class="flex">Nom</div>
            <div class="flex">Lvl</div>
            <div class="flex">Reputation</div>
            <div class="flex">Gold</div>
        </div>`)
    for (let i = 0; i < arrayPlayers.length; i++) {
        divtoshow.insertAdjacentHTML('beforeend', `
            <div class="flex-box">
                <div class="flex">${arrayPlayers[i].player_name}</div>
                <div class="flex">${arrayPlayers[i].player_level}</div>
                <div class="flex">${arrayPlayers[i].player_reputation}</div>
                <div class="flex">${arrayPlayers[i].player_gold}</div>
            </div>`)
    }
}