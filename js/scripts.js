$(document).ready(function () {
	//

	let banner = $("img[alt='www.000webhost.com']").closest("div");
	banner.remove();

	let url = window.location.pathname;
	console.log(url);

	switch (url) {
		case "/":
			$("#youthSel li:nth-of-type(1)").css("background", "#4267b2");
			break;
		case "/liga/index/2006":
			$("#youthSel li:nth-of-type(1)").css("background", "#4267b2");
			break;
		case "/liga/index/2007":
			$("#youthSel li:nth-of-type(2)").css("background", "#4267b2");
			break;
		case "/liga/index/2008":
			$("#youthSel li:nth-of-type(3)").css("background", "#4267b2");
			break;
		case "/liga/index/2009":
			$("#youthSel li:nth-of-type(4)").css("background", "#4267b2");
			break;
		case "/liga/index/2010":
			$("#youthSel li:nth-of-type(5)").css("background", "#4267b2");
			break;
		case "/liga/rezultati":
			$("#youthSel li:nth-of-type(6)").css("background", "#4267b2");
			break;
		case "/liga/raspored":
			$("#youthSel li:nth-of-type(7)").css("background", "#4267b2");
			break;
	}

	let head = $(".headToggle");
	head.on("click", function (e) {
		$(this).siblings(".visitorTable").toggle();
	});


	let graphs = $.getJSON("getVisitorData");
	graphs.done(function (r) {
		let vis = r.visAll.vis;
		let visUni = r.visUni.vis;
		let visDesk = r.visDesk.vis;
		let visDeskUni = r.visDeskUni.vis;
		let visMob = r.visMob.vis;
		let visMobUni = r.visMobUni.vis;
		let visRob = r.visRob.vis;
		let visRobUni = r.visRobUni.vis;
		let visitorList = r.visitorList;
		let visAll = parseInt(vis) + parseInt(visRob);
		let visAllUni = parseInt(visUni) + parseInt(visRobUni);

		let visitorPercentage = $("#visitorPercentage");
		let visTimeline = $("#visitorTimeline");

		let chartAll = new Chart(visitorPercentage, {
			type: "bar",
			data: {
				labels: ["all", "desktop", "mobile", "crawler"],
				datasets: [
					{
						label: "all",
						backgroundColor: "#29487d",
						data: [visAll, visDesk, visMob, visRob]
					}, {
						label: "new",
						backgroundColor: "#4267b2",
						data: [visAllUni, visDeskUni, visMobUni, visRobUni]
					}
				]
			},
			options: {
				title: {
					display: true,
					text: "Posjete po kategorijama"
				}
			}
		});


		let label = [];
		let desktop = [];
		let mobile = [];
		let robot = [];

		function desk(v) {
			return v.mobile == "NULL" && v.robot == "NULL";
		}

		function mob(v) {
			return v.mobile != "NULL" && v.robot == "NULL";
		}

		function rob(v) {
			return v.robot != "NULL";
		}

		for (v in visitorList) {
			desktop[v] = visitorList[v].filter(desk);
			mobile[v] = visitorList[v].filter(mob);
			robot[v] = visitorList[v].filter(rob);
			label[v] = v;
		}

		let visitorArray = [];
		let desktopArray = [];
		let mobileArray = [];
		let robotArray = [];

		for (i in Object.values(visitorList)) {
			visitorArray[i] = Object.values(visitorList)[i].length;
		}

		for (i in Object.values(desktop)) {
			desktopArray[i] = Object.values(desktop)[i].length;
		}

		for (i in Object.values(mobile)) {
			mobileArray[i] = Object.values(mobile)[i].length;
		}

		for (i in Object.values(robot)) {
			robotArray[i] = Object.values(robot)[i].length;
		}

		let chartTimeline = new Chart(visTimeline, {
			type: "line",
			data: {
				labels: Object.keys(label).reverse(),
				datasets: [{
					fill: false,
					label: "all",
					borderColor: "orange",
					data: visitorArray.reverse()
				}, {
					fill: false,
					label: "desktop",
					borderColor: "blue",
					data: desktopArray.reverse()
				}, {
					fill: false,
					label: "mobile",
					borderColor: "yellow",
					data: mobileArray.reverse()
				}, {
					fill: false,
					label: "crawler",
					borderColor: "olive",
					data: robotArray.reverse()
				}
				]
			},
			options: {
				title: {
					display: true,
					text: "Posjete za " + new Date().getFullYear() + ". godinu"
				}
			}
		})

	});


	//
});
