<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Edit Data Produk</span>
    </div>

    <main>

        <div class="container">
            <br>
            
            <?php
                foreach($produk as $v_produk){
            ?>
            <form action=<?= base_url('produk/proses_edit_produk') ?> method="post">

            <input type="hidden" name="id_produk" class="form-control" value="<?= $v_produk->id_produk; ?>">

            <div class="form_group">
                <label>Nama Produk</label>
                <input type="text" class="form-control selectric" name="nama_produk" required value="<?= $v_produk->nama_produk; ?>">
            </div>

            <div class="form_group">
                <label>Harga Produk</label>
                <input type="number" class="form-control selectric" name="harga" required value="<?= $v_produk->harga; ?>">
            </div>

            <div class="form_group">
                <label>Kategori</label>
                <select type="text" class="form-control selectric" name="kategori_id" required>
                    <?php
                    echo "<option value='" . $v_produk->id_kategori . "'>" . $v_produk->nama_kategori . "</option>";
                    ?>
                    <?php foreach ($kategori as $v_kategori){
                    echo "<option value='" . $v_kategori->id_kategori . "'>" . $v_kategori->nama_kategori . "</option>";
                    } ?>
                </select>
            </div>

            <div class="form_group">
                <label>Status</label>
                <select type="text" class="form-control selectric" name="status_id" required>
                    <?php
                    echo "<option value='" . $v_produk->id_status . "'>" . $v_produk->nama_status . "</option>";
                    ?>
                    <?php foreach ($status as $v_status){
                    echo "<option value='" . $v_status->id_status . "'>" . $v_status->nama_status . "</option>";
                    } ?>
                </select>
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