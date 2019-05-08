
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
            <li>Detail Akun</li>
            
            
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>ACCOUNT DETAIL</h5>
                <h1>Detail Akun</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <?php $id = $this->uri->segment(4);
                $show_account = $this->db->get_where('account', array('id_account'=>"$id"));
                foreach ($show_account->result() as $acc) { ?>
                <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Detail Pengguna</h4>
                <div class="widgetcontent wc1">
                    <form id="form1" class="stdform" method="post" action="http://demo.themepixels.com/webpage/shamcey/forms.html" novalidate="novalidate">

                            <div style="float:left;position:absolute;">
                                <img src="<?=base_url('assets/avatar')?>/<?=$acc->image;?>" width="140px;">
                            </div>

                            <div class="par control-group" style="margin-left:200px;">
                                    <label class="control-label" for="firstname">Name</label>
                                <div class="controls"><?=$acc->name;?></div>
                            </div>
                            
                            <div class="par control-group" style="margin-left:200px;">
                                    <label class="control-label" for="firstname">Username</label>
                                <div class="controls"><?=$acc->employee_code;?></div>
                            </div>

                            <div class="par control-group" style="margin-left:200px;">
                                    <label class="control-label" for="firstname">Password</label>
                                <div class="controls"><?=$acc->password;?></div>
                            </div>

                            <div class="par control-group" style="margin-left:200px;">
                                    <label class="control-label" for="firstname">Jabatan</label>
                                <div class="controls"><?=$acc->permission;?></div>
                            </div>
                                                    
                    </form>
                </div><!--widgetcontent-->
            </div>
                <?php } ?>
                <br><br><br><br><br><br>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    