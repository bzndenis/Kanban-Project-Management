<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">&copy; <?= date('Y'); ?> Kanban Board. All Rights Reserved.</p>
        <p class="mb-0">Created by <a href="https://koys.my.id" class="text-white">Koys</a></p>
        <div class="mt-2">
            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-white"><i class="fab fa-github"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js" integrity="sha512-TelkP3PCMJv+viMWynjKcvLsQzx6dJHvIGhfqzFtZKgAjKM1YPqcwzzDEoTc/BHjf43PcPzTQOjuTr4YdE8lNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const site_url = '<?= site_url(); ?>';
    const project_id = '<?= isset($project_id) ? $project_id : ''; ?>';
</script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>