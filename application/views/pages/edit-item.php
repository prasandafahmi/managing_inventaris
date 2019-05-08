<ul class="breadcrumbs">
            <li>
                <a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span>
            </li>
            <li>
                <a href="<?=site_url('home/main/list-item')?>">List Item</a> <span class="separator"></span>
            </li>
            <li>Ubah Data</li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>EDIT ITEM</h5>
                <h1>Ubah Data Terpilih</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox box-inverse">
				<div style="<?=$edited;?>">
	                <div class="alert" style="background:#1aff87;color:#000;">Data barang berhasil diubah
	                <?php echo anchor('home/main/new-item', 'x', "style='float:right;'") ?>
	                </div>
	            </div>
                <?=form_open('action/save_edit', "class='stdform stdform2'")?>
	            <?php $id = $this->uri->segment(4);
	            $show_item = $this->db->get_where('item_list', array("id_item"=>"$id"));
	            foreach ($show_item->result() as $reduce) { ?>
                <h4 class="widgettitle">Reduce Item "<?=$reduce->item_name;?>"</h4>
				<div class="widgetcontent nopadding">


                        <input type="hidden" value="<?=$reduce->id_item;?>" id="id" name="id">

                            <p>
                                <label>Nama Barang</label>
                                <span class="field"><input value="<?=$reduce->item_name;?>" type="text" name="item_name" id="item_name" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Jumlah</label>
                                <span class="field"><input value="<?=$reduce->total;?>" type="text" name="total" id="total" class="input-xxlarge" required></span>
                            </p>
                            
                            <input value="<?=$this->session->userdata('name');?>" type="hidden" name="supplier" id="supplier" class="input-xxlarge">
                            
                            <p>
                                <label>Lab</label>
                                <span class="field"><select name="position" id="position" class="uniformselect" required>
                                    <option value="<?=$reduce->position;?>"><?=$reduce->position;?></option>
                                    <?php $p = $this->db->get('position');
                                    foreach ($p->result() as $po) { ?>
                                    <option value="Lab <?=$po->position?>">Lab <?=$po->position;?></option>
                                    <?php } ?>
                                </select></span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn">Reset Form</button>
                            </p>
                <?php } ?>
                    <?php echo form_close(); ?>
                </div><!--widgetcontent-->
            </div>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->