<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title ?? 'SystemHub') ?></title>

    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css?v=6') ?>"
    >
</head>

<body>

<header class="site-header">
    <nav class="compact-nav">
        <a href="<?= site_url('/') ?>" class="brand">
            SystemHub
        </a>

        <div class="nav-menu">
            <!-- POS dropdown -->
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

                    <div class="menu-divider"></div>

                    <?php if (
                        session()->get('is_logged_in') === true
                    ): ?>
                        <span class="menu-user">
                            <?= esc(
                                session()->get('full_name')
                            ) ?>
                        </span>

                        <form
                            action="<?= site_url('logout') ?>"
                            method="post"
                            class="menu-form"
                        >
                            <?= csrf_field() ?>

                            <button
                                type="submit"
                                class="menu-action logout-action"
                            >
                                POS Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <a
                            href="<?= site_url('login') ?>"
                            class="menu-login"
                        >
                            POS Login
                        </a>
                    <?php endif ?>
                </div>
            </details>

            <!-- Tasks dropdown -->
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

                    <?php if (
                        session()->get('task_logged_in') === true
                    ): ?>
                        <a href="<?= site_url('tasks/new') ?>">
                            New Task
                        </a>
                    <?php endif ?>

                    <div class="menu-divider"></div>

                    <?php if (
                        session()->get('task_logged_in') === true
                    ): ?>
                        <span class="menu-user">
                            <?= esc(
                                session()->get('task_full_name')
                                ?? session()->get('task_username')
                                ?? 'Task User'
                            ) ?>
                        </span>

                        <form
                            action="<?= site_url('tasks/logout') ?>"
                            method="post"
                            class="menu-form"
                        >
                            <?= csrf_field() ?>

                            <button
                                type="submit"
                                class="menu-action logout-action"
                            >
                                Tasks Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <a
                            href="<?= site_url('tasks/login') ?>"
                            class="menu-login"
                        >
                            Tasks Login
                        </a>
                    <?php endif ?>
                </div>
            </details>
        </div>
    </nav>
</header>