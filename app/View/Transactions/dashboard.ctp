<div id="totalpos">
	<h3 style="padding:10px 0;">Total POS</h3>
	<div id="plot_totalpos" style="height:300px;"></div>
</div>

<div id="activepos" style="margin-top:30px;">
	<h3 style="padding:10px 0;">Active POS</h3>
	<div id="plot_activepos" style="height:300px;"></div>
</div>

<div id="inactivepos" style="margin-top:30px;">
	<h3 style="padding:10px 0;">InActive POS</h3>
	<div id="plot_inactivepos" style="height:300px;"></div>
</div>

<div id="transaction" style="margin-top:30px;">
	<h3 style="padding:10px 0;">Total Transaction</h3>
	<div id="plot_transaction" style="height:300px;"></div>
</div>

<div id="totalmoneyspent" style="margin-top:30px;">
	<h3 style="padding:10px 0;">Total Money Spent</h3>
	<div id="plot_totalmoneyspent" style="height:300px;"></div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	// simple chart
		var Approved = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var Declined = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
	
		// Total POS
		var plot_totalpos = jQuery.plot(jQuery("#plot_totalpos"),
			   [ { data: Approved, label: "Approved", color: "#6fad04"},
              { data: Declined, label: "Declined", color: "#06c"},
             ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#plot_totalpos").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#plot_totalpos").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot_totalpos.highlight(item.series, item.datapoint);
			}
		});
		
		
		
		// Active POS
		var plot_activepos = jQuery.plot(jQuery("#plot_activepos"),
			   [ { data: Approved, label: "Approved", color: "#6fad04"},
              { data: Declined, label: "Declined", color: "#06c"},
             ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#plot_activepos").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#plot_activepos").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot_activepos.highlight(item.series, item.datapoint);
			}
		});
		
		
		
		// InActive POS
		var plot_inactivepos = jQuery.plot(jQuery("#plot_inactivepos"),
			   [ { data: Approved, label: "Approved", color: "#6fad04"},
              { data: Declined, label: "Declined", color: "#06c"},
             ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#plot_inactivepos").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#plot_inactivepos").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot_inactivepos.highlight(item.series, item.datapoint);
			}
		});
		
		
		
		// Transaction
		var plot_transaction = jQuery.plot(jQuery("#plot_transaction"),
			   [ { data: Approved, label: "Approved", color: "#6fad04"},
              { data: Declined, label: "Declined", color: "#06c"},
             ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#plot_transaction").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#plot_transaction").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot_transaction.highlight(item.series, item.datapoint);
			}
		});
		
		
		
		// Total Money Spent
		var plot_totalmoney = jQuery.plot(jQuery("#plot_totalmoneyspent"),
			   [ { data: Approved, label: "Approved", color: "#6fad04"},
              { data: Declined, label: "Declined", color: "#06c"},
             ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#plot_totalmoneyspent").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#plot_totalmoneyspent").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot_totalmoney.highlight(item.series, item.datapoint);
			}
		});
		
		
});
</script>	