$(document).ready(function () {
	//

	let banner = $("img[alt='www.000webhost.com']").closest("div");
	banner.remove();

	let url = window.location.pathname;
	let backColor = "#2284b9";
	console.log(url);

	switch (url) {
		case "/":
			$("#youthSel li:nth-of-type(1)").css("background", backColor);
			break;
		case "/liga/index/2006":
			$("#youthSel li:nth-of-type(1)").css("background", backColor);
			break;
		case "/liga/index/2007":
			$("#youthSel li:nth-of-type(2)").css("background", backColor);
			break;
		case "/liga/index/2008":
			$("#youthSel li:nth-of-type(3)").css("background", backColor);
			break;
		case "/liga/index/2009":
			$("#youthSel li:nth-of-type(4)").css("background", backColor);
			break;
		case "/liga/index/2010":
			$("#youthSel li:nth-of-type(5)").css("background", backColor);
			break;
		case "/liga/rezultati":
			$("#youthSel li:nth-of-type(6)").css("background", backColor);
			break;
		case "/liga/raspored":
			$("#youthSel li:nth-of-type(7)").css("background", backColor);
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
		let visPie = $("#visitorPie");

		let color1 = "#4267b2";
		let color2 = "#29487d";
		let deskColor1 = "#FACA04";
		let mobColor1 = "#3DDC84";
		let botColor1 = "lightgrey";

		let chartAll = new Chart(visitorPercentage, {
			type: "bar",
			data: {
				labels: ["all", "desktop", "mobile", "bot"],
				datasets: [
					{
						label: "all",
						backgroundColor: color1,
						data: [visAll, visDesk, visMob, visRob]
					}, {
						label: "new",
						backgroundColor: color2,
						data: [visAllUni, visDeskUni, visMobUni, visRobUni]
					}
				]
			},
			options: {
				title: {
					display: true,
					text: "Kompletne posjete po kategorijama"
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
					borderColor: color1,
					data: visitorArray.reverse()
				}, {
					fill: false,
					label: "desktop",
					borderColor: deskColor1,
					data: desktopArray.reverse()
				}, {
					fill: false,
					label: "mobile",
					borderColor: mobColor1,
					data: mobileArray.reverse()
				}, {
					fill: false,
					label: "bot",
					borderColor: botColor1,
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


		let monthColors = ["#047ABB", "#0398D2", "#059A4F", "#76AE38", "#ACC91E", "#E9AE11",
			"#E9AE11", "#E53C15", "#E52B4B", "#AE3985", "#733BA1", "#52509A"];

		let chartDoughnut = new Chart(visPie, {
			type: "doughnut",
			data: {
				labels: Object.keys(label).reverse(),
				datasets: [{
					data: visitorArray,
					backgroundColor: monthColors
				}]
			},
			options: {
				title: {
					display: true,
					text: "Posjete za " + new Date().getFullYear() + ". god."
				},
				legend: {
					display: false
				}
			}
		})

	});


	//
});
