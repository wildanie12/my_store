<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h4 mb-4 text-primary"><?= $title; ?> </h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 mt-4 ml-3">
                <img src="<?= base_url('/img/profile/' . $user->user_image); ?>" alt="<?= $user->username; ?>">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4><?= $user->username; ?></h4>
                        </li>
                        <?php if ($user->fullname) : ?>
                            <li class="list-group-item"><?= $user->fullname; ?></li>
                        <?php endif; ?>
                        <li class="list-group-item"><?= $user->email; ?></li>
                        <li class="list-group-item">
                            <span class="badge badge-<?= ($user->name == 'admin') ? 'success' : 'warning'; ?>"><?= $user->name; ?></span>
                        </li>
                        <li class="list-group-item">
                            <small><a href="<?= base_url('admin'); ?>">&laquo; Kembali ke user list</a></small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();  ?>