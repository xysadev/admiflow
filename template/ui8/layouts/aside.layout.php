<?php use Xysdev\Admiflow\Config; ?>
                <aside class="page-sidebar">
                  <div class="h-100 flex-column d-flex" data-simplebar>
                    <!--Aside-logo-->
                    <div class="aside-logo p-3 position-relative">
                      <a href="index.html" class="d-block pe-2">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                          <!--Sidebar-icon-->
                          <span class="sidebar-icon fs-5 lh-1 text-white rounded-circle bg-primary">
                            <img src="<?=Config::getTemplateConfig('logo_url'); ?>" alt="Logo" width="24" height="24">
                          </span>
                          <span class="sidebar-text">
                            <!--Sidebar-text-->
                            <span class="sidebar-text text-truncate fs-4 text-uppercase fw-bolder">
                              <?= Config::getTemplateConfig('app_name'); ?> <sub class="fs-6 opacity-50"><?= Config::getTemplateConfig('app_version'); ?></sub>
                            </span>
                          </span>
                        </div>
                      </a>
                    </div>
                    <!--Aside-Menu-->
                    <div class="aside-menu pe-2 my-auto flex-column-fluid">
                      <nav class="flex-grow-1 h-100" id="page-navbar">
                        <!--:Sidebar nav-->
                        <ul class="nav flex-column collapse-group collapse d-flex pt-4">
                          <li class="nav-item sidebar-title text-truncate opacity-50 small">
                            <i class="bi bi-three-dots align-middle"></i>
                            <span>Main</span>
                          </li>
                  
                          <li class="nav-item">
                            <a data-bs-toggle="collapse"
                              class="nav-link d-flex align-items-center text-truncate active"
                              aria-expanded="false" href="#ui-pages">
                              <span class="sidebar-icon">
                                <i class="bi bi-files fs-5"></i>
                              </span>
                              <!--Sidebar nav text-->
                              <span class="sidebar-text">Pages</span>
                            </a>
                           


                            <ul id="ui-pages" class="sidebar-dropdown list-unstyled collapse show">
                    <!--            <li class="sidebar-item">

                                <a href="#pages-account" data-bs-toggle="collapse" aria-expanded="false" class="sidebar-link">
                                  Account
                                </a>
                                <ul id="pages-account" class="sidebar-dropdown list-unstyled collapse sd-second-level">
                                  <li class="sidebar-item">
                                    <a class="sidebar-link" href="account-general.html">General</a>
                                  </li>
                                  <li class="sidebar-item">
                                    <a class="sidebar-link" href="account-security.html">Security</a>
                                  </li>
                                  <li class="sidebar-item">
                                    <a class="sidebar-link" href="account-contacts.html">Users</a>
                                  </li>
                             
                                </ul>
                              </li> -->

                              <li class="sidebar-item"><a class="sidebar-link" href="index.html">Index</a></li>
                           <li class="sidebar-item"><a class="sidebar-link" href="clients.html">Client List</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="page-blank.html">Blank Page</a></li>
                            </ul>
                          </li>

                    <!--Aside-footer-->
                <!--     <footer class="aside-footer position-relative p-3">
                      <div class="p-3 bg-white bg-white text-dark rounded-3 position-relative overflow-hidden">
                        <div class="position-relative">
                    
                          <p class="mb-0 pb-3"></p>
                          
                          <a href="#!.html" class="btn rounded-pill btn-warning text-truncate btn-sm"><text color="black">Admiflow</text></a>
                        </div>
                      </div>
                    </footer> -->
                  </div>
                </aside>

<!--///////////Page Sidebar End///////////////-->

                <!--///Sidebar close button for 991px or below devices///-->
                <div class="sidebar-close d-lg-none">
                  <a href="#"></a>
                </div>