<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Tambah Data Produk</span>
    </div>

    <main>

        <div class="container">
            <br>
            
            <form action=<?= base_url('produk/proses_tambah_produk') ?> method="post">

            <div class="form_group">
                <label>Nama Produk</label>
                <input type="text" class="form-control selectric" name="nama_produk" required>
            </div>

            <div class="form_group">
                <label>Harga Produk</label>
                <input type="number" class="form-control selectric" name="harga" required>
            </div>

            <div class="form_group">
                <label>Kategori</label>
                <select type="text" class="form-control selectric" name="kategori_id" required>
                    <option value=""> - Silahkan Pilih - </option>
                    <?php foreach ($kategori as $v_kategori){
                    echo "<option value='" . $v_kategori->id_kategori . "'>" . $v_kategori->nama_kategori . "</option>";
                    } ?>
                </select>
            </div>

            <div class="form_group">
                <label>Status</label>
                <select type="text" class="form-control selectric" name="status_id" required>
                    <option value=""> - Silahkan Pilih - </option>
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
        </div>
    </main>
</section>