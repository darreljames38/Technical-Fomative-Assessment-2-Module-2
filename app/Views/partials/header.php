<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title ?? 'SystemHub') ?></title>

    <!-- Connect the external CSS file -->
    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css?v=5') ?>"
    >
</head>

<body>

<header class="site-header">
    <nav class="compact-nav">
        <a href="<?= site_url('/') ?>" class="brand">
            SystemHub
        </a>

        <div class="nav-menu">
            <details class="nav-dropdown">
                <summary>POS</summary>

                <div class="menu-panel">
                    <a href="<?= site_url('pos') ?>">
                        POS Home
                    </a>

                    <a href="<?= site_url('customers') ?>">
                        Customers
                    </a>

                    <a href="<?= site_url('users') ?>">
                        Users
                    </a>

                    <a href="<?= site_url('pos/about') ?>">
                        About POS
                    </a>
                </div>
            </details>

            <details class="nav-dropdown">
                <summary>Tasks</summary>

                <div class="menu-panel">
                    <a href="<?= site_url('today') ?>">
                        Today
                    </a>

                    <a href="<?= site_url('tasks') ?>">
                        All Tasks
                    </a>

                    <a href="<?= site_url('profile') ?>">
                        Profile
                    </a>

                    <a href="<?= site_url('about') ?>">
                        About Tasks
                    </a>
                </div>
            </details>

            <?php if (session()->get('is_logged_in') === true): ?>
                <span class="nav-username">
                    <?= esc(session()->get('full_name')) ?>
                </span>

                <form
                    action="<?= site_url('logout') ?>"
                    method="post"
                    class="logout-form"
                >
                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        class="auth-button logout-button"
                    >
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <a
                    href="<?= site_url('login') ?>"
                    class="auth-button"
                >
                    Login
                </a>
            <?php endif ?>
        </div>
    </nav>
</header>