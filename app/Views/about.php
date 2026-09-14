<?= view('partials/header', ['title' => 'About']) ?>

<main class="container">
    <p class="eyebrow">About</p>
    <h1>Built with MVC.</h1>

    <section class="card">
        <p class="description">
            This project demonstrates how CodeIgniter routes connect URLs
            to controller methods. The controllers prepare data and pass
            it to views, which display the final pages.
        </p>
    </section>
</main>

<?= view('partials/footer') ?>