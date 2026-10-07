<?= view('partials/header', ['title' => 'Profile']) ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">DEMO USER</p>
            <h1>Profile</h1>
        </div>
    </div>

    <?php if ($user !== null): ?>
        <section class="card">
            <p>
                <strong>ID:</strong>
                <?= esc($user['id']) ?>
            </p>

            <p>
                <strong>Username:</strong>
                <?= esc($user['username']) ?>
            </p>

            <p>
                <strong>Full name:</strong>
                <?= esc($user['full_name']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= esc($user['email']) ?>
            </p>

            <p>
                <strong>Created:</strong>
                <?= esc($user['created_at']) ?>
            </p>
        </section>
    <?php else: ?>
        <div class="alert error">
            No demo user was found.
        </div>
    <?php endif ?>
</main>

<?= view('partials/footer') ?>