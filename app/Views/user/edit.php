<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h4 mb-4 text-primary 800"><?= $title; ?></h1>

    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-warning<?= session()->getFlashData('alert'); ?>" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row no-gutters w-75">
        <form action="/user/update/<?= $user->id; ?>" method="post" class="mt-3" enctype="multipart/form-data">
            <input type="hidden" name="imageLama" value="<?= user()->user_image; ?>">
            <div class="form-group row">

                <div class="col-sm-8">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control form-control-user" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= (old('username')) ? old('username') : user()->username; ?>" id="username">
                </div>

                <div class="col-sm-8">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= (old('email')) ? old('email') : user()->email; ?>" id="email">
                </div>

                <div class="col-sm-8">
                    <label for="fullname">Nama Lengkap :</label>
                    <input type="fullname" class="form-control form-control-user" name="fullname" placeholder="fullname" value="<?= (old('fullname')) ? old('fullname') : user()->fullname; ?>" id="fullname">
                </div>

                <div class="form-group">
                    <div class="col-sm-8">
                        <label>Foto Profile :</label>
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image" onchange="previewImg()">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            </div>
                            <label class="custom-file-label" for="image"><?= user()->user_image; ?></label>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 mt-3">
                        <img src="/img/profile/<?= user()->user_image; ?>" class="img-thumbnail img-preview card-img">
                    </div>
                </div>
                <div class="col-sm-8 mt-4">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- <div class="container">
    <h4 class="text-primary my-3"><?= $title; ?></h4>
    <div class="row">
        <div class="col-8 mt-3">
            <form action="/user/update/<?= user()->id ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" value="<?= user()->email; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= user()->username; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= user()->fullname; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('/img/profile/' . user()->user_image); ?>" alt="<?= base_url('/img/profile/' . user()->user_image); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>