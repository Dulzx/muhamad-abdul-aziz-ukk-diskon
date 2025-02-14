<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f1f3fb;
        font-family: 'Arial' sans-serif;
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form-container {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }
    .header {
        background-color: #5a4db2;
        border-radius: 15px;
        padding: 20px;
        text-align: left;
        margin-bottom: 20px;
        position: relative;
    }
    .header img {
        width: 50px;
        height: 50px;
        border-radius: 50px;
        position: absolute;
        top: 10px;
        right: 15px;
    }
    .header h2 {
        color: #ffffff;
        font-weight: bold;
        margin: 0;
    }
    .header p {
        color: #ffffff;
        margin: 5px 0 0;
    }
    .form-label {
        color: #5a4db2;
        font-weight: bold;
    }
    .btn-custom {
        background-color: #6a5acd;
        color: #ffffff;
        border-radius: 10px;
        padding: 10px;
        font-weight: bold;
        margin-bottom: 20px;
        border: none;
    }
    .btn-custom:nth-of-type(2) {
        background-color: #f6d312;
    }
    #resetButton {
        background-color: #df1b05;
    }
    .btn-custom:hover {
        background-color: #5a4db2;
    }
    .terms {
        color: #7f8c8d;
        font-size: 12px;
        text-align: center;
        margin-bottom: 20px;
    }
    .terms a {
        color: #6a5acd;
        text-decoration: none;
    }
    .result-container {
        background-color: #5a4db2;
        color: #ffffff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="form-container">
        <div class="header">
            <img src="diskon.png" alt="logo">
            <h2>Selamat Datang Di</h2>
            
            <h2>Aplikasi Perhitungan Diskon</h2>
            <p>Diskon akurat, dompet tetap aman!</p>
        </div>
        <form method="POST">
            <label class="form-label">Harga Barang (Rp.)</label>
            <input type="number" name="harga" class="form-control mb-3" step="0.01" placeholder="Masukan harga barang!" min="0" autocomplete="off" required>
            <label class="form-label">Harga Diskon (%)</label>
            <input type="number" name="diskon" class="form-control mb-3" step="0.01" placeholder="Masukan diskon (0-100)!" min="0" autocomplete="off" required>
            <div class="d-flex justify-content-between">
                <button type="submit" name="hitung" class="btn btn-custom me-2 w-50">Hitung</button>
                <button type="reset" class="btn btn-custom w-50">Mengulang</button>
            </div>
        </form>
        <div id="hasil">
            <?php
            if(isset($_POST['hitung'])){
                $harga = $_POST['harga'];
                $diskon = $_POST['diskon'];

                if($harga < 0){
                    echo "<script>alert('Harga barang tidak boleh negatif!')</script>";
                }elseif($diskon < 0 || $diskon > 100){
                    echo "<script>alert('Diskon harus 0-100!')</script>";
                }else{
                    $nilai_diskon = $harga * ($diskon/100);
                    $total_harga = $harga - $nilai_diskon; ?>

                    <div class="result-container">
                        <p>Harga barang awal : Rp. <b><?php echo number_format($harga,2,',','.')?></b></p>
                        <p>Diskon <?php echo $diskon ?>% : Rp. <b><?php echo number_format($nilai_diskon,2,',','.')?></b></p>
                        <p>Total harga barang : Rp. <b><?php echo number_format($total_harga,2,',','.')?></b></p>
                        <button type="reset" id="resetButton" class="btn btn-custom w-100">Hapus</button>
                    </div>
            <?php }
            }
            ?>
        </div>
        <p class="terms">&copy; Copyright UKK Diskon | 12 PPLG <a href="https://github.com/Dulzx">Muhamad Abdul Aziz</a></p>
    </div>
    <script>
        document.getElementById('resetButton').addEventListener('click', function(){
            document.getElementById('hasil').innerHTML = '';
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
