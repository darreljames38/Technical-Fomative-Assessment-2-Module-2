<?= view('partials/header', ['title' => 'Customer Accounts']) ?>

<main class="container">
    <p class="eyebrow">Accounts</p>
    <h1>Customers</h1>

    <p class="description">
        View the customer records retrieved from the MySQL database.
    </p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($customers)): ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= esc($customer['id']) ?></td>
                            <td><?= esc($customer['full_name']) ?></td>
                            <td><?= esc($customer['email']) ?></td>
                            <td><?= esc($customer['phone']) ?></td>
                            <td><?= esc($customer['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No customer records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>