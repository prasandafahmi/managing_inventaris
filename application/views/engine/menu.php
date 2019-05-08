<ul class="nav nav-tabs nav-stacked" style="height:100%;">
                <li class="nav-header">Navigation</li>
                <li><a href="<?=site_url('')?>"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="<?=site_url('home/main/list-item')?>"><span class="iconfa-th-list"></span> Daftar Barang</a></li>
                <?php if ($this->session->userdata('permission')=="Kepala Lab") { ?>
                    <li><a href="<?=site_url('home/main/new-item')?>"><span class="iconfa-pencil"></span> Tambah Barang</a></li>
                <!--<li><a href="<?=site_url('home/main/reduce-item')?>"><span class="iconfa-th-list"></span> Reduce Item</a></li>-->
                <?php } ?>
                <!--<li><a href="<?=site_url('home/main/item-entry')?>"><span class="iconfa-th-list"></span> Item Entry</a></li>-->
                <li><a href="<?=site_url('home/main/item-out')?>"><span class="iconfa-th-list"></span> Daftar Barang Keluar</a></li>
                <li><a href="<?=site_url('home/main/statistics')?>"><span class="iconfa-signal"></span> Statistik</a></li>
                <!--<li><a href="<?=site_url('home/main/messaging')?>"><span class="iconfa-envelope"></span> Messaging</a></li>
                <li><a href="<?=site_url('home/main/')?>"><span class="iconfa-picture"></span> Media Manager</a></li>
                <li><a href="typography.html"><span class="iconfa-font"></span> Typography</a></li>
                <li><a href="calendar.html"><span class="iconfa-calendar"></span> Calendar</a></li>-->
                <!--<li class="dropdown"><a href="#"><span class="iconfa-th-list"></span> Three Level Menu Sample</a>
                    <ul>
                        <li class="dropdown"><a href="#">Second Level Menu</a>
                        <ul>
                            <li><a href="#">Third Level Menu</a></li>
                            <li><a href="#">Another Third Level Menu</a></li>
                        </ul>
                     </li>
                    </ul>
                </li>-->
            </ul>
