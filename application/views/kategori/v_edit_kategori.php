<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Edit Data Kategori</span>
    </div>

    <main>

        <div class="container">
            <br>
            
            <?php
                foreach($kategori as $v_kategori){
            ?>
            <form action=<?= base_url('kategori/proses_edit_kategori') ?> method="post">

            <input type="hidden" name="id_kategori" class="form-control" value="<?= $v_kategori->id_kategori; ?>">

            <div class="form_group">
                <label>Nama kategori</label>
                <input type="text" class="form-control selectric" name="nama_kategori" required value="<?= $v_kategori->nama_kategori; ?>">
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