$(function(){
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
		}
	});

	$('.datepicker').datepicker();

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

	$('#local_clone').click(function(e){

		var $table = $('#local_travel').clone(),
		hash = Math.floor(Math.random() * 9000) + 1000;
		$table.removeAttr('id');
		
		$table.find('input, select').val('').removeClass('hasDatepicker');
		$table.find('.datepicker').removeAttr('id');
		$table.find('.roundtrip').each(function() {
			$(this).attr('name', 'roundtrip[]['+hash+']');
		});
		$table.find('tbody').prepend('<tr><td colspan="4"><small class="travel-delete">[X Delete]</small></td></tr>');

		$table.css({'border-top' : '40px solid #aaa'});

		$('#local_clone').parent('p').before($table);

		$('.datepicker').datepicker();

		e.preventDefault();
	});

	$('#ot_clone').click(function(e){

		var $table = $('#ot_travel').clone(),
		hash = Math.floor(Math.random() * 9000) + 1000;
		$table.removeAttr('id');
		
		$table.find('input, select').val('').removeClass('hasDatepicker');
		$table.find('.datepicker').removeAttr('id');
		$table.find('.roundtrip').each(function() {
			$(this).attr('name', 'roundtrip[]['+hash+']');
		});
		$table.find('tbody').prepend('<tr><td colspan="4"><small class="travel-delete">[X Delete]</small></td></tr>');

		$table.css({'border-top' : '40px solid #aaa'});

		$('#ot_clone').parent('p').before($table);

		$('.datepicker').datepicker();

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
		console.log($('.search-more-options').is(':visible'));
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

	$('.numeric').click(function() 
	{
		this.select();
	});

	$('.numeric').mouseup(function(e)
	{
		e.preventDefault();
	});

	$('.gweek1 .numeric').keyup(function() 
	{
		this.value = this.value.replace(/[^0-9\.]/g, '');

		var $parent = $(this).parents('tr'),
		total = 0;

		$parent.find('.numeric').each(function() 
		{

			if($(this).val().length > 0) 
			{
				total += parseInt($(this).val());
			}
		});

		$parent.find('.week-total').val(total);
		$parent.find('.grand-total').val(total);
	});

	$('#gweek2 .numeric').keyup(function() 
	{
		this.value = this.value.replace(/[^0-9\.]/g, '');

		var $parent = $(this).parents('tr'),
		total = 0;

		$parent.find('.numeric').each(function() 
		{

			if($(this).val().length > 0) 
			{
				total += parseInt($(this).val());
			}
		});

		$parent.find('.week-total').val(total);
		
		total += parseInt($('.'+$parent.attr('class').replace('gweek2-', 'gweek1-')+' .grand-total').val());
		$parent.find('.grand-total').val(total);
	});

	$('.week1 .numeric').keyup(function() 
	{
		this.value = this.value.replace(/[^0-9\.]/g, '');

		var $parent = $(this).parents('tr'),
		total = 0;

		$parent.find('.numeric').each(function() 
		{

			if($(this).val().length > 0) 
			{
				total += parseInt($(this).val());
			}
		});

		$parent.find('.week-total').val(total);
		$parent.find('.grand-total').val(total);

		var chargeable1 = 0;
		$('.week1 .grand-total').each(function() 
		{
			chargeable1 += parseInt(this.value);
		});

		$('.week1 .addon-total').each(function() 
		{
			if($(this).val().length > 0) 
			{
				chargeable1 += parseInt(this.value);
			}
		});

		$('.week1 .chargeable-hours').val(chargeable1);
	});

	$('.week2 .numeric').keyup(function() 
	{
		this.value = this.value.replace(/[^0-9\.]/g, '');

		var $parent = $(this).parents('tr'),
		total = 0;

		$parent.find('.numeric').each(function() 
		{

			if($(this).val().length > 0) 
			{
				total += parseInt($(this).val());
			}
		});

		$parent.find('.week-total').val(total);
		console.log('.'+$parent.attr('class').replace('week2', 'week1')+' .grand-total');
		total += parseInt($('.'+$parent.attr('class').replace('week2', 'week1')+' .grand-total').val());
		$parent.find('.grand-total').val(total);

		var chargeable1 = 0;
		$('.week2 .grand-total').each(function() 
		{
			chargeable1 += parseInt(this.value);
		});

		$('.week2 .addon-total').each(function() 
		{
			if($(this).val().length > 0) 
			{
				chargeable1 += parseInt(this.value);
			}
		});

		$('.week2 .chargeable-hours').val(chargeable1);
	});

	$('.week1 input').change(function() 
	{
		$('.week1 .total-hours').val(
			(parseInt($('.week1 .chargeable-hours').val()) + parseInt($('.week1 .unpaid-time-off').val()))
			)
	});

	$('.week2 input').change(function() 
	{
		$('.week2 .total-hours').val(
			(parseInt($('.week2 .chargeable-hours').val()) + parseInt($('.week2 .unpaid-time-off').val()))
			)
	});

	$('.add-product').click(function(e)
	{
		var $fields = $('.product-clone').clone();
		$fields.removeClass('product-clone').removeClass('hidden');
		$('.product-headers').show();
		$('.product-clone').before($fields);

		e.preventDefault();
	});

	$('.add-option').click(function(e)
	{
		var $fields = $('.custom-options-clone').clone();
		$fields.removeClass('custom-options-clone').removeClass('hidden');
		$('.custom-options-headers').show();
		$('.custom-options-clone').before($fields);

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
		var val = parseInt($(this).val()),
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
});