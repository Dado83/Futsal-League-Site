$(document).ready(function () {
	//

	let banner = $('img[alt="www.000webhost.com"]').closest('div');
	banner.remove();

	let url = window.location.pathname;
	console.log(url);

	switch (url) {
		case '/':
			$('#youthSel li:nth-of-type(1)').css('background', '#4267b2');
			break;
		case '/liga/index/2006':
			$('#youthSel li:nth-of-type(1)').css('background', '#4267b2');
			break;
		case '/liga/index/2007':
			$('#youthSel li:nth-of-type(2)').css('background', '#4267b2');
			break;
		case '/liga/index/2008':
			$('#youthSel li:nth-of-type(3)').css('background', '#4267b2');
			break;
		case '/liga/index/2009':
			$('#youthSel li:nth-of-type(4)').css('background', '#4267b2');
			break;
		case '/liga/index/2010':
			$('#youthSel li:nth-of-type(5)').css('background', '#4267b2');
			break;
		case '/liga/rezultati':
			$('#youthSel li:nth-of-type(6)').css('background', '#4267b2');
			break;
		case '/liga/raspored':
			$('#youthSel li:nth-of-type(7)').css('background', '#4267b2');
			break;
	}

	let head = $('.headToggle');
	head.on('click', function (e) {
		$(this).siblings('.visitorTable').toggle(); //skini listener sa citavog diva!!
	});

	//
});
