<!DOCTYPE html>
<html>
<head>
    <title>Print Data</title>
</head>
<body onload="window.print()">
            <?=form_open('action/save_edit', "class='stdform stdform2'")?>
                <?php $id = $this->uri->segment(4);
                $show_item = $this->db->get_where('item_list', array("id_item"=>"$id"));
                foreach ($show_item->result() as $i) { ?>
                <div style="width:90%;margin-left:auto;margin-right:auto;border:solid 1px #ccc;padding:20px;font-family:Segoe UI;line-height:40px; margin-top:15%;">

                <span>
                    <label><b>Item Name</b></label> : 
                    <label><?=$i->item_name;?></label>
                </span>
                <br>
                <span>
                    <label><b>Total Item</b></label> : 
                    <label><?=$i->total;?></label>
                </span>
                <br>
                <span>
                    <label><b>Position</b></label> : 
                    <label><?=$i->position;?></label>
                </span>
                <br>
                <span>
                    <label><b>Supplier</b></label> : 
                    <label><?=$i->supplier;?></label>
                </span>
                <br>
                <span>
                    <label><b>Time Input</b></label> : 
                    <label><?=$i->time;?></label>
                </span>

                </div>
                            
                <?php } ?>
                    <?php echo form_close(); ?>
</body>
</html>