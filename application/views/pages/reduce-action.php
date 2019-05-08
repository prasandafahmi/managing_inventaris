<ul class="breadcrumbs">
            <li>
                <a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span>
            </li>
            <li>
                <a href="<?=site_url('')?>">Dashboard</a> <span class="separator"></span>
            </li>
            <li>Reduce Item</li>
        </ul>
        
        <div class="pageheader">
            <form action="http://demo.themepixels.com/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>REDUCE ITEM</h5>
                <h1>Reduce Action</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox box-inverse">
				<div style="<?=$success;?>">
	                <div class="alert" style="background:#1aff87;color:#000;">Item has beeb saved
	                <?php echo anchor('home/main/new-item', 'x', "style='float:right;'") ?>
	                </div>
	            </div>
                <?=form_open('action/save_edit', "class='stdform stdform2'")?>
	            <?php $id = $this->uri->segment(4);
	            $show_item = $this->db->get_where('item_list', array("id_item"=>"$id"));
	            foreach ($show_item->result() as $reduce) { ?>
                <h4 class="widgettitle">Reduce Item "<?=$reduce->item_name;?>"</h4>
				<div class="widgetcontent nopadding">

                            <p>
                                <label>Item Name</label>
                                <span class="field"><input value="<?=$reduce->item_name;?>" type="text" name="item_name" id="item_name" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Total Item</label>
                                <span class="field"><input value="<?=$reduce->total;?>" type="text" name="total" id="total" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Supplier</label>
                                <span class="field"><input value="<?=$reduce->supplier;?>" type="text" name="supplier" id="supplier" class="input-xxlarge" required></span>
                            </p>
                            
                            <p>
                                <label>Position</label>
                                <span class="field"><select name="position" id="position" class="uniformselect" required>
                                    <option value=""><?=$reduce->position;?></option>
                                    <option value="1">Lab RPL</option>
                                    <option value="2">Lab MM</option>
                                    <option value="3">Lab TKJ</option>
                                </select></span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button type="submit" class="btn btn-primary">Save Edit</button>
                                <button type="reset" class="btn">Clear Form</button>
                            </p>
                <?php } ?>
                    <?php echo form_close(); ?>
                </div><!--widgetcontent-->
            </div>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->