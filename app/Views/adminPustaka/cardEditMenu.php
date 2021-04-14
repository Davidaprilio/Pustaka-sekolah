<fieldset class="border shadow bg-white p-2 position-relative">
	<button type="button" class="badge badge-primary border-0 position-absolute" style="top: -25px; right: 9px;" id="addNewMenu">Tambah</button>
	<legend class="w-auto mb-0 ml-2">
		<span class="h5 px-2 rounded p-1 bg-white">Kategori Menu Editor</span>
	</legend>
	<div id="menuContainer">
		<ul class="mt-0 list-unstyled mb-0">
			<?php foreach ($menuLock as $val => $subMenu): ?>
				<li class="mb-2 grub-kategori">
					<div data-kode="<?= $val ?>" data-el="parent" class="d-flex justify-content-between">
						<div data-el="parent">
							<span title="<?= $val ?>"><?= $subMenu[0] ?></span>
							<span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>
						</div>
						<div>
							<i class="fa fa-plus ml-3" title="buat baru" aria-hidden="true"></i>
						</div>
					</div>
					<ul class="pl-3 lockUl" id="subKatSortTop">
						<?php unset($subMenu[0]);
						foreach ($subMenu as $val): ?>
								<li class="mb-1 d-flex justify-content-between" data-kode="<?= $val['kode'] ?>" data-el="child">
									<span title="<?= $val['kode'] ?>"><?= $val['alias'] ?></span>
									<span id="editKat" class="text-primary">
										<i class="fa fa-pencil" title="edit nama"></i>
										<i class="fa fa-times ml-3" title="hapus" aria-hidden="true"></i>
									</span>
								</li>
						<?php endforeach ?>
					</ul>
					<small class="text-muted"> <i class="fa fa-info-circle"> </i> Menu ini tidak boleh dihapus maupun dipindahkan posisinya</small>
				</li>
			<?php endforeach ?>
		</ul>
		<ul class="mt-0 list-unstyled" id="katSort">
			<?php foreach ($menu as $val => $subMenu): ?>
				<li class="mb-2 grub-kategori">
					<div class="d-flex justify-content-between" data-el="parent" data-kode="<?= $val ?>">
						<div data-el="parent">
							<span title="<?= $val ?>"><?= $subMenu[0] ?></span>
							<span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>
						</div>
						<div>
							<i class="fa fa-times" title="hapus" aria-hidden="true"></i>
							<i class="fa fa-plus mx-3" title="buat baru" aria-hidden="true"></i>
							<i class="fa fa-arrows-alt" title="pindahkan posisi" id="btnMoveKat" aria-hidden="true"></i>
						</div>
					</div>
					<ul class="pl-3 lockUl" id="subKatSort">
						<?php unset($subMenu[0]);
						foreach ($subMenu as $key): ?>
								<li class="mb-1 d-flex justify-content-between" data-kode="<?= $key['kode'] ?>" data-el="child">
									<span title="<?= $key['kode'] ?>"><?= $key['alias'] ?></span>
									<span id="editKat" class="text-primary">
										<i class="fa fa-pencil" title="edit nama"></i>
										<i class="fa fa-times ml-3" title="hapus" aria-hidden="true"></i>
									</span>
								</li>
						<?php endforeach ?>
					</ul>
					<?php if ($val == 'AA02'): ?>
						<small class="text-muted help" title="Mohon jangan menghapus menu ini, hanya mengganti nama dan memindahkannya saja"> <i class="fa fa-info-circle"> </i> Mohon jangan menghapus menu ini ...</small>
					<?php endif ?>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</fieldset>