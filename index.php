<?php
  require '../functions.php';
  $jurusan = query("SELECT jurusan, COUNT(*) as jumlah_peserta FROM peserta GROUP BY jurusan");
  $instansi = query("SELECT instansi, COUNT(*) as jumlah_peserta FROM peserta GROUP BY instansi");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MALEN</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta
      name="description"
      content="Portal - Bootstrap 5 Admin Dashboard Template For Developers"
    />
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
  </head>

  <body class="app">
    <header class="app-header fixed-top">
      <div class="app-header-inner">
        <div class="container-fluid py-2">
          <div class="app-header-content">
            <div class="row justify-content-between align-items-center">

            <!-- burger icon -->
              <div class="col-auto">
                <a
                  id="sidepanel-toggler"
                  class="sidepanel-toggler d-inline-block d-xl-none"
                  href="#"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    viewBox="0 0 30 30"
                    role="img"
                  >
                    <title>Menu</title>
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-miterlimit="10"
                      stroke-width="2"
                      d="M4 7h22M4 15h22M4 23h22"
                    ></path>
                  </svg>
                </a>
              </div>
            <!-- end burger icon -->

              <!--//col-->                        
              <div class="app-utilities col-auto">
                <div class="app-utility-item app-notifications-dropdown dropdown">
                <!-- Notifications -->
                  <a
                    class="dropdown-toggle no-toggle-arrow"
                    id="notifications-dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    title="Notifications"
                  >
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <svg
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      class="bi bi-bell icon"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                      <path
                        fill-rule="evenodd"
                        d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                      />
                    </svg>
                    <span class="icon-badge">3</span> </a
                  ><!--//dropdown-toggle-->

                  <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                    <div class="dropdown-menu-header p-3">
                      <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                    </div>
                    <!--//dropdown-menu-title-->                
                    <!--//dropdown-menu-content-->
                    <div class="dropdown-menu-footer p-2 text-center">
                      <a href="notifications.html">View all</a>
                    </div>
                  </div>
                  <!--//dropdown-menu-->
                </div>

                <div class="app-utility-item app-user-dropdown dropdown">
                  <a
                    class="dropdown-toggle"
                    id="user-dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    ><img src="assets/images/user.png" alt="user profile"
                  /></a>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="user-dropdown-toggle"
                  >
                    <li>
                      <a class="dropdown-item" href="#">Account</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a class="dropdown-item" href="#">Log Out</a>
                    </li>
                  </ul>
                </div>
                <!--//app-user-dropdown-->
              </div>
              <!--//app-utilities-->
            </div>
            <!--//row-->
          </div>
          <!--//app-header-content-->
        </div>
        <!--//container-fluid-->
      </div>
      <!--//app-header-inner-->
      <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
          <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none"
            >&times;</a
          >
          <div class="app-branding">
            <a class="app-logo" href="index.html"
              ><img
                class=""
                src="assets/images/MALEN.png"
                alt="logo"
              /></a
            >
          </div>
          <!--//app-branding-->

          <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
              <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link active" href="index.php">
                  <span class="nav-icon">
                    <svg
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      class="bi bi-house-door"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
                      />
                    </svg>
                  </span>
                  <span class="nav-link-text">Dashboard</span> </a
                ><!--//nav-link-->
              </li>
              <!--//nav-item-->
              <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link" href="peserta/peserta.php">
                  <span class="nav-icon">
                    <svg
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      class="bi bi-folder"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"
                      />
                    </svg>
                  </span>
                  <span class="nav-link-text">Peserta</span> </a
                ><!--//nav-link-->
              </li>
              <!--//nav-item-->
              <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link" href="#">
                  <span class="nav-icon">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <svg
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      class="bi bi-files"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"
                      />
                      <path
                        d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"
                      />
                    </svg>
                  </span>
                  <span class="nav-link-text">Sertifikat</span> </a
                ><!--//nav-link-->
              </li>                                                                    
            </ul>
            <!--//app-menu-->
          </nav>

          <!--//app-nav-->
          <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
              <ul class="app-menu footer-menu list-unstyled">
                <li class="nav-item">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <a class="nav-link" href="settings.html">
                    <span class="nav-icon">
                      <svg
                        width="1em"
                        height="1em"
                        viewBox="0 0 16 16"
                        class="bi bi-gear"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"
                        />
                      </svg>
                    </span>
                    <span class="nav-link-text">Keluar</span> </a
                  ><!--//nav-link-->
                </li>                                
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
          <h1 class="app-page-title">Selamat Datang Admin Human Capital Services</h1>          

          <div class="row g-4 mb-4">
            <div class="col-6 col-lg-6">
              <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 d-flex align-items-center justify-content-around">
                  <img src="assets/images/LEN.png" alt="">
                  <div class="text-start">
                    <h4>Human Capital Services</h4>
                    <span class="mb-1">PT. LEN Industri</span>
                    <div class="">Admin HCS</div>                  
                  </div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
            
            <div class="col-6 col-lg-3">
              <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                  <h4 class="stats-type mb-1">Projects</h4>
                  <div class="stats-figure">23</div>
                  <div class="stats-meta">Open</div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
            <div class="col-6 col-lg-3">
              <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                  <h4 class="stats-type mb-1">Invoices</h4>
                  <div class="stats-figure">6</div>
                  <div class="stats-meta">New</div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
          </div>
          <!--//row-->
          

          <!--//row-->
          <div class="row g-4 mb-4">
            <div class="col-12 col-lg-6">
              <div class="app-card app-card-progress-list h-100 shadow-sm">
                <div class="app-card-header p-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                      <h4 class="app-card-title">Asal Universitas / Sekolah</h4>
                    </div>
                    <!--//col-->
                    <div class="col-auto">
                      <div class="card-header-action">
                        <a href="#">All projects</a>
                      </div>
                      <!--//card-header-actions-->
                    </div>
                    <!--//col-->
                  </div>
                  <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body">
                  <div class="item p-3">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="title mb-1">
                          Project lorem ipsum dolor sit amet
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: 25%"
                            aria-valuenow="25"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                      <!--//col-->
                      <div class="col-auto">
                        <svg
                          width="1em"
                          height="1em"
                          viewBox="0 0 16 16"
                          class="bi bi-chevron-right"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                          />
                        </svg>
                      </div>
                      <!--//col-->
                    </div>
                    <!--//row-->
                    <a class="item-link-mask" href="#"></a>
                  </div>
                  <!--//item-->

                  <div class="item p-3">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="title mb-1">
                          Project duis aliquam et lacus quis ornare
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: 34%"
                            aria-valuenow="34"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                      <!--//col-->
                      <div class="col-auto">
                        <svg
                          width="1em"
                          height="1em"
                          viewBox="0 0 16 16"
                          class="bi bi-chevron-right"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                          />
                        </svg>
                      </div>
                      <!--//col-->
                    </div>
                    <!--//row-->
                    <a class="item-link-mask" href="#"></a>
                  </div>
                  <!--//item-->

                  <div class="item p-3">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="title mb-1">
                          Project sed tempus felis id lacus pulvinar
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: 68%"
                            aria-valuenow="68"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                      <!--//col-->
                      <div class="col-auto">
                        <svg
                          width="1em"
                          height="1em"
                          viewBox="0 0 16 16"
                          class="bi bi-chevron-right"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                          />
                        </svg>
                      </div>
                      <!--//col-->
                    </div>
                    <!--//row-->
                    <a class="item-link-mask" href="#"></a>
                  </div>
                  <!--//item-->

                  <div class="item p-3">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="title mb-1">
                          Project sed tempus felis id lacus pulvinar
                        </div>
                        <div class="progress">
                          <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: 52%"
                            aria-valuenow="52"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                      <!--//col-->
                      <div class="col-auto">
                        <svg
                          width="1em"
                          height="1em"
                          viewBox="0 0 16 16"
                          class="bi bi-chevron-right"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                          />
                        </svg>
                      </div>
                      <!--//col-->
                    </div>
                    <!--//row-->
                    <a class="item-link-mask" href="#"></a>
                  </div>
                  <!--//item-->
                </div>
                <!--//app-card-body-->
              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
            <div class="col-12 col-lg-6">
              <div class="app-card app-card-stats-table h-100 shadow-sm">
                <div class="app-card-header p-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                      <h4 class="app-card-title">Jurusan</h4>
                    </div>
                    <!--//col-->
                    <div class="col-auto">
                      <div class="card-header-action">
                        <a href="#">View report</a>
                      </div>
                      <!--//card-header-actions-->
                    </div>
                    <!--//col-->
                  </div>
                  <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                  <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <thead>
                        <tr>
                          <th class="meta">Source</th>
                          <th class="meta stat-cell">Views</th>
                          <th class="meta stat-cell">Today</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="#">google.com</a></td>
                          <td class="stat-cell">110</td>
                          <td class="stat-cell">
                            <svg
                              width="1em"
                              height="1em"
                              viewBox="0 0 16 16"
                              class="bi bi-arrow-up text-success"
                              fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"
                              />
                            </svg>
                            30%
                          </td>
                        </tr>
                        <tr>
                          <td><a href="#">getbootstrap.com</a></td>
                          <td class="stat-cell">67</td>
                          <td class="stat-cell">23%</td>
                        </tr>
                        <tr>
                          <td><a href="#">w3schools.com</a></td>
                          <td class="stat-cell">56</td>
                          <td class="stat-cell">
                            <svg
                              width="1em"
                              height="1em"
                              viewBox="0 0 16 16"
                              class="bi bi-arrow-down text-danger"
                              fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"
                              />
                            </svg>
                            20%
                          </td>
                        </tr>
                        <tr>
                          <td><a href="#">javascript.com </a></td>
                          <td class="stat-cell">24</td>
                          <td class="stat-cell">-</td>
                        </tr>
                        <tr>
                          <td><a href="#">github.com </a></td>
                          <td class="stat-cell">17</td>
                          <td class="stat-cell">15%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//container-fluid-->
      </div>
      <!--//app-content-->
      
    </div>
    <!--//app-wrapper-->

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
  </body>
</html>
