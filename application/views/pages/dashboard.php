

<?php

$active = $this->uri->segment(1);

?>


<body>
<div id="mainwrapper" class="mainwrapper">
    
    <div class="header">
        <div class="logo" style="color:#fff;font-size:20px;">
            Lab Item Monitoring
        </div>
        <div class="headerinner">
            <ul class="headmenu">
            <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="head-icon head-users"></span>
                    <span class="headmenu-label">Daftar Pengguna</span>
                    </a>
                    <ul class="dropdown-menu newusers">
                        <li class="nav-header">Daftar Pengguna</li>
                        <?php $user = $this->db->get('account');
                        foreach ($user->result() as $us) { ?>
                        <li>
                            <a href="<?=site_url('home/main/detail_account/')?>/<?=$us->id_account;?>">
                                <img src="<?=base_url('assets/avatar/')?>/<?=$us->image;?>" alt="" class="userthumb" />
                                <strong><?=$us->name;?></strong>
                                <small><?=$us->permission;?></small>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="count">1</span>
                    <span class="head-icon head-bar"></span>
                    <span class="headmenu-label">Statistik</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Statistik</li>
                        <li><a href="#"><span class="icon-align-left"></span> New Reports from <strong>Products</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href="#"><span class="icon-align-left"></span> New Statistics from <strong>Users</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href="#"><span class="icon-align-left"></span> New Statistics from <strong>Comments</strong> <small class="muted"> - 3 days ago</small></a></li>
                        <li><a href="#"><span class="icon-align-left"></span> Most Popular in <strong>Products</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li><a href="#"><span class="icon-align-left"></span> Most Viewed in <strong>Blog</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li class="viewmore"><a href="charts.html">View More Statistics</a></li>
                    </ul>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?=base_url('assets/avatar/'.$this->session->userdata('avatar'))?>" alt="" />
                        <div class="userinfo">
                            <h5><?=$this->session->userdata('name')?></h5>
                            <h5>Jabatan : <?=$this->session->userdata('permission')?></h5>
                            <ul>
                                <li><a href="<?=site_url('home/main/account_setting/')?>/<?=$this->session->userdata('id_account')?>">Account Settings</a></li>
                                <li><?php echo anchor('action/logout', 'Sign Out') ?></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <?php $this->load->view('engine/menu') ?>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
         <?php 
         $link = $this->uri->segment(3);
            if ($link) {
                $this->load->view("pages/$link");
            }
            else{
            ?>

            <ul class="breadcrumbs">
            <li><a href="<?=site_url('')?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Dashboard</li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>INDEX PAGE</h5>
                <h1>Dashboard</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <?=$this->load->view('pages/statistics')?>
                <br><br>
                <?=$this->load->view('engine/footer')?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
         <?php } ?>
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
</body>