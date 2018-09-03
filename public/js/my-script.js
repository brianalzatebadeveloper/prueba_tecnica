$(function(){

// graphic of line

	var datos = {
			labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			datasets: [{
				label: 'Ingresos %',
				backgroundColor: 'rgba(26, 187, 156,0.5)',
				data: [4, 20, 30, 40, 50, 40, 25, 33, 45, 50, 20, 60]
			},
			{
				label: 'Egresos %',
				backgroundColor: 'rgba(115, 135, 156, 0.5)',
				data: [10, 5, 7, 4, 6, 10, 40, 20, 14, 16, 2, 6]
			},
			]
	};

	var canvas_personal = document.getElementById('graphic_charts').getContext('2d');

	window.graphic_line = new Chart(canvas_personal, {
		type: 'line',
		data: datos,
		options: {
			elements: {
				rectangle: {
					borderWidth: 1,
					borderColor: 'rgba(0,255,0)',
					boderSkipped: 'bottom'
				}
			},
			reponsive: true
		}
	});

	setInterval(function()
	{

		var newData = [
		[getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
		[getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
		[getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom()]

	];

			$.each(datos.datasets, function(i, datasets){
				datasets.data = newData[i];
			});


		window.graphic_line.update();

	}, 5000);



	function getRandom()
	{
		return Math.round(Math.random() * 100);
	}




});