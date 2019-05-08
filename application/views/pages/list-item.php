
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
            <li><a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>List Item</li>
            
            
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>ITEM LIST</h5>
                <h1>Daftar Barang Masuk</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div style="<?=$deleted;?>">
                    <div class="alert" style="background:#1aff87;color:#000;border:none;">Data barang berhasil dihapus
                    <?php echo anchor('home/main/list-item', 'x', "style='float:right;color:#fff;margin-right:-15px;'") ?>
                    </div>
                </div>
                <div style="<?=$edited;?>">
                    <div class="alert" style="background:#1aff87;color:#000;border:none;">Data barang berhasil diubah
                    <?php echo anchor('home/main/list-item', 'x', "style='float:right;color:#fff;margin-right:-15px;'") ?>
                    </div>
                </div>
                <h4 class="widgettitle">Daftar Barang Masuk</h4>
                <?=form_open('action/multidelete_item');?>
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
                            <th class="head0 nosort"></th>
                            <th class="head0">Nama Barang</th>
                            <th class="head1">Jumlah</th>
                            <th class="head0">Lab</th>
                            <th class="head1">Pemasok</th>
                            <th class="head0">Waktu Pemasukan</th>
                            <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                                <th class="head0">Modifikasi</th>
                            <?php } ?>
                            <th class="head0">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = $this->db->query("SELECT * FROM item_list ORDER BY id_item DESC");
                    //$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    //$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); 
                    //$cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y");
                    foreach ($i->result() as $ab) {
                     ?>
                        <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" name="item[]" value="<?=$ab->id_item;?>" />
                          </span></td>
                            <td><?=$ab->item_name;?></td>
                            <td><?=$ab->total;?></td>
                            <td><?=$ab->position;?></td>
                            <td class="center"><?=$ab->supplier;?></td>
                            <td class="center"><?=$ab->time;?></td>
                            <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                            <td class="center ">
                                <?php echo anchor('home/main/edit-item/'.$ab->id_item,'Ubah') ?> / 
                                <?php echo anchor('action/delete/'.$ab->id_item,'Hapus') ?> /
                                <?php echo anchor('home/main/mines/'.$ab->id_item,'Kurangi') ?>
                            </td>
                            <?php } ?>
                            <td style="text-align:center;">
                                <a href="<?=site_url('home/print_item/print-item/'.$ab->id_item) ?>" target="_blank">Print</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <a href="<?=site_url('action/export')?>" class="btn btn-primary">Export semua data ke Excel</a>
                <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                <input type="submit" value="Hapus Item Terpilih" class="btn btn-primary" onclick="return confirm('Anda yakin akan menghapus barang yang dipilih ?')">
                <?php } ?>
                <?=form_close()?>
                <br><br><br><br><br><br>
                <?=$this->load->view('engine/footer')?>
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    