<div class="product_item">
    <a href="<?php echo BASE_URL; ?>product/open/<?php echo $id; ?>">
        <div class="product_tags">
            <?php if ($sale == '1'): ?>
                <div class="product_tag product_tag_red"><?php echo $this->lang->get('SALE') ?></div>
            <?php endif; ?>
            <?php if ($bestseller == '1'): ?>
                <div class="product_tag product_tag_green"><?php echo $this->lang->get('BESTSELLER') ?></div>
            <?php endif; ?>
            <?php if ($new_product == '1'): ?>
                <div class="product_tag product_tag_blue"><?php echo $this->lang->get('NEW') ?></div>
            <?php endif; ?>
        </div>
        <div id="conteudo" class="product_image">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $images[0]['url']; ?>" width="100%" />
            <div class="product_levar">
                
                <h3>
                    <img src="<?php echo BASE_URL; ?>assets/images/search.png" class="product_search"/>
                    Vou levar
                </h3>
            </div>
        </div>

        <div class="product_name"><?php echo $name; ?></div>
        <div class="product_brand"><?php echo $brand_name; ?></div>
        <div class="product_price_from"><?php
            if ($price_from != '0') {
                echo 'R$ ' . number_format($price_from, 2, ',', '.');
            }
            ?></div>
        <div class="product_price">R$ <?php echo number_format($price, 2, ',', '.'); ?></div>
        <div style="clear:both"></div>
    </a>
</div>