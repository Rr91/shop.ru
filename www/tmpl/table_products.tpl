<table class="products">
	<?php
		for ($i = 0; $i < count($this->products); $i++) {
			if ($i % 4 == 0) { ?>
				<tr>
			<?php } ?>
			<td>
				<div class="intro_product">
					<p class="img">
						<img src="<?=$this->products[$i]["img"]?>" alt="<?=$this->products[$i]["title"]?>" />
					</p>
					<p class="title">
						<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["title"]?></a>
					</p>
					<p class="price"><?=$this->products[$i]["price"]?> руб.</p>
					<p>
						<a class="link_cart" href="<?=$this->products[$i]["link_cart"]?>"></a>
					</p>
				</div>
			</td>
			<?php if (($i + 1) % 4 == 0) { ?>
				</tr>
			<?php } ?>
	<?php } ?>
</table>