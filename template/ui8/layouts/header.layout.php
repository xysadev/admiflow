<header class="navbar py-0 page-header border-bottom navbar-expand navbar-light px-4">
                      <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                          <!--Sidebar-icon-->
                          <span class="sidebar-icon bg-primary rounded-circle size-40 text-white">
                            <svg width="16" height="18" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="0.399994" width="4" height="12" fill="white" />
                              <path
                                d="M5.89998 9.6C7.1465 9.6 8.34196 9.09429 9.22338 8.19411C10.1048 7.29394 10.6 6.07304 10.6 4.8C10.6 3.52696 10.1048 2.30606 9.22338 1.40589C8.34196 0.505713 7.1465 2.4787e-07 5.89998 0L5.89998 4.8L5.89998 9.6Z"
                                fill="white" />
                            </svg>
                          </span>
                        </div>
                      </a>
                      <ul class="navbar-nav d-flex align-items-center h-100">
                        <li class="nav-item d-none d-lg-flex flex-column h-100 me-lg-2 align-items-center justify-content-center">
                          <a href="javascript:void(0)"
                            class="sidebar-trigger nav-link rounded-3 size-35 d-flex align-items-center justify-content-center p-0">
                             <i class="bi bi-arrow-bar-left fs-5"></i></a>
                        </li>
                        <li class="nav-item d-flex flex-column me-lg-2 h-100 justify-content-center dropdown">
                          <a href="javascript:void(0)" data-bs-toggle="dropdown"
                            class="d-flex align-items-center justify-content-center nav-link size-35 p-0 rounded-3"
                            data-bs-auto-close="outside" aria-expanded="false">
                         <i class="bi bi-search"></i>   
                          </a>

                          <!--Search dropdown menu-->
                          <div class="dropdown-menu p-0 dropdown-menu-sm overflow-hidden mt-0">

                            <!--Search form-->
                            <form>
                              <div class="d-flex align-items-center p-1 border-bottom ps-4">
                                <div class="text-body-tertiary">
                                <i class="bi bi-search"></i>   
                                </div>
                                <input type="text" autofocus class="form-control bg-transparent rounded-0 py-3 ps-2 border-0 shadow-none"
                                  placeholder="Search everything...">
                              </div>
                            </form>

                            <!--Recently searched-->


                            <h6 class="d-block dropdown-header pb-0 pt-3">
                              <i class="bi bi-fire opacity-75 align-middle me-1"></i>
                              Top searches
                            </h6>
                            <div class="p-3 d-flex flex-wrap align-items-center">
                              <!--Recently searched item-->
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Campaign reports
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Project #4535
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Chat
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Tasks
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Affiliates
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Faqs
                              </a>
                              <a href="#" class="badge bg-body-tertiary border text-body px-3 py-2 me-2 mb-2">
                                Inbox
                              </a>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item d-none d-lg-flex flex-column h-100 justify-content-center dropdown">
                          <a href="#" data-bs-toggle="dropdown"
                            class="nav-link dropdown-toggle py-1 px-2 d-flex align-items-center justify-content-center p-0">
                            Eng
                          </a>
                          <div class="dropdown-menu overflow-hidden mt-0">
                            <a href="#!" class="dropdown-item active">
                              English
                            </a>
                            <a href="#!" class="dropdown-item">
                              Spanish
                            </a>
                            <a href="#!" class="dropdown-item">
                              French
                            </a>
                          </div>
                        </li>
                      </ul>
                      <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
                        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100 me-2">
                          <button class="bg-transparent border-0 nav-link p-0 size-35 fs-5 d-flex align-items-center justify-content-center" id="bd-theme"
                            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <span class="bi my-1 theme-icon-active">
                              <i class="bi bi-sun"></i>  
                            </span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme" style="--bs-dropdown-min-width: 8rem;">
                            <li class="mb-1">
                              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light">
                                <span class="bi me-2 theme-icon">
                                  <i class="bi bi-sun"></i>
                                  </svg>
                                </span>
                                  Light

                              </button>
                            </li>
                            <li class="mb-1">
                              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                <span class="bi me-2 theme-icon">
                                  <i class="bi bi-moon"></i>
                                </span>
                                Dark
                              </button>
                            </li>
                            <li>
                              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
                                <span class="bi me-2 theme-icon"><i class="bi bi-circle-half"></i></span>
                                Auto

                              </button>
                            </li>
                          </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-flex align-items-center justify-content-center flex-column h-100 me-2">
                          <a href="#offcanvasChat" data-bs-toggle="offcanvas"
                            class="nav-link position-relative p-0 size-35 d-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-inbox fs-5"></i>
                            <span
                              class="badge p-0 size-5 rounded-circle d-flex align-items-center justify-content-center position-absolute end-0 top-0 mt-1 me-1 bg-success anim-scale"></span>
                          </a>
                        </li>
                        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100 me-3">
                          <a href="#"
                            class="nav-link p-0 position-relative size-35 d-flex align-items-center justify-content-center rounded-3"
                            aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                           <i class="bi bi-bell fs-5"></i>
                            <span
                              class="size-5 rounded-circle d-flex align-items-center justify-content-center position-absolute end-0 top-0 mt-2 me-1 bg-danger small"></span>
                          </a>


                          <div class="dropdown-menu mt-0 p-0 overflow-hidden dropdown-menu-end dropdown-menu-sm">
                            <div
                              class="d-flex p-3 justify-content-between align-items-center border border-top-0 border-start-0 border-end-0">
                              <h5 class="me-3 mb-0">Notifications</h5>
                              <div class="flex-shrink-0">
                                <a href="#!" class="btn btn-primary btn-sm">View All</a>
                              </div>
                            </div>

                            <div style="height:280px" data-simplebar>
                              <div class="list-group list-group-flush mb-0">
                                <div class="list-group-item bg-body-tertiary px-3 text-body-tertiary small">New</div>
                                <!--//Notification item start//-->
                                <a href="#" class="list-group-item list-group-item-action px-4 d-flex align-items-center">
                                  <div class="d-block me-3">
                                    <div class="avatar avatar-status status-online">
                                      <img src="<?=include_assets('template/ui8/assets/media/avatars/01.jpg'); ?>" class="img-fluid rounded-circle w-auto" alt="">
                                    </div>
                                  </div>

                                  <div class="flex-grow-1 flex-wrap pe-3">
                                    <span class="mb-0 d-block"><strong>Adam Danely</strong> assigned
                                      a task to
                                      you <strong>#PI-392</strong></span>
                                    <small class="text-muted">Just now</small>
                                  </div>

                                  <!--Unread mark-->
                                  <span class="position-absolute end-0 unread_notification text-primary top-50 translate-middle-y me-3">
                                    <i class="bi bi-circle-fill small"></i>
                                  </span>
                                </a>
                                <!--//Notification item start//-->
                                <a href="#" class="list-group-item list-group-item-action px-4 d-flex align-items-center">
                                  <div class="d-block me-3">
                                    <div class="avatar avatar-status status-offline">
                                      <img src="<?=include_assets('template/ui8/assets/media/avatars/06.jpg'); ?>" class="img-fluid rounded-circle w-auto" alt="">
                                    </div>
                                  </div>

                                  <div class="flex-grow-1 flex-wrap pe-3">
                                    <span class="mb-0 d-block"><strong>Vivianna Kiser
                                      </strong> just posted <span>"Lorem ipsum is placeholder text
                                        used in the graphic, print,
                                        and industries.
                                        "</span></span>
                                    <small class="text-muted">2h Ago</small>
                                  </div>

                                  <!--Unread mark-->
                                  <span class="position-absolute end-0 unread_notification text-primary top-50 translate-middle-y me-3">
                                    <i class="bi bi-circle-fill small"></i>
                                  </span>
                                </a>
                                <div class="px-3 bg-body-tertiary list-group-item text-body-tertiary small">Earlier</div>
                                <!--//Notification item start//-->
                                <a href="#" class="list-group-item list-group-item-action px-4 d-flex align-items-center">
                                  <span class="d-block me-3">
                                    <span
                                      class="d-flex align-items-center justify-content-center lh-1 size-50 bg-success-subtle text-success rounded-circle">
                                      <i class="bi bi-lock"></i>
                                    </span>
                                  </span>

                                  <div class="flex-grow-1 flex-wrap pe-3">
                                    <span class="mb-0 d-block"><strong>Updated</strong> Your account
                                      password updated
                                      succuessfully</span>
                                    <small class="text-muted">2h Ago</small>
                                  </div>
                                </a>
                                <!--//Notification item start//-->
                                <a href="#" class="list-group-item list-group-item-action px-4 d-flex align-items-center">
                                  <span class="d-block me-3">
                                    <span
                                      class="d-flex align-items-center justify-content-center lh-1 size-50 bg-danger-subtle text-danger rounded-circle">
                                      <i class="bi bi-percent"></i>
                                    </span>
                                  </span>

                                  <div class="flex-grow-1 flex-wrap pe-3">
                                    <span class="mb-0 d-block"><strong>Pro discount</strong> Upgrade
                                      to pro plan with 30%
                                      discount, Apply coupon <span class="badge bg-primary">PRO30</span></span>
                                    <small class="text-muted">2h Ago</small>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
                          <a href="#"
                            class="nav-link rounded-pill p-1 lh-1 pe-1 pe-md-2 d-flex align-items-center justify-content-center"
                            aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="d-flex align-items-center">

                              <!--Avatar with status-->
                              <div class="avatar-status status-online me-1 avatar sm">
                                <img src="<?=include_assets('template/ui8/assets/media/avatars/01.jpg'); ?>" class="rounded-circle img-fluid" alt="">
                              </div>
                            </div>
                          </a>

                          <div class="dropdown-menu mt-0 p-0 dropdown-menu-end overflow-hidden">
                            <!--User meta-->
                            <div class="position-relative overflow-hidden p-4 bg-primary-subtle">
                              <div class="position-relative">
                                <h5 class="mb-1">Adam Milne</h5>
                                <p class="text-body-tertiary small mb-0 lh-1">Marketing head</p>
                              </div>
                            </div>
                            <div class="p-2">
                              <a href="profile.html" class="dropdown-item">
                                <i class="bi bi-person-circle opacity-75 fs-5 align-middle me-2"></i>Profile</a>
                              <a href="account-general.html" class="dropdown-item">
                                <i class="bi bi-person-gear fs-5 opacity-75 align-middle me-2"></i>Settings</a>
                              <a href="page-tasks.html" class="dropdown-item">
                                <i class="bi bi-list opacity-75 fs-5 align-middle me-2"></i>Tasks</a>
                              <hr class="mt-3 mb-1">
                              <a href="page-auth-signin.html" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-in-right opacity-75 fs-5 align-middle me-2"></i>
                                Sign out
                              </a>
                            </div>
                          </div>
                        </li>
                        <li
                          class="nav-item dropdown ms-1 ms-lg-3 d-flex d-lg-none align-items-center justify-content-center flex-column h-100">
                          <a href="#"
                            class="nav-link sidebar-trigger-lg-down size-35 p-0 fs-4 d-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-list"></i>
                          </a>
                        </li>
                      </ul>
                    </header>