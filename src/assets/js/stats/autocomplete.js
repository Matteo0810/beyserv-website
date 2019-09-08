$(document).ready(() => {

    $('#autocomplete').autocomplete({
        source : './src/assets/php/autocomplete.php',

    }).autocomplete( "instance" )._renderItem = (ul, item) => {
        $.ajax({
            type: "POST",
            url: `./src/assets/php/GetPlayerRank.php?pseudo=${item.label}`,
            success: (data) => {
                $.ajax({
                    type: "POST",
                    url: `./src/assets/php/GetBanPlayer.php?pseudo=${item.label}`,
                    success: (data2) => {
                        const now = Date.now();
                        $('body').delegate(`#${item.label}`, 'click', () => {
                            return window.location.replace(`./profil/${item.label}`);
                        })
                        $('body').delegate(`#${item.label}`, 'mouseover mouseout', (e) => {
                            if (e.type == 'mouseover')
                                $('#autocomplete').val(item.label)
                            else if (e.type == 'mouseout')
                                $('#autocomplete').val(item.label)
                        });
                        const data_parsed = JSON.parse(data2);
                        if(data_parsed[0] === undefined) {
                            return $(`<li id="${item.label}" class="autocomplete"></li>`)
                                .data("item.autocomplete", item)
                                .append(`<img class="autocomplete_img" width="25" height="25" src="https://minotar.net/helm/${item.label}/300.png" /> ${data} <span class="autocomplete_span">${item.label}</span>`)
                                .appendTo(ul);
                        }
                        if(data_parsed[0].date_fin > now) {
                            return $(`<li id="${item.label}" class="autocomplete"></li>`)
                                .data("item.autocomplete", item)
                                .append(`<img class="autocomplete_img" width="25" height="25" src="https://minotar.net/helm/${item.label}/300.png" /> ${data} <span class="autocomplete_span"><strike>${item.label}</strike></span>`)
                                .appendTo(ul);
                        } else {
                            return $(`<li id="${item.label}" class="autocomplete"></li>`)
                                .data("item.autocomplete", item)
                                .append(`<img class="autocomplete_img" width="25" height="25" src="https://minotar.net/helm/${item.label}/300.png" /> ${data} <span class="autocomplete_span">${item.label}</span>`)
                                .appendTo(ul);
                        }
                    },
                    error: (xhr) => {
                        console.log(xhr)
                    }
                })
            },
            error: (xhr) => {
                console.log(xhr)
            }
        });
        return $('<li style="display: none;"></li>')
            .data("item.autocomplete", item)
            .append(`<img class="autocomplete_img" width="25" height="25" src="https://minotar.net/helm/${item.label}/300.png" /> <span class="autocomplete_span">${item.label}</span>`)
            .appendTo(ul);
    };

})