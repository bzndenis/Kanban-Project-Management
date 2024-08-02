</head>
<body class="bg-dark" id="body">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="<?= site_url('kanban/index') ?>">
            <i class="fas fa-tasks me-2 text-light"></i>
            <span class="fw-bold text-light">Kanban Board</span>
        </a>
        <div class="d-flex align-items-center">
            <a class="nav-link me-3 text-light" href="<?= site_url('kanban/index') ?>">
                <i class="fas fa-home"></i>
            </a>
            <div class="mode-switcher d-flex align-items-center">
                <i class="fas fa-sun text-warning me-2"></i>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" id="modeSwitcher" checked>
                    <label class="form-check-label text-light" for="modeSwitcher"></label>
                </div>
                <i class="fas fa-moon text-primary ms-2"></i>
            </div>
        </div>
    </div>
</nav>