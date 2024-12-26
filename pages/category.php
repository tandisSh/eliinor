<?php include('header.php');
include('vendor/dbConnection.php');

$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category_name_query = $pdo->prepare("SELECT name FROM categories WHERE id = ?");
$category_name_query->execute([$category_id]);
$category_name = $category_name_query->fetchColumn();

if (!$category_name) {
    echo "<h1>دسته‌بندی مورد نظر پیدا نشد</h1>";
    exit;
}

$result = $pdo->prepare("SELECT * FROM products WHERE pro_category_id = ?");
$result->execute([$category_id]);
$products = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category_name); ?> - Elinor</title>
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
<div class="products__home has-padding pt-4 pt-sm-5">
    <div class="products__home__top">
        <div class="d-flex align-items-center title-text">
            <h3 class="font-bold d-flex" style="color:#f05454;"> محصولات دسته‌بندی: <span><?php echo htmlspecialchars($category_name); ?></span></h3>
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
    </div>
    <div class="products__home__products">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="normal product">
                    <div class="product__image">
                        <div class="img__holder">
                            <div>
                                <a href="single.php?id=<?php echo $product['id']; ?>">
                                    <figure class="m-0 figure-product overflow-hidden">
                                        <img src="../public/images/<?php echo $product['pro_image']; ?>" alt="<?php echo htmlspecialchars($product['pro_name']); ?>" class="d-block w-100 image-product">
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
                    </div>
                    <div>
                        <a href="pages/single.php?id=<?php echo $product['id']; ?>">
                            <div class="product__details bg-white">
                                <a class="product__details__title product-title" href="pages/single.php?id=<?php echo $product['id']; ?>">
                                    <span><?php echo htmlspecialchars($product['pro_name']); ?></span>
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
        <?php else: ?>
            <p>محصولی در این دسته‌بندی وجود ندارد.</p>
        <?php endif; ?>
    </div>
</div>

<!-- svg part -->
<?php include("svgPart.php") ?>
<!-- end svg part -->
<?php include('footer.php'); ?>

</body>
</html>
