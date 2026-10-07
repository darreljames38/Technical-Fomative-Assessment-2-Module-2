<?= view('partials/header', ['title' => 'New Task']) ?>

<main class="page-container">
    <div class="page-heading">
        <div>
            <p class="eyebrow">TASK MANAGEMENT</p>
            <h1>New Task</h1>
        </div>

        <a href="<?= site_url('tasks') ?>" class="button secondary">
            Back to Tasks
        </a>
    </div>

    <?php if (session('errors')): ?>
        <div class="alert error">
            <?php foreach (session('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form
        action="<?= site_url('tasks/create') ?>"
        method="post"
        class="account-form"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Task title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="<?= esc(old('title')) ?>"
                maxlength="150"
                required
            >
        </div>

        <div class="form-group">
            <label for="task_date">Task date</label>

            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= esc(old('task_date')) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status">
                <option
                    value="pending"
                    <?= old('status', 'pending') === 'pending'
                        ? 'selected'
                        : '' ?>
                >
                    Pending
                </option>

                <option
                    value="in_progress"
                    <?= old('status') === 'in_progress'
                        ? 'selected'
                        : '' ?>
                >
                    In Progress
                </option>

                <option
                    value="completed"
                    <?= old('status') === 'completed'
                        ? 'selected'
                        : '' ?>
                >
                    Completed
                </option>
            </select>
        </div>

        <button type="submit" class="button primary">
            Create Task
        </button>
    </form>
</main>

<?= view('partials/footer') ?>