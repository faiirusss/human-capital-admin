<?php

require '../functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM peserta
            WHERE
            nama LIKE '%$keyword%' OR 
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR           
            presensi LIKE '%$keyword%' OR            
            unitkerja LIKE '%$keyword%' OR
            instansi LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR 
            pembimbing LIKE '%$keyword%' OR
            awal_periode LIKE '%$keyword%' OR
            akhir_periode LIKE '%$keyword%'
            ORDER BY id DESC
            ";

$peserta = query($query);

?>

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