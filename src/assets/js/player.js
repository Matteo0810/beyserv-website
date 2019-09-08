$.getJSON('https://api.mcsrvstat.us/2/bzz.beyserv.net', (status) => {
    if(status.online) {
        if(status.players.online <= 1) $('#online_player').text(`${status.players.online} Joueur connecté`)
        else $('#online_player').text(`${status.players.online} Joueurs connectés`)
    } else $('#online_player').text(`Serveur éteint`)
});