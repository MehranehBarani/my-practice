$(function (){

    var form = $('#search-form');
    var messages = $('#message');

    form.submit(function (event) {
        event.preventDefault();
        var formData = form.serialize();

        $.ajax({
            type:'POST',
            url: form.attr('action'),
            data: formData,
            }).done(function(response) {
                // console.log(response);
                messages.append(
                    '<div class="alert alert-success alert-dismissible fade show"  role="alert">'
                        +'<p>'+response +' :)</p> '
                        +'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                    +'</div>'
                ).find('.alert').delay(3000).fadeOut();
            }).fail(function(res){
                
                messages.append(
                    '<div class="alert alert-danger alert-dismissible fade show"  role="alert">'
                        +'<p>'+res.responseText +' :(</p> '
                        +'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                    +'</div>'
                ).find('.alert').delay(3000).fadeOut();
            });
    });
    
});