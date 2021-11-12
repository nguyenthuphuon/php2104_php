<x-home>
	@section('section')
	<!-- Shop Details Section Begin -->
	@include('includes.section-shop-detail')
	<!-- Shop Details Section End -->

	<!-- Related Section Begin -->
	@include('includes.related-spad-detail')
	<!-- Related Section End -->
	@endsection

	@section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.add-cart').click(function(e) {
                    e.preventDefault();
                    var CurrentQuantity = parseInt($('.cart-quantity').text());
                    var AddmoreQuantity =  parseInt($('#quantity').val());
                    var NewQuantity = CurrentQuantity + AddmoreQuantity;
                    $('.cart-quantity').text(NewQuantity);
                    alert('Ngon rồi');
                });	
            });
        </script>
    @endsection
</x-home>