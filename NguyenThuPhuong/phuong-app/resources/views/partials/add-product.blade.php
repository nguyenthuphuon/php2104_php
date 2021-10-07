@section('script')
  <script type="text/javascript">
    $('.add-to-cart').click(function(e){
        e.preventDefault();
        var currentQuantity = parseInt( $('#numberItem').text());
        var addQuantity = parseInt($('#quantity').val());
        var newQuantity = currentQuantity + 1;
        $('#numberItem').text(newQuantity);

        Swal.fire(
            'Add to cart successfully !' 
        )
    });

    $('.add-to-heart').click(function(e){
        e.preventDefault();
        var currentQuantity = parseInt( $('#numberLove').text());
        var newQuantity = currentQuantity + 1;
        $('#numberLove').text(newQuantity);

        Swal.fire(
            'Add to favorites successfully !' 
        )
    });
  </script>
@endsection