
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



(function(){

	const links = document.getElementsByClassName('footer-link');

	const model = (content) => {

		let wrapper = document.createElement('div');
			wrapper.classList.add('model-wrapper');

		let inner = document.createElement('div');
			inner.classList.add('model-inner');

		let text = document.createElement('div');
			text.classList.add('model-text');
			text.innerHTML = content;

		let close = document.createElement('div');
			close.classList.add('model-close');
			close.innerHTML = '&times;';

		inner.appendChild(close);
		inner.appendChild(text);

		wrapper.appendChild(inner);

		document.body.appendChild(wrapper);

		
		let to = setTimeout(() => {
			let inner = document.getElementsByClassName('model-inner')[0];
				inner.style.transform = 'scale(1)';
			clearTimeout(to);
		}, 1);

		return true;

	}

	const modelOptions = () => {

		const wrapper = document.getElementsByClassName('model-wrapper')[0];
		const inner = document.getElementsByClassName('model-inner')[0];
		const close = document.getElementsByClassName('model-close')[0];

		close.addEventListener('click', () => {

			inner.style.transform = 'scale(0)';

			let to = setTimeout(() => {
				document.body.removeChild(wrapper);
				clearTimeout(to);
			}, 500);

		})

		wrapper.addEventListener('click', e => {

			if(e.target !== e.currentTarget) {
				return;	
			} else {
			
				inner.style.transform = 'scale(0)';

				let to = setTimeout(() => {
					document.body.removeChild(wrapper);
					clearTimeout(to);
				}, 500);

			}
		})

	}


	[...links].forEach(link => {

		link.addEventListener('click', e => {

			e.preventDefault();

			let url = link.getAttribute('href');
			let token = link.getAttribute('data-token');
			
			fetch(url, {
				method: 'get',
				headers: {
					"X-Requested-With": "XMLHttpRequest",
					"X-CSRF-Token": token
				},
			})
			.then((response) => {
				return response.text();
			})
			.then((data) => {
				model(data);
				modelOptions();
			})
			.catch(function(error) {
				console.log(error);
			});


		})

		return true;

	});

})();


(function(){

	const button = document.getElementsByClassName('mob-nav-button')[0];
	const body = document.body;

	button.addEventListener('click', (e) => {

		e.preventDefault();

		if(!body.classList.contains('open')){
			body.classList.add('open');
		} else {
			body.classList.remove('open');
		}

	});

	window.addEventListener('resize', () => {
		if(window.innerWidth >= 600){
			if(body.classList.contains('open')){
				body.classList.remove('open');
			}
		}
	})

})();

