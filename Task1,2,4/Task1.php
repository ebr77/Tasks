<!-- Task 1 -->
<!-- ProjectID sütununu "projects" table'ından, "users" table'na çektim -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
</head>
<body>
    <div class="container mt-4">
        <h2>User Data</h2>
        <table id="userTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>TC</th>
                    <th>Phone</th>
                    <th>Date Of Birth</th>
                    <th>Project ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Veritabanı bağlantısı
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "users";


                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
                }

                // Kullanıcı verilerini al
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Surname"] . "</td>";
                            echo "<td>" . $row["TC"] . "</td>";
                            echo "<td>" . $row["Phone"] . "</td>";
                            echo "<td>" . $row["DOB"] . "</td>";
                            echo "<td>" . $row["ProjectID"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 sonuç";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
