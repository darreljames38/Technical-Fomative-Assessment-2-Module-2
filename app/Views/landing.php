<?= view('partials/header', ['title' => 'Home']) ?>

<main class="container hero">
    <p class="eyebrow">CodeIgniter 4 MVC</p>

    <h1>Simple account management.</h1>

    <p class="description">
        A minimalist website for viewing customer and user account records.
    </p>

    <a class="button" href="<?= site_url('customers') ?>">
        View Customers
    </a>
</main>

<?= view('partials/footer') ?>