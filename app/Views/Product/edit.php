<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <h4 class="my-3 text-primary"><?= $title; ?></h4>
    <div class="row w-75">
        <div class="col-8 mt-3">
            <form action="/product/update/<?= $product['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $product['slug']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $product['foto']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" autofocus autocomplete="off" value="<?= (old('nama')) ? old('nama') : $product['nama']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" name="status" class="form-control" id="status" autocomplete="off" value="<?= (old('status')) ? old('status') : $product['status']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" class="form-control" id="harga" autocomplete="off" value="<?= (old('harga')) ? old('harga') : $product['harga']; ?>">
                    </div>
                </div>
                <div class="form-group row w-100">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/produk/<?= $product['foto']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                            <label class="custom-file-label" for="foto"><?= $product['foto']; ?></label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm my-3 ml-3">
                            <button type="submit" class="btn-sm btn-primary text-decoration-none">Ubah Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>