function createCookie(nom, valeur, jour) {
    let date = new Date();
    date.setTime(date.getTime() + (jour * 24 * 60 * 60 * 1000));
    let exp = '; expires=' + date.toGMTString();
    document.cookie = nom + '=' + valeur + exp + '; path=/';
}

function readCookie(nom) {
    let name = nom + '=';
    let cArray = document.cookie.split(';');
    for (let i = 0; i < cArray.length; i++) {
        let c = cArray[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return null;
}

$(document).ready(() => {

    if(readCookie('BeyServ') === null) {
        $('body').append(`<div class="div_cookies">
            <span>Acceptez-vous les cookies</span>
            <button id="cookie_valid">Accepter</button>
        </div>`)
    }

    $('#cookie_valid').click(() => {
        createCookie('BeyServ', 'BeyServ', 30)
        $('.div_cookies').fadeOut();
    })

})