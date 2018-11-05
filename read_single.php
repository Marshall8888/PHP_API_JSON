<?php
 include "koneksi.php";
 
$sukses = true;
$pesan = '';
$kode = '';
$id = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(!empty($id)){
$query = mysqli_query($koneksi, "SELECT * FROM class_profile where id='$id'");
if(mysqli_num_rows($query)>0){
    $sukses = true;
    $pesan = "Jadi Cuy";
    $kode = 1010;
  }
  else{
    $sukses = false;
    $pesan = "Gagal";
    $kode = 911;
  }
};
$respon = array();
$respon["success"] = $sukses;
$respon["data"] = array();
$respon["message"] = $pesan;
$respon["code"] = $kode;
while($row = mysqli_fetch_assoc($query)){
  $data['id'] = $row["id"];
  $data['username'] = $row["username"];
  $data['password'] = $row["password"];
  $data['level'] = $row["level"];
  $data['fullname'] = $row["fullname"];
array_push($respon["data"],$data);
}
echo json_encode($respon);