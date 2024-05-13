<?php

require '../functions.php';

$id = $_GET["id"];

$peserta = query("SELECT * FROM peserta WHERE id = $id");
$setoran_peserta = query("SELECT * FROM setoran WHERE peserta_id = $id");
$penilaian_peserta = query("SELECT * FROM penilaian WHERE peserta_id = $id");

if (isset($_POST["submit"])) {
    if (setoran($_POST) > 0) {
        echo "<script>
                alert('data berhasil disimpan!');
                document.location.href = 'detail.php?id=$id';
            </script>";
    } else {
        echo "<script>
                alert('data gagal disimpan!');
                document.location.href = 'detail.php?=id=$id';
            </script>";
    }
}

if (isset($_POST["kunci"])) {
    if(penilaian($_POST) > 0) {
        echo "<script>
                alert('data berhasil disimpan!');
                document.location.href = 'detail.php?id=$id';
            </script>";
    } else {
        
        echo "<script>
                alert('data gagal disimpan!');
                document.location.href = 'detail.php?id=$id';
            </script>";

    }
}

// ======================================================== 
// Setoran
$hafalansurat = '';
$niatsolat = '';
$iftitah = '';
$rukuk = '';
$itidal = '';
$sujud = '';
$duduk2sujud = '';
$tahiyat = '';
$pancasila = '';
$uud = '';
$laguwajib = '';

if ($setoran_peserta > 0)
{
    foreach ($setoran_peserta as $row)
    {
        $hafalansurat = $row["hafalan_surat"];
        $niatsolat = $row["niatsolat"];
        $iftitah = $row["iftitah"];
        $rukuk = $row["rukuk"];
        $itidal = $row["itidal"];
        $sujud = $row["sujud"];
        $duduk2sujud = $row["duduk2sujud"];
        $tahiyat = $row["tahiyat"];
        $pancasila = $row["pancasila"];
        $uud = $row["uud"];
        $laguwajib = $row["laguwajib"];
    }
}

// ========================================================
// Penilaian
$penugasan = '';
$memecahkan_masalah = '';
$keterampilan_teknis = '';
$kualitas_kerja = '';
$ketepatan_waktu = '';
$kejujuran = '';
$kedisiplinan = '';
$tanggung_jawab = '';
$motivasi = '';
$inisiatif = '';
$kerjasama_tim = '';
$interaksi_sosial = '';

if($penilaian_peserta > 0)
{
    foreach($penilaian_peserta as $row)
    {
        $penugasan = $row["penugasan"];
        $memecahkan_masalah = $row["memecahkan_masalah"];
        $keterampilan_teknis = $row["keterampilan_teknis"];
        $kualitas_kerja = $row["kualitas_kerja"];
        $ketepatan_waktu = $row["ketepatan_waktu"];
        $kejujuran = $row["kejujuran"];
        $kedisiplinan = $row["kedisiplinan"];
        $tanggung_jawab = $row["tanggung_jawab"];
        $motivasi = $row["motivasi"];
        $inisiatif = $row["inisiatif"];
        $kerjasama_tim = $row["kerjasama_tim"];
        $interaksi_sosial = $row["interaksi_sosial"];
    }
}

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
    <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css" />
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
                    ><img src="../assets/images/user.png" alt="user profile"
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
                src="../assets/images/MALEN.png"
                alt="logo"
              /></a
            >
          </div>
          <!--//app-branding-->

          <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
              <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link" href="../index.php">
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
                <a class="nav-link active" href="peserta.php">
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
					<div class="container">
          <main class="py-5">
            <div class="row g-5">
              <div class="col-md-5 col-lg-4">
                <div class="card mb-3 text-center p-3">
                  <img src="../assets/images/foto.png" class="mx-auto" width="150" />
                  <div class="my-3">
                    <?php foreach ($peserta as $row) :?>
                    <h5><?php echo $row['nama']; ?></h5>
                    <?php endforeach; ?>
                    <span class="d-block">Kerja Praktek (KP)</span>
                    <span>Human Capital Services</span>
                  </div>
                </div>

                <div class="card p-2 text-center">
                  <h6 style="color: #3badff">Data Peserta</h6>
                  <a class="text-decoration-none text-dark" href=""
                    >Setor Hafalan</a
                  >
                  <a class="text-decoration-none text-dark" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    >Penilaian Magang</a
                  >
                </div>
              </div>


              <div class="col-md-7 col-lg-8">
                <div class="card needs-validation" novalidate>
                  <h5 class="text-secondary ps-3 pt-3">Data Diri</h5>
                  <hr class="my-0 mx-auto" width="95%"/>                                    
                  
                  <div class="container overflow-hidden text-center">                    
                    <div class="row gy-1">

                      <?php foreach ($peserta as $row) :?>
                      <div class="col-6">
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>Nama Lengkap</strong></h6>
                          <span class="text-secondary"><?php echo $row['nama']; ?></span>
                        </div>
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>NIM/NIS</strong></h6>
                          <span class="text-secondary"><?php echo $row['nim']; ?></span>
                        </div>
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>Pembimbing</strong></h6>
                          <span class="text-secondary"><?php echo $row['pembimbing']; ?></span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>Asal Instansi</strong></h6>
                          <span class="text-secondary"><?php echo $row['instansi']; ?></span>
                        </div>
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>Jurusan</strong></h6>
                          <span class="text-secondary"><?php echo $row['jurusan']; ?></span>
                        </div>
                        <div class="p-1 pt-3 text-start">
                          <h6><strong>No. Presensi</strong></h6>
                          <span class="text-secondary"><?php echo $row['presensi']; ?></span>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <hr>
                      
                      <div class="col-6">
                        <h5 class="text-secondary text-start">Setoran</h5>
                        <hr>
                        <div class="p-2 border bg-light">
                          <form action="" method="post">                                    
                          <!-- hafalan surat -->                                    
                          <div class="mb-3 d-flex justify-content-between">
                              <div class="flex">
                                  <label class="form-check-label text-black" for="hafalansurat"><strong>Hafalan Surat</strong></label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="hafalansurat" name="hafalansurat" value="1" <?php echo ($hafalansurat == 1) ? 'checked' : ''; ?> >
                              </div>
                          </div>

                          <!-- bacaan shalat -->
                          <p class="d-flex"><strong>Bacaan Shalat</strong></p>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="niatsolat">Niat Sholat 5 Waktu</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="niatsolat" name="niatsolat" value="1" <?php echo ($niatsolat == 1) ? 'checked' : ''; ?> >
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="iftitah">Do'a Iftitah</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="iftitah" name="iftitah" value="1" <?php echo ($iftitah == 1) ? 'checked' : ''; ?> >
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="rukuk">Rukuk</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="rukuk" name="rukuk" value="1" <?php echo ($rukuk == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="itidal">I'tidal</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="itidal" name="itidal" value="1" <?php echo ($itidal == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="sujud">Sujud</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="sujud" name="sujud" value="1" <?php echo ($sujud == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="duduksujud">Duduk diantara 2 sujud</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="duduksujud" name="duduksujud" value="1" <?php echo ($duduk2sujud == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-3 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="tahiyat">Tahiyat</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="tahiyat" name="tahiyat" value="1" <?php echo ($tahiyat == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>

                          <!-- wawasan kebangsaan -->
                          <p class="d-flex"><strong>Wawasan kebangsaan</strong></p>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="pancasila">Pancasila</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="pancasila" name="pancasila" value="1" <?php echo ($pancasila == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="uud">UUD 1945</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="uud" name="uud" value="1" <?php echo ($uud == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                          <div class="mb-1 d-flex justify-content-between">
                              <div class="">
                                  <label class="form-check-label ps-2" for="laguwajib">Lagu Wajib Nasional</label>
                              </div>
                              <div>
                                  <input type="checkbox" class="form-check-input" id="laguwajib" name="laguwajib" value="1" <?php echo ($laguwajib == 1) ? 'checked' : ''; ?>>
                              </div>                                        
                          </div>
                        </div>
                        
                      </div>      
                      <div class="col-6">
                          <h5 class="text-secondary text-start">Nilai Magang</h5>
                          <hr>
                          <div class="p-2 border bg-light">
                            <p class="d-flex"><strong>Pengetahuan</strong></p>
                            <div class="d-flex justify-content-between">
                                <div>Penugasan/Pengetahuan Bidan Kerja</div>
                                <h6><?php echo ($penugasan) ? $penugasan : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Kemampuan Memecahkan Masalah</div>
                                <h6><?php echo ($memecahkan_masalah) ? $memecahkan_masalah : '0'; ?></h6>
                            </div>

                            <p class="d-flex"><strong>Pengetahuan</strong></p>
                            <div class="d-flex justify-content-between">
                                <div>Keterampilan Teknis</div>
                                <h6><?php echo ($keterampilan_teknis) ? $keterampilan_teknis : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Kualitas/Mutu Hasil Kerja</div>
                                <h6><?php echo ($kualitas_kerja) ? $kualitas_kerja : '0' ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Ketepatan Waktu Penyelesaian</div>
                                <h6><?php echo ($ketepatan_waktu) ? $ketepatan_waktu : '0'; ?></h6>
                            </div>

                            <p class="d-flex"><strong>Pengetahuan</strong></p>
                            <div class="d-flex justify-content-between">
                                <div>Kejujuran</div>
                                <h6><?php echo ($kejujuran) ? $kejujuran : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Kedisiplinan</div>
                                <h6><?php echo ($kedisiplinan) ? $kedisiplinan : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Tanggung Jawab</div>
                                <h6><?php echo ($tanggung_jawab) ? $tanggung_jawab : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Motivasi</div>
                                <h6><?php echo ($motivasi) ? $motivasi : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Inisiatif</div>
                                <h6><?php echo ($inisiatif) ? $inisiatif : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Kerjasama Tim</div>
                                <h6><?php echo ($kerjasama_tim) ? $kerjasama_tim : '0'; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Interaksi Sosial</div>
                                <h6><?php echo ($interaksi_sosial) ? $interaksi_sosial : '0'; ?></h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <hr>
                  <div class="d-flex justify-content-between p-3">
                    <button class="btn btn-danger text-white">Kembali</button>
                    <button class="btn btn-primary text-white" type="submit" name="submit">
                      Simpan
                    </button>   
                  </div>
                </form>
                  
                </div>
              </div>
            </div>
          </main>      
        </div>					        			       			        				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->	    	   
	    
    </div><!--//app-wrapper-->  

    <!-- modal penilaian -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Penilaian Magang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <h6>Pengetahuan</h6>
                            <div class="d-flex justify-content-between mb-1 ps-2">
                                <label for="penugasan" class="col-form-label">Penugasan/ Pengetahuan Bidang Kerja</label>
                                <input type="text" id="penugasan" name="penugasan" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between mb-4 ps-2">
                                <label for="memecahkan_masalah" class="col-form-label">Kemampuan Memecahkan Masalah</label>
                                <input type="text" id="memecahkan_masalah" name="memecahkan_masalah" class="form-control w-25 h-25">
                            </div>
                        <h6>Pengetahuan</h6>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="keterampilan_teknis" class="col-form-label">Keterampilan Teknis</label>
                                <input type="text" id="keterampilan_teknis" name="keterampilan_teknis" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="kualitas_kerja" class="col-form-label">Kualitas/Mutu Hasil Kerja</label>
                                <input type="text" id="kualitas_kerja" name="kualitas_kerja" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between mb-4 ps-2">
                                <label for="ketepatan_waktu" class="col-form-label">Ketepatan Waktu Penyelesaian Pekerjaan</label>
                                <input type="text" id="ketepatan_waktu" name="ketepatan_waktu" class="form-control w-25 h-25">
                            </div>
                        <h6>Pengetahuan</h6>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="kejujuran" class="col-form-label">Kejujuran</label>
                                <input type="text" id="kejujuran" name="kejujuran" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="kedisiplinan" class="col-form-label">Kedisiplinan</label>
                                <input type="text" id="kedisiplinan" name="kedisiplinan" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="tanggung_jawab" class="col-form-label">Tanggung Jawab</label>
                                <input type="text" id="tanggung_jawab" name="tanggung_jawab" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="motivasi" class="col-form-label">Motivasi</label>
                                <input type="text" id="motivasi" name="motivasi" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="inisiatif" class="col-form-label">Inisiatif</label>
                                <input type="text" id="inisiatif" name="inisiatif" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="kerjasama_tim" class="col-form-label">Kerjasama Tim</label>
                                <input type="text" id="kerjasama_tim" name="kerjasama_tim" class="form-control w-25 h-25">
                            </div>
                            <div class="d-flex justify-content-between ps-2">
                                <label for="interaksi_sosial" class="col-form-label">Interaksi Sosial</label>
                                <input type="text" id="interaksi_sosial" name="interaksi_sosial" class="form-control w-25 h-25">
                            </div>

                            <div class="mt-5 d-flex justify-content-end">
                                <button class="btn btn-primary" type="kunci" name="kunci">Kunci</button>
                            </div>
                    </form>
                </div>                
                </div>
            </div>
        </div>
    <!-- end modal -->

    <!-- jquery ajax -->
    <script src="jquery-3.7.0.min.js"></script>
    <script src="ajax.js"></script>

    <!-- Javascript -->
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
