<?= view('partials/header', ['title' => 'User Accounts']) ?>

<main class="container">
    <p class="eyebrow">Accounts</p>
    <h1>Users</h1>

    <p class="description">
        View the user records retrieved from the MySQL database.
    </p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['id']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>
                            <td><?= esc($user['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No user records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>