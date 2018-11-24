@extends('layout')
@section('content')
<div class="container">

	<div id="logged" class="hidden">
asdasdasd
	</div>
	<div id="logged" class="hidden">
not logged
	</div>
	<div class="row" id="not_logged">
		<!-- <div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				Name
			</small>
			<input type="text" id="wallet_name" class="form-control form-control-lg"> 
		</div>
		<div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				Email
			</small>
		<input type="text" id="wallet_email" class="form-control form-control-lg">
		</div> -->
		<div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				Current Address
			</small>
		<input type="text" id="wallet_address" class="form-control form-control-lg" disabled>
		</div>
		<!-- <div class="col-xs-12 col-md-12 m-3">
			<button class="btn btn-lg btn-block btn-primary" onclick="onSubmit()">Sign Up</button>
		</div> -->
		<div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				To Address
			</small>
		<input type="text" id="wallet_address_2" class="form-control form-control-lg">
		</div>
		<div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				ETH Value to Send
			</small>
		<input type="text" id="eth_amount" class="form-control form-control-lg">
		</div>
		<div class="col-xs-12 col-md-12 m-3">
			<small class="d-block font-weight-bold">
				Current Balance
			</small>
		<input type="text" id="current_balance" class="form-control form-control-lg" disabled>
		</div>
		<div class="col-xs-12 col-md-12 m-3">
			<button class="btn btn-lg btn-block btn-primary" onclick="onSend()">Send</button>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	$(document).ready(function(data){
		if(typeof(localStorage.getItem('address')) != "undefined" && localStorage.getItem('address') !== null)
		{
			$("#not_logged").addClass("hidden")
			$("#logged").removeClass("hidden")
		}
		else
		{
			console.log(456)
			$("#not_logged").removeClass("hidden")
			$("#logged").addClass("hidden")
		}
	})
	


	function onSubmit()
	{
		var name 	= $('#wallet_name').val()
		var email 	= $('#wallet_email').val()
		var address = $('#wallet_address').val()
		
		localStorage.setItem('name', name)
		localStorage.setItem('email', email)
		localStorage.setItem('address', address)
		
		
		if(typeof(localStorage.getItem('address')) != "undefined" && localStorage.getItem('address') !== null)
		{
			$("#not_logged").addClass("hidden")
			$("#logged").removeClass("hidden")
			window.location.href = "/"
		}
		else
		{
			console.log(456)
			$("#not_logged").removeClass("hidden")
			$("#logged").addClass("hidden")
		}
	}
	
	function onSend()
	{
		var address_from = $('#wallet_address').val()
		var address_to   = $('#wallet_address_2').val()
		var eth          = $('#eth_amount').val()
		
		web3.eth.sendTransaction({
			from: address_from,
			to: address_to, 
			value: web3.utils.toWei(eth, "ether")
		})

	}

</script>
@endsection