<?php
// Fungsi untuk menampilkan jadwal piket berdasarkan hari
function tampilkanJadwal($hari) {
    switch ($hari) {
        case 'Senin':
            $jadwal = ["Muhajir", "Reza", "Lutfi","Rara","Livy"];
            break;
        case 'Selasa':
            $jadwal = ["Alfan", "Azril","Firda","Lina","Iqbal"];
            break;
        case 'Rabu':
            $jadwal = ["Iben", "Rehan","Ima","Zami"];
            break;
        case 'Kamis':
            $jadwal = [ "Rifki", "Dandy", "Fida","Sidiq"];
            break;
        case 'Jumat':
            $jadwal = ["Dika", "Daniya", "Lia","Daniel"];
            break;
        default:
            $jadwal = [];
            echo "Hari tidak tersedia\n";
    }

    return $jadwal;
}

// Main program
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hari_ini = isset($_POST['hari']) ? $_POST['hari'] : '';
} else {
    $hari_ini = date('l');
}

echo "<h2>Jadwal piket untuk hari ini ($hari_ini):</h2>";

$jadwal_hari_ini = tampilkanJadwal($hari_ini);

if (!empty($jadwal_hari_ini)) {
    echo "<table border='1'>";
    echo "<tr><th>No</th><th>Nama</th></tr>";
    for ($i = 0; $i < count($jadwal_hari_ini); $i++) {
        echo "<tr><td>" . ($i+1) . "</td><td>$jadwal_hari_ini[$i]</td></tr>";
    }
    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Piket kelas XI PPLG1</title>
    <style>
        /* Masukkan style CSS di sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }
        select {
            padding: 8px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<!-- Form untuk memilih hari -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="hari">Pilih Hari:</label>
    <select name="hari" id="hari">
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
    </select>
    <button type="submit">Tampilkan Jadwal</button>
</form>

</body>
</html>