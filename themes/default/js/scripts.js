$(function(){

	$('#switcher').change(function() {
		$('#sitestyle').attr('href', $(this).val());
	})

	$('.tabs').tabs();

	$('table tbody tr:nth-child(odd)').addClass('ui-state-default');

	$(':input[readonly=readonly]').addClass('ui-state-default');

	$('.button-add, .button-remove').bind('click', function() {
		setTimeout(function() {
			$('table tbody tr:nth-child(odd)').addClass('ui-state-default');
		}, 100)
	});

	$('table tbody tr, .connectedSortable li').live('mouseover mouseout', function(e)
	{
		if(e.type == 'mouseover')
		{
			$(this).addClass('ui-state-hover');			
		}
		else
		{
			$(this).removeClass('ui-state-hover');
		}
	});


	jQuery('.format-phone').mask("(999) 999-9999");
	

	// Accordion
	$(".ui-block").accordion({ header: "h3", collapsible: true, autoHeight : false });
	
	$('.menu h3').hover(function() {
		$(this).addClass('ui-state-hover');
	}, function() {
		$(this).removeClass('ui-state-hover');
	});

	$('.subMenu').not('.ui-accordion-content-active').hide();

	$('.menu h3 a').click(function(e) {
		var subM = $(this).parent().next();

		if(subM.hasClass('subMenu')) {
			if(!$(this).parent().hasClass('ui-state-active')) {
				$('.subMenu').removeClass('ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active').slideUp(750);
			}

			$('.menu h3').removeClass('ui-state-active');
			$('.menu h3 .ui-icon').removeClass('ui-icon-triangle-1-s').addClass('ui-icon-triangle-1-e');
			$(this).parent().addClass('ui-state-active');
			$(this).prev().removeClass('ui-icon-triangle-1-e').addClass('ui-icon-triangle-1-s');
			subM.addClass('ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active').slideDown(750);
			e.preventDefault();
		}
	});

	$('.button, input[type=submit]').button();

	// Dialog			
	$('#errors').dialog({
		autoOpen: true,
		width: 600,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close"); 
			}
		},
		close: function() {
			$('#pwd').val('').focus();
		}
	});		

	var oflow;
	$('.notice').dialog({
		autoOpen: true,
		width: 600,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close");
				$('.dialog-mask').remove();
				$('body').css({overflow: oflow});
			}
		},
		open: function() {
			$(this).removeClass('ui-state-highlight ui-corner-all');

			oflow = $('body').css('overflow');
			$('body').css({overflow: 'hidden'}).append('<div class="dialog-mask"></div>');
		}
	});

	// setTimeout(function() {
	// 	$('.notice').fadeOut(1000, function() {
	// 		$(this).remove();
	// 	})
	// }, 3000);

	var year = new Date().getFullYear();
	$('.datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		yearRange: "1900:"+(year+10)
	});

	$('.datetimepicker').datetimepicker({
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		yearRange: "1900:"+(year+10),
		ampm: true
	});

	$('.timepicker').timepicker({
		ampm: true
	});

	$('.list-sort').each(function()
	{
		$(this).append('<span>'+$(this).attr('title')+'</span>').removeAttr('title');
	});

	$('.list-sort').hover(function()
	{
		$(this).children('span').show().animate({top: '-25px', opacity: 1}, 300);
	},
	function()
	{
		$(this).children('span').animate({top: '-15px', opacity: 0}, 300, function()
			{
				$(this).hide()
			});
	});

	var startDateTextBox = $('.datetimepicker-from');
	var endDateTextBox = $('.datetimepicker-to');

	startDateTextBox.datetimepicker({ 
		onClose: function(dateText, inst) {
			if (endDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					endDateTextBox.datetimepicker('setDate', testStartDate);
			}
			else {
				endDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
		},
		ampm: true,
		hour: 8,
		minute: 30
	});

	endDateTextBox.datetimepicker({ 
		onClose: function(dateText, inst) {
			if (startDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					startDateTextBox.datetimepicker('setDate', testEndDate);
			}
			else {
				startDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
		},
		ampm: true,
		hour: 9,
		minute: 00
	});

	$('*').live('click', function() 
	{
		$('.datepicker').datepicker({
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true,
			yearRange: "1900:"+year
		});
	});

	$('.ts_start_datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		yearRange: (year-10)+':'+(year+10),
		beforeShowDay: function(date) {
			return [date.getDay() == 6];
		},
		onClose: function(date)
		{
			var start = $(this).datepicker('getDate'),
			date = new Date(start),
			d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear(),
			end = new Date(y, m, (d+13));

			$('.ts_end_datepicker').datepicker('setDate', end);

			$('.week1_accounts').each(function()
			{
				d = date.getDate();

				$(this).find('th').each(function(e,i)
				{
					if(e > 0 && e <= 7)
					{
						$(i).find('span').html((m+1)+'/'+d);
						d++;
					}
				});
			});

			$('.week2_accounts').each(function()
			{
				d2 = d;

				$(this).find('th').each(function(e,i)
				{
					if(e > 0 && e <= 7)
					{
						$(i).find('span').html((m+1)+'/'+d2);
						d2++;
					}
				});
			});
		}
	});

	$('.ts_end_datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		yearRange: (year-10)+':'+(year+10),
		beforeShow: function()
		{
			return false;
		}
	});

	$('.buttonset').buttonset();
	$('.buttons input[type=checkbox]').button();

	$('.set_status').change(function() {
		if($(this).val() == 'Approved' || $(this).val() == 'Yes')
		{
			$('.manager_sig, .show-on-status').removeClass('hidden');
		}
		else
		{
			$('.manager_sig, .show-on-status').addClass('hidden');
		}
	});


	//budget control
	$('#disc_acc input').keyup(function() 
	{
		var $this = $(this),
		index = $this.parent('td').index(),
		parent = $this.closest('tr'),
		table = parent.closest('table tbody'),
		col_row = parent.closest('table').children('tfoot'),
		total = 0,
		col_total = 0;

		parent.find('input').each(function() {
			if(!$(this).hasClass('row_total'))
			{
				total += parseFloat($(this).val());
			}
		});
		parent.find('.row_total').val(total.toFixed(2));

		table.children('tr').each(function()
		{
			col_total += parseFloat($(this).find('td').eq(index).children('input').val());
		});
		
		col_row.find('tr:first').children('td').eq(index-1).find('input').val(col_total.toFixed(2));
		
		salery_total = parseFloat($('#salary_accounts tr:last').children('td').eq(index-1).find('input').val()) + col_total;

		col_row.find('tr:last').children('td').eq(index-2).find('input').val(salery_total.toFixed(2));		
	});

	$('#staff_planning input').keyup(function() 
	{
		var $this = $(this),
		index = $this.parent('td').index(),
		parent = $this.closest('tr'),
		table = parent.closest('table tbody'),
		col_row = parent.closest('table').children('tfoot'),
		sal = 0,
		sal_total = 0,
		col_total = 0;

		table.children('tr').each(function()
		{
			var row_val = parseFloat($(this).find('td').eq(index).children('input').val());
			col_total += row_val;
			sal_total += parseFloat($(this).find('td').eq(0).children('select').children('option:selected').attr('rel') * row_val);
		});

		col_row.children('tr').each(function() {
			$(this).children().eq((index)).children('input').val(col_total.toFixed(2));
			calculate_salary_accounts(index, sal_total);
		});

		//more bs here
		var hoursMonth = $('.hours-month:checked').parent('td').next('td').find(':input').val(),
		row = $('#admin_labor tbody tr').eq(parent.index()),
		wage = row.find(':input').eq(1).val(),
		fulltime = row.find(':input').eq(2).val(),
		cal = wage * fulltime * hoursMonth,
		al_total = 0;;		

		row.find(':input').eq(index+2).val((cal * $this.val()));

		$('#admin_labor tbody tr').each(function()
		{
			al_total += parseFloat($(this).find(':input').eq(index+2).val());
		})

		$('#admin_labor tfoot tr').find(':input').eq(index-1).val(al_total.toFixed(2));
	});

	$('#staff_planning select').change(function() 
	{
		if($(this).val() == 'Choose User')
		{
			$(this).closest('tr').find('input[type=text]').addClass('ui-state-default').attr('readonly', 'readonly');
		}
		else
		{
			$(this).closest('tr').find('input[type=text]').removeClass('ui-state-default').removeAttr('readonly');
		}

		var $user = $('#admin_labor tbody tr').eq($(this).parents('tr').index()).find('select'),
		val = $(this).val(),
		par = $user.closest('tr'),
		wage = $(this).find('option:selected').attr('rel'),
		fulltime = $(this).find('option:selected').attr('fulltime');

		// $.getJSON(base+'users/get_user/'+$(this).val(),
		// 	function(data)
		// 	{
		// 		console.log(data)
		// 		$user.val(val);
		// 		par.find(':input').eq(1).val(data.salary);
		// 		par.find(':input').eq(2).val(data.fulltime);
		// 	}
		// );
		// console.log(val);
		// console.log($user);

		$user.val(val);
		par.find(':input').eq(1).val(wage);
		par.find(':input').eq(2).val(fulltime);
	});

	//travel control
	$('.num-miles, .home-adjust, .parking').live('keyup', function() {
		var $table = $(this).closest('table'),
		val = (parseFloat($('.num-miles', $table).val()) - parseFloat($('.home-adjust', $table).val())),
		parking = parseFloat($('.parking', $table).val()),
		rate = parseFloat($('input[name=mileage_rate]').val());

		if(parseFloat(val) < 0)
		{
			val = 0;
		}

		var total = (val * rate) + parking;
		
		if(parseFloat(total) < 0)
		{
			total = 0;
		}

		$('.net-mileage', $table).val(val.toFixed(2));
		$('.total-amount', $table).val(total.toFixed(2));

	});

	$('.ot_air, .ot_hotel, .ot_meals, .ot_misc, .ot_transit').live('keyup', function()
	{
		var $table = $(this).closest('table'),
		air = parseFloat($('.ot_air', $table).val()),
		hotel = parseFloat($('.ot_hotel', $table).val()),
		meals = parseFloat($('.ot_meals', $table).val()),
		misc = parseFloat($('.ot_misc', $table).val()),
		transit = parseFloat($('.ot_transit', $table).val()),
		total = air + hotel + meals + misc + transit;

		$('.ot_total', $table).val(total.toFixed(2));
	});

	$('.ot_travel_table .account-number').on('change', function()
	{
		var $table = $(this).closest('table'),
		val = $(this).val(),
		air = $('.ot_air', $table),
		hotel = $('.ot_hotel', $table),
		meals = $('.ot_meals', $table),
		misc = $('.ot_misc', $table),
		transit = $('.ot_transit', $table);

		if(val != "Select Account")
		{
			air.next('div').text(val.replace('gl_account', trav.airfare));
			hotel.next('div').text(val.replace('gl_account', trav.hotel));
			meals.next('div').text(val.replace('gl_account', trav.meals));
			misc.next('div').text(val.replace('gl_account', trav.misc));
			transit.next('div').text(val.replace('gl_account', trav.transit));
		}
	})

	var local_clone = $('#local_travel').clone();

	$('#local_clone').click(function(e){

		var $table = $(local_clone).clone(),
		hash = Math.floor(Math.random() * 9000) + 1000;
		$table.removeAttr('id');
		
		$table.find('input').removeClass('hasDatepicker');
		$table.find('.datepicker').removeAttr('id');
		$table.find('.roundtrip').each(function() {
			$(this).attr('name', 'roundtrip[]['+hash+']');
		});
		$table.find('tbody').prepend('<tr><td colspan="4"><small class="travel-delete">[X Delete]</small></td></tr>');

		$table.css({'border-top' : '40px solid #aaa'});

		$('#local_clone').parent('p').before($table);

		$('.datepicker').datepicker();

		$(':input[rel=num_only]').numeric({ precision: 2 });

		$('.extend-options').jec();

		e.preventDefault();
	});

	var ot_clone = $('#ot_travel').clone();

	$('#ot_clone').click(function(e){

		var $table = $(ot_clone).clone(),
		hash = Math.floor(Math.random() * 9000) + 1000;
		$table.removeAttr('id');
		
		$table.find('input').removeClass('hasDatepicker');
		$table.find('.datepicker').removeAttr('id');
		$table.find('.roundtrip').each(function() {
			$(this).attr('name', 'roundtrip[]['+hash+']');
		});
		$table.find('tbody').prepend('<tr><td colspan="4"><small class="travel-delete">[X Delete]</small></td></tr>');

		$table.css({'border-top' : '40px solid #aaa'});

		$('#ot_clone').parent('p').before($table);

		$('.datepicker').datepicker();

		$(':input[rel=num_only]').numeric({ precision: 2 });

		e.preventDefault();
	});

	$('.travel-delete').live('click', function() {
		if(confirm('Are you sure you want to delete this travel record, this action can not be undone?!'))
		{
			$(this).parents('table').remove();			
		}
	})

	$('#bulkselect').change(function() {
		if($(this).is(':checked')) {

			$('input[name="b_action[]"]').attr('checked', 'checked');
		} else {
			$('input[name="b_action[]"]').removeAttr('checked');
		}
	});

	$('.delete').click(function(e) {

		if(!confirm('Are you sure you want to continue, this action can not be undone')) 
		{
			e.preventDefault();
			return false;
		}

	});

	$('.search-more *').click(function(e) {
		
		if($('.search-more-options').is(':visible'))
		{
			$('.search-more-options').hide();
		}
		else
		{
			$('.search-more-options').show();
		};

		e.preventDefault();
	});

	$('.pagination a').hover(function() 
	{
		$(this).removeClass('ui-state-default').addClass('ui-state-hover');
	}, function()
	{

		$(this).removeClass('ui-state-hover').addClass('ui-state-default');
	});

	$('.numeric, input[rel=num_only]').live('click focus', function() 
	{
		this.select();
	});
	
	$('.numeric, input[rel=num_only]').mouseup(function(e)
	{
		e.preventDefault();
	});

	$('.numeric, input[rel=num_only]').blur(function(e)
	{
		if(is_numeric(this.value))
		{
			this.value = parseFloat(this.value).toFixed(2);			
		}
	});

	$('.wholenumber').blur(function(e)
	{
		if(is_numeric(this.value))
		{
			this.value = parseFloat(this.value).toFixed(0);			
		}
	});


	//timesheet controls
	$('.add-week').click(function(e)
	{
		$row = $('.gweek1-table .gweek1').clone();
		$row.removeClass('gweek1');
		$row.find(':input[type=text]').val('0.00');
		$row.find('textarea').val('');
		$row.find('select').css({'outline' : 'none'});
		$row.find('select option').eq(0).attr('selected', 'selected');

		$('.gweek1-table').append($row);

		$row = $('.gweek2-table .gweek2').clone();
		$row.removeClass('gweek2');
		$row.find(':input[type=text]').val('0.00');
		$row.find('textarea').val('');
		$row.find('select').css({'outline' : 'none'});
		$row.find('select option').eq(0).attr('selected', 'selected');

		$('.gweek2-table').append($row);

		$(':input[rel=num_only]').numeric({ precision: 2 });

		e.preventDefault();
	});

	$('.add-account').click(function(e)
	{
		$row = $('table.week1 .clone').clone();
		$row.removeClass('clone');
		$row.find(':input[type=text]').val('0.00');
		$row.find('textarea').val('');
		$row.find('select').css({'outline' : 'none'});
		$row.find('select option').eq(0).attr('selected', 'selected');

		$('table.week1 .clone').after($row);

		$row = $('table.week2 .clone').clone();
		$row.removeClass('clone');
		$row.find(':input[type=text]').val('0.00');
		$row.find('textarea').val('');
		$row.find('select').css({'outline' : 'none'});
		$row.find('select option').eq(0).attr('selected', 'selected');

		$('table.week2 .clone').after($row);

		$(':input[rel=num_only]').numeric({ precision: 2 });

		e.preventDefault();
	});

	$('input[rel=num_only]').live('keyup', function() 
	{
		var $parent = $(this).closest('tr'),
		$table = $(this).closest('table'),
		total = 0,
		g_total = 0,
		eq = $(this).parent('td').index();

		$parent.find(':input[type=text]').each(function() 
		{
			var $t = $(this);
			if($t.val().length > 0 && !$t.hasClass('week-total') && ! $t.hasClass('grand-total')) 
			{
				total += parseFloat($(this).val());
			}
		});

		$parent.find('.week-total').val(total.toFixed(2));

		//get the grand total and display it in week 2
		var idx = $parent.index(),
		f_total = 0,
		gf_total = 0;
		
		var gw1_total = parseFloat($('.gweek1-table tr').eq(idx).find('.week-total').val());
		var gw2_total = parseFloat($('.gweek2-table tr').eq(idx).find('.week-total').val());
		
		if($parent.closest('table').hasClass('gweek1-table'))
		{
			gf_total = gw1_total + gw2_total;
		}
		else
		{
			gf_total = gw1_total + total;
		}

		$('.gweek2-table tr').eq(idx).find('.grand-total').val(gf_total.toFixed(2));

		var w1_total = parseFloat($('table.week1 tr').eq(idx).find('.week-total').val());
		var w2_total = parseFloat($('table.week2 tr').eq(idx).find('.week-total').val());

		if($parent.closest('table').hasClass('week1'))
		{
			f_total = w1_total + w2_total;
		}
		else
		{
			f_total = w1_total + total;
		}

		if(w1_total > 0 || w2_total > 0)
		{
			$('.week2 tr').eq(idx).find('.grand-total').val(f_total.toFixed(2));			
		}

		$(this).closest('table tbody').children().each(function() {
			if(is_numeric($(this).children('td').eq(eq).find('input').val()) 
				&& ($(this).children('td').eq(eq).find('input').attr('readonly') != 'readonly'))
			{
				g_total += parseFloat($(this).children('td').eq(eq).find('input').val());
			}
		});

		if(!isNaN(g_total))
		{
			var c_hours = (parseFloat(g_total)-parseFloat($('.unpaid-time', $table).eq((eq-1)).val()));
			$('.chargeable-hours', $table).eq((eq-1)).val(c_hours.toFixed(2));
		}

		$('.total-hours', $table).eq((eq-1)).val(
			(parseFloat($('.chargeable-hours', $table).eq((eq-1)).val()) + parseFloat($('.unpaid-time', $table).eq((eq-1)).val()))
			)

		var tot = 0;
		$('.chargeable-hours', $table).each(function() 
		{
			if(is_numeric(parseFloat($(this).val())))
			{
				tot += parseFloat($(this).val());
			}
		});
		
		$('.chargeable-hours', $table).closest('tr').find('.week-total').val(tot.toFixed(2));
		
		var w2_hours = (parseFloat($('.week1 .chargeable-hours').closest('tr').find('.week-total').val()) + parseFloat($('.week2 .chargeable-hours').closest('tr').find('.week-total').val()));
		$('.week2 .chargeable-hours').closest('tr').find('.grand-total').val(w2_hours.toFixed(2));

		var tot = 0;
		$('.total-hours', $table).each(function() 
		{
			if(is_numeric(parseFloat($(this).val())))
			{
				tot += parseFloat($(this).val());
			}
		});
		
		$('.total-hours', $table).closest('tr').find('.week-total').val(tot);
		$('.week2 .total-hours').closest('tr').find('.grand-total').val(
			parseFloat($('.week1 .total-hours').closest('tr').find('.week-total').val()) +
			parseFloat($('.week2 .total-hours').closest('tr').find('.week-total').val()) 
			);

		$('.summary-chargeable').val(parseFloat($('.chargeable-total').val()).toFixed(2));
		$('.summary-holiday').val(parseFloat($('.holiday-total').val()).toFixed(2));
		$('.summary-unpaid').val(parseFloat($('.unpaid-total').val()).toFixed(2));
		$('.summary-personal').val(parseFloat($('.personal-total').val()).toFixed(2));
		$('.summary-hours').val(parseFloat($('.hours-total').val()).toFixed(2));
		$('.summary-vacation').val(parseFloat($('.vacation-total').val()).toFixed(2));
		$('.summary-sicktime').val(parseFloat($('.sicktime-total').val()).toFixed(2));
		$('.summary-birthday').val(parseFloat($('.birthday-total').val()).toFixed(2));
		$('.summary-other').val(parseFloat($('.other-total').val()).toFixed(2));
	});

	$('.account-select').live('change', function() {
		var text = $(this).children('option:selected').text();
		text = text.split('|');

		if(text.length == 1)
		{
			text[1] = '';
		}
		
		$(this).closest('tr').find('textarea').val(text[1]);
	});

	$('.add-product').click(function(e)
	{
		var $fields = $('.product-clone').clone(); 
		$fields.removeClass('product-clone').removeClass('hidden');
		$('.product-headers').show();
		$('.product-clone').before($fields);

		$(':input[rel=num_only]').numeric({ precision: 2 });

		e.preventDefault();
	});

	$('.add-option').click(function(e)
	{
		var $fields = $('.custom-options-clone').clone();
		$fields.removeClass('custom-options-clone').removeClass('hidden');
		$('.custom-options-headers').show();
		$('.custom-options-clone').before($fields);


		$(':input[rel=num_only]').numeric({ precision: 2 });

		e.preventDefault();
	});

	$('.remove').live('click', function()
	{
		$(this).parents('tr').remove();
	});

	$('.custom-field').focus(function()
	{
		if($(this).val() == $(this).attr('rel'))
		{
			$(this).val('');
		}
	});

	$('.order-product').live('change', function() 
	{
		var product = $(this).val(),
		parent = $(this).parents('tr');

		$.getJSON(document.location.href+'/'+product, 
			function(data){
				parent.find('input[name="item_id[]"]').val(data.item_id);
				parent.find('input[name="unit_type[]"]').val(data.unit_type);
				parent.find('input[name="price[]"]').val(data.price);
			});
	});

	$('input[name="quantity[]"]').live('keyup', function() 
	{
		var val = parseFloat($(this).val()),
		parent = $(this).parents('tr'),
		price = parseFloat(parent.find('input[name="price[]"]').val()),
		grand = 0;

		if(!isNaN(val))
		parent.find('input[name="total[]"]').val((val*price));

		$('input[name="total[]"]').each(function() {
			var val = $(this).val();

			if(!isNaN(val) && val.length > 0)
			grand += parseFloat(val);
		});

		$('input[name="grand_total[]"]').val(grand);
	});

	$('.expenses').keyup(function() 
	{
		var expense = 0;
		$('.expenses').each(function(i, e)
		{
			var val = $(this).val();
			if(!isNaN(val) && val.length > 0)
			{
				expense += parseFloat(val);

				$('.cumulative_expenses').eq(i).val(expense);
				$('.cumulative_total').eq(i).val(expense);
			}
		});
	});


	$(':input[rel=num_only]').numeric({ precision: 2 });

	$('#travel_request_form').submit(function(e)
	{
		var error = 'You must fill in an account number for all trips.',
		pass = true;

		$('input, select, textarea').css({'outline': '1px solid transparent'});

		jQuery(this).find('.total-amount').each(function()
		{
			if(parseInt(jQuery(this).val()) > 0)
			{
				if(jQuery(this).closest('table').find('.account-number').val().length == 0)
				{
					jQuery(this).closest('table').find('.account-number').css({'outline' : '1px solid #ff0000'});
					pass = false;
				}
			}
		});

		jQuery(this).find('.ot_total').each(function()
		{
			if(parseInt(jQuery(this).val()) > 0)
			{
				if(jQuery(this).closest('table').find('.account-number').val().length == 0)
				{
					jQuery(this).closest('table').find('.account-number').css({'outline' : '1px solid #ff0000'});
					pass = false;
				}
			}
		});

		if(pass)
		{
			jQuery('input[name="ot_travel_date[]"], input[name="travel_date[]"]').each(function()
			{
				if(jQuery(this).closest('table').find('.account-number').val().length > 0 && $(this).val() == '')
				{
					$(this).css({'outline' : '1px solid #ff0000'});
					pass = false;
				}
			})
		}

		if(!pass)
		{
			alert(error);
			e.preventDefault();			
		}
	})

	$('form').submit(function(e)
	{
		var post = true,
			error = new Array()
			error[0] = "There was a problem submitting the form\n";

		$('.required').each(function() 
		{
			$(this).css({'outline' : 'none'});
			if($(this).val().length == 0)
			{
				post = false;
				$(this).css({'outline' : '1px solid #ff0000'});
				error[1] = "Please correct required fields marked with the red outline.\n";
			}
		});

		$('.account-select').each(function() 
		{
			var cont = $(this).closest('tr'),
			select = $(this);
			select.css({'outline' : 'none'});

			cont.find(':input[type=text]').each(function() 
			{
				if(($(this).val() != '0.00' || $(this).val() != 0) && (select.val() == '' || select.val() == 0))
				{
					post = false;
					select.css({'outline' : '1px solid #ff0000'});
					error[2] = "please correct the fields in red\n";
				}
			});


			// if(select.closest('table').hasClass('gweek1-table') || select.closest('table').hasClass('gweek2-table'))
			// {
				if($('.gweek1-table tr').eq(cont.index()).find('select').val() != $('.gweek2-table tr').eq(cont.index()).find('select').val())
				{
					post = false;
					select.css({'outline' : '1px solid #ff0000'});
					error[3] = "Grant Matching accounts must match for both weeks\n";
				}
			// }
			
			// if(select.closest('table').hasClass('week1') || select.closest('table').hasClass('week2'))
			// {
				if($('.week1 tr').eq(cont.index()).find('select').val() != $('.week2 tr').eq(cont.index()).find('select').val())
				{
					post = false;
					select.css({'outline' : '1px solid #ff0000'});
					error[4] = "Weekly accounts must match for both weeks\n";
				}
			// }
		});

		if(post)
		{
			//$(this).submit();
		}
		else
		{
			var temp = error.join("");
			alert(temp);
			e.preventDefault();
		}

	});

	$('.extend-options').jec();

	$('.email-link, .weblink').hover(function(e)
	{
		if(e.metaKey || e.ctrlKey)
		{
			$(this).css({'cursor' : 'pointer'});
		}
	},
	function() {
		$(this).css({'cursor' : 'default'});
	})

	$('.email-link, .weblink').click(function(e)
	{
		if(e.metaKey || e.ctrlKey)
		{
			var url = $(this).val();
			if($(this).hasClass('email-link'))
			{
				document.location.href="mailto:"+url;
			}
			else
			{
				if(url.indexOf('http') == -1)
				{
					url = 'http://'+url;
				}

				window.open(url, '_blank');
				window.focus();
			}
		}
	});
});

function is_numeric (mixed_var) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: David
  // +   improved by: taith
  // +   bugfixed by: Tim de Koning
  // +   bugfixed by: WebDevHobo (http://webdevhobo.blogspot.com/)
  // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
  // *     example 1: is_numeric(186.31);
  // *     returns 1: true
  // *     example 2: is_numeric('Kevin van Zonneveld');
  // *     returns 2: false
  // *     example 3: is_numeric('+186.31e2');
  // *     returns 3: true
  // *     example 4: is_numeric('');
  // *     returns 4: false
  // *     example 4: is_numeric([]);
  // *     returns 4: false
  return (typeof(mixed_var) === 'number' || typeof(mixed_var) === 'string') && mixed_var !== '' && !isNaN(mixed_var);
}

var second_flag = false;

var catcher = function() 
{
  var changed = false;
  $('form').each(function() 
  {
    if ($(this).data('initialForm') != $(this).serialize()) {
      changed = true;
      $(this).addClass('changed');
    } else {
      $(this).removeClass('changed');
    }
  });

  if (changed || second_flag) {
    return 'There are unsaved changes on this page!';
  }
};

$(function() 
{
	$('form').each(function() 
	{
		$(this).data('initialForm', $(this).serialize());
	}).submit(function() 
	{
		$(window).unbind('beforeunload', catcher);
	});

	$(window).bind('beforeunload', catcher);

  	$('a').live('click keyup', function()
	{
		second_flag = false;
	});
});

function calculate_salary_accounts(index, sal_total)
{
	var total = sal_total;
	$('#salary_accounts tbody').children('tr').each(function(e, i)
	{
		switch(e)
		{
			case 0:
				$(this).children().eq((index+1)).children('input').val(sal_total.toFixed(2));
			break;

			case 1:
				total += val = sal_total * assumptions.monthly_medical_insurance_premium;
				$(this).children().eq((index+1)).children('input').val(val.toFixed(2));
			break;

			case 2:
				total += val = sal_total * assumptions.monthly_dental_insurance_premium;
				$(this).children().eq((index+1)).children('input').val(val.toFixed(2));
			break;

			case 4:
				total += val = sal_total * assumptions.social_security_medical_premium;
				$(this).children().eq((index+1)).children('input').val(val.toFixed(2));
			break;

			case 5:
				total += val = sal_total * assumptions.unemployment;
				$(this).children().eq((index+1)).children('input').val(val.toFixed(2));
			break;

			case 6:
				total += val = sal_total * assumptions.workers_comp_insurance_premium;
				$(this).children().eq((index+1)).children('input').val(val.toFixed(2));
			break;

			case 8:
				$(this).children().eq((index+1)).children('input').val(total);
			break;


		}
	});
}