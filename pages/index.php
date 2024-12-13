<?php include('header.php');
include ('vendor/dbConnection.php');
$result=$pdo->prepare("SELECT * FROM products ");
$result->execute();
$products=$result->FetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>elinor</title>
        <!-- Bootstrap CSS -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
      />
      <link rel="stylesheet" href="../public/css/style.css">
</head>
<div class="products__home has-padding pt-4 pt-sm-5">
    <div class="products__home__top">
        <div class="d-flex align-items-center title-text">
            <span>
                <svg width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.533 17.8739L4.02002 19.4869L0.402954 17.8739L4.02002 16.261L23.533 17.8739Z" fill="#F05454"</path>
                    <path d="M17.896 29.454L4.40308 23.7949L2.703 21.49L5.75305 21.6749L17.896 29.454Z" fill="#F05454">
                    </path>
                    <path d="M17.896 6.2959L4.40308 11.9548L2.703 14.2599L5.75305 14.0748L17.896 6.2959Z" fill="#F05454">
                    </path>
                    <path d="M8.56909 35.7499L2.21399 27.5709L2.06299 25.5178L3.94604 26.6638L8.56909 35.7499Z" fill="#F05454">
                    </path>
                    <path d="M8.56909 0L2.21399 8.17798L2.06299 10.231L3.94604 9.08496L8.56909 0Z" fill="#F05454">
                    </path>
                </svg>
            </span>
            <h3 class="font-bold d-flex" style="color:#f05454;"> محصولات <span> الینور </span></h3>
            <span>
                <svg width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M0.402954 17.8739L19.9159 19.4869L23.533 17.8739L19.9159 16.261L0.402954 17.8739Z" fill="#F05454">
                    </path>
                    <path d="M6.03992 29.454L19.5328 23.7949L21.2329 21.49L18.1829 21.6749L6.03992 29.454Z" fill="#F05454">
                    </path>
                    <path d="M6.03992 6.2959L19.5328 11.9548L21.2329 14.2599L18.1829 14.0748L6.03992 6.2959Z" fill="#F05454">
                    </path>
                    <path d="M15.3668 35.7499L21.7219 27.5709L21.8729 25.5178L19.9899 26.6638L15.3668 35.7499Z" fill="#F05454">
                    </path>
                    <path d="M15.3668 0L21.7219 8.17798L21.8729 10.231L19.9899 9.08496L15.3668 0Z" fill="#F05454">
                    </path>
                </svg>
            </span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="496" height="12.979" viewBox="0 0 496 12.979">
            <g id="Group_38" data-name="Group 38" transform="translate(-908 -2821.089)" opacity="0.2">
                <path id="Path_61" data-name="Path 61" d="M1959.869,663.54a2.63,2.63,0,1,0,2.639,2.63A2.634,2.634,0,0,0,1959.869,663.54Z" transform="translate(-793.668 2161.408)" fill="#f05454">
                </path>
                <path id="Path_62" data-name="Path 62" d="M1935.795,646.374a4.24,4.24,0,1,1,4.252-4.234A4.245,4.245,0,0,1,1935.795,646.374Zm0-10.724a6.49,6.49,0,1,0,6.5,6.49A6.5,6.5,0,0,0,1935.795,635.65Z" transform="translate(-769.594 2185.439)" fill="#f05454">
                </path>
                <path id="Path_63" data-name="Path 63" d="M136.1,644.886a5.347,5.347,0,0,1-3.256-1.046,4.526,4.526,0,0,1-1.612-2.214,6.68,6.68,0,0,1-3.194,2.611,8.712,8.712,0,0,1-4.977-5.057c-1.829,3-5.023,4.489-7.753,5.25a21.451,21.451,0,0,1-5.023.74,21.154,21.154,0,0,1,5.023.751c2.73.742,5.924,2.244,7.753,5.261a8.8,8.8,0,0,1,4.977-5.088,6.828,6.828,0,0,1,3.194,2.63,4.3,4.3,0,0,1,1.1-1.777,5.357,5.357,0,0,1,3.8-1.483l-.03-.58Z" transform="translate(797.71 2182.398)" fill="#f05454">
                </path>
                <path id="Path_64" data-name="Path 64" d="M257.72,674.4v2.244H491.269V674.4Z" transform="translate(670.68 2152.051)" fill="#f05454">
                </path>
                <path id="Path_65" data-name="Path 65" d="M2007.03,676.644h233.547V674.4H2007.03Z" transform="translate(-836.577 2152.051)" fill="#f05454">
                </path>
            </g>
        </svg>
        <div class="products__home__buttons">
            <button class="active"> جدید ترین </button>
            <button class="passive"> پرفروش ترین </button>
        </div>
    </div>
    <div class="products__home__products">
        <?php foreach($products as $product):?>
        <div class="normal product">
            <div class="product__image">
                <div class="img__holder">
                    <div>
                       <a href="single.php?id=<?php echo $product['id']; ?>"   >
                           
                            <figure class="m-0 figure-product overflow-hidden">
                                <img src="../public/images/<?php echo $product['pro_image']; ?>" alt="کت کوک دوزی کوتاه   4255" class="d-block w-100 image-product">
                            </figure>
                        </a>
                    </div>
                </div>
                <button class="product__gallery__main__image__icon favorite productCard">
                    <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624">
                        <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white">
                        </path>
                    </svg>
                </button>
                <div>
                    <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255"></a>
                </div>
            </div>
            <div>
                <a href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255">
                    <div class="product__details bg-white">
                        <a class="product__details__title product-title" href="/product/3422/%DA%A9%D8%AA-%DA%A9%D9%88%DA%A9-%D8%AF%D9%88%D8%B2%DB%8C-4255">
                            <span><?php echo $product['pro_name']; ?></span>
                        </a>
                        <div class="product__details__price">
                            <div class="theme3 product__info__price">
                               
                                <span dir="rtl" class="product__info__price__amount">
                                    <span class="product__info__price__amount__number"><?php echo $product['pro_price']; ?></span>
                                    <span class="type-price"> تومان </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
      
            </div> 
        </div>
    </div>
    <div class="products__home__more">
        <a href="/women-clothing?sort=newest" class="shape-container btn-link"> مشاهده همه </a>
    </div>
</div>

   <!-- svg part -->
   <?php include("svgPart.php") ?>
    <!-- end svg part -->
    </body>
    <?php include('footer.php'); ?>
    </html>