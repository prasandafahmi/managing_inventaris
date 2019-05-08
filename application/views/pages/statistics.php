

<!DOCTYPE HTML>
<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Shamcey - Metro Style Admin Template</title>
<link rel="stylesheet" href="<?=base_url('assets/tem/css/style.default.css')?>" type="text/css" />
<link rel="stylesheet" href="<?=base_url('assets/tem/css/responsive-tables.css')?>">

<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery-1.9.1.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery-migrate-1.1.1.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery-ui-1.10.3.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery.uniform.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery.cookie.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/modernizr.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/responsive-tables.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/jquery.slimscroll.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/tem/js/custom.js')?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="<?=base_url('assets/hc/jquery.min.js')?>"></script>
		<script type="text/javascript">
		$(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Statistik data pemasukan dan pengeluaran barang'
            },
            subtitle: {
                text: '<br><br> '
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
                    month: '%e. %b',
                    year: '%b'
                },
                title: {
                    text: 'Date'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
                min: 0
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
            },

            series: [{
                name: 'Pemasukan',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: [
                    [Date.UTC(1970,  9, 27), 40   ],
                    [Date.UTC(1970, 10, 10), 20 ],
                    [Date.UTC(1970, 10, 18), 1 ],
                    [Date.UTC(1970, 11,  2), 2 ],
                    [Date.UTC(1970, 11,  9), 4 ],
                    [Date.UTC(1970, 11, 16), 4 ],
                    [Date.UTC(1970, 11, 28), 20],
                    [Date.UTC(1971,  0,  1), 40]
                ]
            }, {
                name: 'Pengeluaran',
                data: [
                    [Date.UTC(1970,  9, 27), 10   ],
                    [Date.UTC(1970, 10, 10), 1 ],
                    [Date.UTC(1970, 10, 18), 30 ],
                    [Date.UTC(1970, 11,  2), 20 ],
                    [Date.UTC(1970, 11,  9), 10 ],
                    [Date.UTC(1970, 11, 16), 4 ],
                    [Date.UTC(1970, 11, 28), 5],
                    [Date.UTC(1971,  0,  1), 8]
                ]
            }, ]
        });
    });
    

		</script>
	</head>
	<body>

<script src="<?=base_url('assets/hc/highcharts.js')?>"></script>
<script src="<?=base_url('assets/hc/exporting.js')?>"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<br><br><br><br><br><br><br><br><br><br><br><br>
	</body>
</html>
