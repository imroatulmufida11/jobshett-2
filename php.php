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
    echo "<ul>";
    for ($i = 0; $i < count($jadwal_hari_ini); $i++) {
        echo "<li>$jadwal_hari_ini[$i]</li>";
    }
    echo "</ul>";
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

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin-bottom: 5px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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