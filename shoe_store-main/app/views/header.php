<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Redstore | Ecommerce website</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <!--added a cdn link by searching font awesome4 cdn and getting this link from https://www.bootstrapcdn.com/fontawesome/ this url*/-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body>
        <div style="background:#fff" class ="header">
        <div  class="container">
            <div  class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="../images/logo1.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="index.php?act=loadproduct">Sản phẩm</a></li>
                         <li>
                            <?php
                                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                                if (isset($_SESSION['user_id'])) {
                                    // Hiển thị tên người dùng với đường dẫn tới `loadtaikhoan`
                                    echo '<a href="index.php?act=loadtaikhoan">Chào, ' . htmlspecialchars($_SESSION['username']) . '</a>';
                                } else {
                                    // Khi chưa đăng nhập, hiển thị "Account"
                                    echo '<a href="index.php?act=loadtaikhoan">Đăng nhập/Đăng ký</a>';
                                }
                            ?>
                        </li>
                        <li class="search-container">
                            <form class="formtim" action="index.php" method="GET">
                                <input type="hidden" name="act" value="search">
                                <input class="inputtim" type="text" placeholder="Tìm kiếm sản phẩm..." name="search">
                                <button class="nuttim" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>



                        
                    </ul>
                </nav>
                <a style="margin-top: 4px;" href="index.php?act=cart"><img class="hinhgiohang" src="../images/cart.png" width="30px" height="30px"></a>
                <img src="../images/menu.png" class="menu-icon" onClick="menutoggle()" >
            </div>
            </div>
        </div>
        
            
    
     


   