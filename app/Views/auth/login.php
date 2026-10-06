<?= view('partials/header', ['title' => 'POS Login']) ?>

<main class="page-container auth-page">
    <section class="login-card">
        <p class="eyebrow">POS SYSTEM</p>
        <h1>Account Login</h1>

        <p class="login-description">
            Log in to manage customer and user accounts.
        </p>

        <?php if (session('error')): ?>
            <div class="alert error">
                <?= esc(session('error')) ?>
            </div>
        <?php endif ?>

        <?php if (session('errors')): ?>
            <div class="alert error">
                <?php foreach (session('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <form
            action="<?= site_url('login') ?>"
            method="post"
            class="account-form login-form"
        >
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username')) ?>"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="button primary login-button">
                Log In
            </button>
        </form>
    </section>
</main>

<?= view('partials/footer') ?>