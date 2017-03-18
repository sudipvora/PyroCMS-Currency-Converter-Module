<?php
/**
 * @var $rate_collection Currencyx_Rate_Collection
 * @var $rate_base Currencyx_Rate
 */
?>
<h1>Exchange rate calculator</h1>
<div class="currencyx-calculator row">
	<div class="col-sm-6">
		<h5>I have</h5>
		<p class="form-group">
			<select name="currencyx_from" title="Base Currency" class="currencyx-from form-control">
				<?php foreach ($rate_collection->items() as $r):
					$select = ($rate_base->getTargetCurrency() == $r->getTargetCurrency() ? 'selected="selected"' : '');
					?>
					<option value="<?= $r->getRate(); ?>"<?= $select ?>><?= $r->getTargetName(); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p class="form-group">
			<input name="currencyx_amount" type="number" value="1" class="currencyx-amount form-control" title="Amount to calculate"/>
		</p>
	</div>
	<div class="col-sm-6">
		<h5>I want</h5>
		<p class="form-group">
			<select name="currencyx_to" title="Target Currency" class="currencyx-to form-control">
				<?php foreach ($rate_collection->items() as $r): ?>
					<option value="<?= $r->getRate(); ?>"><?= $r->getTargetName(); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p class="form-group">
			<input class="currencyx-result form-control" readonly="readonly" title="Your results"/>
		</p>
	</div>
</div>

<h2>Exchange rates for <?= $rate_base->getTargetName(); ?></h2>
<div class="currencyx-rates">
	<table class="table table-bordered">
		<tr>
			<th class="hidden-xs">Currency Name</th>
			<th>Currency Code</th>
			<th>Rate per 1 <?= $rate_base->getTargetCurrency(); ?></th>
		</tr>
		<?php foreach ($rate_collection->items() as $rate): ?>
			<tr>
				<td class="hidden-xs"><a href="<?= base_url('/currencyx/' . strtolower($rate->getTargetCurrency())); ?>"><?= $rate->getTargetName(); ?></a></td>
				<td><a href="<?= base_url('/currencyx/' . strtolower($rate->getTargetCurrency())); ?>"><?= $rate->getTargetCurrency(); ?></a></td>
				<td><?= $rate->getRateForCurrency($rate_base); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
