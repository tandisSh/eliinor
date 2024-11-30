<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کدیاد-حساب کاربری من</title>
    <link rel="stylesheet" href="../public/css/dashbordStyle.css">
</head>

<body>
    
    <main>
        <div class="main">
            <aside id="dashbord">
                <div class="dash1">
                    <svg width="25" height="24" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.1c0 2.8-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40h-16c-1.1 0-2.2-.9-3.3-.1-1.4-.8-2.8.1-4.2.1H392c-22.1 0-40-17.9-40-40v-88c0-17.7-14.3-32-32-32h-64c-17.7 0-32 14.3-32 32v88c0 22.1-17.9 40-40 40h-55.9c-1.5 0-3-.1-4.5-.2-1.2.1-2.4.2-3.6.2h-16c-22.09 0-40-17.9-40-40V360c0-.9.03-1.9.09-2.8v-69.6H32.05C14.02 287.6 0 273.5 0 255.5c0-9 3.004-17 10.01-24L266.4 8.016c7-7.014 15-8.016 22-8.016s15 2.004 21.1 7.014L564.8 231.5c8 7 12.1 15 11 24z"
                            fill="#b1bac4" class="fill-000000"></path>
                    </svg>
                    <li style="padding: 6px 16px 0px 0px">داشبورد</li>
                </div>
                <?php if($_SESSION['users']['type'] == 1){?>
                <div class="dash">
                    <svg width="24" height="25" viewBox="0 0 66 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M38.9583 43.3438H25.2083C11.2864 43.3438 0 54.5788 0 68.4375C0 70.9567 2.05248 73 4.58333 73H59.5833C62.1141 73 64.1667 70.9567 64.1667 68.4375C64.1667 54.5788 52.8803 43.3438 38.9583 43.3438ZM7.01679 66.1563C8.14832 57.1597 15.8698 50.1875 25.2083 50.1875H38.9583C48.2911 50.1875 56.0168 57.1667 57.1483 66.1563H7.01679ZM32.0833 36.5C42.2081 36.5 50.4167 28.3289 50.4167 18.25C50.4167 8.17115 42.2081 0 32.0833 0C21.9585 0 13.75 8.17115 13.75 18.25C13.75 28.3303 21.957 36.5 32.0833 36.5ZM32.0833 6.84375C38.401 6.84375 43.5417 11.9609 43.5417 18.25C43.5417 24.5391 38.401 29.6563 32.0833 29.6563C25.7655 29.6563 20.625 24.5377 20.625 18.25C20.625 11.9609 25.7669 6.84375 32.0833 6.84375Z"
                            fill="black" fill-opacity="0.4" />
                    </svg>
                    <li onclick="profilePage();">اطلاعات کاربری</li>
                </div>

                <div class="dash">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="upload"  width="32px" height="32px">
                        <g fill="#134563">
                          <path d="M39.4 19.3 32 11.9l-7.4 7.4-1.8-1.8L32 8.2l9.2 9.3-1.8 1.8"></path>
                          <path d="M30.6 10.1h2.8v29h-2.8z"></path>
                          <path d="M45.8 55.8H18.1c-2.3 0-4.2-1.9-4.2-4.2V26.7c0-2.3 1.9-4.2 4.2-4.2h9.7v2.8h-9.7c-.8 0-1.4.6-1.4 1.4v24.9c0 .8.6 1.4 1.4 1.4h27.7c.8 0 1.4-.6 1.4-1.4V26.7c0-.8-.6-1.4-1.4-1.4h-9.7v-2.8h9.7c2.3 0 4.2 1.9 4.2 4.2v24.9c0 2.3-1.9 4.2-4.2 4.2"></path>
                        </g>
                      </svg>
                    <li onclick="UploadPage();">اپلود</li>
                </div>

                <div class="dash">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 32 32" width="32px" height="32px">
                        <path d="M 23.90625 3.96875 C 22.859375 3.96875 21.8125 4.375 21 5.1875 L 5.1875 21 L 5.125 21.3125 L 4.03125 26.8125 L 3.71875 28.28125 L 5.1875 27.96875 L 10.6875 26.875 L 11 26.8125 L 26.8125 11 C 28.4375 9.375 28.4375 6.8125 26.8125 5.1875 C 26 4.375 24.953125 3.96875 23.90625 3.96875 Z M 23.90625 5.875 C 24.410156 5.875 24.917969 6.105469 25.40625 6.59375 C 26.378906 7.566406 26.378906 8.621094 25.40625 9.59375 L 24.6875 10.28125 L 21.71875 7.3125 L 22.40625 6.59375 C 22.894531 6.105469 23.402344 5.875 23.90625 5.875 Z M 20.3125 8.71875 L 23.28125 11.6875 L 11.1875 23.78125 C 10.53125 22.5 9.5 21.46875 8.21875 20.8125 Z M 6.9375 22.4375 C 8.136719 22.921875 9.078125 23.863281 9.5625 25.0625 L 6.28125 25.71875 Z"/>
                    </svg>
                    <li onclick="profilePage();">ویرایش</li>
                </div>

                <div class="dash">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="delete" style="enable-background:new 0 0 64 64" version="1.1" viewBox="0 0 64 64" width="32px" height="32px">
                        <g id="Icon-Trash" transform="translate(232 228)">
                          <path id="Fill-6" d="M-207.5-205.1h3v24h-3z" style="fill:#134563"></path>
                          <path id="Fill-7" d="M-201.5-205.1h3v24h-3z" style="fill:#134563"></path>
                          <path id="Fill-8" d="M-195.5-205.1h3v24h-3z" style="fill:#134563"></path>
                          <path id="Fill-9" d="M-219.5-214.1h39v3h-39z" style="fill:#134563"></path>
                          <path id="Fill-10" d="M-192.6-212.6h-2.8v-3c0-.9-.7-1.6-1.6-1.6h-6c-.9 0-1.6.7-1.6 1.6v3h-2.8v-3c0-2.4 2-4.4 4.4-4.4h6c2.4 0 4.4 2 4.4 4.4v3" style="fill:#134563"></path>
                          <path id="Fill-11" d="M-191-172.1h-18c-2.4 0-4.5-2-4.7-4.4l-2.8-36 3-.2 2.8 36c.1.9.9 1.6 1.7 1.6h18c.9 0 1.7-.8 1.7-1.6l2.8-36 3 .2-2.8 36c-.2 2.5-2.3 4.4-4.7 4.4" style="fill:#134563"></path>
                        </g>
                      </svg>
                    <li onclick="profilePage();">حذف</li>
                </div>
                <?php }?>
                <div class="dash">
                    <svg width="24" height="25" viewBox="0 0 66 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M64.1667 50.1875V6.84375C64.1667 3.06971 61.0874 0 57.2917 0H11.4583C5.14048 0 0 5.11569 0 11.4063V61.5938C0 67.8816 5.14048 73 11.4583 73H60.7292C62.627 73 64.1667 71.4674 64.1667 69.5781C64.1667 67.6889 62.627 66.1563 60.7292 66.1563H59.5833V56.6108C62.2475 55.6625 64.1667 53.1531 64.1667 50.1875ZM52.7083 66.1563H11.4583C8.93178 66.1563 6.875 64.1115 6.875 61.5938C6.875 59.076 8.93178 57.0313 11.4583 57.0313H52.7083V66.1563ZM57.2917 50.1875H11.4583C9.82839 50.1875 8.27864 50.5262 6.875 51.1409V11.4063C6.875 8.88833 8.93178 6.84375 11.4583 6.84375H57.2917V50.1875ZM21.7708 22.8125H46.9792C48.884 22.8125 50.4167 21.2869 50.4167 19.3906C50.4167 17.4943 48.884 15.9688 46.9792 15.9688H21.7708C19.8802 15.9688 18.3333 17.5086 18.3333 19.3906C18.3333 21.2726 19.8802 22.8125 21.7708 22.8125ZM21.7708 34.2188H46.9792C48.884 34.2188 50.4167 32.6932 50.4167 30.7969C50.4167 28.9006 48.884 27.375 46.9792 27.375H21.7708C19.8802 27.375 18.3333 28.9149 18.3333 30.7969C18.3333 32.6789 19.8802 34.2188 21.7708 34.2188Z"
                            fill="black" fill-opacity="0.4" />
                    </svg>
                    <li>سفارش  های من</li>
                </div>
                <div class="dash">
                    <svg width="25" height="24" viewBox="0 0 73 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1039_3402)">
                            <path
                                d="M37.6406 35.2917H21.6721C19.79 35.2917 18.2502 36.8387 18.2502 38.7292C18.2502 40.6198 19.79 42.1667 21.6721 42.1667H37.6406C39.5372 42.1667 41.0625 40.6341 41.0625 38.7292C41.0625 36.8244 39.5372 35.2917 37.6406 35.2917ZM51.3281 21.5417H21.6721C19.79 21.5417 18.2502 23.0886 18.2502 24.9792C18.2502 26.8699 19.79 28.4167 21.6721 28.4167H51.3281C53.2247 28.4167 54.75 26.8842 54.75 24.9792C54.75 23.0743 53.2247 21.5417 51.3281 21.5417ZM36.5 0.787842C16.3396 0.787842 0.128493 14.1268 0.128493 30.5795C0.128493 37.4001 2.96722 43.6492 7.6723 48.6692C5.55216 54.3269 1.13224 59.1078 1.06095 59.161C0.116659 60.1635 -0.132853 61.6316 0.401814 62.8849C0.829408 64.2668 2.05045 65.0834 3.42205 65.0834C12.1892 65.0834 18.9773 61.3951 23.2547 58.4592C27.3709 59.748 31.8322 60.5001 36.5 60.5001C56.6608 60.5001 72.8719 47.1611 72.8719 30.8373C72.8719 14.5135 56.6608 0.787842 36.5 0.787842ZM36.5 53.6251C32.6862 53.6251 28.9264 53.0344 25.3277 51.8893L22.0841 50.8685L19.3053 52.8375C17.2735 54.2869 14.4761 55.8995 11.1084 56.9911C12.1596 55.2549 13.1573 53.3028 13.9415 51.226L15.4556 47.2157L12.5157 44.0818C9.95355 41.3216 6.85247 36.7668 6.85247 30.7084C6.85247 18.0684 20.1465 7.79175 36.3804 7.79175C52.7341 7.79175 65.9084 18.0684 65.9084 30.7084C65.9084 43.3485 52.8681 53.6251 36.5 53.6251Z"
                                fill="black" fill-opacity="0.4" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1039_3402">
                                <rect width="73" height="66" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <li>ثبت نظر</li>
                </div>
                <div class="dash">
                    <svg width="27" height="27" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M55.6875 10.125C49.815 10.125 44.1788 12.8588 40.5 17.1788C36.8212 12.8588 31.185 10.125 25.3125 10.125C14.9175 10.125 6.75 18.2925 6.75 28.6875C6.75 41.445 18.225 51.84 35.6063 67.635L40.5 72.0563L45.3937 67.6013C62.775 51.84 74.25 41.445 74.25 28.6875C74.25 18.2925 66.0825 10.125 55.6875 10.125ZM40.8375 62.6062L40.5 62.9437L40.1625 62.6062C24.0975 48.06 13.5 38.4413 13.5 28.6875C13.5 21.9375 18.5625 16.875 25.3125 16.875C30.51 16.875 35.5725 20.2163 37.3612 24.84H43.6725C45.4275 20.2163 50.49 16.875 55.6875 16.875C62.4375 16.875 67.5 21.9375 67.5 28.6875C67.5 38.4413 56.9025 48.06 40.8375 62.6062Z"
                            fill="black" fill-opacity="0.4" />
                    </svg>
                    <li>علاقه مندی ها و پیشنهادها</li>
                </div>
                <div class="dash">
                    <svg width="25" height="25" viewBox="0 0 73 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1039_3406)">
                            <path
                                d="M36.5 0C56.6604 0 73 16.7871 73 37.5C73 58.2127 56.6604 75 36.5 75C29.0574 75 22.1281 72.7147 16.3537 68.7742C14.7853 67.7051 14.3576 65.5226 15.2701 63.9112C16.4393 62.2852 18.5637 61.8457 20.1463 62.9149C24.8228 66.1084 30.4404 67.9688 36.5 67.9688C52.8823 67.9688 66.1563 54.3311 66.1563 37.5C66.1563 20.669 52.8823 7.03125 36.5 7.03125C26.0063 7.03125 16.7815 12.6328 11.5046 21.0938H19.3906C21.2869 21.0938 22.8125 22.6611 22.8125 24.6094C22.8125 26.5576 21.2869 28.125 19.3906 28.125H3.42188C1.53272 28.125 0 26.5576 0 24.6094V8.20312C0 6.2622 1.53272 4.6875 3.42188 4.6875C5.31104 4.6875 6.84375 6.2622 6.84375 8.20312V15.6299C13.4665 6.16991 24.281 0 36.5 0ZM36.5 18.75C38.3962 18.75 39.9219 20.3174 39.9219 22.2656V36.0498L49.0611 45.5565C50.5153 46.9335 50.5153 49.1602 49.0611 50.4052C47.8493 51.8992 45.6819 51.8992 44.3417 50.4052L34.0762 39.8584C33.4346 39.3311 33.0781 38.4375 33.0781 37.5V22.2656C33.0781 20.3174 34.6037 18.75 36.5 18.75Z"
                                fill="black" fill-opacity="0.4" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1039_3406">
                                <rect width="73" height="75" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <li>تاریخچه سفارش ها</li>
                </div>
                <div class="dash">
                    <svg width="25" height="25" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1039_3414)">
                            <path
                                d="M36.5 0C16.0971 0 0.653434 16.981 0.00296563 36.5L0 44.0851C0 49.9736 4.66945 54.75 10.4282 54.75H13.0359C15.9117 54.75 18.25 52.3691 18.25 49.4177V30.4262C18.25 27.4748 15.9117 25.0938 13.0359 25.0938H10.4282C9.96092 25.0938 9.52365 25.1957 9.07397 25.2574C13.5164 14.4717 24.1385 6.87226 36.5 6.87083C48.8673 6.87251 59.4837 14.4788 63.9319 25.1351C63.4757 25.1935 63.0337 25.0938 62.5774 25.0938H59.9699C57.0882 25.0938 54.75 27.4748 54.75 30.4262V49.4177C54.75 52.3691 57.0882 54.75 59.9684 54.75H62.576C63.8414 54.75 65.0386 54.4846 66.1606 54.0627V57.0313C66.1606 60.1765 63.6027 62.7344 60.4575 62.7344H44.6742C43.4865 60.6955 41.3049 59.3125 38.7813 59.3125H34.2188C30.4404 59.3125 27.375 62.3778 27.375 66.1563C27.375 69.9347 30.4404 73 34.0904 73H38.7813C41.3078 73 43.4905 71.6156 44.6753 69.5781H60.4531C67.3724 69.5781 73 63.9506 73 57.0313V36.5C72.3441 16.981 56.9028 0 36.5 0ZM10.4282 31.9375H11.4063V47.9063H10.4282C8.45201 47.9063 6.84375 46.067 6.84375 44.0851V36.5C6.84375 36.1564 6.88357 35.8227 6.89525 35.4818C7.03337 33.5059 8.54184 31.9375 10.4282 31.9375ZM62.5774 47.9063H61.5938V31.9375H62.5716C64.4575 31.9375 65.9661 33.5116 66.1044 35.482C66.1135 35.8299 66.1563 36.1578 66.1563 36.5V44.0909C66.1563 46.067 64.5451 47.9063 62.5774 47.9063Z"
                                fill="black" fill-opacity="0.4" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1039_3414">
                                <rect width="73" height="73" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <li>درخواست پشتیبانی</li>
                </div>
                <div class="dash">
                    <svg width="25" height="25" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M74 18.5V55.5C74 63.1631 67.7881 69.375 60.125 69.375H49.7188C47.7966 69.375 46.25 67.8284 46.25 65.9063C46.25 63.9897 47.8036 62.4375 49.7188 62.4375H60.125C63.9404 62.4375 67.0625 59.3154 67.0625 55.5V18.5C67.0625 14.6844 63.9404 11.5625 60.125 11.5625H49.7188C47.7966 11.5625 46.25 10.0088 46.25 8.09375C46.25 6.17726 47.7966 4.625 49.7188 4.625H60.125C67.7851 4.625 74 10.837 74 18.5ZM49.9356 34.6297L31.4355 14.9735C30.1203 13.5686 27.9235 13.505 26.536 14.8145C25.134 16.1297 25.0617 18.3265 26.377 19.714L39.3702 33.5313H3.46875C1.55371 33.5313 0 35.0922 0 37C0 38.9077 1.55371 40.4688 3.46875 40.4688H39.3702L26.374 54.2801C25.0597 55.6757 25.1275 57.8702 26.5231 59.1811C27.2008 59.8072 28.0535 60.125 28.9063 60.125C29.8276 60.125 30.749 59.7591 31.4312 59.032L49.9311 39.3758C51.1928 38.0404 51.1928 35.9594 49.9356 34.6297Z"
                            fill="black" fill-opacity="0.4" />
                    </svg>
                    <li onclick="logout();">خروج از حساب کاربری</li>
                </div>
            </aside>
    
        </div>
    </main>

   

    <script type="text/javascript">
        function login() {
            window.location.href = "login.php";
        }
        function UploadPage() {
            window.location.href = "upload.php";
        }
        function logout() {
            window.location.href = "vendor/Userlogout.php";
        }
    </script>
</body>
</html>