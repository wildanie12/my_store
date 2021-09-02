<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="text-primary mt-3"><?= $title; ?></h4>
        </div>
        <div class="my-4 mr-3">
            <a href="/penjualan/create" class="btn-sm btn-primary float-right text-decoration-none"> <i class="fa fa-plus"></i> Tambah <?= $title; ?> </a>
        </div>
    </div>
    <!-- Alert -->
    <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
    <!-- Close Alert -->
    <hr>
    <div class="table-responsive-sm row">
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
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga/Unit</th>
                        <th scope="col">Total/Unit</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($penjualan as $pj) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $pj['customer']; ?></td>
                            <td><?= $pj['nama_produk']; ?></td>
                            <td><?= $pj['harga']; ?></td>
                            <td><?= $pj['unit']; ?></td>
                            <td><?= $pj['tgl_beli']; ?></td>
                            <td><?= $pj['total_harga']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="/penjualan/edit/<?= $pj['id']; ?>" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <form action="/penjualan/<?= $pj['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <!-- <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" onclick="return confirm('Apakah Anda yakin ingin menghapus data penjualan')"></i></button> -->
                                        <a href="/penjualan/delete/<?= $pj['id']; ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="float-right my-2">
                <?= $pager->links('penjualan', 'mystore_pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>