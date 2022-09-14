<?php

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "arsip_surat";

  $koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  // Check connection
  if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
  }
?> 