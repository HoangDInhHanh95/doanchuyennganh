


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
       
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }
      .swiper-pagination{
        display: none;
      }
      .swiper-button-next,
      .swiper-button-prev{
        color: #ffffff;
        background: rgb(210 208 208 / 40%);
        
      }
      

      #hanh.swiper-container {
        width: 100%;
        height: 100%;
      }

      #hanh .swiper-slide {
        text-align: center;
        font-size: 18px;
        

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      /*  bat dau code*/
      #box_img_prod{
        width: 86%;
        height: 65%;
        padding: 8px;
        border-radius: 5%;
        margin-top: -20px !important;
        cursor: pointer;
      }
      #image_prod{
        width: 100%;
      }
      #box_img_prod #image_prod:hover{
        margin: 5px auto 25px;
        transition: all .2s ease-in-out;
      }
      .box_bar_phone{
        flex-direction: column;
        background-color: rgba(255,255,255,0.6) ;
        max-height: 90%;
        margin-top: 1%;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,1);
        position: relative;
      }
      .box_bar_phone a {
        text-decoration: none;
      }
      .discount_prod{
        background: #D62C2C;
        width: 80px;
        color: #f1f1f1;
        position: absolute;
        top: 10px;
        left:0px;
        border-radius: 5%;
        font-size:13px !important;
        padding: 7px;
      }
    </style>
  </head>


  <?php
  include '../../models/connectDB.php'; // file connect
  $strSQL = "SELECT * FROM `productphoneandtablet` WHERE idclassification = '1' ORDER by idsp DESC LIMIT 0,12";
  $arrayprod = mysqli_query($conn, $strSQL);

?>

  <body>
    <!-- Swiper -->
    <div id="hanh" class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <?php while($rows = mysqli_fetch_array($arrayprod)){ ?>
       
          <div class="swiper-slide box_bar_phone">
            <div id="box_img_prod">
            <a href="detailproduct.php?id=<?=$rows["idsp"]?>&idclass=<?=$rows["idclassification"]?>&idsp=<?=$rows["idsp"]?>" >
                <img src="../uploads/<?php echo $rows["hinhanh"] ?>" alt="img" id="image_prod">
              </a>
            </div>
            <div class="discount_prod"> Giảm <?php echo $rows["phantramgiamgia"]; ?> %</div>
            <h3 id="title_prod" >
              <a href="detailproduct.php?id=<?=$rows["idsp"]?>&idclass=<?=$rows["idclassification"]?>&idsp=<?=$rows["idsp"]?>">
                <?php echo $rows["tenmay"] ?>
              </a>
            </h3>
              <p id="price_prod">
                <a href="detailproduct.php?id=<?=$rows["idsp"]?>&idclass=<?=$rows["idclassification"]?>&idsp=<?=$rows["idsp"]?>"><?php echo number_format($rows["gia"]) ?> VND</a>
              </p> 
          </div>
        <?php } ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper("#hanh", {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: "#hanh .swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: "#hanh .swiper-button-next",
          prevEl: "#hanh .swiper-button-prev",
        },
        autoplay:{
            delay: 2000,
        },
      });
    </script>
  </body>
</html>
