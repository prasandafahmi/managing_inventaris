
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
                    <form id="form1" class="stdform" method="post" action="<?=site_url('action/edit_account')?>" novalidate="novalidate">
                <?php $id = $this->uri->segment(4);
                $show_account = $this->db->get_where('account', array('id_account'=>"$id"));
                foreach ($show_account->result() as $acc) { ?>
                <div class="widgetbox box-inverse">
                <h4 class="widgettitle">With Form Validation</h4>
                <div class="widgetcontent wc1">
                            <div class="par control-group">
                                    <label class="control-label" for="firstname">Name</label>
                                <div class="controls"><input type="text" name="name" id="name" value="<?=$acc->name;?>" class="input-large"></div>
                            </div>
                            
                            <div class="control-group">
                                    <label class="control-label" for="lastname">Username</label>
                                <div class="controls"><input type="text" name="employee_code" id="employee_code" value="<?=$acc->employee_code;?>" class="input-large"></div>
                            </div>
                            
                            <div class="par control-group">
                                    <label class="control-label" for="email">Password</label>
                                <div class="controls"><input type="text" name="password" id="password" value="<?=$acc->password;?>" class="input-large"></div>
                            </div>
                            
                            <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                            <div class="par control-group">
                                    <label class="control-label" for="email">Jabatan</label>
                                <div class="controls"><select name="permission" id="permission" class="uniformselect" required="">
                                                                    <option value="<?=$acc->permission;?>"><?=$acc->permission;?></option>
                                                                    <option value="Kepala Lab">Kepala Lab</option>
                                                                    <option value="Waka Sapras">Waka Sapras</option>
                                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                                </select></div>
                            </div>
                            <?php } ?>

                                                    
                            <p class="stdformbutton">
                                    <button class="btn btn-primary">Submit Button</button>
                            </p>
                </div><!--widgetcontent-->
            </div>
            </div>
                    </form>
                <?php } ?>
                <br><br><br><br><br><br>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    