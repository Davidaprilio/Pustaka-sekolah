<?= $this->extend('layout/Pustaka'); ?>
<?= $this->section('Pustaka'); ?>
<style type="text/css">
    .img-Sampul {
    position: relative;
    border-radius: .25rem;
    max-width: 200px;
    height: auto;
    margin: 0 auto;
}
.labelInput {
    cursor: pointer;
    position: absolute;
    bottom: -3px;
    right: 5px;
    text-align: center;
    left: 5px;
    font-size: 15px;
    z-index: 1;
    color: #eee;
    padding: 20px 0 0;
    background-color: rgba(0,0,0,.5);
    clip-path: polygon(58% 14%, 73% 21%, 86% 32%, 100% 47%, 100% 100%, 0 100%, 0 53%, 12% 34%, 24% 23%, 44% 14%);
    transition: .09s ease-in;    
}
.labelInput span {
    transistion: .2s ease-in;    
    display: block;
    opacity: 0;
    margin-bottom: -15px;
}
.labelInput:hover {
    font-size: 16px;
    padding: 15px 0 5px;
    background-color: rgba(0,0,0,.8);
}
.labelInput:hover span {
    opacity: 1;
    margin-bottom: 0;
}
.labelInput input {
    cursor: pointer !important;
    position: absolute;
    font-size: 0px;
    padding: 0;
    z-index: -2;
    left: 0;
    color: transparent;
    margin: 0;
    opacity: 0;
}
.sampulInput input {
    cursor: pointer;
    z-index: 2
}
</style>
    <div id="main" class="px-0 pt-0 pb-5">

        <div class="pt-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white pb-0">
                    <li class="breadcrumb-item">Pustaka</li>
                    <li class="breadcrumb-item" id="katGrub">Unggah</li>
                    <li class="breadcrumb-item active" id="katMenu" aria-current="page">Buku</li>
                </ol>
            </nav>
            <div class="container d-flex" id="buku">
                <div class="container">
                    <div class="row p-3" style="max-width: 1000px">
                        <div class="col-12 col-sm-4 text-center text-md-right">
                            <form action="<?= base_url('/Engine/upBook') ?>" method="POST" enctype="multipart/form-data">
                            <div class="img-Sampul">
                                <img src="<?= base_url('img/book/default.gif'); ?>" class="img-thumbnail">
                                <label class="labelInput" for="fileSampul" data-browse="Sampul Buku">
                                    <i class="fa fa-camera"></i>
                                    <span>Pilih Sampul</span>
                                    <input type="file" class="custom-file-input" id="fileSampul" accept="image/x-png,image/jpeg,image/jpg" onchange="previewIMG()" name="imgSampul">
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 bg-white rounded py-4 shadow">
                                <div class="custom-file input-group-sm">
                                    <input type="file" class="custom-file-input" id="inputBook" name="book" onchange="viewFilename()" accept="application/pdf">
                                    <label class="custom-file-label" for="inputBook" data-browse="Cari file" id="viewname">Pilih Buku dengan format PDF</label>
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="judulbuku">Judul</label>
                                    <input type="text" class="form-control" id="judulbuku" name="titlebook">
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" id="penulis" name="writer">
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" id="penerbit" name="publisher">
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="kate">Pesan Untuk Admin</label>
                                    <textarea class="form-control" style="height: 300px;" id="kate" name="kategori"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
<script>
    function previewIMG() {
        const sampul = document.querySelector('#fileSampul'),
              imgPreview =  document.querySelector('.img-thumbnail'),
              fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    function viewFilename() {
        const book =  document.querySelector('#inputBook'),
              judul =  document.querySelector('#judulbuku'),
              label =  document.querySelector('#viewname'),
              nameFile = book.files[0].name;
        label.textContent = nameFile;
        judul.value = nameFile.replace(".pdf","");
    }
</script>
<?= $this->endSection(); ?>