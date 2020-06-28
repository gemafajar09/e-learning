<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Data Kunjungan</h5>
            </div>
            <div class="card-body">
                <div id="statistik"></div>
            </div>
        </div>
    </div>
    <?php if($_SESSION['level'] == 1){ ?>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Data Member</h5>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $con->query("SELECT * FROM user");
                        foreach($data as $i => $a){
                        ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td><?= $a['username'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Buku Terbaru</h5>
            </div>
            <div class="card-body table-responsive">
            <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Kategori</th>
                            <th>Nama Pengarang</th>
                            <th>Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $con->query("SELECT * FROM buku ORDER BY tanggal_input DESC");
                        foreach($data as $i => $a){
                        ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $a['nama_buku'] ?></td>
                            <td><?= $a['kategori'] ?></td>
                            <td><?= $a['nama_pengarang'] ?></td>
                            <td><?= $a['tanggal_input'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>