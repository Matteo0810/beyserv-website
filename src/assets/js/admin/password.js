$(document).ready(() => {

    $('.submit_admin').click(() => {
        const password = $('.password_admin');
        if (password.val() === "") {
            $('.register_error').remove()
            return $('.form_admin').append('<span class="register_error">Mot de passe incorrect</span>')
        }
        $('.register_error').remove()
        $.ajax({
            type: "POST",
            url: `./src/assets/php/admin/password.php?password=${password.val()}`,
            success: (data) => {
                $('.form_admin').append(data)
                window.location.reload();
            },
            error: (xhr) => {
                console.log(xhr)
            }
        });
    })

})