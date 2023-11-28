<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxl-product-hunt'></i> Tambah Data Kategori</span>
    </div>

    <main>

        <div class="container">
            <br>
            
            <form action=<?= base_url('kategori/proses_tambah_kategori') ?> method="post">

            <div class="form_group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control selectric" name="nama_kategori" required>
            </div>

            <br>
            <div class="form_group">
                <button type="submit" class="btn btn-success"><i class='bx bxs-save'></i> Simpan</button>
            </div>

            </form>
        </div>
    </main>
</section>