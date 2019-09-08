$(document).ready(() => {

    $('.input_search_player_submit').click(() => {
        const pseudo = $('.input_search_player').val()
        if (pseudo === "") return;
        return window.location.replace(`./profil/${pseudo}`);
    })

    $('.input_search_player').keypress((event) => {
        let keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            const pseudo = $('.input_search_player').val()
            if (pseudo === "") return;
            return window.location.replace(`./profil/${pseudo}`);
        }
    });

})