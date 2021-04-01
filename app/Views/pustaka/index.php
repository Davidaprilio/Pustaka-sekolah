<?= $this->extend('layout/Pustaka'); ?>
<?= $this->section('Pustaka'); ?>
    <div id="main" class="px-0 pt-0 pb-5"><style>.breadcrumb-item{ flex-wrap: nowrap; }</style>

        <div class="pt-1">
            <nav aria-label="breadcrumb" class="text-nowrap scrollBreadcrumb" style="font-size: 15px; overflow-x: auto;">
                <ol class="breadcrumb flex-nowrap bg-white pb-0">
                    <li class="breadcrumb-item">Pustaka</li>
                    <li class="breadcrumb-item" id="katGrub">...</li>
                    <li class="breadcrumb-item active" id="katMenu" aria-current="page">...</li>
                </ol>
            </nav>
            <div class="container overflow-hidden mt-3" id="buku">
                
            </div>
        </div>

    </div>
<?= $this->endSection(); ?>