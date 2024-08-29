    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

    <script>
        
 document.addEventListener('DOMContentLoaded', function() {
        const paymentOptions = document.querySelectorAll('input[name="paymentOption"]');
        const paymentMethodImage = document.getElementById('selectedPaymentMethodImage');
        const paymentMethodName = document.getElementById('selectedPaymentMethodName');
        const paymentMethodCard = document.getElementById('selectedPaymentMethodCard');
        const paymentMethode = document.getElementById('selectedPaymentMethod');

        const paymentMethods = {
            danaOption: {
                image: 'https://i.pinimg.com/originals/2b/1f/11/2b1f11dec29fe28b5137b46fffa0b25f.png',
                name: 'Dana'
            },
            gopayOption: {
                image: 'https://www.pointstar-consulting.com/wp-content/uploads/2022/02/gopay-integration.png',
                name: 'Gopay'
            },
            ovoOption: {
                image: 'https://static.vecteezy.com/system/resources/previews/028/766/360/original/ovo-ewallet-payment-icon-symbol-free-png.png',
                name: 'Ovo'
            },
            indomaretOption: {
                image: 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png',
                name: 'Indomaret'
            },
            alfamartOption: {
                image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW8bQmSJ3Z5QrUJNjAQh498SVoH55DInkx-A&s',
                name: 'Alfamart'
            },
            qrisOption: {
                image: 'https://seeklogo.com/images/Q/quick-response-code-indonesia-standard-qris-logo-F300D5EB32-seeklogo.com.png',
                name : 'QRIS'
            },
            briOption: {
                image : 'https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg',
                name: 'BRI'
            },
            bcaOption: {
                image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1280px-Bank_Central_Asia.svg.png',
                name : 'BCA'
            },
            mandiriOption: {
                image : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfMyCL1apGB5s9H7Bxoo3E0snddv3G7oU4rQ&s',
                name : 'Mandiri'
            },
            bsiOption: {
                image: 'https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg',
                name: 'BSI'
            },
            bniOption: {
                image:'https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png',
                name: 'BNI'
            }
        };

        paymentOptions.forEach(option => {
            option.addEventListener('change', function() {
                const selectedOptionId = document.querySelector('input[name="paymentOption"]:checked').id;
                const selectedPaymentMethod = paymentMethods[selectedOptionId];

                if (selectedPaymentMethod) {
                    paymentMethodImage.src = selectedPaymentMethod.image;
                    paymentMethodName.innerText = selectedPaymentMethod.name;
                    paymentMethode.innerText = selectedPaymentMethod.name;
                }
            });
        });
    });
    document.querySelectorAll('.category').forEach(item => {
    item.addEventListener('mouseover', () => {
        const subMenuItem = item.closest('.sub-menu').querySelector('.sub-menu-item');
        if (subMenuItem) {
            subMenuItem.style.display = 'none';
            console.log('mouse in');
        }
    });

    item.addEventListener('mouseout', () => {
        const subMenuItem = item.closest('.sub-menu').querySelector('.sub-menu-item');
        if (subMenuItem) {
            subMenuItem.style.display = 'block';
            console.log('mouse OUT');
        }
    });
});
    $(document).ready(function() {
    const $checkboxes = $('.cart-item-checkbox');
    const $selectAllCheckbox = $('#select-all');
    const $totalPriceElement = $('#total-price');
    const $totalDiscount = $('#total-discount');
    const $selectedBookIdsInput = $('#selected-book-ids');
    const currencyFormatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });

    function updateTotalPrice() {
        let totalPrice = 0;
        let totalDiscountPrice = 0;
        let totalDiscountAmount = 0;

        $checkboxes.each(function() {
            if (this.checked) {
                const price = parseFloat($(this).data('book-price'));
                const discountedPrice = parseFloat($(this).data('book-discounted-price'));
                const quantity = parseInt($(this).data('book-quantity'), 10);
                const discount = parseFloat($(this).data('book-discount'));
                const hasDiscount = $(this).data('book-has-discount') === 'true';

                if (hasDiscount) {
                    totalDiscountPrice += discountedPrice * quantity;
                    const discountAmountPerBook = (price - discountedPrice) * quantity;
                    totalDiscountAmount += discountAmountPerBook;
                } else {
                    totalPrice += price * quantity;
                }
            }
        });

        const finalPrice = totalPrice + totalDiscountPrice;
        $totalDiscount.text(`Rp ${currencyFormatter.format(totalDiscountAmount).replace('Rp', '').trim()}`);
        $totalPriceElement.text(`Rp ${currencyFormatter.format(finalPrice).replace('Rp', '').trim()}`);
    }

    function updateSelectedBookIds() {
        const selectedBookIds = $checkboxes.filter(':checked').map(function() {
            return $(this).val();
        }).get().join(',');

        $selectedBookIdsInput.val(selectedBookIds);
    }

    $selectAllCheckbox.on('change', function() {
        const isChecked = this.checked;
        $checkboxes.prop('checked', isChecked);
        updateTotalPrice();
        updateSelectedBookIds();
    });

    $checkboxes.on('change', function() {
        updateTotalPrice();
        updateSelectedBookIds();

        const allChecked = $checkboxes.length === $checkboxes.filter(':checked').length;
        $selectAllCheckbox.prop('checked', allChecked);
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
});




        
    </script>