    <div class ="header">
    <div  class="container">
           <div class="row">
                <div class="col-2">
                    <h1>Thế giới giày dép <br>đa dạng mẫu mã và trending</h1>
                    <p>Khám phá phong cách riêng của bạn với những đôi giày thời thượng</p>
                    <a href="index.php?act=loadproduct" class="btn">Khám phá ngay &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="../images/image1.png">
                </div>
            </div>
        </div>
        </div>


        <!------------------------------ featured categories------------------------------>
        <div class="categories">
            <div class="small-container">
                <div class="row">
                <div class="col-3">
                    <img src="../images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="../images/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="../images/category-3 (2).jpg">
                </div>
            </div>
            </div>
        </div>
         <!------------------------------ san pham yeu thich------------------------------>
            <div class="small-container">
        <h2 class="title">Sản phẩm được yêu thích</h2>
        <div class="row">
            <?php foreach ($topRatedProducts as $product): ?>
            <div class="col-4">
                <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </a>
                <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>">
                    <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                </a>
                <div class="rating">
                    <?php 
                    $average_rating = round($product['average_rating']); // Làm tròn số rating
                    for ($i = 0; $i < 5; $i++): 
                    ?>
                        <?php if ($i < $average_rating): ?>
                            <i class="fa fa-star"></i>
                        <?php else: ?>
                            <i class="fa fa-star-o"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <p>$<?php echo number_format($product['price'], 2); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
   

            <!------------------------------ sản phẩm mới nhất------------------------------>
             
             
            <h2 class="title">Sản phẩm mới nhất</h2>
            <div class="row">
                <?php foreach ($newestProducts as $product): ?>
                <div class="col-4">
                    <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </a>
                    <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>">
                        <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                    </a>
                    <div class="rating">
                        <?php 
                        $average_rating = round($product['average_rating'] ?? 0); // Mặc định 0 nếu không có rating
                        for ($i = 0; $i < 5; $i++): 
                        ?>
                            <?php if ($i < $average_rating): ?>
                                <i class="fa fa-star"></i>
                            <?php else: ?>
                                <i class="fa fa-star-o"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <p>$<?php echo number_format($product['price'], 2); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        
        <!--------------------------`   offer   --------------------------------->
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="../images/imagephu1.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Chỉ có trên Thế giới dày dép</p>
                        <h1>1 đổi 1 khi không ưng ý</h1>
                        <p>Chúng tôi cam kết mang đến trải nghiệm mua sắm tuyệt vời với dịch vụ tận tâm. Đội ngũ chăm sóc khách hàng luôn sẵn sàng hỗ trợ và tư vấn để quý khách tìm được sản phẩm ưng ý nhất. Sự hài lòng của bạn là ưu tiên hàng đầu của chúng tôi.</p>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!------------------------------Testimonial---------------------------------->
        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left" ></i>
                        <p>"Tôi thật sự ấn tượng với chất lượng sản phẩm và dịch vụ tại cửa hàng. Mẫu mã đa dạng, luôn cập nhật xu hướng, nhân viên tư vấn nhiệt tình và chu đáo. Mỗi lần mua sắm tại đây là một trải nghiệm tuyệt vời. Tôi rất tin tưởng và sẽ tiếp tục ủng hộ cửa hàng trong tương lai!"</p>
                        <div class="rating"> 
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-o" ></i>
                        </div>
                        <img src="../images/user-1.png">
                        <h3>Văn Việt - Khách hàng lâu năm</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left" ></i>
                        <p>Với lòng đam mê và quyết tâm không ngừng, người sáng lập của chúng tôi đã xây dựng cửa hàng từ những bước đi đầu tiên. Mỗi sản phẩm, mỗi dịch vụ đều chứa đựng tâm huyết và mong muốn mang lại giá trị tốt nhất cho khách hàng. Không ngại thử thách, chúng tôi cam kết không ngừng cải tiến và phát triển, nhằm mang đến trải nghiệm mua sắm tốt nhất và xứng đáng với sự tin tưởng của bạn.</p>
                        <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>
                        <img src="../images/user-2.png">
                        <h3>Văn Bình - Chủ cửa hàng</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left" ></i>
                        <p>"Là đối tác lâu năm của cửa hàng, chúng tôi đánh giá cao sự chuyên nghiệp và tận tâm trong từng khâu hợp tác. Cửa hàng luôn giữ uy tín, cam kết về chất lượng sản phẩm và dịch vụ, đồng thời không ngừng sáng tạo để mang đến giá trị tốt nhất cho khách hàng. Chúng tôi tự hào khi được đồng hành cùng cửa hàng trên chặng đường phát triển."</p>
                        <div class="rating"> 
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>
                        <img src="../images/user-3.png">
                        <h3>Thị Lâm - Đối tác chiến lược</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <!----------------------------------Brands------------------------------------>
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="../images/logo-nike.png" alt="">
                    </div>
                    <div class="col-5">
                        <img src="../images/logo-adidas.png" alt="">
                    </div>
                    <div class="col-5">
                        <img src="../images/logo-gucci.jpg" alt="">
                    </div>
                    <div class="col-5">
                        <img src="../images/logo-crocs.png" alt="">
                    </div>
                    <div class="col-5">
                        <img src="../images/logo-balenciaga.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        
        
        
       
        
