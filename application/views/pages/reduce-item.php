
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="table-static.html">Tables</a> <span class="separator"></span></li>
            <li>List Item</li>
            
            
        </ul>
        
        <div class="pageheader">
            <form action="http://demo.themepixels.com/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>ITEM LIST</h5>
                <h1>List of Item</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">Data Table</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Item Name</th>
                            <th class="head1">Total</th>
                            <th class="head0">Lab</th>
                            <th class="head1">Supplier</th>
                            <th class="head0">Time Added</th>
                            <?php if ($this->session->userdata('permission')=="KepalaLab") { ?>
                                <th class="head0">Modify</th>
                            <?php } ?>
                            <th class="head0">Print</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = $this->db->get('item_list');
                    //$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    //$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); 
                    //$cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y");
                    foreach ($i->result() as $ab) {
                     ?>
                        <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                            <td><?=$ab->item_name;?></td>
                            <td><?=$ab->total;?></td>
                            <td><?=$ab->position;?></td>
                            <td class="center"><?=$ab->supplier;?></td>
                            <td class="center"><?=$ab->time;?></td>
                            <?php if ($this->session->userdata('permission')=="KepalaLab") { ?>
                            <td class="center ">
                                <?php echo anchor('home/main/edit-item/'.$ab->id_item,'Edit') ?> / 
                                <?php echo anchor('action/delete/'.$ab->id_item,'Delete') ?>
                            </td>
                            <?php } ?>
                            <td style="text-align:center;">
                                <a href="<?=site_url('home/print_item/print-item/'.$ab->id_item) ?>" target="_blank">Print</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <?=$this->load->view('engine/footer')?>
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    