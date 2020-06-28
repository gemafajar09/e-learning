<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Buku</h5>
                <br>
                <?php if($_SESSION['level'] == 1){ ?>
                <button type="button" onclick="tampil()" class="btn btn-primary">Entry</button>
                <?php } ?>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Kategori</th>
                            <th>Nama Pengarang</th>
                            <th>Klasifikasi</th>
                            <th>Link</th>
                            <th>Tanggal Input</th>
                            <?php if($_SESSION['level'] == 1){ ?>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $con->query("SELECT * FROM buku");
                        foreach($data as $i => $a){
                        ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $a['nama_buku'] ?></td>
                            <td><?= $a['kategori'] ?></td>
                            <td><?= $a['nama_pengarang'] ?></td>
                            <td><?= $a['klasifikasi'] ?></td>
                            <td><a href="<?= $a['link'] ?>" target="_blank"><i class="fa fa-download"></i></a></td>
                            <td><?= $a['tanggal_input'] ?></td>
                            <?php if($_SESSION['level'] == 1){ ?>
                            <td>
                                <button type="button" onclick="edit('<?= $a['id_buku'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <a href="?page=buku/hapusBuku&id=<?= $a['id_buku'] ?>" onclick="return confirm('Yakin Mau Hapus Data.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="enrty">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        <form action="?page=buku/simpanBuku" method="POST">
            <div class="form-group">
                <label for="">Nama Buku</label>
                <input type="text" name="nama_buku" class="form-control" id="nama_buku" required>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="text" name="kategori" class="form-control" id="kategori" required>
            </div>
            <div class="form-group">
                <label for="">Nama Pengarang</label>
                <input type="text" name="nama_pengarang" class="form-control" id="nama_pengarang" required>
            </div>
            <div class="form-group">
                <label for="">Klasifikasi</label>
                <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" required>
            </div>
            <div class="form-group">
                <label for="">Link</label>
                <input type="text" name="link" class="form-control" id="link" required>
            </div>
            <div class="form-group">
                <label for="">Tanggal Input</label>
                <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <input type="hidden" name="id" id="id_buku" value="">
            <div align="right">
                <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
    function tampil()
    {
        $('#enrty').modal()
    }

    function edit(id)
    {
        $.ajax({
            url: 'buku/editBuku.php',
            type: 'POST',
            data: {'id':id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#id_buku').val(data.id_buku)
                $('#nama_buku').val(data.nama_buku)
                $('#kategori').val(data.kategori)
                $('#nama_pengarang').val(data.nama_pengarang)
                $('#klasifikasi').val(data.klasifikasi)
                $('#link').val(data.link)
                $('#tanggal').val(data.tanggal_input)
                $('#enrty').modal()
            }
        })
    }
</script>