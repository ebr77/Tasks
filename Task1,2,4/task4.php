 <!-- TASK 4 -->
 
<?php

///// TASK 1

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veritabani_adi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

$sql = "SELECT urun_id, grup_adi, urun_adi, birimi, guncel_stok FROM tablo";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>Ürün ID</th><th>Grup Adı</th><th>Ürün Adı</th><th>Birimi</th><th>Güncel Stok</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["urun_id"] . "</td>";
        echo "<td>" . $row["grup_adi"] . "</td>";
        echo "<td>" . $row["urun_adi"] . "</td>";
        echo "<td>" . $row["birimi"] . "</td>";
        echo "<td>" . $row["guncel_stok"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 sonuç";
}

$conn->close();
?>


<!-- TASK 2 -->
///// I am writing this code as question 1 and question 2 not releated

SELECT u_list.id AS urun_id, k_list.grup_adi, u_list.urun_adi, 
u_list.urun_birimi AS birimi,
g_list.giren_stok - c_list.cikan_stok AS guncel_stok
FROM u_list
INNER JOIN k_list ON u_list.grup_id = k_list.id
LEFT JOIN g_list ON u_list.id = g_list.urun_id
LEFT JOIN c_list ON u_list.id = c_list.urun_id


<?php
///// TASK 3

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Kullanıcı adı ve şifreyi kontrol et
    if($kullanici_adi == "admin" && $sifre == "password") {
        $_SESSION['login_user'] = $kullanici_adi; // Oturum başlat
        header("location: welcome.php"); // Yönlendir
    } else {
        $error = "Kullanıcı adı veya şifre yanlış!";
    }
}


?>

<form method="post" action="">
    Kullanıcı Adı: <input type="text" name="kullanici_adi"><br>
    Şifre: <input type="password" name="sifre"><br>
    <input type="submit" value="Giriş">
</form>

 <!-- TASK 4 -->

<?php
// Birinci array - Key değerleri olan
$arrayWithKeys = array(
    "name" => "John",
    "age" => 30,
    "city" => "New York"
);

// İkinci array - Key değerleri olmayan
$arrayWithoutKeys = array("Jane", 25, "Los Angeles");

// Yeni dizi oluşturma ve verileri ekleme
$newArray = array();
$newArray['with_keys'] = $arrayWithKeys;
$newArray['without_keys'] = $arrayWithoutKeys;

// Yeni diziyi yazdırma
print_r($newArray);

// Veri ekleyelim
$newArray['with_keys']['job'] = "Engineer";
$newArray['without_keys'][] = "Developer";

// Güncellenmiş diziyi tekrar yazdıralım
echo "<br><br>Yeni dizi (veri eklenmiş):<br>";
print_r($newArray);

?>


 <!-- TASK 5 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <button id="disableUserBtn" class="btn btn-danger">Kullanıcı Durumunu Devre Dışı Bırak</button>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Button click event
            $('#disableUserBtn').click(function() {
                // AJAX request to disable user status
                $.ajax({
                    url: 'disable_user.php', // Hata mesajı
                    type: 'GET',
                    success: function(response) {
                        alert('Kullanıcı durumu başarıyla devre dışı bırakıldı.');
                    },
                    error: function(xhr, status, error) {
                        alert('Bir hata oluştu: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>

