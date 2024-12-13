<?php
include("vendor/dbConnection.php");
include("header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $result->bindValue(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $products = $result->fetch(PDO::FETCH_ASSOC);

    if (isset($products['pro_category_id'])) {
        $results = $pdo->prepare("SELECT * FROM categories WHERE id = :pro_category_id");
        $results->bindValue(':pro_category_id', $products['pro_category_id'], PDO::PARAM_INT);
        $results->execute();
        $category = $results->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "دسته‌بندی برای این محصول وجود ندارد.";
    }
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
                        <p style="font-size: x-large;font-weight: 600;"><?php echo $products['pro_name']; ?> </p>

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
                        <p style="font-size: small;"><?php echo $category['name'] ?></p>
                    </div>
                </div>
                <hr>
                <div id="price-part">

                    <div style="width: 80%;">
                        <div style="padding-bottom: 5%;color: #e35f83;">
                            <P style="margin-right: 8%;">مشخصات </P>
                            <hr style="width: 8%;
                    margin-left: 85%;
                    height: 3px;
                    background-color: #e35f83;
                    border-style: none;">
                        </div>

                        <p style="font-weight: 600;font-size: larger;"><?php echo $products['pro_detail']; ?></p>
                    </div>
                    <br><br><br><br><br>
                    <div style="display: flex;">
                        <p style="font-weight: 600;font-size: larger;">قیمت:<?php echo $products['pro_price']; ?> تومان</p>

                        <form method="POST" action="vendor/UserBasket.php">
                            <input class="price-button" type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                            <input type="number" name="quantity" value="1" min="1" style="width: 50px; margin-left: 10px;">
                            <button class="price-button" type="submit" name="add_to_cart">افزودن به سبد خرید</button>
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
            <h5 style="color:#f05454;font-size: x-large;"> محصولات <span> مشابه </span></h5>
            <svg style="margin-top: 2.6%;margin-right: 1%;" width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-6e63b2b6="">
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

                                <figure class="m-0 figure-product overflow-hidden" data-v-5be2f538="">
                                    <img style="width: 100%;" class="d-block w-100 image-product" data-v-5be2f538="">
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
                        <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538=""></a>
                    </div>
                </div>
                <div data-v-5be2f538="">
                    <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538="">
                        <div class="product__details bg-white" data-v-5be2f538="">
                            <a class="product__details__title product-title" href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255" data-v-5be2f538="">
                                <span data-v-5be2f538=""> </span>
                            </a>
                            <div class="product__details__price" data-v-5be2f538="">
                                <div class="theme3 product__info__price" data-v-6380910f="" data-v-5be2f538="">

                                    <span dir="rtl" class="product__info__price__amount" data-v-6380910f="">
                                        <span class="product__info__price__amount__number" data-v-6380910f=""></span>
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


    <!-- svg part -->
    <?php include("svgPart.php") ?>
    <!-- end svg part -->

    <!-- footer -->
    <?php include("footer.php"); ?>

    <!-- end footer -->

</body>

</html>