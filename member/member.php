<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Member</h5>
                <br>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $con->query("SELECT * FROM user");
                        foreach($data as $i => $a){
                            if($a['nama'] != 'ADMIN')
                            {
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td><?= $a['username'] ?></td>
                            <td>
                               <a href="?page=member/hapusMember&id=<?= $a['id_user'] ?>" onclick="return confirm('Yakin Mau Hapus Data.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>