<?= view('partials/header', ['title' => 'Task List']) ?>

<main class="container">
    <p class="eyebrow">Management</p>
    <h1>All Tasks</h1>

    <p class="description">
        View every task ordered by its scheduled date.
    </p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>
                            <td><?= esc($task['title']) ?></td>
                            <td><?= esc(ucfirst($task['status'])) ?></td>
                            <td><?= esc($task['task_date']) ?></td>
                            <td><?= esc($task['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No task records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>