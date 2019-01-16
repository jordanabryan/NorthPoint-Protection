
    </main>
  </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
		
	(function(){

		var button = document.getElementsByClassName('mob-nav-button')[0];
		var body = document.body;
		var open = false;

		button.addEventListener('click', function(e){

			e.preventDefault();

			if(!body.classList.contains('open')){
				body.classList.add('open');
			} else {
				body.classList.remove('open');
			}

		});

		window.addEventListener('resize', function(){
			if(this.innerWidth >= 600){
				if(body.classList.contains('open')){
					body.classList.remove('open');
				}
			}
		})

	})();

</script>

@yield('footerJS')

</body>
</html>