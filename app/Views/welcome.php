<?= view('partials/header', ['title' => 'Tasks for Today']) ?>

<main class="container">
    <p class="eyebrow">Today</p>
    <h1>Tasks for Today</h1>

    <p class="description">
        <?= esc(date('F j, Y')) ?>
    </p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>
                            <td><?= esc($task['title']) ?></td>
                            <td><?= esc(ucfirst($task['status'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No tasks scheduled for today.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>