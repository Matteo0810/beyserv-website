$(document).ready(() => {
    $('#ip_serv').click(() => {
        let copytext = $(`#ip_serv`)
        let copytexttext = copytext.text()
        if (!copytext.hasClass('copy')) {
            navigator.clipboard.writeText(copytexttext).then(() => {
                copytext.text('IP Copiée !'); copytext.addClass('copy'); setTimeout(() => {
                    copytext.text(copytexttext); copytext.removeClass('copy')
                }, 1000)
            }).catch(err => console.err(err));
        }
    })
})