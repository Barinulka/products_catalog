$(function()
{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).on('click', '.add-to-favorite', function(e){
        e.preventDefault();
    
        var btn = $(this);
       
        var action = btn.attr('href');

        var link = _CATALOG_URL;

        if (btn.attr('data-update').length) {
            var link = btn.attr('data-update');
        }

        $.ajax({
            type: 'POST',
            url: action,
            data: '',
            dataType: 'json',
            // succsess: function(data) {
            //     updateList(_CATEGORY_URL);
            // },
            // error: function(data) {
            //     alert('Что-то пошло не так')
            // }
            success: function(response) {
                updateData(link, 'catalog')
                $('#count-favorite').html(response.count);
            },
            error: function(response) {
                console.log(response)
            }
        })
    })

    $(document).on('submit', '#review-form', function(e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            
        })
    
        var form = $(this);
       
        var data_update = form.attr('data-update');

        $(form).ajaxSubmit({
            dataType: 'json',
            success: function(response) {
                $('input[name="name"]').removeClass('is-invalid');
                $('textarea[name="message"]').removeClass('is-invalid');
                $('input[name="images"]').removeClass('is-invalid');
                $('.invalid-feedback').hide();

                updateData(data_update, 'item')
                
                $('#review-form')[0].reset()

                console.log('success')
                
            },
            error: function(response) {
                console.log('error')

                if (response.responseJSON.errors != undefined) {
                    $('input[name="name"]').removeClass('is-invalid');
                    $('textarea[name="message"]').removeClass('is-invalid');
                    $('input[name="images"]').removeClass('is-invalid');
                    $('.invalid-feedback').hide();
                    $(response.responseJSON.errors).each(function(){
                        $.each(this, function(name, value){
                            console.log(name + ': ' + value)
                            $('#'+name).addClass('is-invalid').after('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong></span>')
                        })
                    })
                }

            }
        })
    })
    
})

function updateData(url, place = 'catalog') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    if (place == 'catalog') {
        var content = $('#catalog-list');
    }

    if (place == 'item') {
        var content = $('#review-list');
    }

    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            content.html(data);
        },
        error: function(data) {
            console.log(data);
        }
    })
}