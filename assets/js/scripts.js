document.addEventListener('DOMContentLoaded', function () {
    const columns = document.querySelectorAll('.kanban-column');
    columns.forEach(column => {
        new Sortable(column, {
            group: 'kanban',
            animation: 150,
            onEnd: function (evt) {
                const itemId = evt.item.dataset.id;
                const newStatus = evt.to.id;
                // Kirim permintaan AJAX untuk memperbarui status tugas
                fetch(site_url + 'kanban/update_task_status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        task_id: itemId,
                        status: newStatus,
                        project_id: project_id
                    })
                });
            }
        });
    });

    // Muat preferensi mode dari localStorage
    const body = document.getElementById('body');
    const modeSwitcher = document.getElementById('modeSwitcher');
    const savedMode = localStorage.getItem('mode') || 'dark';
    if (savedMode === 'light') {
        body.classList.add('bg-light');
        modeSwitcher.textContent = 'Switch to Dark Mode';
    } else {
        body.classList.add('bg-dark');
        modeSwitcher.textContent = 'Switch to Light Mode';
    }

    // Tambahkan event listener untuk switcher mode
    modeSwitcher.addEventListener('click', function () {
        if (body.classList.contains('bg-light')) {
            body.classList.remove('bg-light');
            body.classList.add('bg-dark');
            modeSwitcher.textContent = 'Switch to Light Mode';
            localStorage.setItem('mode', 'dark');
        } else {
            body.classList.remove('bg-dark');
            body.classList.add('bg-light');
            modeSwitcher.textContent = 'Switch to Dark Mode';
            localStorage.setItem('mode', 'light');
        }
    });
});