 <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="<?php
                        if($this->uri->segment(2) == 'dashboard_admin'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('app/dashboard_admin');?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <?php
                        if($this->uri->segment(2) == 'dashboard_admin'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Dashboard</span>
                                
                            </a>

                        </li>
                        
                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_rs'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('app/kelola_rs');?>" class="nav-link nav-toggle">
                                <i class="fa fa-database"></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_rs'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Kelola Rumah Sakit</span>
                            </a>
                        </li>
                        
                    </ul>