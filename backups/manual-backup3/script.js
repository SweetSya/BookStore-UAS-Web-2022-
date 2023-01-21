function book_hover(elem) {
	elem.style.cssText = 'opacity: 1;';
}

function book_unhover(elem) {
	elem.style.cssText = 'opacity: 0;';
}

function open_nav() {
	document.getElementById('nav-container').style.cssText = 'width: 370px;';
}
function close_nav() {
	document.getElementById('nav-container').style.cssText = 'width = 0px;';
}