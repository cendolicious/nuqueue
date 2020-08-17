 <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="<?php
                        if($this->uri->segment(2) == 'dashboard_cs'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('dashboardCS/dashboard_cs');?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <?php
                        if($this->uri->segment(2) == 'dashboard_cs'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Dashboard</span>
                                
                            </a>

                        </li>
                        
                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_antrian' || $this->uri->segment(2) == 'kelola_antrian_poli' || $this->uri->segment(2) == 'kelola_antrian_jadwal'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('dashboardCS/kelola_antrian');?>" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_antrian' || $this->uri->segment(2) == 'kelola_antrian_poli' || $this->uri->segment(2) == 'kelola_antrian_jadwal'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Kelola Antrian</span>
                            </a>
                        </li>

                        <!-- <li class="<?php
                        if($this->uri->segment(2) == 'tampil_antrian' || $this->uri->segment(2) == 'tampil_antrian_poli' || $this->uri->segment(2) == 'tampil_antrian_jadwal'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('dashboardCS/tampil_antrian');?>" class="nav-link nav-toggle">
                                <i class="fa fa-list-ol"></i>
                                <?php
                        if($this->uri->segment(2) == 'tampil_antrian' || $this->uri->segment(2) == 'tampil_antrian_poli' || $this->uri->segment(2) == 'tampil_antrian_jadwal'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Tampilkan Antrian</span>
                            </a>
                        </li> -->
                        
                    </ul>