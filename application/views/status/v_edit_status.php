<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Edit Data kate$kategori</span>
    </div>

    <main>

        <div class="container">
            <br>
            
            <?php
                foreach($status as $v_status){
            ?>
            <form action=<?= base_url('status/proses_edit_status') ?> method="post">

            <input type="hidden" name="id_status" class="form-control" value="<?= $v_status->id_status; ?>">

            <div class="form_group">
                <label>Nama status</label>
                <input type="text" class="form-control selectric" name="nama_status" required value="<?= $v_status->nama_status; ?>">
            </div>

            <br>
            <div class="form_group">
                <button type="submit" class="btn btn-success"><i class='bx bxs-save'></i> Simpan</button>
            </div>

            </form>
            <?php } ?>
        </div>
    </main>
</section>