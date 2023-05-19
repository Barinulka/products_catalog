$(function()
{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).on('click', '.delete-item', function(e){
        e.preventDefault();
    
        var btn = $(this);
    
        if (confirm('Вы уверены, что хотите удалить эту запись?')) {
            var action = btn.attr('data-action');
    
            $.ajax({
                type: 'DELETE',
                url: action,
                data: '',
                dataType: 'json',
                // succsess: function(data) {
                //     updateList(_CATEGORY_URL);
                // },
                // error: function(data) {
                //     alert('Что-то пошло не так')
                // }
                success: function(data) {
                    console.log('success')
                },
                error: function(data) {
                    console.log('Что-то пошло не так')
                }
            })
        }
    })
    
})

function updateList($url = _URL) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $.ajax({
        type: "GET",
        url: $url,
        success: function(data) {
            console.log('success')
        },
        error: function(data) {
            console.log('Что-то пошло не так')
        }
    })
}


