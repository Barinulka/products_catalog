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
       
        var action = form.attr('action');

        var data_update = form.attr('data-update');

        var formData = {
            name: form.find('input[name=name]').val(),
            email: form.find('input[name=message]').val(),
        };

        var form_data = form.serialize();

        $.ajax({
            type: 'POST',
            url: action,
            data: form_data,
            dataType: 'json',
            success: function(response) {
                updateData(data_update, 'item')
                console.log(response)
            },
            error: function(response) {
                console.log(response)
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