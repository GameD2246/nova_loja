<h1>Carrinho de Compras</h1>

<table  width="100%">
<!--    <tr class="table_cart">
        <th width="100" style="padding-left: 10px;">PRODUTO</th>
        <th></th>
        <th width="120" style="text-align: center">PREÇO UNITÁRIO</th>
        <th width="100" style="text-align: center">QUANTIDADE.</th>
        <th width="120" style="text-align: center">SUBTOTAL</th>
        <th width="20" style="padding-right: 10px;">EXCLUIR</th>
    </tr>-->
    <tr class="table_cart">
        <th colspan="3" style="padding-left: 10px;">PRODUTO</th>
        <th></th>
        <th  style="text-align: center">PREÇO UNITÁRIO</th>
        <th  style="text-align: center">QUANTIDADE</th>
        <th  style="text-align: center">SUBTOTAL</th>
        <th  style="text-align: center">EXCLUIR</th>
    </tr>
    <?php
    $subtotal = 0;
    ?>
    <?php foreach ($list as $item): ?>
        <?php
        $subtotal += (floatval($item['price']) * intval($item['qt']));
        $preco = (floatval($item['price']) * intval($item['qt']));
        ?>
        <tr class="product_table_cart">
            <td><img src="<?php echo BASE_URL; ?>media/products/<?php echo $item['image']; ?>" width="80" /></td>
            <td class="name_cart" colspan="3"><strong><?php echo $item['name']; ?></strong></td>
            <td class="vlr_cart" style="text-align: center"><strong>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></strong></td>
            <td style="text-align: center"><?php echo $item['qt']; ?></td>
            <td class="vlr_cart" style="text-align: center"><strong>R$ <?php echo number_format($preco, 2, ',', '.'); ?></strong></td>
            <td style="text-align: center"><a href="<?php echo BASE_URL; ?>cart/del/<?php echo $item['id']; ?>"><img src="<?php echo BASE_URL; ?>assets/images/delete.png" width="15" /></a></td>
        </tr>
    <?php endforeach; ?>
    <tr>
    </tr>
    <tr>
        <td colspan="6" align="right"></td>
        <td class="name_a_cart" colspan="" align="center">Sub-total:</td>
        <td class="valor_cart" align="left"><strong>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="6" align="right"></td>
        <td class="valor_cart" align="center">Frete:</td>
        <td class="name_a_cart"align="left">
            <?php if (isset($shipping['price'])): ?>
                <strong>R$ <?php echo $shipping['price']; ?></strong> (<?php echo $shipping['date']; ?> dia<?php echo ($shipping['date'] == '1') ? '' : 's'; ?>)
            <?php else: ?>
                Qual seu CEP?<br/>
                <form method="POST">
                    <input type="number" name="cep" /><br/>
                    <input type="submit" value="Calcular" />
                </form>
            <?php endif; ?>	
        </td>
    </tr>
    <tr>
        <td colspan="6" align="right"></td>
        <td class="name_a_cart" align="center">Total:</td>
        <td class="valor_cart" align="left"><strong>R$ <?php
                if (isset($shipping['price'])) {
                    $frete = floatval(str_replace(',', '.', $shipping['price']));
                } else {
                    $frete = 0;
                }
                $total = $subtotal + $frete;
                echo number_format($total, 2, ',', '.');
                ?></strong></td>
    </tr>
</table>

<hr/>

<?php if ($frete > 0): ?>

    <form method="POST" action="<?php echo BASE_URL; ?>cart/payment_redirect" style="float:right">
<!--        <select name="payment_type">
            <option value="checkout_transparente">Pagseguro</option>
        </select>-->
        <input type="radio" name="payment_type" value="checkout_transparente">Pagseguro 
        <input type="submit" value="Finalizar Compra" class="button" />
    </form>

<?php endif; ?>













