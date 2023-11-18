<div id="app" class="app app-header-fixed app-sidebar-fixed ">
         <div id="header" class="app-header">
            <div class="navbar-header">
               <a href="<?=base_url('admin')?>" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-3px">Admin</b> Panel</a>
               <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="navbar-nav">
       
               <div class="navbar-item navbar-user dropdown">
                  <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                  <img src="<?=base_url()?>assets/admin/img/user/user-13.jpg" alt />
                  <span>
                  <span class="d-none d-md-inline"><?=$this->session->userdata('admin_username')?></span>
                  <b class="caret"></b>
                  </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end me-1">
                     <a href="#" class="dropdown-item">Setting</a>
                     
                    
                     <div class="dropdown-divider"></div>
                     <a href="<?=base_url('admin/logout')?>" class="dropdown-item">Log Out</a>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar" class="app-sidebar" data-bs-theme="dark">
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
               <div class="menu">
                  <div class="menu-profile">
                     <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image">
                           <img src="<?=base_url()?>assets/admin/img/user/user-13.jpg" alt />
                        </div>
                        <div class="menu-profile-info">
                           <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                 <?=$this->session->userdata('admin_username')?>
                              </div>
                              <!-- <div class="menu-caret ms-auto"></div> -->
                           </div>
                           <!-- <small>Frontend developer</small> -->
                        </div>
                     </a>
                  </div>
               

                  <div class="menu-header">Dashboard</div>
                  <div class="menu-item">
                     <a href="<?=base_url('admin')?>" class="menu-link">
                     <div class="menu-icon">
                     <i class="fa fa-calendar"></i>
                     </div>
                     <div class="menu-text">Dashboard</div>
                     </a>
                  </div>
                     
                  <div class="menu-header">Menu</div>
              
                  <!-- navbar dynamic  -->

                     <?php foreach (nav_array() as $key => $value) { ?>
                           <div class="menu-item <?php if(!empty($value['sub_menu'])){ echo'has-sub';} ?>">
                            <a href="<?php if(!empty($value['sub_menu'])){ echo'javascript:;'; }else{echo base_url($value['url']); } ?>" class="menu-link">
                               <div class="menu-icon">
                                  <i class="<?=$value['icon'] ?>"></i>
                               </div>
                               <div class="menu-text"><?=$value['name'] ?></div>
                               <?php if(!empty($value['sub_menu'])){ ?>
                                 <div class="menu-caret"></div>
                              <?php } ?>
                            </a>
                               <div class="menu-submenu">
                            <?php  foreach ($value['sub_menu'] as $key2 => $value2) { ?>
                                  <div class="menu-item">
                                     <a href="<?=base_url($value2['url']) ?>" class="menu-link">
                                        <div class="menu-text"><?=$value2['name'] ?></div>
                                     </a>
                                  </div>
                            <?php } ?>
                               </div>
                           </div>
                        <?php } ?>

                  <!-- navbar dynamic end -->
                  
                  <div class="menu-item d-flex">
                     <a href="javascript:;" class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="app-sidebar-bg" data-bs-theme="dark"></div>
         <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>