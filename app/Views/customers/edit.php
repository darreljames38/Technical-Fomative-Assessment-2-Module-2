<?= view('partials/header') ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">CUSTOMERS</p>
            <h1>Edit Customer</h1>
        </div>

        <a href="<?= site_url('customers') ?>" class="button secondary">
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

    <form
        action="<?= site_url('customers/update/' . $customer['id']) ?>"
        method="post"
        class="account-form"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="full_name">Full name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name', $customer['full_name'])) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc(old('email', $customer['email'])) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone number</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"
            >
        </div>

        <button type="submit" class="button primary">
            Update Customer
        </button>
    </form>
</main>

<?= view('partials/footer') ?>