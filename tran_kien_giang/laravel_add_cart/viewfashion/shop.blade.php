<x-home >
    @section('section')

    @include('includes.breadcrumb-option')

    @include('includes.shop-spad')

    @endsection
    
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.add-cart').click(function(e) {
                    e.preventDefault();
                    var CurrentQuantity = parseInt($('.cart-quantity').text());
                    var AddmoreQuantity =  1;
                    var NewQuantity = CurrentQuantity + AddmoreQuantity;
                    $('.cart-quantity').text(NewQuantity);
                    alert('Ngon rồi');
                }); 
            });
        </script>
    @endsection
</x-home>
