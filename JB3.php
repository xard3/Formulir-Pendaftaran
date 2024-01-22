<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses data formulir saat dikirim
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $usia = $_POST["usia"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $sekolah_asal = $_POST["sekolah_asal"];
    $provinsi = $_POST["provinsi"];
    $kabupaten = $_POST["kabupaten"];
    $kecamatan = $_POST["kecamatan"];
    $alamat_rumah = $_POST["alamat_rumah"];

    // Validasi data (bisa ditambahkan validasi tambahan sesuai kebutuhan)
    $error = false;
    $pesan_error = "";

    // Validasi NISN hanya berisi angka
    if (!is_numeric($nisn)) {
        $error = true;
        $pesan_error .= "NISN harus berisi angka. ";
    }

    // Validasi usia hanya berisi angka
    if (!is_numeric($usia)) {
        $error = true;
        $pesan_error .= "Usia harus berisi angka. ";
    }

    if (empty($nisn) || empty($nama) || empty($email) || empty($usia) || empty($jenis_kelamin) || empty($tanggal_lahir) || empty($tempat_lahir) || empty($sekolah_asal) || empty($provinsi) || empty($kabupaten) || empty($kecamatan) || empty($alamat_rumah)) {
        $error = true;
        $pesan_error .= "Semua kolom harus diisi. ";
    }

    // Jika tidak ada kesalahan, simpan data ke database atau lakukan tindakan lainnya
    if (!$error) {
        // Simpan data ke database (contoh: tidak disertakan untuk kesederhanaan)
        $pesan_sukses = "Pendaftaran berhasil! Data Anda telah disimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru SMKN 2 Bangkalan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z" /></svg>') no-repeat right 10px center;
            background-size: 20px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Siswa Baru SMKN 2 Bangkalan</h2>

        <?php
        if (isset($pesan_sukses)) {
            echo '<p class="success">' . $pesan_sukses . '</p>';
        } else {
            if (isset($pesan_error)) {
                echo '<p class="error">' . $pesan_error . '</p>';
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="nisn">NISN:</label>
                <input type="text" name="nisn" id="nisn" pattern="\d+" title="Hanya angka yang diperbolehkan" required>

                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="usia">Usia:</label>
                <input type="number" name="usia" id="usia" pattern="\d+" title="Hanya angka yang diperbolehkan" required>

                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>

                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>

                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required>

                <label for="sekolah_asal">Sekolah Asal:</label>
                <input type="text" name="sekolah_asal" id="sekolah_asal" required>

                <label for="provinsi">Provinsi:</label>
                <input type="text" name="provinsi" id="provinsi" required>

                <label for="kabupaten">Kabupaten:</label>
                <input type="text" name="kabupaten" id="kabupaten" required>

                <label for="kecamatan">Kecamatan:</label>
                <input type="text" name="kecamatan" id="kecamatan" required>

                <label for="alamat_rumah">Alamat Rumah:</label>
                <textarea name="alamat_rumah" id="alamat_rumah" rows="4" required></textarea>

                <button type="submit">Daftar</button>
            </form>

            <?php
        }
        ?>
    </div>
</body>
</html>
