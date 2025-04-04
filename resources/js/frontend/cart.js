
/** variables */
const base_url = $(`meta[name="base_url"]`).attr('content');
const csrf_token = $(`meta[name="csrf_token"]`).attr('content');

/** reusable functions */
function addToCart(courseId) { 
    $.ajax({
        method: 'POST',
        url: base_url + '/add-to-cart/' + courseId,
        data: {
            _token: csrf_token
        },
        beforeSend: function() {
            // $('.add_to_cart').text('Adding....');
        },
        success: function(data) {
            notyf.success(data.message);
            // $('.add_to_cart').text('Add to Cart');
        },
        error: function(xhr, status, error) {
            console.log(xhr);
            let errorMessage = xhr.responseJSON;
            notyf.error(errorMessage);
            // $('.add_to_cart').text('Add to Cart');
        }
    });
}

/** on DOM load */
$(function() {
    $('.add_to_cart').on('click', function(e) {
        e.preventDefault();
        let courseId = $(this).data('course-id');
        addToCart(courseId);
    })
})