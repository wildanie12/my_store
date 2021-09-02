<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>


<div class="container mt-2">
    <h2 class="h4 text-primary"><?= $title; ?></h2>
    <div class="row">
        <div class="col mt-3">
            <div class=" border border-primary rounded-lg card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/produk/<?= $product['foto']; ?>" class="card-img" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $product['nama']; ?></h5>
                            <h5 class="card-title text-dark"><small><b>Stok :</b> <?= $product['status']; ?></small>
                            </h5>

                            <p class="card-text"><small class="text-dark"> <b>Harga/Satuan :</b> Rp<?= $product['harga']; ?></small></p>
                            <!-- Hak Akses Admin -->
                            <?php if (in_groups('admin')) : ?>
                                <a href="/product/edit/<?= $product['slug']; ?>" class="btn btn-sm btn-warning mr-1 text-decoration-none"><i class="fas fa-edit"></i> Ubah </a>
                                <a href="/product/<?= $product['id']; ?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i> Hapus </a>
                            <?php endif; ?>
                            <!-- End Hak Akses -->
                            <br></br>
                            <a href="/product" class="fas fa-arrow-circle-left text-primary text-decoration-none"> Kembali </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal" tabindex="15" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Hapus Produk ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Produk yang dihapus tidak dapat dikembalikan !</p>
            </div>
            <div class="modal-footer">
                <form action="/product/<?= $product['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-primary mr-1" data-dismiss="modal"> Tidak </button>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete"> Yakin </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>