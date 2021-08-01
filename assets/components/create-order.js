let  $country = $('#order_country');
$country.change(function() {
    let $form = $(this).closest('form');
    let data = {};
    data[$country.attr('name')] = $country.val();
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        success: function(html) {
            $('#order_kit').replaceWith(
                $(html).find('#order_kit')
            );
        }
    });
});