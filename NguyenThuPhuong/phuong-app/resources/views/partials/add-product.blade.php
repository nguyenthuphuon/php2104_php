
@section('add-product')
    <script type="text/javascript">
      $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        Object.size = function(obj) {
          var size = 0,
            key;
          for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
          }
          return size;
        };
        $('.add-to-cart-detalt').click(function(e) {
          e.preventDefault();
          var product_id = $(this).data('product_id');
          var quantity = $('.product-quantity').val();
          var url = "{{ route('order.save') }}";
          $.ajax(url, {
            type: 'POST',
            data: {
              product_id: product_id,
              quantity: quantity,
            },
            success: function (data) {
              console.log('success');
              var objData = JSON.parse(data);
              var newQuantity = Object.size(objData.cart);
              $('.cart-quantity').text(newQuantity);
              const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
        icon: 'success',
        title: 'Add to cart successfully!'
        })
            },
            error: function () {
              console.log('fail');
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Failed!',
                showConfirmButton: false,
                timer: 1500
              });
            }
          });
        });
        $('.add-to-cart').click(function(e) {
          e.preventDefault();
          var product_id = $(this).data('product_id');
          console.log(product_id);
          var quantity = 1;
          console.log(quantity);
          var url = "{{ route('order.save') }}";
          $.ajax(url, {
            type: 'POST',
            data: {
              product_id: product_id,
              quantity: quantity,
            },
            success: function (data) {
              console.log('success');
              var objData = JSON.parse(data);
              var newQuantity = Object.size(objData.cart);
              $('.cart-quantity').text(newQuantity);
              const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
        icon: 'success',
        title: 'Add to cart successfully!'
        })
            },
            error: function () {
              console.log('fail');
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Failed!',
                showConfirmButton: false,
                timer: 1500
              });
            }
          });
        });
      });
    </script>
  @endsection
