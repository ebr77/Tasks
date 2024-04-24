 <!-- TASK 2 -->
 
<?php

///// 1) Cıktı: Apple
session_start();
$array[] = "Pie";
$array[] = "Banana";
$array[] = "Apple";
$array[] = "Strawberry";

echo $array[2];


////// 2) Veritabanina baglanma
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Hata raporlamasını etkinleştir
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Veritabanına başarıyla bağlandı";
} catch(PDOException $e) {
    echo "Veritabanına bağlanılamadı: " . $e->getMessage();
}


///// 3) Kullanicinin tarayici ve işletim sistemi bilgilerini almak
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    echo $user_agent;
} else {
    echo "Tarayıcı bilgisi bulunamadı.";
}


///// 4) Sessionda tekli oturumu silmek / yok etmek
session_unset();
session_destroy();


///// 5) İlk uc karakter. Cikti : Ebr
$string = "Ebru";
$ilk_uc_karakter = substr($string, 0, 3);
echo $ilk_uc_karakter; 


///// 6) Kullaniciyi baska bir sayfaya yonlendir
header("Location: file11.php");
exit;


///// 7) SQL: 2 tarih arasindaki verileri listelemek
$sql = "SELECT * FROM users WHERE DOB BETWEEN '1980-07-07' AND '1990-04-04'";
$result = $conn->query($sql);


///// 8) Cikti: doğru
$var = 0;
if(empty($var)):
echo "doğru";
endif;


///// 9) PHP dosyasının bilgilerini içeren kod
phpinfo();


///// 10) POST ile gelen dosyayi yukleme

$dosya_adi = $_FILES['dosya']['name'];
$gecici_dosya = $_FILES['dosya']['tmp_name'];
$hedef_dosya = 'uploads/' . $dosya_adi;

if (move_uploaded_file($gecici_dosya, $hedef_dosya)) {
    echo "Dosya başarıyla yüklendi.";
} else {
    echo "Dosya yükleme hatası.";
}




