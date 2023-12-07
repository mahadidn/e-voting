<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5">
        <div class="container">
            <h2 class="text-center">Quick Count</h2>
            <p class="text-center">Hasil Pemilihan Suara</p>
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 1" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 1</h5>
                            <p class="card-text text-center">35 VOTE</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 2" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 2</h5>
                            <p class="card-text text-center">20 VOTE</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/kandidat.jpg" class="card-img-top img-fluid" alt="Kandidat 3" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kandidat 3</h5>
                            <p class="card-text text-center">55 VOTE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <h2 class="text-center">Quick Count</h2>
            <p class="text-center">Grafik Hasil Pemilihan Suara</p>
            <div class="row justify-content-center">
                <div class="card col-md-8">
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/apexcharts.js"></script>
    <script>
        var options = {
            series: [{
                data: [35, 20, 55],
            }, ],
            chart: {
                height: 350,
                type: "bar",
                events: {
                    click: function(chart, w, e) {
                        // console.log(chart, w, e)
                    },
                },
            },
            colors: ['#008FFB', '#00E396', '#FEB019'],
            plotOptions: {
                bar: {
                    columnWidth: "50%",
                    distributed: true,
                    endingShape: "rounded"
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                categories: ["Kandidat1", "Kandidat 2", "Kandidat 3"],
                labels: {
                    style: {
                        colors: ['#008FFB', '#00E396', '#FEB019'],
                        fontSize: "12px",
                    },
                },
            },
            yaxis: {
                title: {
                    text: "Jumlah Pemilih",
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</body>
<?php
    include ('includes/user/scripts.php');
?>
</html>