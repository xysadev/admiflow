
<header class="navbar py-0 page-header border-bottom navbar-expand navbar-light px-4">
                      <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                          <!--Sidebar-icon-->
                          <span class="sidebar-icon bg-primary rounded-circle size-40 text-white">
                           <!-- <img src=""> -->
                          </span>
                        </div>
                      </a>
                      <ul class="navbar-nav d-flex align-items-center h-100">
                        <li class="nav-item d-none d-lg-flex flex-column h-100 me-lg-2 align-items-center justify-content-center">
                          <a href="javascript:void(0)"
                            class="sidebar-trigger nav-link rounded-3 size-35 d-flex align-items-center justify-content-center p-0">
                             <i class="bi bi-arrow-bar-left fs-5"></i></a>
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
       
         
                        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
                          <a href="#"
   class="nav-link d-flex align-items-center"
   data-bs-toggle="dropdown"
   data-bs-auto-close="outside"
   aria-expanded="false">
   <span class="fw-semibold">Cuenta</span>
   <i class="bi bi-caret-down-fill ms-1"></i>
</a>

                          <div class="dropdown-menu mt-0 p-0 dropdown-menu-end overflow-hidden">
                            <!--User meta-->
                            <div class="position-relative overflow-hidden p-4 bg-primary-subtle">
                              <div class="position-relative">
                                <h5 class="mb-1" id="userNameHeader"></h5>
                                <p class="text-body-tertiary small mb-0 lh-1" id="userRole"></p>
                              </div>
                            </div>
                            <div class="p-2">
                              <a href="profile.html" class="dropdown-item">
                                <i class="bi bi-person-circle opacity-75 fs-5 align-middle me-2"></i>Profile</a>
                              <a href="account-general.html" class="dropdown-item">
                                <i class="bi bi-person-gear fs-5 opacity-75 align-middle me-2"></i>Settings</a>
                           
                              <hr class="mt-3 mb-1">
                              <a href="#" id="logout-link" class="dropdown-item d-flex align-items-center">
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