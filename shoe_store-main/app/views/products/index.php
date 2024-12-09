<div class="small-container">
    <div class="row row-2">
        <h2>Tất cả sản phẩm</h2>
        <form method="POST" action="index.php?act=loadproduct">
            <select name="sort" onchange="this.form.submit()">
                <option value="">Lọc mặc định</option>
                <option value="price">Lọc theo giá</option>
                <option value="rating">Lọc theo đánh giá</option>
            </select>
        </form>
    </div>

    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-4">
        <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>"><img src="<?php echo $product['image']; ?>"></a>
        <a href="index.php?act=productdetails&id=<?php echo $product['id']; ?>"><h4><?php echo $product['name']; ?></h4></a>

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
            <p>$<?php echo $product['price']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="page-btn">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i == $currentPage): ?>
                <span class="active"><?php echo $i; ?></span> <!-- Trang hiện tại -->
            <?php else: ?>
                <a href="index.php?act=loadproduct&page=<?php echo $i; ?>">
                    <span><?php echo $i; ?></span> <!-- Thẻ span bên trong thẻ a -->
                </a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="index.php?act=loadproduct&page=<?php echo $currentPage + 1; ?>">
                <span>&#8594;</span> <!-- Nút "tiếp theo" -->
            </a>
        <?php endif; ?>
    </div>




</div>
