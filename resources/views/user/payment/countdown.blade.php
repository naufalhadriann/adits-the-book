<script>
    document.addEventListener("DOMContentLoaded", function () {
        let countdownTime = 60;
        const countdownElement = document.getElementById("countdown");
        const orderId = document.getElementById("order-id").value; // Get the order ID

        const countdown = setInterval(function () {
            const minutes = Math.floor(countdownTime / 60);
            const seconds = countdownTime % 60;

            countdownElement.innerText = ` ${minutes} : ${seconds < 10 ? '0' : ''}${seconds}`;
            countdownTime--;

            if (countdownTime < 0) {
                clearInterval(countdown);
                countdownElement.innerText = "Waktu habis";

             
                fetch(`/payment/failed/${orderId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect to /failed after updating the status
                        window.location.href = `/payment/failed/${orderId}`;
                    } else {
                        console.error('Error updating order status:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error updating order status:', error);
                });
            }
        }, 100);
    });
</script>
