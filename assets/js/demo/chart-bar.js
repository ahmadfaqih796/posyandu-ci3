// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
	'Nunito, -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function number_format(number, decimals, dec_point, thousands_sep) {
	number = (number + "").replace(",", "").replace(" ", "");
	var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
		dec = typeof dec_point === "undefined" ? "." : dec_point,
		s = "",
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return "" + Math.round(n * k) / k;
		};
	s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || "").length < prec) {
		s[1] = s[1] || "";
		s[1] += new Array(prec - s[1].length + 1).join("0");
	}
	return s.join(dec);
}

function createBarChart(elementId, datasets, options = {}) {
	var ctx = document.getElementById(elementId);
	var defaultOptions = {
		type: "bar",
		data: {
			labels: [
				"Januari",
				"Februari",
				"Maret",
				"April",
				"Mei",
				"Juni",
				"Juli",
				"Agustus",
				"September",
				"Oktober",
				"November",
				"Desember",
			],
			datasets: datasets,
		},
		options: {
			maintainAspectRatio: false,
			layout: {
				padding: {
					left: 10,
					right: 25,
					top: 25,
					bottom: 0,
				},
			},
			scales: {
				xAxes: [
					{
						time: {
							unit: "month",
						},
						gridLines: {
							display: false,
							drawBorder: false,
						},
						ticks: {
							maxTicksLimit: 12,
						},
					},
				],
				yAxes: [
					{
						ticks: {
							min: 0,
							maxTicksLimit: 5,
							padding: 10,
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2],
						},
					},
				],
			},
			legend: {
				display: false,
			},
			tooltips: {
				titleMarginBottom: 10,
				titleFontColor: "#6e707e",
				titleFontSize: 14,
				backgroundColor: "rgb(255,255,255)",
				bodyFontColor: "#858796",
				borderColor: "#dddfeb",
				borderWidth: 1,
				xPadding: 15,
				yPadding: 15,
				displayColors: false,
				caretPadding: 10,
				callbacks: {
					label: function (tooltipItem, chart) {
						var datasetLabel =
							chart.datasets[tooltipItem.datasetIndex].label || "";
						return datasetLabel + ": " + tooltipItem.yLabel;
					},
				},
			},
		},
	};
	// Merge default options with user-provided options
	var chartOptions = Object.assign({}, defaultOptions, options);
	return new Chart(ctx, chartOptions);
}

var dataImunisasi = [
	{
		label: "Total Anak",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [
			parseInt(document.getElementById("januari").innerHTML),
			parseInt(document.getElementById("februari").innerHTML),
			parseInt(document.getElementById("maret").innerHTML),
			parseInt(document.getElementById("april").innerHTML),
			parseInt(document.getElementById("mei").innerHTML),
			parseInt(document.getElementById("juni").innerHTML),
			parseInt(document.getElementById("juli").innerHTML),
			parseInt(document.getElementById("agustus").innerHTML),
			parseInt(document.getElementById("september").innerHTML),
			parseInt(document.getElementById("oktober").innerHTML),
			parseInt(document.getElementById("november").innerHTML),
			parseInt(document.getElementById("desember").innerHTML),
		],
		maxBarThickness: 1000,
	},
];

var dataKegiatanPosyandu = [
	{
		label: "Total Anak",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [
			parseInt(document.getElementById("KP_januari").innerHTML),
			parseInt(document.getElementById("KP_februari").innerHTML),
			parseInt(document.getElementById("KP_maret").innerHTML),
			parseInt(document.getElementById("KP_april").innerHTML),
			parseInt(document.getElementById("KP_mei").innerHTML),
			parseInt(document.getElementById("KP_juni").innerHTML),
			parseInt(document.getElementById("KP_juli").innerHTML),
			parseInt(document.getElementById("KP_agustus").innerHTML),
			parseInt(document.getElementById("KP_september").innerHTML),
			parseInt(document.getElementById("KP_oktober").innerHTML),
			parseInt(document.getElementById("KP_november").innerHTML),
			parseInt(document.getElementById("KP_desember").innerHTML),
		],
		maxBarThickness: 1000,
	},
];

// Create the chart
createBarChart("myBarChart", dataImunisasi);
createBarChart("kegiatanPosyandu", dataKegiatanPosyandu);
