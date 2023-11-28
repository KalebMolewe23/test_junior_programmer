<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-stripe' ></i> Data Status</span>
    </div>

    <main>
        <div class="container-fluid"><br>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('status/tambah_status'); ?>"><button class="button_add" type="button"><i class='bx bxs-file-plus' ></i> Tambah status</button></a><br><br>
            <table class="table table-bordered table_hover table-striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama status</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($status as $v_status){ ?>
                    <tr>    
                        <td><?= $no++; ?></td>
                        <td><?= $v_status->nama_status; ?></td>
                        <td align="center">
                            <?= anchor('status/edit_status/' . $v_status->id_status, '<div class="btn btn-primary btn-sm"><i class="bx bx-edit" ></i> Ubah</div>') ?>
                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('status/delete_status/'. $v_status->id_status); ?>')" class="btn btn-danger btn-xs"> <i class='bx bxs-trash'></i>Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</section>

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Yakin akan menghapus data ini?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Iya</button>
                </form>
            </div>
        </div>
    </div>
</div>
