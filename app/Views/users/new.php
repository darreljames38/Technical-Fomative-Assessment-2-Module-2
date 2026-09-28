<?= view('partials/header') ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">USERS</p>
            <h1>New User</h1>
        </div>

        <a href="<?= site_url('users') ?>" class="button secondary">
            Back
        </a>
    </div>

    <?php if (session('errors')): ?>
        <div class="alert error">
            <?php foreach (session('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form action="<?= site_url('users/create') ?>" method="post" class="account-form">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="full_name">Full name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name')) ?>"
                required
            >
        </div>

        <button type="submit" class="button primary">
            Save User
        </button>
    </form>
</main>

<?= view('partials/footer') ?>