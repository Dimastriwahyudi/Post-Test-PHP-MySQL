<?php
// Koneksi ke MySQL server
$servername = "localhost";
$username = "root";
$password = "";

// Buat koneksi
$koneksi = mysqli_connect($servername, $username, $password);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat database baru
$databaseName = "dbpost";
$sqlCreateDatabase = "CREATE DATABASE $databaseName";

if (mysqli_query($koneksi, $sqlCreateDatabase)) {
    echo "Database '$databaseName' berhasil dibuat<br>";
} else {
    echo "Gagal membuat database: " . mysqli_error($koneksi) . "<br>";
}

// Memilih database yang baru dibuat
mysqli_select_db($koneksi, $databaseName);

// Membuat tabel di dalam database
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS datadiri (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    nohp VARCHAR(13),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

  if (mysqli_query($koneksi, $sqlCreateTable)) {
    echo "Tabel 'datadiri' berhasil dibuat<br>";
  } else {
    echo "Gagal membuat tabel: " . mysqli_error($koneksi) . "<br>";
  }

// INSERT data ke dalam tabel
$sqlInsertData = "INSERT INTO datadiri (nama, email, nohp) 
                  VALUES ('Arif Muhammad', 'MuhammadArif@Gmail.com', '08258880213'),
                         ('Budi Setiawan', 'budi.setiawan@Gmail.com', '081234567890'),
                         ('Anisa Putrianto', 'anisa.putrianto@Gmail.com', '087654321098'),
                         ('Rizky Cahyono', 'rizky.cahyono@Gmail.com', '089012345678'),
                         ('Nanda Pratama', 'nanda.pratama@Gmail.com', '085432109876')";

      if (mysqli_query($koneksi, $sqlInsertData)) {
              echo "Data berhasil disisipkan ke dalam tabel<br>";
      } else {
              echo "Gagal saat menyisipkan data: " . mysqli_error($koneksi) . "<br>";
      }

// Update data di dalam tabel
$sqlUpdateData = "UPDATE datadiri SET email='Muhammad.Arif@example.com' WHERE id=1";

    if(mysqli_query($koneksi, $sqlUpdateData)) {
        echo "Data berhasil diperbarui di dalam tabel<br>";
    } else {
        echo "Gagal saat memperbarui data: " . mysqli_error($koneksi) . "<br>";
    }

        mysqli_close($koneksi);
?>
