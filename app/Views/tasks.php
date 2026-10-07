<?= view('partials/header', ['title' => 'All Tasks']) ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">MANAGEMENT</p>
            <h1>All Tasks</h1>

            <p class="description">
                View every active task ordered by its scheduled date.
            </p>
        </div>

        <div class="task-page-actions">
            <?php if (session()->get('task_logged_in') === true): ?>
                <a
                    href="<?= site_url('tasks/new') ?>"
                    class="button primary"
                >
                    New Task
                </a>

                <form
                    action="<?= site_url('tasks/logout') ?>"
                    method="post"
                    class="inline-form"
                >
                    <?= csrf_field() ?>

                    <button type="submit" class="button secondary">
                        Task Logout
                    </button>
                </form>
            <?php else: ?>
                <a
                    href="<?= site_url('tasks/login') ?>"
                    class="button primary"
                >
                    Login to Manage Tasks
                </a>
            <?php endif ?>
        </div>
    </div>

    <?php if (session('success')): ?>
        <div class="alert success">
            <?= esc(session('success')) ?>
        </div>
    <?php endif ?>

    <?php if (session('error')): ?>
        <div class="alert error">
            <?= esc(session('error')) ?>
        </div>
    <?php endif ?>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>

                        <td><?= esc($task['title']) ?></td>

                        <td>
                            <?= esc(
                                ucwords(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $task['status']
                                    )
                                )
                            ) ?>
                        </td>

                        <td><?= esc($task['task_date']) ?></td>

                        <td><?= esc($task['created_at']) ?></td>

                        <td>
                            <?php if (
                                session()->get('task_logged_in') === true
                            ): ?>
                                <div class="task-actions">
                                    <a
                                        href="<?= site_url(
                                            'tasks/edit/' . $task['id']
                                        ) ?>"
                                        class="button small secondary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="<?= site_url(
                                            'tasks/archive/' . $task['id']
                                        ) ?>"
                                        method="post"
                                        class="inline-form"
                                        onsubmit="return confirm(
                                            'Archive this task?'
                                        );"
                                    >
                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="button small archive-button"
                                        >
                                            Archive
                                        </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <span class="protected-label">
                                    Login required
                                </span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>

                <?php if (empty($tasks)): ?>
                    <tr>
                        <td colspan="6">
                            No active tasks found.
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</main>

<?= view('partials/footer') ?>