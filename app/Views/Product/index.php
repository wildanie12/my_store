<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="text-primary mt-3"><?= $title; ?></h4>
        </div>
        <?php if (in_groups('admin')) : ?>
            <div class="my-4 mr-3">
                <a href="/product/create" class="btn-sm btn-primary float-right text-decoration-none"> <i class="fa fa-plus"> </i> Tambah <?= $title; ?> </a>
            </div>
        <?php endif; ?>
    </div>
    <!-- Alert -->
    <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
    <!-- Close Alert -->
    <hr class="text-primary">
    <div class="row">
        <div class="col">
            <!-- Button Cari -->
            <div class="row float-right">
                <div class="col">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan kata kunci pencarian.." name="keyword" id="keyword" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($product as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/produk/<?= $p['foto']; ?>" class="product"></td>
                            <td><?= $p['nama']; ?></td>
                            <td><a href="/product/<?= $p['slug']; ?>" class="btn-sm btn-success text-light text-decoration-none"> Detail </a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="float-right my-2">
                <?= $pager->links('product', 'mystore_pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>