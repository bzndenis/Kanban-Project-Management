<?php
 $this->load->helper('url');
 $this->load->view('partials/header');
 $this->load->view('partials/navbar');
?>

<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Project <?php echo $project_name; ?> - Kanban Board</h1>
    
    <!-- Form untuk menambahkan tugas baru -->
    <form action="<?php echo site_url('kanban/create_task'); ?>" method="post" class="mb-4 p-4 shadow-sm rounded">
        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control form-control-lg" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea class="form-control form-control-lg" id="description" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">Add Task</button>
    </form>

    <div class="kanban-board" id="kanban-board">
        <div class="kanban-column" id="task">
            <h2>To Do</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'task'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="ongoing">
            <h2>Ongoing</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'ongoing'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="review">
            <h2>Review</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'review'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="finish">
            <h2>Finish</h2>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task->status == 'finish'): ?>
                    <div class="kanban-item card mb-3" data-id="<?php echo $task->id; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task->title; ?></h5>
                            <p class="card-text"><?php echo $task->description; ?></p>
                            <div class="actions d-flex justify-content-between">
                                <a href="<?php echo site_url('kanban/edit_task/' . $task->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?php echo site_url('kanban/delete_task/' . $task->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
 $this->load->view('partials/footer');
?>