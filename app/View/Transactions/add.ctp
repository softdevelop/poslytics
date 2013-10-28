<?php $this->Html->addCrumb('Transactions', '/'); ?>
<?php echo $this->Form->create('Transaction', array('action' => 'add')); ?>
<div class="widgetbox box-inverse">
	<h4 class="widgettitle">Add new transaction</h4>
	<div class="widgetcontent wc1">
		<form id="form1" class="stdform" method="post" action="forms.html">
				<div class="par control-group">
						<label class="control-label" for="firstname">TerminalID</label>
					<div class="controls">
					<?php echo $this->Form->input("terminalid" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Merchant Info</label>
					<div class="controls">
					<?php echo $this->Form->input("merchantinfo" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Transtype</label>
					<div class="controls">
					<?php echo $this->Form->input("transtype" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Timestamp</label>
					<div class="controls">
					<?php echo $this->Form->input("timestamp" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Pan</label>
					<div class="controls">
					<?php echo $this->Form->input("pan" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Currencycode</label>
					<div class="controls">
					<?php echo $this->Form->input("currencycode" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Country code</label>
					<div class="controls">
					<?php echo $this->Form->input("countrycode" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Currency symbol</label>
					<div class="controls">
					<?php echo $this->Form->input("currencysymbol" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Amount</label>
					<div class="controls">
					<?php echo $this->Form->input("amount" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Refno</label>
					<div class="controls">
					<?php echo $this->Form->input("refno" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Refcode</label>
					<div class="controls">
					<?php echo $this->Form->input("refcode" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Authid</label>
					<div class="controls">
					<?php echo $this->Form->input("authid" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">TransactionID</label>
					<div class="controls">
					<?php echo $this->Form->input("transactionid" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Response code</label>
					<div class="controls">
					<?php echo $this->Form->input("responsecode" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>
				<div class="par control-group">
						<label class="control-label" for="firstname">Response message</label>
					<div class="controls">
					<?php echo $this->Form->input("responsemessage" ,array('label' => false,'div' => false,'type'=>'text','class'=>"input-large"))?>
					</div>
				</div>				
				<p class="stdformbutton">
						<?php echo $this->Form->Submit(__('Add Transaction'), array('div'=>false, 'class'=>'btn btn-primary'));?>
				</p>
		<?php echo $this->Form->end(); ?>
	</div><!--widgetcontent-->
</div><!--widget-->