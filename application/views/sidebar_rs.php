<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="<?php
                        if($this->uri->segment(2) == 'dashboard_rs' || $this->uri->segment(2) == 'edit_api'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/dashboard_rs');?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <?php
                        if($this->uri->segment(2) == 'dashboard_rs' || $this->uri->segment(2) == 'edit_api'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                            <span class="title">Dashboard</span>
                            </a>

                        </li>

                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_poli' || $this->uri->segment(2) == 'edit_poli'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/kelola_poli');?>" class="nav-link nav-toggle">
                                <i class="fa fa-medkit"></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_poli' || $this->uri->segment(2) == 'edit_poli'){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Poliklinik</span>
                            </a>
                        </li>
                        <?php
                        if ($data_poli->num_rows() != 0) {
                            $href = 'kelola_dokter';
                        }else{
                            $href = '';
                        }
                        ?>
                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_dokter' || $this->uri->segment(2) == 'edit_dokter'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/kelola_dokter');?>" class="nav-link nav-toggle"

                                <?php if ($href != 'kelola_dokter'): ?>
                                    onClick="return alert('Silahkan tambahkan Poliklinik terlebih dahulu.')" style="color:#c0392b;"
                                <?php endif ?>

                                >
                                <i class="fa fa-user-md" 
                                <?php if ($href != 'kelola_dokter'): ?>
                                    style="color:#c0392b;"
                                <?php endif ?>
                                ></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_dokter' || $this->uri->segment(2) == 'edit_dokter' ){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Dokter</span>
                            </a>
                        </li>
                        <?php
                        if ($data_dokter->num_rows() != 0) {
                            $href = 'kelola_jadwal';
                        }else{
                            $href = '';
                        }
                        ?>
                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_jadwal' || $this->uri->segment(2) == 'edit_jadwal'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/kelola_jadwal');?>" class="nav-link nav-toggle disabled"

                                <?php if ($href != 'kelola_jadwal'): ?>
                                    onClick="return alert('Silahkan tambahkan Dokter terlebih dahulu.')" style="color:#c0392b;"
                                <?php endif ?>

                                >
                                <i class="fa fa-calendar"
                                <?php if ($href != 'kelola_jadwal'): ?>
                                    style="color:#c0392b;"
                                <?php endif ?>
                                ></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_jadwal' || $this->uri->segment(2) == 'edit_jadwal' ){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Jadwal</span>
                            </a>
                        </li>

                        <li class="<?php
                        if($this->uri->segment(2) == 'kelola_cs' || $this->uri->segment(2) == 'edit_cs'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/kelola_cs')?>" class="nav-link nav-toggle">
                                <i class="fa fa-child"></i>
                                <?php
                        if($this->uri->segment(2) == 'kelola_cs' || $this->uri->segment(2) == 'edit_cs' ){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Kelola CS</span>
                            </a>
                        </li>
                        <li class="<?php
                        if($this->uri->segment(2) == 'profil_rs' || $this->uri->segment(2) == 'edit_profil_rs'){
                            echo 'nav-item start active';
                        }else{
                            echo 'nav-item';
                        }
                        ?>">
                            <a href="<?php echo site_url('nuqueue/profil_rs')?>" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>
                                <?php
                        if($this->uri->segment(2) == 'profil_rs' || $this->uri->segment(2) == 'edit_profil_rs' ){
                            echo '<span class="selected"></span>';
                        }
                        ?>
                                <span class="title">Profil Saya</span>
                                
                        </li>


                    </ul>