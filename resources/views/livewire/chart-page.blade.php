<div class="w-full h-full">

    <canvas id="line-chart" width="800" height="450"></canvas>
    <h1>Chart</h1>

    <script>
        if (document.querySelector("#line-chart")) {

            var ctx1 = document.getElementById("line-chart").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            var label = [];
            var hasil = @json($transaksi);
            console.log(hasil)
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: monthNames,
                    datasets: [{
                        label: "bulan",
                        data: hasil,
                        // tension: 0.5,
                        // borderWidth: 0,
                        // pointRadius: 0,
                        // borderColor: "#5e72e4",
                        backgroundColor: "#3B82F6",
                        // borderWidth: 10,
                        // fill: true,
                        maxBarThickness: 50

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },

                },
            });

        }
    </script>
</div>
