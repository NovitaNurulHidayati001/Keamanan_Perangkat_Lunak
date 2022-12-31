<?php

require_once('koneksi.php');

if (empty($_GET)) {
  $query = mysqli_query($connection, "SELECT * FROM data");

  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
      'id_buku' => $row['id_buku'],
      'nama_buku' => $row['nama_buku'],
      'penulis' => $row['penulis'],
      'harga' => $row['harga'],
    ));
  }

  echo json_encode(
    array('RIO BOOK STORE' => $result)
  );
} else {
  $query = mysqli_query($connection, "SELECT * FROM data WHERE id=" . $_GET['id']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result = array(
      'id_buku' => $row['id_buku'],
      'nama_buku' => $row['nama_buku'],
      'penulis' => $row['penulis'],
      'harga' => $row['harga'],
    );
  }

  echo json_encode(
    $result
  );
}