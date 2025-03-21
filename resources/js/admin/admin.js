import $ from 'jquery';
window.$ = window.jQuery = $;

var notyf = new Notyf();

const csrf_token = $('meta[name=csrf_token]').attr('content');
var delete_url = null;

$('.delete-item').on('click', function(e) {
    e.preventDefault();

    let url = $(this).attr('href');
    // console.log(url);

    delete_url = url;

    $('#modal-danger').modal('show');
})

$('.delete-confirm').on('click', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'DELETE',
        url: delete_url,
        data: {
            _token: csrf_token
        },
        beforeSend: function() {
            $('.delete-confirm').text('Deleting.....');
        },
        success: function(data) {
            window.location.reload();
        },
        error: function(xhr, status, error){
            let errorMessage = xhr.responseJSON;
            notyf.error(errorMessage.message);
        }
    })
})