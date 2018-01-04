<div class="col-sm-3 col-sm-offset-3 col-md-3 col-md-offset-2 main">

	<h1 class="page-header"><?php echo $title; ?></h1>

	<script>Grocy.EditMode = '<?php echo $mode; ?>';</script>

	<?php if ($mode == 'edit') : ?>
		<script>Grocy.EditObjectId = <?php echo $listItem->id; ?>;</script>
	<?php endif; ?>

	<form id="shoppinglist-form">

		<div class="form-group">
			<label for="product_id">Product&nbsp;&nbsp;<i class="fa fa-barcode"></i></label>
			<select class="form-control combobox" id="product_id" name="product_id" value="<?php if ($mode == 'edit') echo $listItem->product_id; ?>">
				<option value=""></option>
				<?php foreach ($products as $product) : ?>
					<option <?php if ($mode == 'edit' && $product->id == $listItem->product_id) echo 'selected="selected"'; ?> data-additional-searchdata="<?php echo $product->barcode; ?>" value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
				<?php endforeach; ?>
			</select>
			<div id="product-error" class="help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label for="amount">Amount&nbsp;&nbsp;<span id="amount_qu_unit" class="small text-muted"></span><br><span class="small text-warning"><?php if ($mode == 'edit' && $listItem->amount_autoadded > 0) echo $listItem->amount_autoadded . " units were automatically added and will apply in addition to the amount entered here."; ?></span></label>
			<input type="number" class="form-control" id="amount" name="amount" value="<?php if ($mode == 'edit') echo $listItem->amount; else echo '1'; ?>" min="0" required>
			<div class="help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label for="note">Note</label>
			<textarea class="form-control" rows="2" id="note" name="note"><?php if ($mode == 'edit') echo $listItem->note; ?></textarea>
		</div>

		<button id="save-shoppinglist-button" type="submit" class="btn btn-default">Save</button>

	</form>

</div>

<div class="col-sm-6 col-md-5 col-lg-3 main well">
	<h3>Product overview <strong><span id="selected-product-name"></span></strong></h3>
	<h4><strong>Stock quantity unit:</strong> <span id="selected-product-stock-qu-name"></span></h4>

	<p>
		<strong>Stock amount:</strong> <span id="selected-product-stock-amount"></span> <span id="selected-product-stock-qu-name2"></span><br>
		<strong>Last purchased:</strong> <span id="selected-product-last-purchased"></span> <time id="selected-product-last-purchased-timeago" class="timeago timeago-contextual"></time><br>
		<strong>Last used:</strong> <span id="selected-product-last-used"></span> <time id="selected-product-last-used-timeago" class="timeago timeago-contextual"></time>
	</p>
</div>