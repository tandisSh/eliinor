<?php 
include("vendor/dbConnection.php");
 include("header.php");
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// if (!isset($_SESSION['user_id'])) {
//     die("لطفاً وارد حساب کاربری خود شوید.");
// }
// $user_id = $_SESSION['user_id']; // شناسه کاربر
// if(isset($_SESSION['users']['id'])){
//     $user_id = $_SESSION['users']['id'];
//  $resultuser=$pdo->prepare("SELECT * FROM users  WHERE id=$user_id ");
//  $resultuser->execute();
// $users=$resultuser->FETCH(PDO::FETCH_ASSOC);
//  }
if(isset($_GET['id'])){
    $id = $_GET['id'];
 $result=$pdo->prepare("SELECT * FROM products  WHERE id=$id ");
 $result->execute();
$products=$result->FETCH(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/single.css">
</head>
<body>
    <!-- header -->
 
    <!-- header end -->
    <div class="navbar">
        <p > فروشگاه الینور </p>
        <p style="color:#e35f83;"> > </p>
        <p >  همه محصولات  </p>
        <p style="color:#e35f83;"> > </p>
        <p id="nav-text">  ست مانتو و شلوار آلما 9373  </p>
    </div>
    <!-- main -->
    <div id="main-2">
        <div style="display: flex;">
         
            <div id="product-picture">
                <div data-v-cd74b5da="" class="product__gallery__main__image">
                    <img style="width:386px;height: 482px;" data-v-cd74b5da="" src="../public/images/<?php echo $products['pro_image']; ?> ">
                </div>
            </div>
            <div id="info-part">
                <div id="name-part">
                    <div style="display: flex;">
                        <p style="font-size: x-large;font-weight: 600;"><?php echo $products['pro_name']; ?>   </p>

                        <div data-v-a3e2bc7a="" class="productButtons">
                            
                            <button data-v-942cf548="" data-v-a3e2bc7a="" class="product__gallery__main__image__icon favorite">
                                <svg data-v-942cf548="" class="heartIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 21.66 20.827">
                                    <path data-v-942cf548="" data-name="Icon ionic-ios-heart-empty" d="M19.2,3.938h-.052A5.924,5.924,0,0,0,14.2,6.645,5.924,5.924,0,0,0,9.259,3.938H9.206A5.887,5.887,0,0,0,3.375,9.821,12.674,12.674,0,0,0,5.864,16.73,43.615,43.615,0,0,0,14.2,24.764a43.615,43.615,0,0,0,8.341-8.034,12.674,12.674,0,0,0,2.489-6.909A5.887,5.887,0,0,0,19.2,3.938Zm2.166,11.934a39.935,39.935,0,0,1-7.164,7.06,39.994,39.994,0,0,1-7.164-7.065A11.233,11.233,0,0,1,4.833,9.821,4.418,4.418,0,0,1,9.217,5.4h.047a4.365,4.365,0,0,1,2.14.562,4.55,4.55,0,0,1,1.583,1.484,1.463,1.463,0,0,0,2.447,0,4.6,4.6,0,0,1,1.583-1.484,4.365,4.365,0,0,1,2.14-.562H19.2a4.418,4.418,0,0,1,4.384,4.42A11.375,11.375,0,0,1,21.369,15.871Z" transform="translate(-3.375 -3.938)" fill="blue"></path>
                                </svg>
                            </button>
                            <a data-v-a3e2bc7a="" class="productShare">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-2 bi bi-share" viewBox="0 0 16 16">
                                    <path fill="#444" fill-width="1.5" d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <p style="color: #e35f83;font-size: small;">دسته:</p>
                        <p style="font-size: small;">ست لباس زنانه , همه محصولات</p>
                    </div>
                </div>
                <hr>
                <!-- <div id="color-part">
                    <p>رنگ ها:</p>
                    <div data-v-f0f5fe86="" class="product__colors">
                        <div data-v-f0f5fe86="" class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-rtl">
                            <div class="swiper-wrapper"><div data-v-f0f5fe86="" class="swiper-slide swiper-slide-active" style="margin-left: 15px;">
                                <div data-v-f0f5fe86="" class="box-color">
                                    <div data-v-f0f5fe86="" class="color">
                                        <div data-v-f0f5fe86="" class="selected product__colors__item" style="background: rgb(0, 0, 0);">
                                            <svg data-v-f0f5fe86="" class="selectedColorSvg" xmlns="http://www.w3.org/2000/svg" width="21.125" height="16.813" viewBox="0 0 21.125 16.813"><path data-v-f0f5fe86="" id="Icon_metro-checkmark" data-name="Icon metro-checkmark" d="M19.2,5.784,9.962,15.024,5.651,10.712l-3.08,3.08,7.392,7.392L22.282,8.864Z" transform="translate(-1.864 -5.077)" fill="#fff" stroke="#000" stroke-width="1"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div data-v-f0f5fe86="" class="color-text">مشکی</div>
                                </div>
                            </div>
                            <div data-v-f0f5fe86="" class="swiper-slide swiper-slide-next" style="margin-left: 15px;">
                                <div data-v-f0f5fe86="" class="box-color">
                                    <div data-v-f0f5fe86="" class="color">
                                        <div data-v-f0f5fe86="" class="product__colors__item" style="background: rgb(176, 129, 64);">
                                        </div>
                                    </div>
                                    <div data-v-f0f5fe86="" class="color-text">نسکافه ای تیره</div>
                                </div>
                            </div>
                            <div data-v-f0f5fe86="" class="swiper-slide" style="margin-left: 15px;">
                                <div data-v-f0f5fe86="" class="box-color">
                                    <div data-v-f0f5fe86="" class="color">
                                        <div data-v-f0f5fe86="" class="product__colors__item" style="background: rgb(255, 126, 71);"></div>
                                    </div>
                                    <div data-v-f0f5fe86="" class="color-text">آجری روشن</div>
                                </div></div><div data-v-f0f5fe86="" class="swiper-slide" style="margin-left: 15px;">
                                    <div data-v-f0f5fe86="" class="box-color"><div data-v-f0f5fe86="" class="color">
                                        <div data-v-f0f5fe86="" class="product__colors__item" style="background: rgb(114, 170, 110);"></div>
                                    </div><div data-v-f0f5fe86="" class="color-text">سبز سیج 1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <p style="margin-top: 5%;"> راهنمای سایز</p>
                </div> -->
               
                <div id="price-part">
                   
                    <div style="width: 80%;">
                <div style="padding-bottom: 5%;color: #e35f83;">
                    <P style="margin-right: 8%;">مشخصات </P>
                    <hr style="width: 8%;
                    margin-left: 85%;
                    height: 3px;
                    background-color: #e35f83;
                    border-style: none;" >
                </div>
                
                <p style="font-weight: 600;font-size: larger;"><?php echo $products['pro_detail']; ?></p>
                    </div>
                    <br><br><br><br><br>
                    <div style="display: flex;">
                        <p style="font-weight: 600;font-size: larger;">قیمت:<?php echo $products['pro_price']; ?> تومان</p>
                        <!-- <button class="price-button">
                            <a href='vendor/UserBasket.php?product_id= '>
                                افزودن به سبد خرید
                            </a>
                        </button> -->
                        <form method="Get" action="vendor/UserBasket.php">
                            <input type="hidden" name="product_id" value="1">
                            <button type="submit">افزودن به سبد خرید</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <div style="display: flex;">
            <svg style="margin-top: 2.6%;margin-left: 1%;" width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-6e63b2b6="">
                <path d="M23.533 17.8739L4.02002 19.4869L0.402954 17.8739L4.02002 16.261L23.533 17.8739Z" fill="#F05454" data-v-6e63b2b6=""></path>
                <path d="M17.896 29.454L4.40308 23.7949L2.703 21.49L5.75305 21.6749L17.896 29.454Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M17.896 6.2959L4.40308 11.9548L2.703 14.2599L5.75305 14.0748L17.896 6.2959Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M8.56909 35.7499L2.21399 27.5709L2.06299 25.5178L3.94604 26.6638L8.56909 35.7499Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M8.56909 0L2.21399 8.17798L2.06299 10.231L3.94604 9.08496L8.56909 0Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
            </svg>
            <h5  style="color:#f05454;font-size: x-large;"> محصولات <span > مشابه </span></h5>
            <svg  style="margin-top: 2.6%;margin-right: 1%;" width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-6e63b2b6="">
                <path d="M0.402954 17.8739L19.9159 19.4869L23.533 17.8739L19.9159 16.261L0.402954 17.8739Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M6.03992 29.454L19.5328 23.7949L21.2329 21.49L18.1829 21.6749L6.03992 29.454Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M6.03992 6.2959L19.5328 11.9548L21.2329 14.2599L18.1829 14.0748L6.03992 6.2959Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M15.3668 35.7499L21.7219 27.5709L21.8729 25.5178L19.9899 26.6638L15.3668 35.7499Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
                <path d="M15.3668 0L21.7219 8.17798L21.8729 10.231L19.9899 9.08496L15.3668 0Z" fill="#F05454" data-v-6e63b2b6="">
                </path>
            </svg>
       
        </div>
        
        <!-- products -->
        <div class="products__home__products" data-v-6e63b2b6="">
            <div class="normal product" data-v-5be2f538="" data-v-6e63b2b6="">
                    <div class="product__image" data-v-5be2f538="">
                        <div class="img__holder" data-v-5be2f538="">
                            <div data-v-5be2f538="">
                                <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538="">
                                    <!---->
                                    <figure class="m-0 figure-product overflow-hidden" data-v-5be2f538="">
                                        <img style="width: 100%;" src="https://api.elinorboutique.com/storage/28cc9cf8-2729-4070-a7a2-6d3a0ba74140/product-3422.webp" alt="کت کوک دوزی کوتاه   4255" class="d-block w-100 image-product" data-v-5be2f538="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <button class="product__gallery__main__image__icon favorite productCard" data-v-942cf548="" data-v-5be2f538="">
                            <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624" data-v-942cf548="">
                                <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white" data-v-942cf548="">
                                </path>
                            </svg>
                        </button>
                        <div data-v-5be2f538="">
                            <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538=""><!----></a>
                        </div>
                    </div>
                    <div data-v-5be2f538="">
                        <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538="">
                            <div class="product__details bg-white" data-v-5be2f538="">
                                <a class="product__details__title product-title" href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538="">
                                    <span data-v-5be2f538="">کت کوک دوزی کوتاه   4255</span>
                                </a>
                                <div class="product__details__price" data-v-5be2f538="">
                                    <div class="theme3 product__info__price" data-v-6380910f="" data-v-5be2f538="">
                                        <!---->
                                        <span dir="rtl" class="product__info__price__amount" data-v-6380910f="">
                                            <span class="product__info__price__amount__number" data-v-6380910f="">۴۹۹.۰۰۰</span>
                                            <span class="type-price" data-v-6380910f=""> تومان </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="normal product" data-v-5be2f538="" data-v-6e63b2b6="">
                    <div class="product__image" data-v-5be2f538="">
                        <div class="img__holder" data-v-5be2f538="">
                            <div data-v-5be2f538="">
                                <a href="/product/4496/%D8%B4%D9%88%D9%85%DB%8C%D8%B2-%D9%84%DB%8C%D9%86%D9%86-%DB%8C%D9%82%D9%87-%D9%87%D9%81%D8%AA-4712" data-v-5be2f538="">
                                    <!---->
                                    <figure class="m-0 figure-product overflow-hidden" data-v-5be2f538="">
                                        <img style="width: 100%;" src="https://api.elinorboutique.com/storage/80a9c3aa-35d9-4cdc-bfc0-aad27ea8444f/product-4496.webp" alt="شومیز لینن یقه هفت 4712" class="d-block w-100 image-product" data-v-5be2f538="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <button class="product__gallery__main__image__icon favorite productCard" data-v-942cf548="" data-v-5be2f538="">
                            <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624" data-v-942cf548="">
                                <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white" data-v-942cf548="">
                                </path>
                            </svg>
                        </button>
                        <div data-v-5be2f538="">
                            <a href="/product/4496/%D8%B4%D9%88%D9%85%DB%8C%D8%B2-%D9%84%DB%8C%D9%86%D9%86-%DB%8C%D9%82%D9%87-%D9%87%D9%81%D8%AA-4712" data-v-5be2f538=""><!----></a>
                        </div>
                    </div>
                    <div data-v-5be2f538="">
                        <a href="/product/4496/%D8%B4%D9%88%D9%85%DB%8C%D8%B2-%D9%84%DB%8C%D9%86%D9%86-%DB%8C%D9%82%D9%87-%D9%87%D9%81%D8%AA-4712" data-v-5be2f538="">
                            <div class="product__details bg-white" data-v-5be2f538="">
                                <a class="product__details__title product-title" href="/product/4496/%D8%B4%D9%88%D9%85%DB%8C%D8%B2-%D9%84%DB%8C%D9%86%D9%86-%DB%8C%D9%82%D9%87-%D9%87%D9%81%D8%AA-4712" data-v-5be2f538="">
                                    <span data-v-5be2f538="">شومیز لینن یقه هفت 4712</span>
                                </a>
                                <div class="product__details__price" data-v-5be2f538="">
                                    <div class="theme3 product__info__price" data-v-6380910f="" data-v-5be2f538="">
                                        <!---->
                                        <span dir="rtl" class="product__info__price__amount alone" data-v-6380910f="">
                                            <span class="product__info__price__amount__number" data-v-6380910f="">۳۹۹.۰۰۰</span>
                                            <span class="type-price" data-v-6380910f=""> تومان </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="normal product" data-v-5be2f538="" data-v-6e63b2b6="">
                    <div class="product__image" data-v-5be2f538="">
                        <div class="img__holder" data-v-5be2f538="">
                            <div data-v-5be2f538="">
                                <a href="/product/4660/%D8%B3%D8%AA-%D9%BE%DB%8C%D8%B1%D8%A7%D9%87%D9%86-%D9%88-%D8%B1%D9%88%DB%8C%D9%87-4336" data-v-5be2f538="">
                                    <!---->
                                    <figure class="m-0 figure-product overflow-hidden" data-v-5be2f538="">
                                        <img style="width: 100%;" src="https://api.elinorboutique.com/storage/8743dedb-8b96-40cb-9dd1-9f939710ee35/product-4660.webp" alt="ست پیراهن و رویه 4336" class="d-block w-100 image-product" data-v-5be2f538="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <button class="product__gallery__main__image__icon favorite productCard" data-v-942cf548="" data-v-5be2f538="">
                            <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624" data-v-942cf548="">
                                <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white" data-v-942cf548="">
                                </path>
                            </svg>
                        </button>
                        <div data-v-5be2f538="">
                            <a href="/product/4660/%D8%B3%D8%AA-%D9%BE%DB%8C%D8%B1%D8%A7%D9%87%D9%86-%D9%88-%D8%B1%D9%88%DB%8C%D9%87-4336" data-v-5be2f538=""><!----></a>
                        </div>
                    </div>
                    <div data-v-5be2f538="">
                        <a href="/product/4660/%D8%B3%D8%AA-%D9%BE%DB%8C%D8%B1%D8%A7%D9%87%D9%86-%D9%88-%D8%B1%D9%88%DB%8C%D9%87-4336" data-v-5be2f538="">
                            <div class="product__details bg-white" data-v-5be2f538="">
                                <a class="product__details__title product-title" href="/product/4660/%D8%B3%D8%AA-%D9%BE%DB%8C%D8%B1%D8%A7%D9%87%D9%86-%D9%88-%D8%B1%D9%88%DB%8C%D9%87-4336" data-v-5be2f538="">
                                    <span data-v-5be2f538="">ست پیراهن و رویه 4336</span>
                                </a>
                                <div class="product__details__price" data-v-5be2f538="">
                                    <div class="theme3 product__info__price" data-v-6380910f="" data-v-5be2f538="">
                                        <!---->
                                        <span dir="rtl" class="product__info__price__amount alone" data-v-6380910f="">
                                            <span class="product__info__price__amount__number" data-v-6380910f="">۸۹۹.۰۰۰</span>
                                            <span class="type-price" data-v-6380910f=""> تومان </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="normal product" data-v-5be2f538="" data-v-6e63b2b6="">
                    <div class="product__image" data-v-5be2f538="">
                        <div class="img__holder" data-v-5be2f538="">
                            <div data-v-5be2f538="">
                                <a href="/product/4698/%DA%A9%D8%AA-%D8%AC%DB%8C%D9%86-%D8%AF%D8%B1%DB%8C%D8%A7-5173" data-v-5be2f538="">
                                    <!---->
                                    <figure class="m-0 figure-product overflow-hidden" data-v-5be2f538="">
                                        <img style="width: 100%;" src="https://api.elinorboutique.com/storage/5e57171c-2cb3-4ea6-a39b-4c1f03955f94/product-4698.webp" alt="کت جین افرا 5173" class="d-block w-100 image-product" data-v-5be2f538="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <button class="product__gallery__main__image__icon favorite productCard" data-v-942cf548="" data-v-5be2f538="">
                            <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624" data-v-942cf548="">
                                <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white" data-v-942cf548="">
                                </path>
                            </svg>
                        </button>
                        <div data-v-5be2f538="">
                            <a href="/product/4698/%DA%A9%D8%AA-%D8%AC%DB%8C%D9%86-%D8%AF%D8%B1%DB%8C%D8%A7-5173" data-v-5be2f538=""><!----></a>
                        </div>
                    </div>
                    <div data-v-5be2f538="">
                        <a href="/product/4698/%DA%A9%D8%AA-%D8%AC%DB%8C%D9%86-%D8%AF%D8%B1%DB%8C%D8%A7-5173" data-v-5be2f538="">
                            <div class="product__details bg-white" data-v-5be2f538="">
                                <a class="product__details__title product-title" href="/product/4698/%DA%A9%D8%AA-%D8%AC%DB%8C%D9%86-%D8%AF%D8%B1%DB%8C%D8%A7-5173" data-v-5be2f538="">
                                    <span data-v-5be2f538="">کت جین افرا 5173</span>
                                </a>
                                <div class="product__details__price" data-v-5be2f538="">
                                    <div class="theme3 product__info__price" data-v-6380910f="" data-v-5be2f538="">
                                        <!---->
                                        <span dir="rtl" class="product__info__price__amount alone" data-v-6380910f="">
                                            <span class="product__info__price__amount__number" data-v-6380910f="">۱.۱۹۹.۰۰۰</span>
                                            <span class="type-price" data-v-6380910f=""> تومان </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
             
        </div>
        <!-- products -->
    </div>
    <!-- main end -->
    

    <!-- main footer  -->
    <div data-v-3dbb5f6f="" class="SvgsGroups">
        <div data-v-3dbb5f6f="">
        <svg data-v-3dbb5f6f="" xmlns="http://www.w3.org/2000/svg" id="Component_53_3" data-name="Component 53 – 3" width="48" height="46.314" viewBox="0 0 48 46.314">
            <rect class="mainsvgcolor" id="Rectangle_724" data-name="Rectangle 724" width="24.641" height="23.91" rx="3" transform="translate(14.672 22.405)" fill="#1ac977" opacity="0.2" style="isolation:isolate;">
            </rect>
            <path class="blckSvgColor" id="Path_30984" data-name="Path 30984" d="M1326.277,506.733h-21.248a5.328,5.328,0,0,1-5.282-5.362V479.812a5.33,5.33,0,0,1,5.281-5.359h2.573a.694.694,0,0,1,0,1.388h-2.572a3.95,3.95,0,0,0-3.913,3.971v21.559a3.947,3.947,0,0,0,3.911,3.973h21.25a3.949,3.949,0,0,0,3.913-3.971V479.815a3.951,3.951,0,0,0-3.914-3.971H1323.6a.694.694,0,0,1,0-1.388h2.677a5.332,5.332,0,0,1,5.282,5.359v21.56A5.33,5.33,0,0,1,1326.277,506.733Z" transform="translate(-1289.555 -462.964)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30985" data-name="Path 30985" d="M1341.092,503.464h-26.461a.694.694,0,0,1,0-1.388h26.461a.694.694,0,0,1,0,1.388Z" transform="translate(-1299.87 -482.913)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30986" data-name="Path 30986" d="M1328.254,470.979a2.229,2.229,0,0,1-2.21-2.243.684.684,0,1,1,1.368,0,.842.842,0,1,0,1.684,0v-3.785a.842.842,0,1,0-1.684,0v1.638a.684.684,0,1,1-1.368,0v-1.638a2.211,2.211,0,1,1,4.421,0v3.785A2.229,2.229,0,0,1,1328.254,470.979Z" transform="translate(-1308.655 -454.477)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30987" data-name="Path 30987" d="M1355.619,470.979a2.229,2.229,0,0,1-2.21-2.243.684.684,0,1,1,1.368,0,.842.842,0,1,0,1.684,0v-3.785a.842.842,0,1,0-1.683,0v1.638a.689.689,0,0,1-.684.694h-7.29a.694.694,0,0,1,0-1.388h6.606v-.944a2.229,2.229,0,0,1,2.21-2.243,2.181,2.181,0,0,1,1.564.658,2.241,2.241,0,0,1,.645,1.586v3.784A2.229,2.229,0,0,1,1355.619,470.979Z" transform="translate(-1323.238 -454.477)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30988" data-name="Path 30988" d="M1266.852,519.757a.676.676,0,0,1-.415-.143l-3.669-2.845a.7.7,0,0,1-.128-.973.678.678,0,0,1,.959-.13l3.125,2.424,2.39-3.171a.678.678,0,0,1,.959-.13.7.7,0,0,1,.128.973l-2.806,3.723A.68.68,0,0,1,1266.852,519.757Z" transform="translate(-1262.5 -491.993)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30989" data-name="Path 30989" d="M1305.13,439.044a.679.679,0,0,1-.554-.286.7.7,0,0,1,.152-.97l1.017-.75a22.311,22.311,0,0,1,20.672-2.487.7.7,0,0,1,.4.895.681.681,0,0,1-.882.4,20.951,20.951,0,0,0-19.4,2.325l-1,.737A.674.674,0,0,1,1305.13,439.044Z" transform="translate(-1292.968 -433.074)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30990" data-name="Path 30990" d="M1295.954,456.807a.714.714,0,0,1-.134-.014.688.688,0,0,1-.129-.039.786.786,0,0,1-.118-.064.636.636,0,0,1-.1-.086.786.786,0,0,1-.085-.105.766.766,0,0,1-.063-.122.712.712,0,0,1-.041-.128.763.763,0,0,1-.011-.136.7.7,0,0,1,.2-.492.635.635,0,0,1,.1-.086.6.6,0,0,1,.118-.064.683.683,0,0,1,.129-.039.612.612,0,0,1,.265,0,.694.694,0,0,1,.129.039.6.6,0,0,1,.117.064.642.642,0,0,1,.1.086.7.7,0,0,1,.2.492.752.752,0,0,1-.011.136.659.659,0,0,1-.041.128.693.693,0,0,1-.063.122.781.781,0,0,1-.085.105.643.643,0,0,1-.1.086.788.788,0,0,1-.117.064.7.7,0,0,1-.129.039A.708.708,0,0,1,1295.954,456.807Z" transform="translate(-1286.303 -449.212)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30991" data-name="Path 30991" d="M1274.77,478.741h-.011a.69.69,0,0,1-.673-.706,22.309,22.309,0,0,1,3.845-12.192.678.678,0,0,1,.951-.178.7.7,0,0,1,.176.965,20.912,20.912,0,0,0-3.6,11.428A.689.689,0,0,1,1274.77,478.741Z" transform="translate(-1270.917 -456.526)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30992" data-name="Path 30992" d="M1285.942,556.02a.674.674,0,0,1-.4-.13,14.734,14.734,0,0,1-1.6-1.348l-.035-.036a22.049,22.049,0,0,1-4.266-7.154.7.7,0,0,1,.4-.892.682.682,0,0,1,.879.411,20.667,20.667,0,0,0,3.98,6.686,13.4,13.4,0,0,0,1.434,1.2.7.7,0,0,1,.158.969A.681.681,0,0,1,1285.942,556.02Z" transform="translate(-1274.922 -514.945)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30993" data-name="Path 30993" d="M1395.382,450.726a.687.687,0,0,1-.672-.567l-.831-4.506a.694.694,0,0,1,.547-.81l4.441-.843a.685.685,0,0,1,.8.555.693.693,0,0,1-.547.81l-3.769.715.705,3.824a.694.694,0,0,1-.547.81A.672.672,0,0,1,1395.382,450.726Z" transform="translate(-1357.919 -440.956)" fill="#444b54">
            </path>
            <path class="blckSvgColor" id="Path_30994" data-name="Path 30994" d="M1411.052,490.127a.676.676,0,0,1-.468-.188.7.7,0,0,1-.031-.981,20.921,20.921,0,0,0,2.6-3.478,21.774,21.774,0,0,0-3.3-25.979.7.7,0,0,1,0-.982.677.677,0,0,1,.968,0,23.181,23.181,0,0,1,3.5,27.667,22.334,22.334,0,0,1-2.777,3.719A.679.679,0,0,1,1411.052,490.127Z" transform="translate(-1369.385 -451.306)" fill="#444b54">
            </path>
            <path class="mainsvgcolor" id="Path_34294" data-name="Path 34294" d="M166.008,248.924h1.36v9.141h1.993V246.9h-3.353Z" transform="translate(-145.05 -219.63)" fill="#1ac977">
            </path>
            <path class="mainsvgcolor" id="Path_34295" data-name="Path 34295" d="M254.024,250.653h-.995v-1.729h3.651V246.9h-5.643v5.773h2.988a1.684,1.684,0,0,1,0,3.368h-2.988v2.022h2.988a3.706,3.706,0,0,0,0-7.412Z" transform="translate(-224.431 -219.63)" fill="#1ac977">
            </path>
        </svg>
        <span data-v-3dbb5f6f="">ضمانت بازگشت کالا</span>
        </div>
        <div data-v-3dbb5f6f="">
            <svg data-v-4463a156="" data-v-3dbb5f6f="" xmlns="http://www.w3.org/2000/svg" id="Group_33634" width="48.288" height="54.639" data-name="Group 33634" viewBox="0 0 48.288 54.639">
                <path id="Path_6154" d="M1071.082 1081.532a3.59 3.59 0 0 0 0-5.078 3.591 3.591 0 0 1-1.052-2.539 3.59 3.59 0 0 0-3.59-3.591 3.59 3.59 0 0 1-2.539-1.051 3.591 3.591 0 0 0-5.078 0 3.59 3.59 0 0 1-2.538 1.051 3.591 3.591 0 0 0-3.59 3.591 3.592 3.592 0 0 1-1.051 2.539 3.59 3.59 0 0 0 0 5.077 3.59 3.59 0 0 1 1.051 2.539 3.591 3.591 0 0 0 3.59 3.59 3.592 3.592 0 0 1 2.539 1.051 3.59 3.59 0 0 0 5.078 0 3.591 3.591 0 0 1 2.539-1.051 3.59 3.59 0 0 0 3.59-3.59 3.592 3.592 0 0 1 1.051-2.538z" class="cls-1" data-name="Path 6154" transform="translate(-1032.007 -1035.125)" data-v-4463a156="">
                </path>
                <path id="Path_6206" d="M1069.467 1092.969a.865.865 0 0 1-.614-.254l-2.131-2.132a.868.868 0 0 1 1.228-1.227l1.518 1.518 4.771-4.77a.868.868 0 0 1 1.228 1.228l-5.385 5.384a.865.865 0 0 1-.615.253z" class="cls-2" data-name="Path 6206" transform="translate(-1043.288 -1047.651)" data-v-4463a156="">
                </path>
                <g id="Group_6073" data-name="Group 6073" data-v-4463a156="">
                    <path id="Path_6207" d="M1015.787 1019.385a.724.724 0 0 0-.646.794c0 .014.146 1.423.309 3.294a.723.723 0 0 0 .72.661h.063a.723.723 0 0 0 .658-.783c-.163-1.884-.309-3.3-.31-3.317a.722.722 0 0 0-.794-.649z" class="cls-3" data-name="Path 6207" transform="translate(-1006.812 -1000.417)" data-v-4463a156="">
                    </path>
                    <path id="Path_6208" d="M1127.346 1026.087l-2.47-5.232a.723.723 0 0 0-1.308.618l2.479 5.25a.251.251 0 0 1-.065.306l-5.27 4.286a.251.251 0 0 1-.326-.01l-1.887-1.738c.046-2.985.691-9.321.7-9.387a.723.723 0 0 0-1.439-.148c-.029.282-.707 6.946-.708 9.847v4.64a.723.723 0 1 0 1.447 0v-2.988l.91.838a1.7 1.7 0 0 0 2.22.067l5.27-4.285a1.7 1.7 0 0 0 .447-2.064z" class="cls-3" data-name="Path 6208" transform="translate(-1079.232 -1000.418)" data-v-4463a156="">
                    </path>
                    <path id="Path_6209" d="M1001.659 1002.033a70.679 70.679 0 0 0-3.5-.584 96.027 96.027 0 0 1-1.194-.183v-17.957a.717.717 0 0 0-.127-.409c-.014-.79-.065-1.84-.149-3.023a.724.724 0 1 0-1.443.1c.088 1.248.14 2.338.148 3.114l-1.8 1.635a.27.27 0 0 1-.351.012l-5.341-4.287a.249.249 0 0 1-.056-.316l5.917-12.377a.769.769 0 0 1 .275-.3l6.981-3.221a.694.694 0 0 0 .065-.034.317.317 0 0 1 .429.1c2.1 3.45 5.153 5.5 8.43 5.679a.721.721 0 0 0-.094.417c.017.213.012 1.022.008 1.878v.963a.723.723 0 0 0 .721.726.724.724 0 0 0 .724-.721v-.96c.006-1.1.008-1.739-.012-2a.717.717 0 0 0-.108-.322c3.2-.28 6.2-2.307 8.343-5.665a.327.327 0 0 1 .439-.1.672.672 0 0 0 .064.034l7 3.23a.76.76 0 0 1 .268.282l2.018 4.223a.723.723 0 1 0 1.306-.624l-2.028-4.242a2.218 2.218 0 0 0-.862-.906.64.64 0 0 0-.06-.031l-7-3.233a1.768 1.768 0 0 0-2.165.348l-5.362-2.767a.693.693 0 0 0-.064-.029 8.289 8.289 0 0 0-1.724-.146v-.369a.85.85 0 0 1 .514-.753 2.841 2.841 0 0 0 1.589-2.542 2.825 2.825 0 0 0-2.825-2.823 2.827 2.827 0 0 0-2.823 2.827.723.723 0 0 0 .723.723.723.723 0 0 0 .723-.724 1.38 1.38 0 0 1 1.377-1.379 1.378 1.378 0 0 1 .623 2.608 2.3 2.3 0 0 0-1.348 2.047v.382a9.013 9.013 0 0 0-1.852.146.673.673 0 0 0-.064.029l-5.439 2.779a1.756 1.756 0 0 0-2.166-.348l-6.987 3.22-.06.031a2.233 2.233 0 0 0-.871.925l-5.917 12.377a1.691 1.691 0 0 0 .449 2.088l5.339 4.286a1.713 1.713 0 0 0 2.228-.068l.952-.865v16.389a1.324 1.324 0 0 0 .957 1.324.73.73 0 0 0 .079.018c.415.069.884.138 1.391.214 1.05.157 2.24.334 3.428.572a.7.7 0 0 0 .143.014.723.723 0 0 0 .141-1.433zm6.91-40.2a31.719 31.719 0 0 1 3.991 0l5.089 2.627c-1.979 2.613-4.56 4.089-7.227 4.089h-.076c-2.648-.027-5.087-1.461-6.967-4.063z" class="cls-3" data-name="Path 6209" transform="translate(-986.367 -953.846)" data-v-4463a156="">
                    </path>
                    <path id="Path_6210" d="M1062.441 1064.683a4.319 4.319 0 0 0-4.314-4.314 2.847 2.847 0 0 1-2.027-.84 4.319 4.319 0 0 0-6.1 0 2.844 2.844 0 0 1-2.026.84 4.319 4.319 0 0 0-4.314 4.314 2.848 2.848 0 0 1-.84 2.027 4.319 4.319 0 0 0 0 6.1 2.848 2.848 0 0 1 .84 2.027 4.319 4.319 0 0 0 4.313 4.313 2.847 2.847 0 0 1 2.027.84 4.319 4.319 0 0 0 6.1 0 2.849 2.849 0 0 1 2.027-.84 4.319 4.319 0 0 0 4.314-4.314 2.849 2.849 0 0 1 .84-2.028 4.319 4.319 0 0 0 0-6.1 2.849 2.849 0 0 1-.84-2.025zm-.183 7.1a4.285 4.285 0 0 0-1.263 3.051 2.87 2.87 0 0 1-2.867 2.867 4.286 4.286 0 0 0-3.051 1.264 2.871 2.871 0 0 1-4.054 0 4.287 4.287 0 0 0-3.05-1.263 2.871 2.871 0 0 1-2.867-2.867 4.285 4.285 0 0 0-1.263-3.05 2.871 2.871 0 0 1 0-4.055 4.286 4.286 0 0 0 1.263-3.05 2.87 2.87 0 0 1 2.867-2.867 4.283 4.283 0 0 0 3.05-1.264 2.871 2.871 0 0 1 4.054 0 4.284 4.284 0 0 0 3.051 1.264 2.87 2.87 0 0 1 2.867 2.867 4.287 4.287 0 0 0 1.263 3.05 2.871 2.871 0 0 1 0 4.057z" class="cls-3" data-name="Path 6210" transform="translate(-1025.586 -1028.051)" data-v-4463a156="">
                    </path>
                </g>
            </svg>
            <span data-v-3dbb5f6f="">ضمانت اصالت کالا</span>
        </div>
        <div data-v-3dbb5f6f="">
            <svg data-v-44b134c2="" data-v-3dbb5f6f="" xmlns="http://www.w3.org/2000/svg" id="Group_33635" width="51.875" height="51.141" data-name="Group 33635" viewBox="0 0 51.875 51.141">
                <g id="Group_6075" data-name="Group 6075" data-v-44b134c2="">
                    <path id="Path_6164" d="M636.867 1095.346a2.939 2.939 0 0 0 2.929-2.691l.9-10.614a2.9 2.9 0 0 0-2.663-3.123 2.896 2.896 0 0 0-.228-.009h-24.36a2.9 2.9 0 0 0-2.9 2.9c0 .076 0 .153.009.229l.9 10.615a2.939 2.939 0 0 0 2.928 2.691z" class="cls-1" data-name="Path 6164" transform="translate(-597.667 -1044.206)" data-v-44b134c2="">
                    </path>
                    <g id="Group_6075-2" data-name="Group 6075" data-v-44b134c2="">
                        <path id="Path_6211" d="M616.419 1004.3h-9.949l1-11.97a8.9 8.9 0 0 1 4.2 5.315c.048.185.149.548.281 1.024.289 1.037.725 2.6 1.076 4a.711.711 0 0 0 1.386-.316c0-.01 0-.019-.007-.029a165.64 165.64 0 0 0-1.085-4.037 67.24 67.24 0 0 1-.274-1 10.489 10.489 0 0 0-5.021-6.294c-.137-.085-.3-.162-.436-.253a3.746 3.746 0 0 0-3.437-3.821 3.93 3.93 0 0 0-.294-.013h-4.4a1.883 1.883 0 0 1-.334-2.642.711.711 0 0 0-1.213-.742 3.458 3.458 0 0 0-.28 3.384H584.75a3.507 3.507 0 0 0-.279-3.391 21.174 21.174 0 0 1-1.688-3.308 4 4 0 0 0-1.525-2.118c-.138-.091-.3-.189-.472-.291-.421-.251-1.2-.719-1.251-1.031a29.74 29.74 0 0 1-.341-3.687 1.6 1.6 0 0 1 .7-1.359c.067-.047.151-.1.243-.159l.011-.007c.264 1.594.609 3.646.647 3.873a.709.709 0 0 0 1.411-.1.725.725 0 0 0-.011-.108h.006l-.82-4.919s-.114-1.031-.137-1.277l-.085-.885c-.036-1.265-.028-1.443 0-2.025.011-.266.026-.611.042-1.171a3.321 3.321 0 0 1 1.959-3.333 3.1 3.1 0 0 0 1.355-1.139 4.666 4.666 0 0 1 3.625-1.989 15.863 15.863 0 0 1 7.913.648c3.131 1.15 4.84 3.09 5.225 5.931a11.453 11.453 0 0 1-.088 2.725c-.045.412-.091.838-.118 1.245-.022.243-.077.793-.133 1.294a969.14 969.14 0 0 1-.6 3.608v.025l-.01.058c0 .023-.007.044-.007.068a.71.71 0 0 0 1.4.166h.006l.448-2.686h.007c.091.058.175.111.25.164a1.593 1.593 0 0 1 .7 1.345 30.4 30.4 0 0 1-.341 3.7c-.015.1-.142.334-.83.77a.711.711 0 0 0 .761 1.2 2.783 2.783 0 0 0 1.469-1.743 31.874 31.874 0 0 0 .356-3.876 3.009 3.009 0 0 0-1.306-2.547 14.112 14.112 0 0 0-.3-.2 6.131 6.131 0 0 1-.523-.363c.008-.092-.033.038-.059-.046.04-.2.114-.7.131-.9.026-.394.06-.7.106-1.12a12.67 12.67 0 0 0 .085-3.069c-.455-3.365-2.522-5.746-6.144-7.076a17.244 17.244 0 0 0-8.607-.72 6.131 6.131 0 0 0-4.608 2.616 1.684 1.684 0 0 1-.736.616 4.718 4.718 0 0 0-2.81 4.6c-.015.549-.028.888-.041 1.149-.026.609-.035.814 0 2.152a.43.43 0 0 0 0 .048l.089.906c.018.2.089.607.13.8a.032.032 0 0 0 0 .006.289.289 0 0 0-.06.035c-.147.1-.391.279-.527.366a7.517 7.517 0 0 0-.29.191 3.014 3.014 0 0 0-1.313 2.56 31.056 31.056 0 0 0 .356 3.867c.146.973 1.135 1.564 1.929 2.037.152.091.295.176.417.256a2.642 2.642 0 0 1 .985 1.45 22.6 22.6 0 0 0 1.8 3.533 1.909 1.909 0 0 1-.323 2.646h-4.477a3.807 3.807 0 0 0-3.733 3.838 1.518 1.518 0 0 1-.347.248 10.5 10.5 0 0 0-5.023 6.294c-.048.186-.151.556-.284 1.041-.251.9-.63 2.263-.952 3.519a.711.711 0 0 0 .512.865.7.7 0 0 0 .177.023.711.711 0 0 0 .688-.535c.318-1.242.695-2.6.944-3.491.138-.5.244-.878.293-1.068a8.863 8.863 0 0 1 4.125-5.264l1 11.919h-9.891a.711.711 0 1 0 0 1.422h50.453a.711.711 0 0 0 0-1.422zm-10.256-13.422l-1.12 13.425h-27.76l-1.12-13.427a2.715 2.715 0 0 1-.009-.179 2.343 2.343 0 0 1 2.314-2.363h25.383c.06 0 .12 0 .18.009a2.344 2.344 0 0 1 2.132 2.54z" class="cls-2" data-name="Path 6211" transform="translate(-565.255 -956.851)" data-v-44b134c2="">
                        </path>
                        <path id="Path_6212" d="M654.919 1028.576l-3.68.3a1.851 1.851 0 0 0-1.771-1.323H646.5a1.85 1.85 0 0 0-1.848 1.848v.248a1.85 1.85 0 0 0 1.848 1.848h2.969a1.85 1.85 0 0 0 1.725-1.19l3.822-.309a3.145 3.145 0 0 0 2.911-2.5l.446-2.172a.711.711 0 0 0-1.393-.286l-.445 2.172a1.729 1.729 0 0 1-1.616 1.364zm-5.025 1.069a.427.427 0 0 1-.427.427H646.5a.426.426 0 0 1-.427-.427v-.248a.427.427 0 0 1 .427-.427h2.968a.427.427 0 0 1 .427.427z" class="cls-2" data-name="Path 6212" transform="translate(-622.077 -1005.241)" data-v-44b134c2="">
                        </path>
                    </g>
                    <path id="Path_6213" d="M649.163 1093.239a.967.967 0 0 1 1.126-1.038c.233.059 3.066.677 4.026 1.023a.953.953 0 0 1 .482 1.258l-.011.024a1.577 1.577 0 0 1-.4.427c-.923.763-1.856 1.514-2.769 2.288a1.318 1.318 0 0 1-.82.411.952.952 0 0 1-.987-.792q-.33-1.798-.647-3.601z" class="cls-3" data-name="Path 6213" transform="translate(-625.303 -1053.708)" data-v-44b134c2="">
                    </path>
                </g>
            </svg>
            <span data-v-3dbb5f6f="">خدمات پس از فروش</span>
        </div>
        <div data-v-3dbb5f6f="">
            <svg data-v-7795c21f="" data-v-3dbb5f6f="" xmlns="http://www.w3.org/2000/svg" id="Group_33633" width="47.613" height="54.13" data-name="Group 33633" viewBox="0 0 47.613 54.13">
                <rect id="Rectangle_726" width="17.732" height="22.467" class="cls-1" data-name="Rectangle 726" rx="2" transform="rotate(-79.98 35.182 18.85)" data-v-7795c21f="">
                </rect>
                <path id="Path_6194" d="M231.46 1074.256a.724.724 0 0 1-.412-.129l-3.177-2.2-2.967 1.16a.724.724 0 0 1-.977-.791l.919-5.6a.723.723 0 0 1 1.428.234l-.714 4.346 2.143-.838a.723.723 0 0 1 .675.079l2.581 1.788 1.35-7.033a.723.723 0 1 1 1.421.272l-1.559 8.124a.723.723 0 0 1-.71.587z" class="cls-2" data-name="Path 6194" transform="translate(-206.104 -1032.617)" data-v-7795c21f="">
                </path>
                <g id="Group_6065" data-name="Group 6065" data-v-7795c21f="">
                    <path id="Path_6195" d="M227.5 981.01a.724.724 0 0 0-.97.325 34.515 34.515 0 0 0-1.855 4.5.724.724 0 1 0 1.373.456 33.041 33.041 0 0 1 1.777-4.31.724.724 0 0 0-.325-.971z" class="cls-3" data-name="Path 6195" transform="translate(-206.617 -973.101)" data-v-7795c21f="">
                    </path>
                    <path id="Path_6196" d="M217.773 975.568a22.454 22.454 0 0 0-19-21.4l-.05-.007h-.017a22.476 22.476 0 0 0-24.738 14.088 12.069 12.069 0 0 0-.558 1.954l-.058.3v.027a.667.667 0 0 0-.007.084v.06a.763.763 0 0 0 .01.085c0 .02.006.04.011.059a.7.7 0 0 0 .026.078c.008.021.015.042.025.062s0 .013.008.019a.6.6 0 0 0 .035.052c.009.014.016.03.026.043L182 982.489a.724.724 0 1 0 1.16-.865l-8.017-10.748.05-.027a8.089 8.089 0 0 1 5.824-1.3 7.421 7.421 0 0 1 6 4.5.724.724 0 0 0 .682.482.732.732 0 0 0 .122-.011.719.719 0 0 0 .555-.245 8.242 8.242 0 0 1 13.839 2.3.784.784 0 0 0 1.3.183 7.421 7.421 0 0 1 7.126-2.346 7.848 7.848 0 0 1 4.989 3.058l.352.391-10.968 7.274a.723.723 0 1 0 .8 1.205l11.543-7.655c.392-.183.4-.616.413-.97.005-.415.008-1.13.003-2.147zm-6.873-2.574a8.946 8.946 0 0 0-7.8 2.094 9.682 9.682 0 0 0-15.145-2.457 9.527 9.527 0 0 0-12.8-3.417c.05-.153.1-.306.161-.457a20.945 20.945 0 0 1 20.344-13.436 12.258 12.258 0 0 0-1.886 1.811c-.078.089-.145.166-.2.226a.723.723 0 0 0 1.065.979c.062-.068.137-.154.224-.252.648-.74 1.971-2.251 3.578-2.472 3.3 1.691 4.546 4.894 4.748 12.087.015.529.02 1.078.015 1.631a.724.724 0 0 0 .716.731h.008a.723.723 0 0 0 .723-.716c.006-.572 0-1.14-.015-1.688-.142-5.061-.73-8.78-2.87-11.268a20.894 20.894 0 0 1 14.558 19.2v.506a8.92 8.92 0 0 0-5.424-3.102z" class="cls-3" data-name="Path 6196" transform="translate(-170.162 -953.864)" data-v-7795c21f="">
                    </path>
                    <path id="Path_6197" d="M237.2 973.258a.63.63 0 0 0-.124-.067.763.763 0 0 0-.136-.044.785.785 0 0 0-.284 0 .735.735 0 0 0-.133.044.629.629 0 0 0-.124.067.539.539 0 0 0-.11.089.721.721 0 0 0-.214.509.76.76 0 0 0 .014.142.75.75 0 0 0 .043.136.631.631 0 0 0 .064.125.7.7 0 0 0 .093.11.716.716 0 0 0 1.021 0 .556.556 0 0 0 .09-.11.637.637 0 0 0 .067-.125.74.74 0 0 0 .033-.134.575.575 0 0 0 .014-.142.718.718 0 0 0-.211-.509.539.539 0 0 0-.103-.091z" class="cls-3" data-name="Path 6197" transform="translate(-214.74 -967.559)" data-v-7795c21f="">
                        x
                    </path>
                    <path id="Path_6198" d="M190.061 1086.172a.723.723 0 1 0 0-1.447h-3.218a.723.723 0 1 0 0 1.447z" class="cls-3" data-name="Path 6198" transform="translate(-179.244 -1046.858)" data-v-7795c21f="">
                    </path>
                    <path id="Path_6199" d="M175.584 1073.259a.723.723 0 1 0 0-1.447h-.449a.723.723 0 1 0 0 1.447z" class="cls-3" data-name="Path 6199" transform="translate(-170.924 -1037.682)" data-v-7795c21f="">
                    </path>
                    <path id="Path_6200" d="M163.752 1096.214a.743.743 0 0 0-.067-.124.649.649 0 0 0-.09-.11.693.693 0 0 0-.11-.09.661.661 0 0 0-.124-.066.728.728 0 0 0-.136-.041.66.66 0 0 0-.281 0 .729.729 0 0 0-.136.041.66.66 0 0 0-.124.066.7.7 0 0 0-.11.09.719.719 0 0 0 0 1.024.7.7 0 0 0 .11.09.669.669 0 0 0 .124.067.77.77 0 0 0 .275.055.737.737 0 0 0 .512-.211.724.724 0 0 0 .211-.512.591.591 0 0 0-.014-.142.74.74 0 0 0-.04-.137z" class="cls-3" data-name="Path 6200" transform="translate(-162.36 -1054.705)" data-v-7795c21f="">
                    </path>
                    <path id="Path_6201" d="M200.736 1040.687l-3.734-.613 3.673-6.743a.723.723 0 0 0-1.271-.692l-3.915 7.187-6.451-1.059-1.385-8.163a.723.723 0 1 0-1.427.242l1.3 7.674-4.346-.713a3.051 3.051 0 0 0-3.5 2.522l-.284 1.9h-3.287a.723.723 0 1 0 0 1.447h3.91a.723.723 0 0 0 .716-.616l.374-2.5a1.6 1.6 0 0 1 1.836-1.319l17.553 2.882a1.6 1.6 0 0 1 1.319 1.836l-2.134 13v.008a1.6 1.6 0 0 1-1.836 1.318l-17.553-2.882a1.6 1.6 0 0 1-1.319-1.834l.618-3.683a.723.723 0 0 0-.713-.843h-6.866a.723.723 0 0 0 0 1.447h6.011l-.477 2.843a3.05 3.05 0 0 0 2.511 3.5l17.553 2.882a3.125 3.125 0 0 0 .5.041 3.046 3.046 0 0 0 3-2.545v-.007l2.136-13.006a3.049 3.049 0 0 0-2.512-3.511z" class="cls-3" data-name="Path 6201" transform="translate(-168.707 -1007.969)" data-v-7795c21f="">
                    </path>
                </g>
            </svg>
            <span data-v-3dbb5f6f="">تحویل سریع و آسان</span>
        </div>
    </div>
    <!-- end main footer -->

    <!-- footer -->
   <?php include("footer.php"); ?>

      <!-- end footer -->
    
</body>
</html>