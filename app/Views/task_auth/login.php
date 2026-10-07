<?= view('partials/header', ['title' => 'Tasks Login']) ?>

<main class="auth-page">
    <section class="login-card">
        <p class="eyebrow">TASK MANAGEMENT</p>
        <h1>Tasks Login</h1>

        <p class="login-description">
            Log in to create, edit, or archive tasks.
        </p>

        <?php if (session('error')): ?>
            <div class="alert error">
                <?= esc(session('error')) ?>
            </div>
        <?php endif ?>

        <?php if (session('success')): ?>
            <div class="alert success">
                <?= esc(session('success')) ?>
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
            action="<?= site_url('tasks/login') ?>"
            method="post"
            class="account-form"
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