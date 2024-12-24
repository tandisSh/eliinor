<?php 
include('header.php');
include('vendor/dbConnection.php');

$categories = $pdo->prepare("
    SELECT c.id AS category_id, c.name AS category_name, 
           p.id AS product_id, p.pro_name, p.pro_image, p.pro_price
    FROM categories c
    LEFT JOIN products p ON c.id = p.pro_category_id
    WHERE p.id IS NOT NULL
    ORDER BY c.id, p.id
");
$categories->execute();
$data = $categories->fetchAll(PDO::FETCH_ASSOC);

$groupedProducts = [];
foreach ($data as $row) {
    $groupedProducts[$row['category_id']]['name'] = $row['category_name'];
    $groupedProducts[$row['category_id']]['products'][] = $row;
}

$sql = "SELECT * FROM sliders";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // گرفتن تمام رکوردها
    $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $stmt = $pdo->prepare("SELECT * FROM sliders ORDER BY created_at DESC");
// $stmt->execute();
// $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="slider">
        <!-- اولین div برای نمایش اولین تصویر -->
    <div class="first-slide">
        <img src="../public/images/sliders/<?php  echo $sliders[5]['image']; ?>" alt="اسلایدر اول" width="100%">
        <?php if (!empty($sliders[5]['link'])): ?>
            <a href="<?php echo $sliders[5]['link']; ?>" class="btnn">مشاهده</a>
        <?php endif; ?>
    </div>
        <!-- دومین div برای نمایش باقی‌عکس‌ها -->
        <div class="slides">
        <?php foreach (array_slice($sliders, 5) as $slide): ?>
            <div class="slide">
                <img src="<?php echo $slide['image']; ?>" alt="اسلایدر">
                <?php if (!empty($slide['link'])): ?>
                    <a href="<?php echo $slide['link']; ?>" class="btnn">مشاهده</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</div>
<!-- <div class="carousel-slide active">
        <img src="./img/Label-1.jpg" width="99%">
      </div>
      <div class="carousel-slide">
        <img src="./img/Label-2.jpg" width="99%">
      </div>
      <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div> -->
<div class="products__home has-padding pt-4 pt-sm-5">
    <?php foreach ($groupedProducts as $categoryId => $categoryData): ?>
        <div class="products__home__top">
            <div class="d-flex align-items-center title-text">
                <span>
                    <svg width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.533 17.8739L4.02002 19.4869L0.402954 17.8739L4.02002 16.261L23.533 17.8739Z" fill="#F05454"></path>
                        <path d="M17.896 29.454L4.40308 23.7949L2.703 21.49L5.75305 21.6749L17.896 29.454Z" fill="#F05454"></path>
                        <path d="M17.896 6.2959L4.40308 11.9548L2.703 14.2599L5.75305 14.0748L17.896 6.2959Z" fill="#F05454"></path>
                        <path d="M8.56909 35.7499L2.21399 27.5709L2.06299 25.5178L3.94604 26.6638L8.56909 35.7499Z" fill="#F05454"></path>
                        <path d="M8.56909 0L2.21399 8.17798L2.06299 10.231L3.94604 9.08496L8.56909 0Z" fill="#F05454"></path>
                    </svg>
                </span>
                <h3 class="font-bold d-flex" style="color:#f05454;">
                    محصولات دسته‌بندی: <?php echo $categoryData['name']; ?>
                </h3>
                <span>
                    <svg width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.402954 17.8739L19.9159 19.4869L23.533 17.8739L19.9159 16.261L0.402954 17.8739Z" fill="#F05454"></path>
                        <path d="M6.03992 29.454L19.5328 23.7949L21.2329 21.49L18.1829 21.6749L6.03992 29.454Z" fill="#F05454"></path>
                        <path d="M6.03992 6.2959L19.5328 11.9548L21.2329 14.2599L18.1829 14.0748L6.03992 6.2959Z" fill="#F05454"></path>
                        <path d="M15.3668 35.7499L21.7219 27.5709L21.8729 25.5178L19.9899 26.6638L15.3668 35.7499Z" fill="#F05454"></path>
                        <path d="M15.3668 0L21.7219 8.17798L21.8729 10.231L19.9899 9.08496L15.3668 0Z" fill="#F05454"></path>
                    </svg>
                </span>
            </div>
        </div>
        <div class="products__home__products">
            <?php 
            $products = array_slice($categoryData['products'], 0, 5); // فقط 5 محصول
            foreach ($products as $product): ?>
                <div class="normal product">
                    <div class="product__image">
                        <div class="img__holder">
                            <div>
                               <a href="single.php?id=<?php echo $product['product_id']; ?>">
                                    <figure class="m-0 figure-product overflow-hidden">
                                        <img src="../public/images/<?php echo $product['pro_image']; ?>" alt="<?php echo $product['pro_name']; ?>" class="d-block w-100 image-product">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <button class="product__gallery__main__image__icon favorite productCard">
                            <svg class="heartFillIconSvg" xmlns="http://www.w3.org/2000/svg" width="21.66" height="20.827" viewBox="0 0 20.902 19.624">
                                <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M18.873,3.589a5.314,5.314,0,0,0-7.618.6l-.8.889-.8-.889a5.314,5.314,0,0,0-7.618-.6,6.608,6.608,0,0,0-.4,9.107l7.9,8.752a1.221,1.221,0,0,0,1.849,0l7.9-8.752a6.6,6.6,0,0,0-.4-9.107Z" transform="translate(0.001 -2.248)" fill="white"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="product__details bg-white">
                        <a class="product__details__title product-title" href="single.php?id=<?php echo $product['product_id']; ?>">
                            <span><?php echo $product['pro_name']; ?></span>
                        </a>
                        <div class="product__details__price">
                            <span dir="rtl" class="product__info__price__amount">
                                <span class="product__info__price__amount__number">
                                    <?php echo $product['pro_price']; ?>
                                </span>
                                <span class="type-price"> تومان </span>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="products__home__more">
            <a href="category.php?id=<?php echo $categoryId; ?>" class="shape-container btn-link">
                مشاهده همه
            </a>
        </div>
    <?php endforeach; ?>
</div>

<!-- svg part -->
<?php include("svgPart.php") ?>
<!-- end svg part -->
<?php include('footer.php'); ?>
<script src="../public/js/slide.js"></script>

</body>
</html>