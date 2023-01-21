function book_hover(elem) {
	elem.style.cssText = 'opacity: 1;';
}

function book_unhover(elem) {
	elem.style.cssText = 'opacity: 0;';
}

window.addEventListener('resize', function() {
	if(window.innerWidth > 1199 ) {
		document.getElementById('nav-container').style.cssText = '';
	}
});

function open_nav() {
	document.getElementById('nav-container').style.cssText = 'width: 370px;';
}
function close_nav() {
	document.getElementById('nav-container').style.cssText = 'width = 0px;';
}

function nav_inner_click(elem) {
	target_elem = elem.parentElement.nextElementSibling;

	if(document.querySelector('.expand-nav-inner-open')) {
		if(document.querySelector('.expand-nav-inner-open').id === target_elem.id) {
			document.querySelector('.expand-nav-inner-open').classList.remove('expand-nav-inner-open');
			return '';
		}
		document.querySelector('.expand-nav-inner-open').classList.remove('expand-nav-inner-open');
	}

	target_elem.classList.add('expand-nav-inner-open');

}

data_deletion = [];

function add_deleting_data(elem) {
	target_isbn = elem.parentElement.parentElement.id.slice(5);
	
	if(data_deletion.includes(target_isbn)) {
		alert('duplicate');
		return '';
	} else {
		data_deletion.push(target_isbn);
	}

	elem.parentElement.parentElement.classList.add('selected_deletion');
	
	if(document.querySelector('.expand-nav-inner-open')) {
		if(document.querySelector('.expand-nav-inner-open').id === 'form-delete-book') {
			//nothing
		} else {
			document.querySelector('.expand-nav-inner-open').classList.remove('expand-nav-inner-open');
			document.getElementById('form-delete-book').classList.add('expand-nav-inner-open');
		}
	} else {
		document.getElementById('form-delete-book').classList.add('expand-nav-inner-open');
	}

	deletion_display();

}

function deletion_display() {
	parent = document.getElementById('delete-ul');
	parent.innerHTML = ``;
	for (var x in data_deletion) {
		li = document.createElement('li');
		li.innerHTML = `
			<span style="width: 100%; display: flex; flex-flow: row; justify-content: space-between;">
			<p style="margin: 0px;">`+data_deletion[x]+`</p> 
			<img src="dum-img/close.png" style="width: 25px; height: 25px;" onclick="revert_deletion(this)">
			</span>
		`;
		li.setAttribute('onmouseenter', 'deletion_onhover(this)');
		li.setAttribute('onmouseleave', 'deletion_unhover(this)');
		parent.appendChild(li);
	}
}

function revert_deletion(elem) {
	console.log(elem.previousElementSibling.innerHTML);
	id = elem.previousElementSibling.innerHTML;
	id_elem = 'book-'+elem.previousElementSibling.innerHTML;
	document.querySelector('#'+id_elem).className = 'book-content';

	delete_from_arr(id, data_deletion);
	deletion_display();

}
function delete_from_arr(id, arr) {
	for(var x in arr) {
		if(arr[x] === id) {
			arr.splice(x, 1);
			x = arr.length;
		}
	}
}

function deletion_onhover(elem) {
	id = elem.children[0].childNodes[1].innerHTML;

	target_elem = document.querySelector('#book-'+id);
	target_elem.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
	target_elem.classList.add('hover_deletion');
	target_elem.classList.remove('selected_deletion');
}

function deletion_unhover(elem) {
	id = elem.children[0].childNodes[1].innerHTML;

	target_elem = document.querySelector('#book-'+id);
	target_elem.classList.remove('hover_deletion');
	target_elem.classList.add('selected_deletion');
}