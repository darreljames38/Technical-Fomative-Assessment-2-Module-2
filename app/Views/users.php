<?= view('partials/header') ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">ACCOUNTS</p>
            <h1>User Accounts</h1>
        </div>

        <a href="<?= site_url('users/new') ?>" class="button primary">
            Add User
        </a>
    </div>

    <?php if (session('success')): ?>
        <div class="alert success">
            <?= esc(session('success')) ?>
        </div>
    <?php endif ?>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php
                    $hasAvatar = ! empty($user['avatar'])
                        && is_file(FCPATH . 'uploads/avatars/' . $user['avatar']);

                    $avatarUrl = $hasAvatar
                        ? base_url('uploads/avatars/' . $user['avatar'])
                        : base_url('images/avatar-placeholder.svg');
                    ?>

                    <tr>
                        <td>
                            <img
                                src="<?= esc($avatarUrl) ?>"
                                alt="<?= esc($user['full_name']) ?> avatar"
                                class="user-avatar"
                            >
                        </td>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['created_at']) ?></td>
                        <td>
                            <a
                                href="<?= site_url('users/edit/' . $user['id']) ?>"
                                class="button small secondary"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>

                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="6">No users found.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>