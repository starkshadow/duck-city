$(window).load(function() {
    $('.panier-add-button').click(function() {
        var button = $(this);
        var id = button.siblings('.panier-add-id').val();
        var quantity = button.siblings('.panier-add-quantity').val();
        if (isNaN(quantity) === true || quantity <= 0) {
            quantity = 1;
        }

        $.ajax({
            url: 'http://' + $(this).attr('url'),
            type: 'post',
            data: {'product_id': id, 'quantity': quantity},
            success: function(data, status) {
                alert(data);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call        
    });
});