
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

<ul class="breadcrumbs">
            <li>
                <a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span>
            </li>
            <li>Tambah Barang</li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>NEW ITEM</h5>
                <h1>Tambah Barang</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox box-inverse">
				<div style="<?=$success;?>">
	                <div class="alert" style="background:#1aff87;color:#000;border:none;">Data barang berhasil disimpan
	                <?php echo anchor('home/main/new-item', 'x', "style='float:right;color:#fff;margin-right:-15px;'") ?>
	                </div>
	            </div>
                <h4 class="widgettitle">New Item Entry</h4>
				<div class="widgetcontent nopadding">
                    <?=form_open('action/save', "class='stdform stdform2'")?>

                            <p>
                                <label>Nama Barang</label>
                                <span class="field"><input type="text" name="item_name" id="item_name" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Jumlah</label>
                                <span class="field"><input type="text" name="total" id="total" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Pemasok</label>
                                <span class="field"><input type="text" name="supplier" id="supplier" value="<?=$this->session->userdata('name')?>" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Lab</label>
                                <span class="field">
                                <select name="position" id="position" class="uniformselect" required>
                                <?php $p = $this->db->get('position');
                                foreach ($p->result() as $lab) { ?>
                                    <option value="Lab <?=$lab->position?>">Lab <?=$lab->position?></option>
                                <?php } ?>
                                </select></span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn">Reset Form</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->