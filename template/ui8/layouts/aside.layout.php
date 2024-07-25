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
                            <a href="#dashboards" data-bs-toggle="collapse"
                              class="nav-link d-flex align-items-center text-truncate "
                              aria-expanded="false">
                              <span class="sidebar-icon">
                               <i class="bi bi-speedometer2 fs-5"></i>
                              </span>
                              <!--Sidebar nav text-->
                              <span class="sidebar-text">Dashboard</span>
                            </a>
                            <ul data-bs-target="#dashboards" id="dashboards" class="sidebar-dropdown list-unstyled collapse @@dashboard_collapse">
                              <li class="sidebar-item"><a class="sidebar-link" href="index.html">Default</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="index-dashboard2.html">Dashboard 2</a></li>
                            </ul>
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
                               <li class="sidebar-item"><a class="sidebar-link" href="index.html">Index</a></li>
                                                  <li class="sidebar-item"><a class="sidebar-link" href="income-list.html">Income List</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="deliveries-capture.html">Deliveries Capture</a></li>


                              <li class="sidebar-item">

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
                              </li>
                           
                              <li class="sidebar-item"><a class="sidebar-link" href="page-blank.html">Blank Page</a></li>
                            </ul>
                          </li>


                          <li class="nav-item mt-2 sidebar-title text-truncate small opacity-50">
                            <i class="bi bi-three-dots align-middle"></i>
                            <span>Apps</span>
                          </li>
                          <li class="nav-item">
                            <a href="app-inbox.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-inbox fs-5"></i>
                              </span>
                              <span class="sidebar-text">Inbox </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="app-chat.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-chat fs-5"></i>
                              </span>
                              <span class="sidebar-text">Chat</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="app-calendar.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-calendar fs-5"></i>
                              </span>
                              <span class="sidebar-text">Calendar</span>
                            </a>
                          </li>
                          <li class="nav-item mt-2 sidebar-title text-truncate small opacity-50">
                            <i class="bi bi-three-dots align-middle"></i>
                            <span>Features</span>
                          </li>
                          <li class="nav-item">
                            <a href="widgets.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-magic fs-5"></i>
                              </span>
                              <span class="sidebar-text">Widgets <span
                                  class="badge rounded-pill bg-success small lh-1 ms-3">50+</span></span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#layouts" data-bs-toggle="collapse" aria-expanded="false"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-layout-sidebar-inset fs-5"></i>
                              </span>
                              <!--Sidebar nav text-->
                              <span class="sidebar-text">Layouts</span>
                            </a>
                            <ul id="layouts" class="sidebar-dropdown list-unstyled collapse">
                              <li class="sidebar-item"><a class="sidebar-link" href="layout-compact.html">Compact</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="layout-boxed.html">Boxed</a></li>
                            </ul>
                          </li>
                          <li class="nav-item mt-2 sidebar-title text-truncate small opacity-50">
                            <i class="bi bi-three-dots align-middle"></i>
                            <span>Components</span>
                          </li>
                          <li class="nav-item">
                            <a href="#ui-components" data-bs-toggle="collapse" aria-expanded="false"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-clipboard-data fs-5"></i>
                              </span>
                              <!--Sidebar nav text-->
                              <span class="sidebar-text">UI Components</span>
                            </a>
                            <ul id="ui-components" class="sidebar-dropdown list-unstyled collapse @@components_collapse">
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-avatars.html">Avatars</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-accordion.html">Accordion</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-alerts.html">Alerts</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-badges.html">Badges</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-buttons.html">Buttons</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-cards.html">Cards</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-carousel.html">Carousel</a> </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-collapse.html">Collapse</a> </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-dropdown.html">Dropdown</a> </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-modals.html">Modals</a> </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-icons.html">Icons</a>
                              </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-progress.html">Progress</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-spinners.html">Spinners</a> </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-swiper-slider.html">Swiper Slider</a>
                              </li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-typography.html">Typography</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-toast.html">Toast</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-component-tooltip-popovers.html">Tooltip &
                                  popovers</a></li>
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a href="charts.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-bar-chart fs-5"></i>
                              </span>
                              <span class="sidebar-text">Charts</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="maps.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-map fs-5"></i>
                              </span>
                              <span class="sidebar-text">Maps</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="datatables.html"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-table fs-5"></i>
                              </span>
                              <span class="sidebar-text">Datatables</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#component-forms" data-bs-toggle="collapse" aria-expanded="false"
                              class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="bi bi-pencil fs-5"></i>
                              </span>
                              <!--Sidebar nav text-->
                              <span class="sidebar-text">Forms</span>
                            </a>
                            <ul id="component-forms" class="sidebar-dropdown list-unstyled collapse">
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-bootstrap.html">
                                  Bootstrap</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-editor.html">
                                  Editor</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-stepper.html">
                                  Stepper</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-upload.html">
                                  Upload</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-daterange-picker.html">
                                  Daterangepicker</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-validation.html">
                                  Validation</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-choices.html">
                                  Choices</a></li>
                              <li class="sidebar-item"><a class="sidebar-link" href="ui-form-inputmask.html">
                                  Inputmask</a></li>
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#multi-level" data-bs-toggle="collapse" aria-expanded="false">
                              <div class="d-flex align-items-center">
                                <span class="sidebar-icon">
                                  <i class="bi bi-layers fs-5"></i>
                                </span>
                                <span class="sidebar-text">Multi level</span>
                              </div>
                            </a>
                            <ul id="multi-level" class="collapse sidebar-dropdown list-unstyled mb-0">
                              <li class="sidebar-item">
                                <a href="#level-2" data-bs-toggle="collapse" aria-expanded="false" class="sidebar-link">Level
                                  Two</a>
                                <ul id="level-2" class="collapse sidebar-dropdown list-unstyled mb-0">

                                  <li class="sidebar-item">
                                    <a href="#level-3" data-bs-toggle="collapse" aria-expanded="false" class="sidebar-link">Level
                                      two item 2</a>
                                    <ul id="level-3" class="collapse sidebar-dropdown list-unstyled mb-0">
                                      <li class="sidebar-item">
                                        <a href="#!" class="sidebar-link">Level three item 1</a>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    <!--Aside-footer-->
                    <footer class="aside-footer position-relative p-3">
                      <div class="p-3 bg-white bg-white text-dark rounded-3 position-relative overflow-hidden">
                        <div class="position-relative">
                    
                          <p class="mb-0 pb-3"></p>
                          <!--Action button-->
                          <a href="#!.html" class="btn rounded-pill btn-warning text-truncate btn-sm"></a>
                        </div>
                      </div>
                    </footer>
                  </div>
                </aside>

<!--///////////Page Sidebar End///////////////-->

                <!--///Sidebar close button for 991px or below devices///-->
                <div class="sidebar-close d-lg-none">
                  <a href="#"></a>
                </div>