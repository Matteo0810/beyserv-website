$(document).ready(() => {

    $('#beyrush').click(() => changeStatus('BeyRush', `Battez-vous entres équipes pour éradiquer les deux cœurs de la ruche ennemie puis éliminez toutes les abeilles une par une !`, '#beyrush'))
    $('#brainffa').click(() => changeStatus('BrainFFA', `Affrontez vos adversaires, récoltez les kills et soyez le premier au centre de la map pour avoir un point !`, '#brainffa'))
    $('#honeyrush').click(() => changeStatus('HoneyRush', `Récoltez du pollen au centre de la map puis ramenez les dans votre ruche pour la remplir et gagner la partie !`, '#honeyrush'))
    $('#ffarush').click(() => changeStatus('FFARush', `Affrontez vos adversaires pour sauver votre honneur et votre talent jusqu'à la mort de tous !`, '#ffarush'))
    $('#rushtheflag').click(() => changeStatus('RushTheFlag', `Rejoignez la base adverse par tout les moyens, récupérer leur drapeau puis ramenez le à votre base pour gagner !`, '#rushtheflag'))
    $('#flowerrush').click(() => changeStatus('FlowerRush', `Rushez le plus rapidement possible ou défendez votre lit pour gagner la partie !`, '#flowerrush'))

})

function changeStatus(title, desc, element) {
    if ($(element).hasClass('game_div_active')) return;
    const games = ['beyrush', 'brainffa', 'honeyrush', 'ffarush', 'rushtheflag', 'flowerrush']
    games.forEach(game => {
        $(`#${game}`).removeClass('game_div_active') 
        $(`#${game}_bg`).fadeOut()
        $(`.present_title_div`).fadeOut()
        $('.presentation_desc_mini_jeux').fadeOut()
        $('.presentation_button_classement').fadeOut()
    });
    $(element).addClass('game_div_active')
    setTimeout(() => {
        $(`${element}_bg`).fadeIn()
        $('.present_title').text(title)
        $('.presentation_desc_mini_jeux').text(desc)
        $(".presentation_minigame_a").attr("href", `/classement/${title}`) 
        $(`.present_title_div`).fadeIn()
        $('.presentation_desc_mini_jeux').fadeIn()
        $('.presentation_button_classement').fadeIn()
    }, 200);
}