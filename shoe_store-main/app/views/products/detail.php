       
       <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <!-- Main product image -->
                    <img src="<?php echo $product['image']; ?>" width="100%" id="productImg">

                    <!-- Additional small images -->
                    <div class="small-img-row">
                        <?php foreach ($images as $image): ?>
                            <div class="small-img-col">
                                <img src="<?php echo $image['image_path']; ?>" width="100%" class="small-img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-2">
    <p>Trang chủ / <?php echo htmlspecialchars($product['category_name']); ?></p>
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <h4>$<?php echo number_format($product['price'], 2); ?></h4>
    
    <!-- Add to Cart Form -->
    <form action="index.php?act=add" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
        
        <label for="size">Chọn size:</label>
        <select name="size" id="size" required>
            <option value="">Chọn size</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
        </select>
        
        <label for="quantity">Số lượng:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
        
        <button type="submit" class="btn">Thêm vào giỏ hàng</button>
    </form>

    <h3>Chi tiết sản phẩm <i class="fa fa-indent"></i></h3>
    <p><?php echo htmlspecialchars($product['description']); ?></p>
</div>

            </div>
        </div>
        </div>
        <!-- Nhúng iframe cho phần bình luận và đánh giá -->
        <iframe 
            id="commentsIframe" 
            src="index.php?act=comments&product_id=<?php echo $product['id']; ?>&no_layout=1" 
            width="80%" 
            height="600px" 
            style="display: block; margin: 0 auto; max-height: 600px; overflow-y: auto;"
            onload="resizeIframe(this)">
        </iframe>

        <script>
            function resizeIframe(iframe) {
                // Set the iframe height based on its content height, but limit it to 600px max
                const doc = iframe.contentDocument || iframe.contentWindow.document;

                iframe.style.height = "auto"; // Reset to auto to get actual height
                const newHeight = Math.min(doc.documentElement.scrollHeight, 600); // Limit to 600px max
                iframe.style.height = newHeight + "px";
            }
        </script>


   
        
        <!----------------------------------Title------------------------------------->
        <div class="small-container">
            <div class="row row-2">
                <h2>Sản phẩm cùng loại:</h2>
                
            </div>
        </div>
                
       <!----------------------------------related products------------------------------------->
        <div class="small-container">
            <div class="row">
                <?php foreach ($relatedProducts as $relatedProduct): ?>
                    <div class="col-4">
                        <a href="index.php?act=productdetails&id=<?php echo $relatedProduct['id']; ?>">
                            <img src="<?php echo $relatedProduct['image']; ?>" alt="<?php echo $relatedProduct['name']; ?>">
                            <h4><?php echo $relatedProduct['name']; ?></h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$<?php echo $relatedProduct['price']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            var productImg=document.getElementById("productImg");
            var smallImg=document.getElementsByClassName("small-img");
            
            smallImg[0].onclick=function(){
                productImg.src=smallImg[0].src;
            }
             smallImg[1].onclick=function(){
                productImg.src=smallImg[1].src;
            }
              smallImg[2].onclick=function(){
                productImg.src=smallImg[2].src;
            }
               smallImg[3].onclick=function(){
                productImg.src=smallImg[3].src;
            }
            
            
        </script>
