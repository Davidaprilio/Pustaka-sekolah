touchsurface = document.getElementById('main');
touchsurface.addEventListener("swap", function(event){alert('Swaped ' + event.detail.direction + ' at ' + event.target.id);}, false);
const bUrl = 'http://' + window.location.host;
let tmpData=null;

function openNav() {
    $('#mySidenav').addClass('show');
    $('#main').addClass('show');
    document.getElementById("trigger-menu").setAttribute( "onClick", "closeNav();" );
}(jQuery);
function closeNav() {
    $('#mySidenav').removeClass('show');
    $('#main').removeClass('show');
    document.getElementById("trigger-menu").setAttribute( "onClick", "openNav();" );
}(jQuery);
$(window).on("swipeleft", openNav() );
$(window).on("swiperight", closeNav() );

function allBook() {
    window.scrollTo(0,0);
    let kategori = document.getElementById('menuBook').getElementsByTagName('li');
    let urlj = '';
    let cekNull = 0;
    const allKode = dpjsc.subMenu;
    allKode.forEach((data,i) => {
        if ((allKode.length) == i) {
            if (cekNull == 0) {
                $('#buku').append(`<div class="d-flex w-100 align-items-center justify-content-center text-muted display-3" style="height: 60vh">Kosong</div>`);
            }
        }
        let noInd = i;
        $.ajax({
            url: bUrl + '/API/getBookOn/' + data.kode + '/7',
            type: 'get',
            dataType: 'json',
            success: function(result) {
                if (result.count > 0) {
                    cekNull++;
                    $('#buku').append(`
                        <div class="shadow-sm border drap rounded mb-1 p-2">
                            <div class="d-flex justify-content-between align-conten-center">
                                <h5>`+data.alias+`</h5>
                                <span class="d-inline text-primary" id="moreBook" goTo="`+data.kode+`" >Lainya</span>
                            </div>
                            <div class="mb-1 conten-scroll" id="dtlbk`+noInd+`">
                            </div>
                        </div>
                    `); 

                    $.each(result.items, function(i,data) {
                       $('#dtlbk'+noInd).append(`
                            <div class="card d-inline-block shadow-sm mb-1 mx-1" >
                                <img src="`+bUrl+data.sampulMin+`" class="card-img-top mx-auto">
                                <div class="p-1 p-sm-2">
                                    <p class="text-dark my-0 py-0 buku_title" id="titleBook" uisb="`+data.idBuku+`" title="`+data.judulBuku+`">`+data.judulBuku+`</p>
                                    <p class="d-block my-0 authorBook">
                                        <small class="text-muted">`+data.penulis+`</small>
                                    </p>
                                </div>
                            </div>
                        `);
                    });
                    $('#loadingStart').remove();
                }
            },
            error: function(result) {
                // ERRRORR...
            }
        });
    });
    function cek() {
        if (cekNull == 0) {
            $('#buku').append(`<div class="d-flex w-100 align-items-center justify-content-center text-muted display-3" style="height: 60vh">Kosong</div>`);
        }
    }
}
function inCategory (kategori) {
    window.scrollTo(0,0);
    const uu = bUrl + '/API/getBookOn/' + kategori + '/0';
    // console.log(uu);
    $.ajax({
        url: uu,
        type: 'get',
        dataType: 'json',
        success: function(result) {
                $('#buku').html(`<div class="row mx-n1" id="rowBook"></div>`);
                $.each(result.items, function(i, data) {
                    $('#rowBook').append(`
                        <div class="card d-inline-block shadow-sm mb-1 mx-sm-1 overflow-hidden">
                            <img src="`+bUrl+data.sampulMin+`" class="card-img-top mx-auto">
                            <div class="p-1 p-sm-2">
                                <p class="text-dark my-0 py-0 buku_title" id="titleBook" uisb="`+data.idBuku+`" title="`+data.judulBuku+`">`+data.judulBuku+`</p>
                                <p href="#" class="d-block my-0 authorBook">
                                    <small class="text-muted">`+data.penulis+`</small>
                                </p>
                            </div>
                        </div>
                        `);
                });
                if (result.count == 0) {
                    $('#buku').append(`<div class="d-flex w-100 align-items-center justify-content-center text-muted display-3" style="height: 60vh">Kosong</div>`);
                }
            }
    });
}
function cekKategori(htmlTextMenu) {
    let kategori = dpjsc.subMenu, cek = [];
    cek['status'] = false;
    kategori.forEach((data,i) => {
        if (htmlTextMenu == data.alias) {
            const p = $(`[key=${data.kode}]`);
            cek['status'] = true;
            cek['attrib'] = {
                subMenu: data.alias,
                menu: $('#k'+p.attr('id')).html(),
                key: data.kode,
                id: p.attr('id'),
                code: p.attr('uniccode'),
            };
        }
    })
    if (!cek.status) {
        errorView('Ketgori tidak ada');
    }
    return cek;
}
function errorView(text) {
    return $('#buku').html(`<div class="row justify-content-center text-dark align-items-center w-100 flex-column" style="height: 65vh;"><h2 class="display-1" style="text-shadow: 1px 1px 0 #ddd, 3px 3px 0 #ddd, 5px 5px 0 #ddd, 7px 7px 0 #ddd, 9px 9px 0 #ddd, 10px 10px 0 #ddd;">404</h2><p class="h2 text-muted" style="text-shadow: 1px 1px 0 #ddd, 2px 2px 0 #ddd, 3px 3px 0 #ddd;">`+text+`</p></div>`);
    die();
}
function detailBuku(id) {
    window.scrollTo(0,0);
    $.ajax({
        url: bUrl + '/API/book/' + id,
        type: 'get',
        dataType: 'json',
        success: function(result) {
            saveResult(result);
            updateURL( bUrl+'/DetailBuku/'+id, 'DetailBukuPagexyz', 'detailBook-'+id, id);
            if (result.status == 'OK') {
                let likeBtn = '';
                let cB = getCookie('Bk-'+result.items.idBuku);
                if (cB) {
                    likeBtn = `onClick="unlike('`+result.items.idBuku+`')"><i class="fa fa-heart" id="heartFA" style="color: rgb(255, 184, 191);"></i>`;
                }else{
                    likeBtn = `onClick="like('`+result.items.idBuku+`')"><i class="fa fa-heart" id="heartFA"></i>`;
                }
                $('#buku').html(`
                    <div class="card border-0 mb-3 text-dark">
                      <div class="row no-gutters mt-md-3">
                        <div class="col-12 pl-md-5 text-center d-md-none">
                            <h5 class="card-title mb-3 mt-1 text-wrap text-center">`+result.items.judulBuku+`</h5>
                        </div>
                        <div class="col-3 col-md-3 pl-md-5 text-center">
                            <img src="`+result.items.sampulOri+`" class="card-img shadow-sm" style="max-width: 200px">
                        </div>
                        <div class="col-9 col-md-8">
                          <div class="card-body pt-0">
                            <h5 class="card-title mb-0 d-none d-md-block">`+result.items.judulBuku+`</h5>
                            <p class="card-text my-0"><small class="text-muted">Unggah `+result.items.diunggahParse+` . `+result.items.kategori+`</small></p>
                            <p class="mt-0">
                                <span class="badge badge-primary">Dibaca `+result.items.dibaca+`</span>
                                <span class="badge badge-danger" style="cursor: pointer" id="jasuh" `+ likeBtn +` Suka <span id="valLike">`+result.items.rating+`</span> </span>
                                <a class="badge badge-success" href="`+bUrl+`/unduh/`+result.items.idBuku+`"><i class="fa fa-download"></i> Unduh `+result.items.unduhan+`</a>
                            </p>
                            <div class="card-text my-auto">
                                <ul class="font-weight-light list-unstyled" style="font-size: 15px;">
                                    <li class="text-wrap">Penulis : <p style="margin-left: 5px;">`+result.items.penulis+`</p></li>
                                    <li class="text-wrap">Penerbit : <p style="margin-left: 5px;">`+result.items.penerbit+`</p></li>
                                </ul>
                            </div>
                            <a href="`+window.location.origin+`/Baca/`+result.items.idBuku+`" class="btn btn-primary btn-sm mt-auto" onClick="openBook(this)">Baca buku</a>
                          </div>
                        </div>
                        <div class="col-12 col-md-8 mt-3">
                            <div class="container p-3">
                                <p class="text-wrap font-weight-lighter">`+result.items.deskripsi+`</p>
                            </div>
                        </div>
                      </div>
                    </div>
                `);
                $('#Dbuku').html(result.items.judulBuku);
            } else {
                errorView('Buku tidak ada');
            }
        }
    });
}
function openBook(btn) {
    const newBtn = document.createElement("button");
    newBtn.classList.add('btn','btn-sm','btn-primary');
    newBtn.setAttribute('disabled','');
    newBtn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Membuka...`;
    btn.parentNode.replaceChild(newBtn,btn);
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return false;
}
function saveResult(data) {
    tmpData = data;
}
function like(id) {
    let t = $('#valLike').html();
    t++;
    $('#valLike').html(t);
    const d = new Date();
    d.setTime(d.getTime() + ( (365+182)*24*60*60*1000) );
    document.cookie = "Bk-"+id+"=true; expires="+d.toUTCString();
    $('#heartFA').css('color','#ffb8bf');
    $('#jasuh').attr('onClick','unlike("'+id+'")');
    let b = window.location.origin+'/Engine/likeAndunlike/'+id+'/plus'
    $.ajax({ url: b, type: 'get', dataType: 'ajax'});
}
function unlike(id) {
    let t = $('#valLike').html();
    t--;
    $('#valLike').html(t);
    document.cookie = "Bk-"+id+"=true; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/DetailBuku;";
    $('#heartFA').css('color','#fff');
    $('#jasuh').attr('onClick','like("'+id+'")');
    let b = window.location.origin+'/Engine/likeAndunlike/'+id+'/min'
    $.ajax({ url: b, type: 'get', dataType: 'ajax'});
}
function searchBook(n,l){
    $.ajax({
        url: bUrl + '/API/searchBook/'+n+'/'+l,
        type: 'get',
        dataType: 'json',
        success: function(result) {
            saveResult(result.keyword);
            if (result.status == 'OK') {
                $('#buku').html(`<div class="row" id="rowBook"></div>`);
                $.each(result.items, function(i, data) {
                    $('#rowBook').append(`
                        <div class="card d-inline-block shadow-sm mb-1 mx-1" >
                            <img src="`+bUrl+data.sampulMin+`" class="card-img-top mx-auto">
                            <div class="p-2">
                                <p class="text-dark my-0 py-0 buku_title" id="titleBook" uisb="`+data.idBuku+`" title="`+data.judulBuku+`">`+data.judulBuku+`</p>
                                <p href="#" class="d-block my-0 authorBook">
                                    <small class="text-muted">`+data.penulis+`</small>
                                </p>
                            </div>
                        </div>
                    `);
                });
                if (result.count == 0) {
                    $('#buku').append(`<div class="d-flex w-100 align-items-center justify-content-center text-muted display-3" style="height: 60vh">Kosong</div>`);
                }
            }
        }
    });
}
function updateBreadcrumb(G,M,P=false) {
    $('.breadcrumb').empty();
    $('.breadcrumb').html(`
        <li class="breadcrumb-item">Pustaka</li>
    `);
    if (G != null) {
        $('.breadcrumb').append(`
            <li class="breadcrumb-item" id="katGrub">`+G+`</li>
        `);
    }
    if (P) {
        $('.breadcrumb').append(`
            <li class="breadcrumb-item" id="katMenu">`+M+`</li>
            <li class="breadcrumb-item active" id="Dbuku" aria-current="page">`+P+`</li>
        `);
    } else {
        $('.breadcrumb').append(`
            <li class="breadcrumb-item active" id="katMenu" aria-current="page">`+M+`</li>
        `);
    }
}
function updateURL(url,id=null,preMenu=null,idbook='') {
    history.pushState(
        {
            idPage: id, //namaPage
            previousMenu: preMenu, // kodeUnik menu (kode kategori)
            book: idbook, //id Buku
        },'BarTitel',url
    );
}
function loading() {
    $('#buku').append(`
        <div id="loadingStart" class="w-100 mt-,2 d-flex justify-content-center align-items-center position-absolute" style="top: 0; left: -10px; right: -10px; height: 80vh">
            <div class="spinner-grow" style="width: 4rem; height: 4rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    `);
}
/*
<script>alert(1)</script>
*/
function runSearch() {
    window.scrollTo(0,0);
    const keyword = $('#search-Book').val();
    loading();
    $('#mySidenav').removeClass('show');
    $('#menuBook .nav-link').removeClass('activeMenu');
    $('[spacialatt]').addClass('activeMenu');
    $('#buku').html('');
    searchBook(keyword,0);
     $('#search-Book').val('').blur();
    setTimeout(function() {
        updateBreadcrumb('Semua Buku', 'Cari buku', tmpData);
    },1000);
}

// ==================================>  Navigation
let kMenu;
//klik menu
$('#menuBook .nav-link').on('click', function() {
    $('#menuBook .nav-link').removeClass('activeMenu');
    $(this).addClass('activeMenu');

    //memperbarui attr dengan value attr unicCode btn yang di klik
    $('#menuBook').attr('act',$(this).attr('unicCode'));
    //mengambil nama btn yang di klik
    kMenu = $('#k'+$(this).attr('id')).html(); 
    $('#buku').html('');
    loading();
    updateBreadcrumb(kMenu, $(this).html());
    $('#main').removeClass('show');
    $('#mySidenav').removeClass('show');
    var u = $(this).html().replace(/ /g,"-");
    updateURL( bUrl + '/' + u, u,$(this).attr('key'));
    if ( $(this).attr('spacialatt') == 'true') {
        allBook();
    } else {
        inCategory( $(this).attr('key') );
    }
    // cekKategori($(this).html());
});

//klik buku lainya pada page semua buku
$('#buku').on('click', '#moreBook', function() {
    $('#menuBook .nav-link').removeClass('activeMenu');
    $('#buku').html('');
    loading();
    const menu = $('[key='+$(this).attr('goTo').replace(/ /g, "")+']'); //cari btnnya submenu di sidebar
    menu.addClass('activeMenu'); 
    kMenu = $('#k'+menu.attr('id')).html(); // ambil path submenu
    $('#menuBook').attr('act',menu.attr('unicCode')); //update attr act di sidebar
    updateBreadcrumb(kMenu, menu.text());
    var u = menu.text().replace(/ /g,"-");
    updateURL( bUrl + '/' + u, u,menu.attr('key'));
    inCategory( $(this).attr('goTo') );
});

//klik lihat buku
$('#buku').on('click', '#titleBook', function() {
    $('#buku').html('');
    var uib = $(this).attr('uisb');
    loading();
    $('.breadcrumb-item').removeClass('active');
    $('ol.breadcrumb').append('<li class="breadcrumb-item active" id="Dbuku" aria-current="page"></li>');
    detailBuku(uib);
});
$('#search-Book').on('keyup', function(e){
    if (e.keyCode === 13) {
        if ($('#search-Book').val() != '') {
            runSearch();
        }
    }
});
$('#btnSearch').on('click', function() {
    if ($('#search-Book').val() != '') {
        runSearch();
    }
});


$(document).ready(function() {
    var p = $('#menuBook').attr('baseMenu');
    loading();
    if (p == 'DetailBuku') { //jika akses ke detail buku
        var t = window.location.pathname;
        var idB = t.replace('/DetailBuku/', '');
        detailBuku(idB);
        setTimeout(function() {
            const br = tmpData.pathBook.arr;
            updateBreadcrumb(br[1],br[2],tmpData.items.judulBuku);
        }, 1500);
        $('[spacialatt]').addClass('activeMenu');
    } else if (p == 'Semua Buku') { //jika akses ke semua buku
        allBook();
        updateURL(bUrl + '/Semua-Buku' , 'Semua Buku', '4llB00k-xyz');
        updateBreadcrumb(null,'Semua Buku');
    } else { //jika akses menu kategori yang bukan kategori semua buku
        const a = cekKategori(p), k = a.attrib, slug = k.subMenu.replace(/ /g,"-");
        if (!a.status) {return false; }
        updateBreadcrumb(k.menu,k.subMenu);
        updateURL(bUrl + '/' +  slug, slug, k.key);
        inCategory( k.key );
    }
});


window.onpopstate = function (event) {
    var p = history.state.idPage.replace(/-/g," "),
        uC = history.state.previousMenu,
        menu = $('[key='+uC+']');
    $('#menuBook .nav-link').removeClass('activeMenu');
    menu.addClass('activeMenu');
    $('#buku').html('');
    loading();
    console.log(p+' - '+uC);
    if (p == 'DetailBukuPagexyz') {
        detailBuku(history.state.book);
        updateBreadcrumb( $('#k'+menu.attr('id')).html(), p, 'detail');
    } else if (p == 'Semua Buku') {
        allBook();
        updateBreadcrumb( $('#k'+menu.attr('id')).html(), p );
    } else {
        inCategory( uC );
        updateBreadcrumb( $('#k'+menu.attr('id')).html(), p );
    }
};