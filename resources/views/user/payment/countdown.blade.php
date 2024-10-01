<script>
    document.addEventListener("DOMContentLoaded", function () {
        let countdownTime = 3600; 
        const countdownElement = document.getElementById("countdown");
        const orderId = document.getElementById("order-id").value; 

        const countdown = setInterval(() => {
            const hours = Math.floor(countdownTime / 3600);
            const minutes = Math.floor((countdownTime % 3600) / 60);
            const seconds = countdownTime % 60;

            countdownElement.innerText = ` ${hours} jam : ${minutes < 10 ? '0' : ''}${minutes} menit : ${seconds < 10 ? '0' : ''}${seconds} detik`;
            countdownTime--;

            if (countdownTime < 0) {
                clearInterval(countdown);
                countdownElement.innerText = "Waktu habis";

                fetch(`/payment/failed/${orderId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = `/failed`;
                    } else {
                        console.error('Error updating order status:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error updating order status:', error);
                });
            }
        }, 1000);
    });
</script>
