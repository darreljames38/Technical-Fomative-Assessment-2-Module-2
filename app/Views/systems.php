<?= view('partials/header', ['title' => 'Choose a System']) ?>

<main class="container hero">
    <p class="eyebrow">System Portal</p>
    <h1>Choose a system</h1>

    <div class="system-buttons">
        <a href="<?= site_url('pos') ?>" class="button">
            POS System
        </a>

        <a href="<?= site_url('today') ?>" class="button secondary-button">
            Tasks for Today
        </a>
    </div>
</main>

<?= view('partials/footer') ?>