<?= view('partials/header') ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">ACCOUNTS</p>
            <h1>Customer Accounts</h1>
        </div>

        <a href="<?= site_url('customers/new') ?>" class="button primary">
            Add Customer
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
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone'] ?? '') ?></td>
                        <td><?= esc($customer['created_at']) ?></td>
                        <td>
                            <a
                                href="<?= site_url('customers/edit/' . $customer['id']) ?>"
                                class="button small secondary"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>

                <?php if (empty($customers)): ?>
                    <tr>
                        <td colspan="6">No customers found.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>