<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Data Produk</span>
    </div>

    <main>
        <div class="container-fluid"><br>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('produk/tambah_produk'); ?>"><button class="button_add" type="button"><i class='bx bxs-file-plus' ></i> Tambah Produk</button></a><br><br>
            <table class="table table-bordered table_hover table-striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Nama Kategori</th>
                        <th>Status</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($produk as $v_produk){ ?>
                    <tr>    
                        <td><?= $no++; ?></td>
                        <td><?= $v_produk->nama_produk; ?></td>
                        <td>Rp. <?= number_format($v_produk->harga); ?></td>
                        <td><?= $v_produk->nama_kategori; ?></td>
                        <td>
                            <?php if($v_produk->nama_status == "bisa dijual"){ ?>
                                <span class="label label-success"><?= $v_produk->nama_status ?></span>
                            <?php }else{ ?>
                                <span class="label label-danger"><?= $v_produk->nama_status ?></span>
                            <?php } ?>
                        </td>
                        <td align="center">
                            <?= anchor('produk/edit_produk/' . $v_produk->id_produk, '<div class="btn btn-primary btn-sm"><i class="bx bx-edit" ></i> Ubah</div>') ?>
                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('produk/delete_produk/'. $v_produk->id_produk); ?>')" class="btn btn-danger btn-xs"> <i class='bx bxs-trash'></i>Hapus</a>
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
