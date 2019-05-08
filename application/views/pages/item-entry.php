<ul class="breadcrumbs">
            <li>
                <a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span>
            </li>
            <li>
                <a href="<?=site_url('')?>">Dashboard</a> <span class="separator"></span>
            </li>
            <li>Item Entry</li>
        </ul>
        
        <div class="pageheader">
            <form action="http://demo.themepixels.com/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>ITEM ENTRY</h5>
                <h1>List of Item Entry</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid"><div id="dyntable_length" class="dataTables_length"><label>Show <select size="1" name="dyntable_length" aria-controls="dyntable"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="dyntable_filter"><label>Search: <input type="text" aria-controls="dyntable"></label></div><table id="dyntable" class="table table-bordered responsive dataTable" aria-describedby="dyntable_info">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                    </colgroup>
                    <thead>
                        <tr role="row"><th class="head0 nosort sorting_asc" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column ascending" style="width: 24px;"><div class="checker" id="uniform-undefined"><span><input type="checkbox" class="checkall" style="opacity: 0;"></span></div></th>
                        <th class="head0 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 191px;">Item Name</th>
                        <th class="head1 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 235px;">Total Item</th>
                        <th class="head0 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 217px;">Position</th>
                        <th class="head1 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 164px;">Supplier</th>
                        <th class="head1 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 164px;">Time</th>
                        <?php if ($this->session->userdata('permission')=="admin") { ?>
                        <th class="head0 sorting" role="columnheader" tabindex="0" aria-controls="dyntable" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 116px;">Modify</th></tr>
                        <?php } ?>
                    </thead>
                    
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr class="gradeX odd">
                        <?php $item = $this->db->query("SELECT * FROM item_list");
                        foreach ($item->result() as $item) { ?>
                        <td class="aligncenter  sorting_2"><span class="center">
                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></span></td>
                            <td class=" "><?=$item->item_name;?></td>
                            <td class=" "><?=$item->total;?></td>
                            <td class=" "><?=$item->position;?></td>
                            <td class=" "><?=$item->supplier;?></td>
                            <td class="center "><?=$item->time;?></td>
                            <?php if ($this->session->userdata('permission')=="admin") { ?>
                            <td class="center ">
                                <?php echo anchor('','Edit') ?> / <?php echo anchor('','Delete') ?>
                            </td>
                            <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody></table><div class="dataTables_info" id="dyntable_info">Showing 1 to 10 of 51 entries</div><div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="dyntable_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="dyntable_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a><a tabindex="0" class="paginate_button">3</a><a tabindex="0" class="paginate_button">4</a><a tabindex="0" class="paginate_button">5</a></span><a tabindex="0" class="next paginate_button" id="dyntable_next">Next</a><a tabindex="0" class="last paginate_button" id="dyntable_last">Last</a></div></div>
                <?php $this->load->view('engine/footer') ?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->