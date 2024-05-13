<?php

require '../functions.php';

if (isset($_POST['submit'])) {
    if (create($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'peserta.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal ditambahkan!');
                document.location.href = 'peserta.php';
            </script>";
    }
}

// pagination
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM peserta"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

if (isset($_GET['halaman'])) {
    $halamanAktif = $_GET['halaman'];
} else {
    $halamanAktif = 1;
}

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$peserta = query("SELECT * FROM peserta ORDER BY id desc LIMIT $awalData, $jumlahDataPerHalaman");

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
                <a class="nav-link active" href="">
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
                <a class="nav-link" href="orders.html">
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
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">

				    <div class="col-auto d-flex">
              <div class="col-auto">
                <input type="search" class="form-control search-orders" placeholder="Search" name="keyword" id="keyword" autocomplete="off">
              </div>                        
              <select class="form-select w-auto mx-4" >
                <option selected value="option-1">All</option>
                <option value="option-2">This week</option>
                <option value="option-3">This month</option>
                <option value="option-4">Last 3 months</option>
              </select>
            </div><!--//col-->            
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
												<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
											</svg>
									    Tambah Data
									  </a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->			   			    			  				
				
				<div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive" id="containers">
                    <table class="table app-table-hover mb-0 text-left">
                      <thead>
                        <tr>
                          <th class="cell">NO</th>
                          <th class="cell">PRESENSI</th>
                          <th class="cell">NAMA</th>
                          <th class="cell">NIM</th>
                          <th class="cell">UNIT</th>
                          <th class="cell">JENIS</th>
                          <th class="cell">STATUS</th>
                          <th class="cell">AKSI</th>
                          <th class="cell"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($peserta as $row) : ?>
                        <tr>
                          <td class="cell"><?= $no ?></td>
                          <td class="cell"><?= $row['presensi'] ?></td>                          
                          <td class="cell"><?= $row['nama'] ?></td>                          
                          <td class="cell"><?= $row['nim'] ?></td>                          
                          <td class="cell"><?= $row['unitkerja'] ?></td>                          
                          <td class="cell"><?= date('F', strtotime($row['akhir_periode'])) ?></td>
                          <?php 
                            $today = getDate(strtotime(date('Y-m-d')))[0];
                            $tanggal = date("Y-m-d H:i:s", $today); 
                            $finish = getDate(strtotime($row['akhir_periode']))[0];
                            $date = date("Y-m-d H:i:s", $finish);
                          ?>
                          <td class="cell"><span class="<?= ($tanggal < $date) ? 'badge bg-success' : 'badge bg-danger' ?>"><?= ($tanggal < $date) ? 'Aktif' : 'Non Aktif' ?></span></td>
                          <td class="cell">
                            <ion-icon name="ellipsis-vertical-outline" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></ion-icon>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="detail.php?id=<?= $row['id'] ?>">Detail</a></li>
                                <li><a class="dropdown-item delete-item" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a></li>
                            </ul>
                          </td>
                        </tr>	
                        <?php $no++; endforeach; ?>                       
                      </tbody>
                    </table>
                  </div><!--//table-responsive-->						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->

            <!-- Pagination -->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">

                <?php if ($halamanAktif > 1) : ?>
								<li class="page-item">
									<a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>" tabindex="-1">Previous</a>
                </li>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                  <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php else : ?>
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a></li>
                  <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                  <li class="page-item">
                      <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>">Next</a>
                  </li>
                 <?php endif; ?>
							</ul>
						</nav>
						
          </div><!--//tab-pane-->			        			       			        				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->	    	   
	    
    </div><!--//app-wrapper-->  

    <!-- modal insert data peserta -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Peserta Baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="row g-3">
                <div class="mb-3 col-md-5">
                    <label for="presensi" class="form-label">Presensi</label>
                    <input type="text" class="form-control" id="presensi" name="presensi">
                </div>
                <div class="mb-3 col-md-7">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>            
                <div class="mb-3 col-md-5">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>            
                <div class="mb-3 col-md-7">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>            
                <div class="mb-3">
                    <label for="unitkerja" class="form-label">Unit Kerja</label>
                    <input type="text" class="form-control" id="unitkerja" name="unitkerja">
                </div>                                       
                <div class="mb-3">
                    <label for="instansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control" id="instansi" name="instansi">
                </div>            
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan">
                </div> 
                <div class="mb-3">
                    <label for="pembimbing" class="form-label">Pembimbing</label>
                    <input type="text" class="form-control" id="pembimbing" name="pembimbing">
                </div> 
                <div class="mb-3 col-md-6">
                    <label for="awalperiode" class="form-label">Awal Periode</label>
                    <input type="date" class="form-control" id="awalperiode" name="awalperiode">
                </div>            
                <div class="mb-3 col-md-6">
                    <label for="akhirperiode" class="form-label">Akhir Periode</label>
                    <input type="date" class="form-control" id="akhirperiode" name="akhirperiode">
                </div>            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>        
        </div>
    </div>
    </div>
    <!-- end modal create data peserta -->

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
