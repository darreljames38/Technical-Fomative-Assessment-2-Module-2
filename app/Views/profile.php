<?= view('partials/header', ['title' => 'Profile']) ?>

<main class="container">
    <p class="eyebrow">Account</p>
    <h1>Profile</h1>

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
                <strong>Full Name:</strong>
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
        <section class="card">
            <p>No user record found.</p>
        </section>
    <?php endif; ?>
</main>

<?= view('partials/footer') ?>