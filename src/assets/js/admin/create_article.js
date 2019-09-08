$(document).ready(function () {

    $('#summernote').summernote({
        placeholder: 'Ton imagination ici... (Oh par contre zebi tu me fous pas de fail XSS sinon tpeepo)',
        height: 200,
        callbacks: {
            onImageUpload: function(files, editor, $elEditable) {
                sendFile(files[0], editor, $elEditable);
            }
        }
    });

    $('.input_submit').click(() => {
        file = $("#file")[0].files[0],
            data = new FormData();
        data.append("doc", $("#file")[0].files[0]);
        console.log(file)
        const title = $('#title_article').val(),
            content = $('#summernote').summernote('code'),
            author = $('#name_article').val();
        if(title === "" || content === "" || author === "" || file === undefined) {
            $('.register_error').remove()
            return $('.div_edit_article_admin').append('<span class="register_error">Veuillez remplir tous les champs</span>')
        }
        $.ajax({
            type: "POST",
            url: `./src/assets/php/admin/create_article.php?title=${title}&content=${content}&author=${author}`,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('.register_error').remove()
                $('.div_edit_article_admin').append(data)
            },
            error: (xhr) => {
                console.log(xhr)
            }
        });
    })

   function sendFile(file, editor, welEditable) {
       data = new FormData();
       data.append('file', file);
       $.ajax({
           type: 'POST',
           url: './src/assets/php/admin/edit_image.php',
           data: data,
           cache: false,
           processData: false,
           contentType: false,
            error: (jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + " " + errorThrown)
            } 
       }).done((response) => {
           $('#summernote').summernote('insertImage', response);
       });
   }

});