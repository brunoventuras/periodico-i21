<?php
    $file = 'json/magazine.json';
    $magazine = json_decode(file_get_contents($file),true);  
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  
    <script src="functions.js"></script>
    <script src="plugins/Toastr/toastr.js"></script>


    <!-- CSS -->
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" >
    <link href="css/style_desktop.css" rel="stylesheet" type="text/css"  media="screen" />
    <link href="css/style_tablet.css" rel="stylesheet" type="text/css"  media="screen" />
    <link href="css/style_mobile.css" rel="stylesheet" type="text/css"  media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="plugins/Toastr/build/toastr.css" rel="stylesheet">
    <link href="plugins/flexbin/flexbin.css" rel="stylesheet" >


    <title>Periódico - Instrumento21</title>
<style>
  #topo .menu {
    position: fixed;
  }
</style>
  </head>
  <body>
    <div class="row">
     
      <div id="corpo" class="col-md-12 col-lg-12 col-xl-12">
        <div id="fullview-lookbook" class="lBookDef">
          <div class="lBookDef-r1 justify-content-md-center">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
              <div class="carrocel-lBookDef">
                <?php foreach ($magazine as $key => $value) { ?>
                  <div id="btnThumbLBook-<?= $value['NR_ORDEM']?>" class="btnThumbLBook" data-cmnh="<?= $value['DC_LOCAL']?>/" data-qntd="<?= $value['NR_IMGS']?>" data-ordem="<?= $value['NR_ORDEM']?>" onclick="magazine(this);">
                    <img class="carrImgLBook" src="<?= $value['DC_LOCAL']?>/1.jpg" alt="" style="width:200px!important;height:266px!important">
                    <div class="col-12 col-sm-12 offset-2 col-md-10 col-lg-10 col-xl-10 lBookDef-txt">
                      <h2 class="txt-h2-lb"><?= $value['DC_MAGAZINE']?></h2>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>

            <div id="magazine" class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 ">
              <?php /*require_once "magazine/index.php"; */?>
            </div>


          </div>
        </div>
          
      </div>
      <div class="row lBookDef-r2"></div>
    </div>
    
    <script>
    // console.log("Width:"+window.innerWidth)
    // console.log("Height:"+window.innerHeight)

    
//MENU
let icon = document.querySelector('.hamburger');
  let menu = document.querySelector('.menu');
  let one = document.querySelector('.one');
  let two = document.querySelector('.two');
  let three = document.querySelector('.three');




  let open = () => {
      one.style.transform = 'rotate(45deg)';
      two.style.transform = 'rotate(-45deg)';
      one.style.top = '10px';
      two.style.top = '10px';
      three.style.top = '20px';
      three.style.opacity = '0';

      one.style.backgroundColor = "#FFFFFF"
      two.style.backgroundColor = "#FFFFFF"
      
      menu.style.transform = 'translateX(0%)';
      menu.style.display = 'flex';
      
      icon.classList.remove('closed');
      icon.classList.add('open');
      
      icon.removeEventListener('click', open);
      icon.addEventListener('click', close);
    };
    
    let close = () => {
      
      one.style.transform = 'rotate(0)';
      two.style.transform = 'rotate(0)';
      
      three.style.opacity = '1';
      
      one.style.top = '0';
      two.style.top = '10px';
      three.style.top = '20px';


      one.style.backgroundColor = "#000000"
      two.style.backgroundColor = "#000000"
      three.style.backgroundColor = "#000000"
      
      menu.style.transform = 'translateX(100%)';
      menu.style.display = 'none';
      
      icon.classList.remove('open');
      icon.classList.add('closed');
      
      icon.removeEventListener('click', close);
      icon.addEventListener('click', open);

  };


    if(icon.classList.contains('closed')){
      icon.addEventListener('click', open);
    } else {
      icon.addEventListener('click', close);
    }



//FIM MENU 



      
 
      
      function pageRoute(e){
        let page = e.dataset.page
          switch (page) {
            case 'contato':
            case 'represente':
            case 'revenda':
            case 'trabalhe':
                window.location.href = 'pages/forms/?page='+ page;
              break;        
            case 'home':
                window.location.href = '';
              break;        
            default:
                window.location.href = 'pages/'+ page; 
              break;
          }
      }

      $(document).ready(function() {
        let ordem = 99999999999
        let id = '#btnThumbLBook-0'

        $('.btnThumbLBook').each(function (i){
          if($(this).data('ordem') < ordem){
             ordem = $(this).data('ordem')
             id = "#btnThumbLBook-"+ordem
          }
        })
        $(id).trigger('click');
      })


      function magazine(e){
        img = e.dataset.cmnh
        qdt = e.dataset.qntd
        $.ajax({
          type: "POST",
          url: "magazine/index.php",
          data: {img,qdt},
          cache: false,
          beforeSend: function () {
            // modal.show()
          },
          success: function (data) {
            $(`#magazine`).html(data)
          },
          complete: function(jqXHR, textStatus){
            // modal.hide()
          }
        });
      }
    </script>

  </body>
</html>

