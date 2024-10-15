<script>
    document.addEventListener("DOMContentLoaded", function () {
        const orderCreatedAt = new Date(document.getElementById("order-date").value);
        const countdownDuration =  10 * 1000; 
        const targetTime = orderCreatedAt.getTime() + countdownDuration; 

        console.log(orderCreatedAt)
        const countdownElement = document.getElementById("countdown");
        let countdownTime = Math.floor((targetTime - Date.now()) / 1000); 

        const countdown = setInterval(() => {
            if (countdownTime < 0) {
                clearInterval(countdown);
                countdownElement.innerText = "Waktu habis";

                const orderId = document.getElementById("order-id").value; 
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

                return; 
            }

            const hours = Math.floor(countdownTime / 3600);
            const minutes = Math.floor((countdownTime % 3600) / 60);
            const seconds = countdownTime % 60;

            countdownElement.innerText = `${hours} jam : ${minutes < 10 ? '0' : ''}${minutes} menit : ${seconds < 10 ? '0' : ''}${seconds} detik`;
            countdownTime--;
        }, 1000);
    });
</script>
