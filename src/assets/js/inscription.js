$(document).ready(() => {

    $('.register_submit').click(() => {
        const player = $('.register_input')
        const response = grecaptcha.getResponse();
        if (player.val() === "") {
            $('.register_error').remove()
            return $('.register_div').append('<span class="register_error">Champ vide</span>')
        }
        if (player.length > 17){
            $('.register_error').remove()
            return $('.register_div').append('<span class="register_error">Veuillez entrer en dessous de 17 caractères</span>')
        }
        if (response.length == 0) { 
            $('.register_error').remove()
            return $('.register_div').append('<span class="register_error">Veuillez cocher le captcha</span>')
        } else {
            $('.register_error').remove()
            $.ajax({
                type: "POST",
                url: `./src/assets/php/inscription.php?pseudo=${player.val()}`,
                success: (data) => {
                    $('.register_div').append(data)
                },
                error: (xhr) => {
                    console.log(xhr)
                }
            });
        }
    })

})