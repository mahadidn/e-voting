<?php
    include ('includes/admin/header.php');
    include ('includes/admin/sidebar.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-base" style="font-weight: 600">Data Rekapitulasi Voting</h1>
                <p class="mb-4">Berikut merupakan rekapitulasi voting terkini</p>
            </div>

            <?php
            
                $i = 0;
                $nama = [];
                $suara = [];
                foreach ($model['kandidat'] as $key => $value) {
                    
                    $nama[$i] = $value['nama_lengkap'];
                    $suara[$i] = $value['jumlah_suara'];

                    if($suara[0] == $suara[1]){
                        $hasil = "Perolehan suara seri";
                    }
                    
                    $i++;
                }
                
                // pemenang
                $kategoriPemenang = max($suara);
                $namaPemenang;
                $jumlahSuara;

                // if($kategoriPemenang == ){
                //     $hasil = "perolehan suara seri";
                // }
                for ($j = 0; $j < count($suara); $j++){
                    
                    if ($suara[$j] == $kategoriPemenang){
                        $namaPemenang = $nama[$j];
                        $jumlahSuara = $suara[$j];
                        break;
                    }

                }
            
            ?>

            <div class="card-body d-flex justify-content-between flex-wrap">
                <div class="col-12 col-md-6">
                    <div id="chart"></div>
                </div>
                <div class="col-12 col-md-6">
                    <div id="chart-2"></div>
                </div>
            </div>
            <div class="card-footer text-center">
                <h2 class="text-gray-800">Hasil Voting</h2>
                <?php if(!isset($hasil)){ ?>
                    <h5><?= $namaPemenang ?> dengan perolehan suara sebanyak <?= $jumlahSuara ?> Suara</h5>
                <?php }else {?>
                    <h5><?= $hasil ?></h5>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

    <script src="js/apexcharts.js"></script>
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
    <script>
        var options = {
            series: [35, 20, 55],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Kandidat 1', 'Kandidat 2', 'Kandidat 3'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-2"), options);
        chart.render();
    </script>
<?php
    include ('includes/admin/footer.php');
    include ('includes/admin/scripts.php');
?>
