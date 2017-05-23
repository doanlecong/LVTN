var myElements = 
		{
            arc: {
                borderWidth: 1,
            },
        };


var myTooltips =
		{
			callbacks: {
				label: function(tooltipItem, data) {
					var allData = data.datasets[tooltipItem.datasetIndex].data;
					var tooltipLabel = data.labels[tooltipItem.index];
					var tooltipData = allData[tooltipItem.index];
					var total = 0;
					for (var i in allData) {
						if(allData[i]) {
							total += allData[i];
						}
					}
					var tooltipPercentage = Math.round((tooltipData / total) * 100);
					return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
				}
			},
		};


var myPieceLabel =
		{
            // mode 'label', 'value' or 'percentage', default is 'percentage'
            mode: 'percentage',
            // precision for percentage, default is 0
            precision: 2,
            // draw text in arc, default is false
            arcText: true,
            // draw text on the border, default is false
            borderText: true,
            // font size, default is defaultFontSize
            fontSize: 12,
            // font color, default is '#fff'
            fontColor: '#fff',
            // font style, default is defaultFontStyle
            fontStyle: 'normal',
            // font family, default is defaultFontFamily
            fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            // format text, work when mode is 'value'
            format: function (value) { 
                return value;//'$' + value;
            }
        };

