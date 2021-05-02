<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baca buku</title>
  <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
</head>

<body class="w-100 vh-100 position-relative overflow-hidden">
  <iframe id="frame" src="<?= base_url('/pdfjs/web/viewer.html?file=') . $fileBook ?>" class="position-absolute border-0 w-100 h-100"></iframe>
  <script src="<?= base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script type="text/javascript">
    var frame = document.getElementById("frame");
    var no = frame.contentDocument.getElementById("pageNumber");

    $(document).ready(function() {
      const param = '<?= $idB . "/" . $idU ?>';
      let active = true;
      let tim = 0;

      function cekBaca() {
        setTimeout(function() {
          if (active) {
            console.log((tim++) + ' menit');
            $.ajax({
              url: window.location.origin + '/Engine/upReadUser/' + param,
              type: 'get',
              dataType: 'ajax'
            });
            active = false;
            cekBaca();
          } else {
            let conf = confirm('Hai apakah kamu masih membaca buku ini klik "Oke jika masih membaca"');
            if (conf) {
              cekBaca();
            } else {
              $.ajax({
                url: window.location.origin + '/Engine/endRead/' + param,
                type: 'get',
                dataType: 'ajax'
              });
              window.location.href = "<?= base_url('/DetailBuku/') . '/' . $idB ?>";
            }
          }
        }, 60000);
      }
      setTimeout(function() {
        $("iframe").contents().on('touch click mouseover', function() {
          active = true;
        });
        $("iframe").contents().find('#viewerContainer').scroll(function() {
          active = true;
        });
        cekBaca();
        $.ajax({
          url: window.location.origin + '/Engine/startRead/' + param,
          type: 'get',
          dataType: 'ajax'
        });
        console.log('start');
      }, 180000);
    });

    window.onload = function() {
      let numPage = 1;
      const iframe = document.getElementById("frame");
      const inPage = iframe.contentWindow.document.getElementById('pageNumber');
      setInterval(function() {
        numPage = parseInt(inPage.value) < numPage ? (parseInt(inPage.value) - numPage > 3 ? parseInt(inPage.value) : numPage ) : parseInt(inPage.value) ;
        console.log(numPage);
      }, 4000);  
    }
    // $("iframe").contents().on('keyup', function(e) {
    //   if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 33 || e.keyCode == 34 || e.keyCode == 78 || e.keyCode == 80) {
    //     console.log('Active Updated');
    //   }
    // });
  </script>
</body>

</html>