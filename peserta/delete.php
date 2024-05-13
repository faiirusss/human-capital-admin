<?php

require '../functions.php';

$id = $_GET['id'];

if (delete($id) > 0) {
  echo "
    <script>
      alert('data berhasil di hapus');
      document.location.href = 'peserta.php';
    </script>
    ";
} else {
  echo "
    <script>
      alert('data gagal di hapus');
      document.location.href = 'peserta.php';
    </script>
    ";
}