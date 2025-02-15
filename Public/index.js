function openMe() {
    var divtoshow = document.querySelector('.div-to-show');
    var button = document.querySelector('.button-open-me');

    if (divtoshow.classList.contains('unvisible')) {
        divtoshow.classList.remove('unvisible');
        button.innerHTML = 'Ferme-moi';
    } else {
        divtoshow.classList.add('unvisible');
        button.innerHTML = 'Ouvre-moi';
    };
}
// Exercice n°1a
// function onLogin() {
//     var userName = document.getElementById('user-name').value;
//     var userPassword = document.getElementById('user-password').value;
//     var welcomeMsg = document.querySelector('.welcome-msg');
//     var connexionButton = document.getElementById('login_button');
//     if (userPassword == "AdminFP") {
//         welcomeMsg.innerHTML = 'Bienvenue, ' + userName;
//         connexionButton.innerHTML = "Se déconnecter";
//         return false;
//     } else {
//         welcomeMsg.innerHTML = 'Mdp incorrecte' + userName;
//         return false;
//     }
// }
// Exercice n°1b
// function onLogin() {
//     var userName = document.getElementById('user-name').value;
//     var userPassword = document.getElementById('user-password').value;
//     var welcomeMsg = document.querySelector('.welcome-msg');
//     var connexionButton = document.getElementById('login_button');
//     if (connexionButton.innerHTML == "Se déconnecter") {
//         welcomeMsg.innerHTML = 'Bienvenue, ';
//         connexionButton.innerHTML = "Se connecter";
//         return false;
//     } else {
//         if (userPassword == "AdminFP") {
//             welcomeMsg.innerHTML = 'Bienvenue, ' + userName;
//             connexionButton.innerHTML = "Se déconnecter";
//             return false;
//         } else {
//             welcomeMsg.innerHTML = 'Mot de passe incorrecte ';
//             return false;
//         }
//     }
// }