$('.cardbutton-page').click(function(e){
    e.preventDefault;
    var product = $(this).closest('#cardproduct');
    var product_id = product.attr('data-product-id');
    registerProductClicked(product_id);
});

function registerProductClicked(product_id){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        type: 'post',
        dataType: 'JSON',
        url: '/product/'+ product_id + '/click',
        error: function (xhr, ajaxOptions, thrownError) {
         console.log(xhr.status);
         console.log(JSON.stringify(xhr.responseText));
     }
 });

}
