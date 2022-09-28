<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas Memproses Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
    <div class="card">
      <div align="center" class="card-header">
        FORM DATA PEGAWAI
      </div>

        <div class="container px-5 my-5">
    <form id="inputForm" method="POST">
        <div class="mb-3">
            <label class="form-label" for="namaPegawai">Nama Pegawai</label>
            <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="agama">Agama</label>
            <select class="form-select" name="agama" aria-label="Agama">
                <option value="-- Pilih Agama --">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Khatolic">Khatolik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Asisten Manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="asistenManager">Asisten Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Kepala Bagian" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="kepalaBagian">Kepala Bagian</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Staff" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Belum Menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
            <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" />
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" id="submitButton" name="proses" type="submit">
                Submit
            </button>
        </div>
    </form>
</div>

        <?php
        error_reporting(0);
        //tangkap request
        $nama = $_POST['namaPegawai'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jumlahAnak = $_POST['jumlahAnak'];
        $submit = $_POST['proses'];
        //tentukan gaji pokok
        switch ($jabatan) {
            case 'Manager': $gajipokok = 20000000; break;
            case 'Asisten Manager': $gajipokok = 15000000; break;
            case 'Kepala Bagian': $gajipokok = 10000000; break;
            case 'Staff': $gajipokok = 4000000; break;
            default: $gajipokok = '';
        }
        //TENTUKAN Tunjangan & Gaji Kotor
        $tunjanganJabatan = 0.2 * $gajipokok;
        $gajikotor = $gajipokok + $tunjanganJabatan + $tunjanganKeluarga;
        //TENTUKAN ZAKAT PROFESI
        $zakatProfesi = ($agama == 'Islam' && $gajikotor >= 6000000) ? 0.025 * $gajikotor :0;
        //TENTUKAN TAKE HOME PAY
        $takehomePay = $gajikotor - $zakatProfesi;
        //multikondisi Tunjangan Keluarga
        if($status == 'Menikah' && $jumlahAnak > 0 && $jumlahAnak <= 2) $tunjanganKeluarga = 0.05 * $gajipokok;
        else if($status == 'Menikah' && $jumlahAnak > 2 && $jumlahAnak <= 5) $tunjanganKeluarga = 0.1 * $gajipokok;
        else if($status == 'Menikah' && $jumlahAnak > 5) $tunjanganKeluarga = 0.15 * $gajipokok;
        else $tunjanganKeluarga;

        if(isset($submit)){ ?>
        <h3 align="center">FORMAT DATA PEGAWAI</h3>
		<table border=2 align="center" cellpadding="10" cellspacing="1" width="100%">
        <table class="table table-bordered">
        <thead>
            <tr bgcolor="beige">
            <th>Nama Pegawai</th>
            <th>Agama</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Jumlah Anak</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Jabatan</th>
            <th>Tunjangan Keluarga</th>
            <th>Gaji Kotor</th>
            <th>Zakat propesi</th>
            <th>Take Home Pay</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $nama ?></td>
                <td><?= $agama ?></td>
                <td><?= $jabatan ?></td>
                <td><?= $status ?></td>
                <td><?= $jumlahAnak ?></td>
                <td><?= number_format($gajipokok, 2, ',', '.'); ?></td>
                <td><?= number_format($tunjanganJabatan, 2, ',', '.'); ?></td>
                <td><?= number_format($tunjanganKeluarga, 2, ',', '.'); ?></td>
                <td><?= number_format($gajikotor, 2, ',', '.'); ?></td>
                <td><?= number_format($zakatProfesi, 2, ',', '.'); ?></td>
                <td><?= number_format($takehomePay, 2, ',', '.'); ?></td>
            </tr>
        </tbody>
        </table>
        <?php } ?>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>

</html>