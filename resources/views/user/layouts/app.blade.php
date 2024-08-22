<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Adits the Book')</title>
    <link rel="icon" type="image/jpg" href="{{asset('images/logo2.png')}}">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/pages.css')}}">
</head>
<body>
    <x-navbar></x-navbar>

 <main>
    @yield('content')
 </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
 $(document).ready(function() {
    const $checkboxes = $('.cart-item-checkbox');
    const $removeAllForm = $('#remove-all-form');
    const $selectAllCheckbox = $('#select-all');
    const $statusField = $('#status-field');
    const $totalPriceElement = $('#total-price');
    const $totalPriceProduct = $('#total-price-product');
    const $totalDiscount = $('#total-discount');
    const currencyFormatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });

    function updateTotalPrice() {
        let totalPrice = 0;
        let totalDiscountPrice = 0;
        let totalBooksWithDiscount = 0;
        let totalBooksWithoutDiscount = 0;
        let totalDiscount = 0;
        let totalPriceBeforeDiscount = 0;
        let totalDiscountAmount =0;


        $checkboxes.each(function() {
            if (this.checked) {
                const price = parseFloat($(this).data('book-price'));
                const discountedPrice = parseFloat($(this).data('book-discounted-price'));
                const quantity = parseInt($(this).data('book-quantity'), 10);
                const discount =parseFloat($(this).data('book-discount'));
                const hasDiscount = $(this).data('book-has-discount') === true;
                
                totalPriceBeforeDiscount += price *quantity;
                if (hasDiscount) {
            totalDiscountPrice += discountedPrice * quantity;
            totalBooksWithDiscount += quantity;
            const discountAmountPerBook = (price - discountedPrice) * quantity;
                totalDiscountAmount += discountAmountPerBook;
            totalDiscount += price * discount * quantity;
        } else {
            totalPrice += price * quantity;
            totalBooksWithoutDiscount += quantity;
        }
    }
        });
        const finalPrice = totalBooksWithoutDiscount * totalPrice  ;
        const finalPriceWithDiscount = totalDiscountPrice + totalPrice;
        $totalDiscount.text(`Rp ${currencyFormatter.format( totalDiscountAmount).replace('Rp', '').trim()}`)
        $totalPriceElement.text(`Rp ${currencyFormatter.format(finalPriceWithDiscount).replace('Rp', '').trim()}`);
        $totalPriceProduct.text(`Rp ${currencyFormatter.format(totalPriceBeforeDiscount).replace('Rp', '').trim()}`);
        console.log(`Total Books with Discount: ${totalBooksWithDiscount}`);
        console.log(`Total Harga semua buku ada Discount: ${finalPriceWithDiscount}`);
        console.log(`Total Books  Discount: ${ totalDiscountAmount}`);
        console.log(`Total Harga semua buku sebelum diskon : ${totalPriceBeforeDiscount}`)
        console.log(`Total Books without Discount: ${totalBooksWithoutDiscount}`);
     
       
    }

    function updateRemoveAllButton() {
        const anyChecked = $checkboxes.is(':checked');
        $removeAllForm.toggle(anyChecked);
    }

    $checkboxes.on('change', function() {
        updateTotalPrice();
        updateRemoveAllButton();
    });

    $selectAllCheckbox.on('change', function() {
        const isChecked = this.checked;

        $checkboxes.prop('checked', isChecked);

        const status = isChecked ? 'selected' : 'unselected';
        $statusField.val(status);

        updateTotalPrice();
        updateRemoveAllButton();
    });

    document.querySelectorAll('.quantity-change').forEach(button => {
        button.addEventListener('click', function() {
            const action = this.getAttribute('data-action');
            const input = this.parentElement.querySelector('input[name="quantity"]');
            let quantity = parseInt(input.value);

            if (action === 'increase' && quantity < 20) {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }

            input.value = quantity;

            $(input).trigger('change');
        });
    });

    updateTotalPrice();
    updateRemoveAllButton();
});

        
    </script>

</body>
</html>
