<ul class="breadcrumbs">
            <li>
                <a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span>
            </li>
            <li>Kurangi Barang</li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>ITEM OUT</h5>
                <h1>Barang Keluar</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox box-inverse">
				<div style="<?=$edited;?>">
	                <div class="alert" style="background:#1aff87;color:#000;">Data barang berhasil diupdate
	                <?php echo anchor('home/main/new-item', 'x', "style='float:right;'") ?>
	                </div>
	            </div>
                <?=form_open('action/mines_action', "class='stdform stdform2'")?>
	            <?php $id = $this->uri->segment(4);
	            $show_item = $this->db->get_where('item_list', array("id_item"=>"$id"));
	            foreach ($show_item->result() as $reduce) { ?>
                <h4 class="widgettitle">Kurangi jumlah barang "<?=$reduce->item_name;?>"</h4>
				<div class="widgetcontent nopadding">


                        <input type="hidden" value="<?=$reduce->id_item;?>" id="id_item" name="id_item">

                            <p>
                                <label>Nama Barang</label>
                                <span class="field"><input disabled value="<?=$reduce->item_name;?>" type="text" name="item_name" id="item_name" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Jumlah saat ini</label>
                                <span class="field"><input disabled value="<?=$reduce->total;?>" type="text" name="total" id="total" class="input-xxlarge" required></span>
                            </p>
                            
                            <input value="<?=$reduce->item_name?>" id="item_name" name="item_name" type="hidden">
                            <input value="<?=$this->session->userdata('name');?>" type="hidden" name="supplier" id="supplier" class="input-xxlarge">
                            <input value="<?=$reduce->position?>" id="position" name="position" type="hidden">
                            
                            <p>
                                <label>Lab</label>
                                <span class="field"><select name="position" id="position" class="uniformselect" disabled required>
                                    <option value="<?=$reduce->position;?>"><?=$reduce->position;?></option>
                                    <?php $p = $this->db->get('position');
                                    foreach ($p->result() as $po) { ?>
                                    <option value="<?=$po->position?>"><?=$po->position;?></option>
                                    <?php } ?>
                                </select></span>
                            </p>
                            
                            <p>
                                <label>Masukkan jumlah barang yang ingin dikurangi</label>
                                <span class="field">
                                	<input type="text" name="total_out" id="total_out" class="input-xxlarge" required>
                                </span>
                            </p>
                            
                                                    
                            <p class="stdformbutton">
                                <button type="submit" class="btn btn-primary">Kurangi</button>
                                <button type="reset" class="btn">Reset Form</button>
                            </p>
                <?php } ?>
                    <?php echo form_close(); ?>
                </div><!--widgetcontent-->
            </div>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->