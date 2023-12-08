<?php
    include ('includes/user/head.php');
    include ('includes/user/navbar.php');
?>

    <div class="container-fluid pt-5 gx-5">
        <div class="container">
            <h2 class="text-center">Quick Count</h2>
            <p class="text-center">Hasil Pemilihan Suara</p>
            <div class="row justify-content-center">
                
            <?php foreach ($model['kandidat'] as $key => $value) { ?>
                <div class="col-md-4 col-sm-12 pb-3">
                    <div class="card p-3 bg-light">
                        <img src="/assets/img/<?= $value['foto'] ?>" class="card-img-top img-fluid" alt="Kandidat 1" />
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $value['nama_lengkap'] ?></h5>
                            <p class="card-text text-center"><?= $value['jumlah_suara'] ?> VOTE</p>
                        </div>
                    </div>
                </div>
            <?php } ?>

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

    <?php  

        $dataFromPHP = $model['kandidat'];
        $jsonData = json_encode($dataFromPHP);
    
    ?>

    <script src="/assets/js/apexcharts.js"></script>
    <script>

        let dataFromPHP = <?php echo $jsonData?>

        dataSuara = [];
        dataKandidat = [];
        
        for (i = 0; i < dataFromPHP.length; i++){
            dataSuara[i] = dataFromPHP[i][2];
            dataKandidat[i] = dataFromPHP[i][0];
        }
        
        var options = {
            series: [{
                data: dataSuara,
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
                categories: dataKandidat,
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