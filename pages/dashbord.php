<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate"); // برای HTTP 1.1
header("Pragma: no-cache"); // برای HTTP 1.0
header("Expires: 0"); // برای مرورگرها
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد</title>
    <link rel="stylesheet" href="../public/css/dashbordStyle.css">
</head>

<body>
    <main>
        <div class="main">
            <div id="rightSec">
                <aside id="dashbord">
                    <ul>
                        <span style="padding: 6px 16px 0px 0px   background-color=#fff6f9; color:#b1bac4; font-size:30px;">
                            <svg width="25" height="24" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.1c0 2.8-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40h-16c-1.1 0-2.2-.9-3.3-.1-1.4-.8-2.8.1-4.2.1H392c-22.1 0-40-17.9-40-40v-88c0-17.7-14.3-32-32-32h-64c-17.7 0-32 14.3-32 32v88c0 22.1-17.9 40-40 40h-55.9c-1.5 0-3-.1-4.5-.2-1.2.1-2.4.2-3.6.2h-16c-22.09 0-40-17.9-40-40V360c0-.9.03-1.9.09-2.8v-69.6H32.05C14.02 287.6 0 273.5 0 255.5c0-9 3.004-17 10.01-24L266.4 8.016c7-7.014 15-8.016 22-8.016s15 2.004 21.1 7.014L564.8 231.5c8 7 12.1 15 11 24z"
                                    fill="#b1bac4" class="fill-000000"></path>
                            </svg>
                            داشبورد
                        </span>
                        <?php if ($_SESSION['users']['type'] == 1) { ?>

                            <a href="./upload.php" class="item"   style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="upload" width="32px" height="32px" fill-opacity="0.4">
                                    <g fill="#134563">
                                        <path d="M39.4 19.3 32 11.9l-7.4 7.4-1.8-1.8L32 8.2l9.2 9.3-1.8 1.8"></path>
                                        <path d="M30.6 10.1h2.8v29h-2.8z"></path>
                                        <path d="M45.8 55.8H18.1c-2.3 0-4.2-1.9-4.2-4.2V26.7c0-2.3 1.9-4.2 4.2-4.2h9.7v2.8h-9.7c-.8 0-1.4.6-1.4 1.4v24.9c0 .8.6 1.4 1.4 1.4h27.7c.8 0 1.4-.6 1.4-1.4V26.7c0-.8-.6-1.4-1.4-1.4h-9.7v-2.8h9.7c2.3 0 4.2 1.9 4.2 4.2v24.9c0 2.3-1.9 4.2-4.2 4.2"></path>
                                    </g>
                                </svg>
                                <li>افزودن کالا</li>
                            </a>
                            <a href="AdminAddCategory.php" class="item" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="upload" width="32px" height="32px" fill-opacity="0.4">
                                    <g fill="#134563">
                                        <path d="M39.4 19.3 32 11.9l-7.4 7.4-1.8-1.8L32 8.2l9.2 9.3-1.8 1.8"></path>
                                        <path d="M30.6 10.1h2.8v29h-2.8z"></path>
                                        <path d="M45.8 55.8H18.1c-2.3 0-4.2-1.9-4.2-4.2V26.7c0-2.3 1.9-4.2 4.2-4.2h9.7v2.8h-9.7c-.8 0-1.4.6-1.4 1.4v24.9c0 .8.6 1.4 1.4 1.4h27.7c.8 0 1.4-.6 1.4-1.4V26.7c0-.8-.6-1.4-1.4-1.4h-9.7v-2.8h9.7c2.3 0 4.2 1.9 4.2 4.2v24.9c0 2.3-1.9 4.2-4.2 4.2"></path>
                                    </g>
                                </svg>
                                <li>افزودن دسته‌بندی</li>
                            </a>
                            <a href="categoryList.php" class="item" style="text-decoration: none;">
                                <svg width="20" height="20" viewBox="0 0 66 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M64.1667 50.1875V6.84375C64.1667 3.06971 61.0874 0 57.2917 0H11.4583C5.14048 0 0 5.11569 0 11.4063V61.5938C0 67.8816 5.14048 73 11.4583 73H60.7292C62.627 73 64.1667 71.4674 64.1667 69.5781C64.1667 67.6889 62.627 66.1563 60.7292 66.1563H59.5833V56.6108C62.2475 55.6625 64.1667 53.1531 64.1667 50.1875ZM52.7083 66.1563H11.4583C8.93178 66.1563 6.875 64.1115 6.875 61.5938C6.875 59.076 8.93178 57.0313 11.4583 57.0313H52.7083V66.1563ZM57.2917 50.1875H11.4583C9.82839 50.1875 8.27864 50.5262 6.875 51.1409V11.4063C6.875 8.88833 8.93178 6.84375 11.4583 6.84375H57.2917V50.1875ZM21.7708 22.8125H46.9792C48.884 22.8125 50.4167 21.2869 50.4167 19.3906C50.4167 17.4943 48.884 15.9688 46.9792 15.9688H21.7708C19.8802 15.9688 18.3333 17.5086 18.3333 19.3906C18.3333 21.2726 19.8802 22.8125 21.7708 22.8125ZM21.7708 34.2188H46.9792C48.884 34.2188 50.4167 32.6932 50.4167 30.7969C50.4167 28.9006 48.884 27.375 46.9792 27.375H21.7708C19.8802 27.375 18.3333 28.9149 18.3333 30.7969C18.3333 32.6789 19.8802 34.2188 21.7708 34.2188Z"
                                        fill="black" fill-opacity="0.4" />
                                </svg>
                                <li>لیست دسته‌بندی ها</li>
                            </a>
                            <a href="./listProducts.php" class="item" style="text-decoration: none;">
                                <svg width="20" height="20" viewBox="0 0 66 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M64.1667 50.1875V6.84375C64.1667 3.06971 61.0874 0 57.2917 0H11.4583C5.14048 0 0 5.11569 0 11.4063V61.5938C0 67.8816 5.14048 73 11.4583 73H60.7292C62.627 73 64.1667 71.4674 64.1667 69.5781C64.1667 67.6889 62.627 66.1563 60.7292 66.1563H59.5833V56.6108C62.2475 55.6625 64.1667 53.1531 64.1667 50.1875ZM52.7083 66.1563H11.4583C8.93178 66.1563 6.875 64.1115 6.875 61.5938C6.875 59.076 8.93178 57.0313 11.4583 57.0313H52.7083V66.1563ZM57.2917 50.1875H11.4583C9.82839 50.1875 8.27864 50.5262 6.875 51.1409V11.4063C6.875 8.88833 8.93178 6.84375 11.4583 6.84375H57.2917V50.1875ZM21.7708 22.8125H46.9792C48.884 22.8125 50.4167 21.2869 50.4167 19.3906C50.4167 17.4943 48.884 15.9688 46.9792 15.9688H21.7708C19.8802 15.9688 18.3333 17.5086 18.3333 19.3906C18.3333 21.2726 19.8802 22.8125 21.7708 22.8125ZM21.7708 34.2188H46.9792C48.884 34.2188 50.4167 32.6932 50.4167 30.7969C50.4167 28.9006 48.884 27.375 46.9792 27.375H21.7708C19.8802 27.375 18.3333 28.9149 18.3333 30.7969C18.3333 32.6789 19.8802 34.2188 21.7708 34.2188Z"
                                        fill="black" fill-opacity="0.4" />
                                </svg>
                                <li>لیست محصولات</li>
                            </a>

                            <a href="usersList.php" class="item" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="upload" width="32px" height="32px" fill-opacity="0.4">
                                    <g fill="#134563">
                                        <path d="M39.4 19.3 32 11.9l-7.4 7.4-1.8-1.8L32 8.2l9.2 9.3-1.8 1.8"></path>
                                        <path d="M30.6 10.1h2.8v29h-2.8z"></path>
                                        <path d="M45.8 55.8H18.1c-2.3 0-4.2-1.9-4.2-4.2V26.7c0-2.3 1.9-4.2 4.2-4.2h9.7v2.8h-9.7c-.8 0-1.4.6-1.4 1.4v24.9c0 .8.6 1.4 1.4 1.4h27.7c.8 0 1.4-.6 1.4-1.4V26.7c0-.8-.6-1.4-1.4-1.4h-9.7v-2.8h9.7c2.3 0 4.2 1.9 4.2 4.2v24.9c0 2.3-1.9 4.2-4.2 4.2"></path>
                                    </g>
                                </svg>
                                <li> لیست کاربران</li>
                            </a>
                        <?php } ?>

                        <a href="./Profile.php" class="item" style="text-decoration: none;">
                            <svg width="20" height="20" viewBox="0 0 66 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M38.9583 43.3438H25.2083C11.2864 43.3438 0 54.5788 0 68.4375C0 70.9567 2.05248 73 4.58333 73H59.5833C62.1141 73 64.1667 70.9567 64.1667 68.4375C64.1667 54.5788 52.8803 43.3438 38.9583 43.3438ZM7.01679 66.1563C8.14832 57.1597 15.8698 50.1875 25.2083 50.1875H38.9583C48.2911 50.1875 56.0168 57.1667 57.1483 66.1563H7.01679ZM32.0833 36.5C42.2081 36.5 50.4167 28.3289 50.4167 18.25C50.4167 8.17115 42.2081 0 32.0833 0C21.9585 0 13.75 8.17115 13.75 18.25C13.75 28.3303 21.957 36.5 32.0833 36.5ZM32.0833 6.84375C38.401 6.84375 43.5417 11.9609 43.5417 18.25C43.5417 24.5391 38.401 29.6563 32.0833 29.6563C25.7655 29.6563 20.625 24.5377 20.625 18.25C20.625 11.9609 25.7669 6.84375 32.0833 6.84375Z"
                                    fill="black" fill-opacity="0.4" />
                            </svg>
                            <li>اطلاعات کاربری</li>
                        </a>
                        <a href="<?php echo ($_SESSION['users']['type'] == 1) ? './adminbasket.php' : './showbasket.php?user_id=' . $_SESSION['users']['id']; ?>" class="item" style="text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fil:#b1bac4; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path d="M 89.26 25.686 c -0.707 -0.946 -1.789 -1.488 -2.97 -1.488 H 74.974 H 30.6 l -0.686 -2.642 c -0.595 -2.291 -2.664 -3.892 -5.031 -3.892 h -7.565 c -0.552 0 -1 0.448 -1 1 c 0 0.552 0.448 1 1 1 h 7.565 c 1.457 0 2.729 0.984 3.096 2.394 l 9.095 35.022 c 0.114 0.441 0.512 0.749 0.968 0.749 h 42.52 c 0.553 0 1 -0.447 1 -1 s -0.447 -1 -1 -1 H 38.814 l -1.857 -7.149 h 43.176 c 2.284 0 4.332 -1.53 4.979 -3.72 l 4.732 -16.006 C 90.18 27.823 89.966 26.631 89.26 25.686 z M 87.927 28.388 l -4.732 16.006 c -0.398 1.347 -1.657 2.287 -3.061 2.287 H 36.438 l -5.319 -20.483 h 43.855 H 86.29 c 0.544 0 1.042 0.25 1.367 0.685 C 87.983 27.318 88.081 27.867 87.927 28.388 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45.396 72.335 c -3.167 0 -5.743 -2.576 -5.743 -5.743 c 0 -3.166 2.576 -5.742 5.743 -5.742 c 3.166 0 5.743 2.576 5.743 5.742 C 51.139 69.759 48.563 72.335 45.396 72.335 z M 45.396 62.85 c -2.064 0 -3.743 1.679 -3.743 3.742 c 0 2.064 1.679 3.743 3.743 3.743 s 3.743 -1.679 3.743 -3.743 C 49.139 64.529 47.46 62.85 45.396 62.85 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 72.113 72.335 c -3.166 0 -5.742 -2.576 -5.742 -5.743 c 0 -3.166 2.576 -5.742 5.742 -5.742 c 3.167 0 5.743 2.576 5.743 5.742 C 77.856 69.759 75.28 72.335 72.113 72.335 z M 72.113 62.85 c -2.063 0 -3.742 1.679 -3.742 3.742 c 0 2.064 1.679 3.743 3.742 3.743 c 2.064 0 3.743 -1.679 3.743 -3.743 C 75.856 64.529 74.177 62.85 72.113 62.85 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 20.936 32.205 H 1 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 19.936 c 0.552 0 1 0.448 1 1 S 21.488 32.205 20.936 32.205 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 21.972 40.443 H 2.037 c -0.552 0 -1 -0.448 -1 -1 c 0 -0.552 0.448 -1 1 -1 h 19.936 c 0.552 0 1 0.448 1 1 C 22.972 39.995 22.524 40.443 21.972 40.443 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 23.228 48.681 H 3.292 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 19.936 c 0.552 0 1 0.447 1 1 S 23.78 48.681 23.228 48.681 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <?php if ($_SESSION['users']['type'] == 1): ?>
                                <li>لیست سبد خرید کاربران</li>
                            <?php else: ?>
                                <li>سبد خرید</li>
                            <?php endif; ?>
                        </a>
                         

                        <?php if ($_SESSION['users']['type'] == 0): ?>
                            <a href="Orders.php" class="item" style="text-decoration: none;">
                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg fill="#000000" height="20" width="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 219.15 219.15" xml:space="preserve" fill-opacity="0.4">
                                    <g>
                                        <path d="M109.575,0C49.156,0,0.001,49.155,0.001,109.574c0,60.42,49.154,109.576,109.573,109.576
                                        c60.42,0,109.574-49.156,109.574-109.576C219.149,49.155,169.995,0,109.575,0z M109.575,204.15
                                        c-52.148,0-94.573-42.427-94.573-94.576C15.001,57.426,57.427,15,109.575,15c52.148,0,94.574,42.426,94.574,94.574
                                        C204.149,161.724,161.723,204.15,109.575,204.15z" />
                                        <path d="M166.112,108.111h-52.051V51.249c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v64.362c0,4.142,3.358,7.5,7.5,7.5
                                        h59.551c4.143,0,7.5-3.358,7.5-7.5C173.612,111.469,170.254,108.111,166.112,108.111z" />
                                    </g>
                                </svg>
                                <li>تاریخچه سفارش ها</li>
                            </a>
                        <?php elseif ($_SESSION['users']['type'] == 1): ?>
                            <a href="listOrders.php" class="item" style="text-decoration: none;">
                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg fill="#000000" height="20" width="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 219.15 219.15" xml:space="preserve" fill-opacity="0.4">
                                    <g>
                                        <path d="M109.575,0C49.156,0,0.001,49.155,0.001,109.574c0,60.42,49.154,109.576,109.573,109.576
                                        c60.42,0,109.574-49.156,109.574-109.576C219.149,49.155,169.995,0,109.575,0z M109.575,204.15
                                        c-52.148,0-94.573-42.427-94.573-94.576C15.001,57.426,57.427,15,109.575,15c52.148,0,94.574,42.426,94.574,94.574
                                        C204.149,161.724,161.723,204.15,109.575,204.15z" />
                                        <path d="M166.112,108.111h-52.051V51.249c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v64.362c0,4.142,3.358,7.5,7.5,7.5
                                        h59.551c4.143,0,7.5-3.358,7.5-7.5C173.612,111.469,170.254,108.111,166.112,108.111z" />
                                    </g>
                                </svg>
                                <li>تاریخچه سفارش ها</li>
                            </a>
                        <?php endif; ?>
                        <!-- <div id="log"> -->
                           
                                <a href="./vendor/Userlogout.php" style="text-decoration: none;" >
                                <li style="background-color: #ffffff;  font-weight:500; white-space:nowrap; padding:15px 15px; color: #E35F83;  margin-top: 2vh;">
                                    <svg width="20" height="20" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M74 18.5V55.5C74 63.1631 67.7881 69.375 60.125 69.375H49.7188C47.7966 69.375 46.25 67.8284 46.25 65.9063C46.25 63.9897 47.8036 62.4375 49.7188 62.4375H60.125C63.9404 62.4375 67.0625 59.3154 67.0625 55.5V18.5C67.0625 14.6844 63.9404 11.5625 60.125 11.5625H49.7188C47.7966 11.5625 46.25 10.0088 46.25 8.09375C46.25 6.17726 47.7966 4.625 49.7188 4.625H60.125C67.7851 4.625 74 10.837 74 18.5ZM49.9356 34.6297L31.4355 14.9735C30.1203 13.5686 27.9235 13.505 26.536 14.8145C25.134 16.1297 25.0617 18.3265 26.377 19.714L39.3702 33.5313H3.46875C1.55371 33.5313 0 35.0922 0 37C0 38.9077 1.55371 40.4688 3.46875 40.4688H39.3702L26.374 54.2801C25.0597 55.6757 25.1275 57.8702 26.5231 59.1811C27.2008 59.8072 28.0535 60.125 28.9063 60.125C29.8276 60.125 30.749 59.7591 31.4312 59.032L49.9311 39.3758C51.1928 38.0404 51.1928 35.9594 49.9356 34.6297Z"
                                            fill="black" fill-opacity="0.4" />
                                    </svg>
                                    خروج از حساب کاربری
                                    </li>
                                </a>
                            
                        <!-- </div> -->
                    </ul>
                </aside>
            </div>
            <div class="leftSec">
                <div class="Outlet"></div>
            </div>
        </div>
    </main>
    <script src="../public/js/dashbord.js"></script>
</body>

</html>