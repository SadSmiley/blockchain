<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>DISH 2018</title>
    <style>
    .hidden{
      display: none;
    }
    </style>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	  <a class="navbar-brand" href="#">Blockchain Spaces #DISH2018</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	<!--   <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	  </div> -->
	</nav>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
    <script>
      window.addEventListener('load', async () => {
          // Modern dapp browsers...
          if (window.ethereum) {
              window.web3 = new Web3(ethereum);
              try {
                  // Request account access if needed
                  await ethereum.enable();
                  // Acccounts now exposed
                  on_load(web3);
              } catch (error) {
                  // User denied account access...
              }
          }
          // Legacy dapp browsers...
          else if (window.web3) {
              window.web3 = new Web3(web3.currentProvider);
              // Acccounts always exposed
              on_load(web3);
          }
          // Non-dapp browsers...
          else 
          {
              console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
          }
      });

      function on_load(web3)
      {
        var wallet = web3.eth.accounts.wallet
        var address = document.getElementById('wallet_address')
        var current = document.getElementById('current_balance')
        address.value = wallet._accounts.givenProvider.selectedAddress

        web3.eth.getBalance(address.value, (err, balance) => 
        {
          balance = balance;
          var current_balance = web3.utils.fromWei(balance, 'ether');

          current.value = current_balance;
        });
      }
    </script>
    @yield('js')
  </body>
</html>