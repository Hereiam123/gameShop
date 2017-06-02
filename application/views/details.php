<div class="row details">
	<div class="col-md-4">
		<img src="<?php echo base_url(); ?>assets/img/<?php echo $product->image; ?>" />
	</div>
	<div class="col-md-8">
		<h3><?php echo $product->title;?></h3>
		<div class="details-price">
			Price: <?php echo $product->price; ?>
		</div>
		<div class="details-description">
			<p><?php echo $product->description; ?></p>
		</div>

		<div class="details-buy">
			<form>
				<button type="submit" name="buy_submit" class="btn btn-primary">Add To Cart</button>
			</form>
		</div>
	</div>
</div>
