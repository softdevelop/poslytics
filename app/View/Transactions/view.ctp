<div class="widgetbox box-inverse">
	<h4 class="widgettitle">Transaction detail</h4>
	<div class="widgetcontent wc1">
		<div class="par control-group">
			TerminalID:
			<?php echo $transaction['Transaction']['terminalid']; ?>
		</div>
		<div class="par control-group">
			Merchant Info:
			<?php echo $transaction['Transaction']['merchantinfo']; ?>
		</div>
		<div class="par control-group">
			Transtype:
			<?php echo $transaction['Transaction']['transtype']; ?>
		</div>
		<div class="par control-group">
			Timestamp:
			<?php echo $transaction['Transaction']['timestamp']; ?>
		</div>
		<div class="par control-group">
			Pan:
			<?php echo $transaction['Transaction']['pan']; ?>
		</div>
		<div class="par control-group">
			Currencycode:
			<?php echo $transaction['Transaction']['currencycode']; ?>
		</div>
		<div class="par control-group">
			Country code:
			<?php echo $transaction['Transaction']['countrycode']; ?>
		</div>
		<div class="par control-group">
			Currency symbol:
			<?php echo $transaction['Transaction']['currencysymbol']; ?>
		</div>
		<div class="par control-group">
			Amount:
			<?php echo $transaction['Transaction']['amount']; ?>
		</div>
		<div class="par control-group">
			Refno:
			<?php echo $transaction['Transaction']['refno']; ?>
		</div>
		<div class="par control-group">
			Refcode:
			<?php echo $transaction['Transaction']['refcode']; ?>
		</div>
		<div class="par control-group">
			Authid:
			<?php echo $transaction['Transaction']['authid']; ?>
		</div>
		<div class="par control-group">
			TransactionID:
			<?php echo $transaction['Transaction']['transactionid']; ?>
		</div>
		<div class="par control-group">
			Response code:
			<?php echo $transaction['Transaction']['responsecode']; ?>
		</div>
		<div class="par control-group">
			Response message:
			<?php echo $transaction['Transaction']['responsemessage']; ?>
		</div>
	</div><!--widgetcontent-->
</div><!--widget-->