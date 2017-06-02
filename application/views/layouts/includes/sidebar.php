 <div class="cart-block">
	<form action="cart/update" method="post">
		<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
			<tr>
				<th>QTY</th>
				<th>Item Description</th>
				<th style="text-align:right">Item Price</th>
				<th style="text-align:right">Subtotal</th>
			</tr>
			<?php $i = 1; ?>
            <?php foreach ($this->cart->contents() as $items): ?>
				<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
				<tr>
					<td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'class'=>'qty', 'maxlength' => '3', 'size' => '5')); ?></td>
					<td>
						<?php echo $items['name']; ?>
						<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
								<p>
										<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
												<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
										<?php endforeach; ?>
								</p>
						<?php endif; ?>
					</td>
					<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
					<td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
				</tr>
            <?php $i++; ?>
            <?php endforeach; ?>
		</table>
	<br>
	<p><button class="btn btn-default" type="submit">Update Cart</button>
	<a class="btn btn-default" href="cart.html">Go To Cart</a></p>
	</form>
	</div>
	<div class="panel panel-default panel-list">
		<div class="panel-heading panel-heading-dark">
			<h3 class="panel-title">
				Categories
			</h3>
		</div>
		<ul class="list-group">
		<?php foreach(get_categories_helper() as $category) : ?>
		  	<li class="list-group-item"><a href="<?php echo base_url();?>products/category/<?php echo $category->id;?>"><?php echo $category->name; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>

	<div class="panel panel-default panel-list">
		<div class="panel-heading">
			 <h3 class="panel-title">
				Most Popular
			</h3>
		</div>
		<!-- List group -->
		<ul class="list-group">
		<?php foreach(get_popular_helper() as $popular) : ?>
			<li class="list-group-item"><a href="<?php echo base_url();?>products/details/<?php echo $popular->id;?>"><?php echo $popular->title; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
