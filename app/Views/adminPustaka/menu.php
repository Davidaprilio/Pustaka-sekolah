<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<style>
	fieldset {
		border-radius: 10px;
		font-weight: lighter !important;
	}
	fieldset li, .placeItem {
		background: #f7f7f7;
		border: 1px solid #ddd;
		padding: 5px 10px;
		border-radius: 5px;
		margin-bottom: 5px;
		transition: .4s ease-out;
	}
	.placeItem {
		border: 1.5px dashed #ddd;
	}
	.placeItem::before {
		content: 'Letakan disini';
		color: #999;
	}
	fieldset li ul li{
		background-color: var(--light);
	}
	i.fa {
		font-size: 15px;
	}
	#editKat, #editSub, .fa-plus, .fa-times {
		cursor: pointer;
	}
	#btnMoveKat, #subKatSort li, #subKatSortTop li {
		cursor: grab;
	}
	.editMenu {
	    width: 100%;
	    border: none;
	    background: transparent;
	    margin-bottom: 4px;
	    border-color: var(--info) !important;
	}
	.placeCard {
		background: var(--light);
		width: 100%;
		height: 100px;
		border: 2px dashed #eee;
		margin-bottom: 6px;
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.placeCard::before {
		content: 'Letakan disini';
		position: static;
		color: #999;
		font-size: 30px;
		font-weight: bold;
	}
	.lockUl {
		margin-bottom: 4px;
	}
	.help {
		cursor: help;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-7 pt-2 mb-5" id="editContainer">
			<?= $this->include('/adminPustaka/cardEditMenu') ?>				
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmMdl" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Konfirmasi! <i class="fa fa-exclamation-triangle fa-3x"></i></h4>
        <p>Menghapus Grub menu juga akan menghapus menu-menu yang terdapat didalamnya</p>
	      <hr>
        <p>menu yang dihapus akan menyebabkan buku yang terkait tidak dapat terlihat pada menu tampilan</p>
        <div class="modal-content bg-transparent border-0 p-0">
        	<div class="modal-body p-0 d-flex justify-content-around">
    	    	<button type="button" class="btn btn-sm btn-outline-warning" data-dismiss="modal">Batal <span aria-hidden="true">&times;</span></button>
		        <button class="btn btn-sm btn-danger" id="btnremoveConfirm">Tetap hapus</button>
        	</div>
        </div>
    </div>
  </div>
</div>

<script src="<?= base_url('/js/jquery-ui.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
	var oldIn = '';
	$('#editContainer').on('click', '.fa-pencil', function() {
		oldIn = $(this).parent().prev().text();
		$(this).parent().parent().html('<input type="text" autofocus="true" id="editKatIn" class="editMenu border-bottom" value="'+oldIn+'">');
	})
	$('#editContainer').on('keyup', '#editKatIn', function(e) {
		if (e.which === 13) {
			const txt = $(this).val();
			const el = $(this).parent().attr('data-el');
			if (el == 'child') {
				$(this).parent().html(`<span>${txt}</span><span id="editKat" class="text-primary"><i class="fa fa-pencil mr-1"></i><i class="fa fa-times ml-3" data-el="child" aria-hidden="true"></i></span>`);
			} else {
				$(this).parent().html(`<span>${txt}</span><span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>`);
			}
	    	$('i.fa-plus').show();
	    	saveMenu();
		} else if (e.which == 27) {
			const el = $(this).parent().attr('data-el');
			const kode = $(this).parent().attr('data-kode');
			if (kode == 'new') {
				$('[data-kode=new').remove();
			} else if (el == 'child') {
				$(this).parent().html(`<span>${oldIn}</span><span id="editKat" class="text-primary"><i class="fa fa-pencil mr-1"></i><i class="fa fa-times ml-3" data-el="child" aria-hidden="true"></i></span>`);
			} else {
				$(this).parent().html(`<span>${oldIn}</span><span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>`);
			}
	    	$('i.fa-plus').show();
		}
	})

    $('#editContainer').on('click', 'i.fa-plus', function() {
    	$('i.fa-plus').hide();
    	var cek = $(this).parent().parent().next();
    	cek.append(`
    		<li class="mb-1 d-flex justify-content-between" data-kode="new" data-el="child">
				<input type="text" id="editKatIn" autofocus="true" class="editMenu border-bottom" placeholder="Ketikan nama">
			</li>
		`);
    });

    $('#editContainer').on('click', '.fa-times', function() {
    	const node = $(this).parent().parent();
    	const id = node.attr('data-kode');
    	const el = node.attr('data-el');
    	if (el == 'child') {
    		var msg = 'Menghapus menu beresiko merusak penataan buku dalam menunya hingga tidak dapat diakses melalui menu'
	    	node.css('border','3px dashed var(--danger)');
    	} else {
	    	node.parent().css('border','3px dashed var(--danger)');
    		var msg = 'Tindakan ini beresiko menghapus semua menu yang ada didalamnya.';
    	}
    	alertify.confirm('Konfirmasi!', msg,function() {
    		removeMenu(node,el,id);
    	}, function() {
    		if (el == 'child') {
	    		node.css('border','');    			
    		} else {
	    		node.parent().css('border','');    			
    		}
    	} ).setting({
    		'labels': {
    			ok: 'Tetap hapus',
    			cancel: 'Batalkan'
    		}
       	});
	})
	$(function() {
	    $("#katSort").sortable({
	    	placeholder: "placeCard",
	    	handle: "#btnMoveKat",
	    	cursor: "grabbing",
	    	cursorAt: {
	    		top: 45,
	    		right: 15,
	    	},
	    	update: function(e) {
	    		saveMenu()
	    	}
	    }).disableSelection();

	    $("#subKatSort, #subKatSortTop").sortable({
	    	placeholder: "placeItem",
	    	cursor: "grabbing",
	    	cursorAt: {
	    		top: 45
	    	},
	    	update: function(e) {
	    		saveMenu()
	    	}
	    }).disableSelection();


	    $('#editContainer').on('click', '#addNewMenu', function() {
	    	window.scrollTo(0, 100000);
	    	const li = $('#katSort');
	    	li.append(`
	    		<li class="mb-2 grub-kategori">
					<div class="d-flex justify-content-between" data-kode="new">
						<div>
							<input type="text" id="editKatIn" autofocus="true" class="editMenu border-bottom" placeholder="Ketikan nama">
						</div>
						<div>
							<i class="fa fa-times" title="hapus" aria-hidden="true"></i>
							<i class="fa fa-plus mx-3" title="buat baru" aria-hidden="true"></i>
							<i class="fa fa-arrows-alt" title="pindahkan posisi" id="btnMoveKat" aria-hidden="true"></i>
						</div>
					</div>
					<ul class="pl-3 lockUl ui-sortable" id="subKatSort"></ul>
				</li>
	    	`);
	    	$('i.fa-plus').hide();
	    })
 	});

 	function saveMenu() {
 		const arr = compileMenu();
 		$.post(window.location.origin+'/Petugaspustaka/updateMenu', {'menu':arr[0], 'subMenu':arr[1]}, function( data ) {
			console.log(data);
 			if (data != 'updated') {
	 			$('#editContainer').html(data);	
 			}
		});
 	}

 	function removeMenu(node,el,id) {
    	node.css('opacity', '0');
    	setTimeout(function() {
    		if (el == 'child') {
		    	node.remove();    		
    		}else{
    			node.parent().remove();
    		}
    	}, 400);
    	$.post(window.location.origin+'/Petugaspustaka/removeMenu', {'id':id, 'el':el}, function(data) {
    		// console.log(data);
    	});
 	}

	function compileMenu() {
		const parent = $('#menuContainer').children();
 		let no = 1, menu = [], subMenu = [];
 		for (const p of parent) {
 			//Lock
 			if (no) {
	 			no = 0;
	 			const name = p.children[0].children[0].children[0].children[0].textContent;
	 			var kodeParent = p.children[0].children[0].getAttribute('data-kode');
	 			menu.push({'alias': name,'kode': kodeParent});
 				for (const item of p.children[0].children[1].children) {
 					subMenu.push({
						'alias': item.children[0].textContent,
						'kode': item.getAttribute('data-kode'),
						'parent': kodeParent,
					});
 				};
 			}
 			//unlock
 			else {
 				var cek = p;
 				for (const li of p.children) {
 					var name = li.children[0].children[0].children[0].textContent;
 					var kodeParent = li.children[0].getAttribute('data-kode');
 					menu.push({'alias': name,'kode': kodeParent});
 					for (const item of li.children[1].children) {
 						subMenu.push({
 							'alias': item.children[0].textContent,
 							'kode': item.getAttribute('data-kode'),
 							'parent': kodeParent,
 						});
 					}
 				}
 			}
 		}
 		return [menu, subMenu];
	}
</script>
<?= $this->endSection(); ?>">