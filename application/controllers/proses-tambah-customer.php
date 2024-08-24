<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db_inventori';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Include itu fungsinya untuk mengimpor fungsi/perintah/kode yang sudah kita buat pada suatu file

// Ini variabel untuk mengambil/menarik data dari form-parcel.php
$username = $_POST['username_customer'];
$password = $_POST['password_customer'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// $level = $_POST['level'];

// Buat masukkin/mengirim data ke database
$sql = "INSERT INTO customer (username_customer, password_customer, kode, nama, email, alamat, telepon) 
VALUES ('$username', '$password', '$kode','$nama','$email','$alamat','$telepon')";
//Coba perhatikan kode di atas baik-baik, ini statement untuk memasukkan data ke dalam tabel dari matkul basis data


if (mysqli_query($con, $sql)) {
    header("Location: login.php"); // perintah untuk kembali ke index.php kalau data berhasil tersimpan ke database
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con); // perintah untuk menampilkan pesan error kalau data gagal tersimpan
}

// Perintah untuk menutup/keluar dari database
mysqli_close($con);
?>
