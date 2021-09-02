<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <!-- Alert -->
    <!-- <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div> -->
    <!-- Close Alert -->

    <h1 class="h4 mb-4 text-primary 800"><?= $title; ?></h1>

    <div class="card mb-3" style="max-width:720px;">
        <div class="row no-gutters">
            <div class="col-md-4 mt-4 ml-3">
                <img src="<?= base_url('/img/profile/' . user()->user_image); ?>" alt="<?= user()->username; ?>" class="w-100 mb-4 rounded">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4 class="text-primary"><?= user()->username; ?></h4>
                        </li>
                        <li class="list-group-item">Nama : <?= user()->fullname; ?></li>
                        <li class="list-group-item">Email : <?= user()->email; ?></li>
                    </ul>
                </div>
                <div class="col-lg ml-4">
                    <a href="<?= base_url('/user/edit/' . user()->id) ?>" class="btn btn-sm btn-primary mr-2">Ubah Profile</a>
                    <a href="<?= base_url('/user/delete') ?>" class="btn btn-sm btn-danger btn-delete">Hapus Akun</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<!-- <div class="container-fluid">

    <h1 class="h4 mb-4 text-primary 800"><?= $title; ?></h1>
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('/img/profile/' . user()->user_image); ?>" class="card-img w-75 rounded-circle" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body mr-5">
                <ul class="list-group list-group-flush">
                    <h4 class="list-group-item text-primary"><small><?= user()->username; ?></small> </h4>
                    <?php if (user()->fullname) : ?>
                        <li class="list-group-item">Nama : <?= user()->fullname; ?></li>
                    <?php endif; ?>
                    <li class="list-group-item">Email : <?= user()->email; ?></li>
                    <li class="list-group-item"><span class="badge badge-success"><?= user()->name; ?></span></li>
                </ul>
                <a href="<?= base_url('/user/edit/' . user()->id) ?>" class="btn btn-sm btn-primary mt-2">Edit Profile</a>
                <button class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#hapus">Delete Account</button>
            </div>
        </div>
    </div>
</div> -->