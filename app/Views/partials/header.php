<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title ?? 'SystemHub') ?></title>

   <link rel="stylesheet" href="<?= base_url('css/style.css?v=2') ?>">
</head>

<body>

<header class="site-header">
    <nav class="main-navigation">
        <a href="<?= site_url('/') ?>" class="logo">
            SystemHub
        </a>

        <div class="nav-sections">
            <div class="nav-group">
                <span class="nav-label">POS</span>

                <a href="<?= site_url('pos') ?>">Home</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Users</a>
                <a href="<?= site_url('pos/about') ?>">About</a>
            </div>

            <div class="nav-group">
                <span class="nav-label">TASKS</span>

                <a href="<?= site_url('today') ?>">Today</a>
                <a href="<?= site_url('tasks') ?>">All Tasks</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>
            </div>
        </div>
    </nav>
</header>