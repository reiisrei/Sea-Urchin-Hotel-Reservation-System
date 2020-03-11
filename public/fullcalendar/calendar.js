$( document ).ready(function() {
	$('#loading').fadeOut("slow");  
	
	$('#check_rates, .search_now_inpu > button').click(function (){
		$('#loading').fadeIn("slow");  
	});
	
	$(document).on('click', '.add-book', function(e){
	//$('.add-book').click(function(e){
		e.preventDefault();
		var rate_id = $(this).attr('rate_id');
		var room_id = $(this).attr('room_id');
		var discount_type = $(this).attr('discount_type');
		
		var _rrp = $('#staggered').data('rate-'+room_id+'-'+rate_id);
		var opt = $('body').data('option');
		
		// console.log(rrp);
		
		var no_room = parseInt($(this).parent().parent().find('#no-room-'+room_id+'-'+rate_id).val());
		var no_person = parseInt($(this).parent().parent().find('#no-person-'+room_id+'-'+rate_id).val());
		var no_child = $(this).parent().parent().find('#no-child-'+room_id+'-'+rate_id).val();
		
		var allocation = parseInt($('#no-room-'+room_id+'-'+rate_id).attr('allocation'));
		
		var added_room = no_room;
		
		if(discount_type=='occupancy') rrp = _rrp[no_person];
		else rrp = _rrp[1];
		
		if(no_room>0){
			
		var numberofextraperson = 0;	
			
		if($('#bookings-'+room_id+'-'+rate_id).length > 0 ){
			
			var number_person = $('#bookings-'+room_id+'-'+rate_id).attr('number_person');
			var number_child = $('#bookings-'+room_id+'-'+rate_id).attr('number_child');
			
			var additiona_room = $('#bookings-'+room_id+'-'+rate_id).attr('number_rooms');
			
			if(number_person==no_person && number_child==no_child){
				$('#bookings-'+room_id+'-'+rate_id).remove();
				no_room += parseInt(additiona_room);
			}
		}
		
		var booking_name = rrp.type == 'rate_plan'?rrp.data.room_name + ' - ' + rrp.data.rate_plan_name:rrp.data.room_name + ' - ' + rrp.data.promo_name + ' - ' + rrp.data.rate_plan_name;
		
		var room_rates = parseInt(rrp.data.include_tax)?rrp.data.total_rates:rrp.data.total_rates_tax_exclude;
		var extra_person_rate = parseInt(rrp.data.include_tax)?rrp.data.total_extra_person_rate:rrp.data.total_extra_person_rate_tax_exclude;
		
		numberofextraperson = no_person- (parseInt(rrp.data.number_of_person) - parseInt(rrp.data.extra_person_pax));
		
		var withextrapertson = false;
		
		//payment_total
		var total_extra_rate = parseFloat(rrp.data.total_extra_person_rate) * numberofextraperson
		if(no_person > (rrp.data.number_of_person - rrp.data.extra_person_pax) && discount_type!='occupancy') payment_total = (total_extra_rate + parseFloat(rrp.data.total_rates)) * no_room;
		else payment_total = parseFloat(rrp.data.total_rates) * no_room;
		
		if(no_person > (rrp.data.number_of_person - rrp.data.extra_person_pax) && discount_type!='occupancy') withextrapertson = true;
		
		var total_extra_rate = parseFloat(extra_person_rate) * numberofextraperson
		if(no_person > (rrp.data.number_of_person - rrp.data.extra_person_pax) && discount_type!='occupancy') total = (total_extra_rate + parseFloat(room_rates)) * no_room;
		else total = parseFloat(room_rates) * no_room;
		
		$('.promo_list').each(function(){
			var drop_id = $(this).attr('toggle-id');
			if(drop_id == toggle_id){
				$(this).html(elem_clone);
			}
		});

		rrp.no_room = no_room;
		rrp.no_person = no_person;
		rrp.no_child = no_child;
		rrp.total_extra_rate = total_extra_rate;
		rrp.withextrapertson = withextrapertson;
		rrp.numberofextraperson = numberofextraperson;
		var manda_total_rate = 0;
		var manda_total_rate_payment = 0;
		if(rrp.mandatory_charge){
			var manda_rates = parseInt(rrp.data.include_tax)?rrp.mandatory_charge.rates.include:rrp.mandatory_charge.rates.exclude;
			$.each(manda_rates,function (index, obj){
				manda_total_rate += parseFloat(obj) * no_room;
			});
			$.each(rrp.mandatory_charge.rates.include,function (index, obj){
				manda_total_rate_payment += parseFloat(obj) * no_room;
			});
			
			per_person = parseInt(rrp.mandatory_charge.per_person)?no_person:1;
			
			total += manda_total_rate * per_person;
			payment_total += manda_total_rate_payment * per_person;
		}
		rrp.manda_total_rate = manda_total_rate;
		rrp.tatal_room = total;
		rrp.booking_name = booking_name;
		if(parseInt(rrp.data.first_day)){
			var rategroup = rrp.data.rates_group; 
			var perrates =  rategroup.split(",");
			var ratecompute = payment_total * (rrp.percentage_payment/100);

			if(ratecompute>parseFloat(perrates[0])){ 
				rrp.payment = ratecompute; 
				rrp.data.first_day = 0;
			}else rrp.payment = parseFloat(perrates[0]) + ratecompute; 
			 
		}else{
			rrp.payment = payment_total * (rrp.percentage_payment/100)
		}
		rrp.rel = 'bookings-'+room_id+'-'+rate_id;
		var html = '<div class="room-cart data_sec seperator_h" id="bookings-'+room_id+'-'+rate_id+'" number_rooms="'+no_room+'" number_person="'+no_person+'" number_child="'+no_child+'" booking_name="'+booking_name+'">';
		html += '<a class="close_btn" data-id="1" href="javascript:delete_roomrate(\''+room_id+'\',\''+rate_id+'\')"><i class="fa fa-times-circle remove-book" aria-hidden="true"></i></a>'
		html += '<h3>'+booking_name+' <br></h3>';
		html += '<div></div>';
		html += '<table class="table-details">';
		html += '<tbody>';
		html += '<tr>';
		html += '<td>Number of night(s): '+rrp.data.no_nights+'</td>'; 
		html += '<td style="font-size:13px;color:darkorange;font-weight:bold;text-align: right;">'+opt.currency+' '+number_format(total,2)+'<br><span style="color:#000;font-size: 9px;font-style: italic">'+rrp.tax_msg+'</span></td>';
		html += '</tr>';
		html += '<tr>';
		html += '<td>Number of person(s): '+no_person;
		if(no_child>0) html += '<br>Number of child(ren): '+no_child;
		html += '<br>Number of room(s): '+no_room;
		html += '</td>';
		html += '<td style="text-align:right"><span style="color:#000;font-size: 9px;font-style: italic">'+rrp.payment_msg+'</span></td>';
		html += '</tr>';
		html += '<tr>';
		html += '<td>';
		html += '<div class="weekly_rate_button">'; 
		html += '<span class="new badge chck_rates">';
		html += '<a class="waves-effect modal-trigger chkrates" rel="bookings-'+room_id+'-'+rate_id+'" href="#chkrates">';
		html += 'Check rates';
		html += '</a>';
		html += '</span>';
		html += '</div>';
		html += '</td>';
		html += '<td></td>';
		html += '</tr><tr>';
		html += '</tr>';
		html += '</tbody>';
		html += '</table>';
		html += '</div>';
		
		$('.room_details').append(html);
		
		$('#bookings-'+room_id+'-'+rate_id).data('cart',rrp);
		// $('#bookings-'+room_id+'-'+rate_id).data('cart-original',rrp);
				
		$('.room_details').show();
		
		$('.rooms-'+room_id).each(function (){ 
			var temp_allocation = parseInt($(this).attr('temp_allocation'));
			var less_allocation = temp_allocation - added_room; 

			room_option = "";
			for(x=0;x<=less_allocation;x++){
				room_option += "<option rel='"+x+"' value='"+x+"'>"+x+"</option>";
			}
			
			$(this).html(room_option);
			$(this).attr('temp_allocation',less_allocation);
		});
		
		$('.book_now').removeClass('next_button_inactive');
		$('.book_now').addClass('next_button_active');
		
		$('.book_now').removeAttr('disabled');
		
		var current_num = parseInt($('.rev_count span').html()) + 1;
		$('.rev_count span').html(current_num);
		
		lean_modal($('.chkrates'));	
		Materialize.toast(booking_name + ' succefully added!', 4000);
		
		var policy = "";
		var policyperiod = rrp.type == 'rate_plan'?opt.main_policy_period:opt.promo_policy_period[rrp.data.promo_id];
	
		policy += '<div id="policy-'+room_id+'-'+rate_id+'">';
		policy += '<div class="room_label">';
		policy += '<h5>'+booking_name+'</h5>';
		policy += '</div>';
	
		policy += '<table class="striped">';
		policy += '<tbody>';
		$.each(policyperiod,function (index, obj){
			policy += '<tr class="section">';
			policy += '<td>'+obj.policy+'</td>';
			policy += '<td>';
			policy += obj.desc;
			policy += '</td>';
			policy += '</tr>';
		});
	
		
		$('.period_policy').append(policy);
		
		ga('set', 'page','step1/roomselected');
		ga('send', 'pageview');
		
		if(screen.width < 1000){
			var opt = $('body').data('option');
			if(opt.with_addon=='yes'){
				$('#next_process').modal();
				$('#next_process').modal('open'); 
			}else{
				closeaddon();
			}
			
			if($('.popup_listroom').hasClass('active_pu')){
				$('.popup_listroom').removeClass('active_pu');
				$('body').removeClass('popup_mode');
			}
		}

		
		
		}else{
			mbox.alert('Please select number of rooms');
			$('#no-room-'+room_id+'-'+rate_id).focus();
		}
		
		var curr = $('#changecurr').val();
		
		if(curr!=opt.currency){
			currencyConvert(opt.currency,curr);
		}
	});
	$(document).on('click','.checkrequest',function (){
		var id = $(this).attr('addonid');

		var addondata = $('#addon_'+id).data('addons');
		
		$('.rate_request').html('<p>'+addondata.remark+'</p>')
		
	});
	$(document).on('click','.chkrates',function (){
		var rel = $(this).attr('rel');
		var cart = $('#'+rel).data('cart');
		
		var what_rate = cart.data.what_rate;
		var include_tax = parseInt(cart.data.include_tax);
		var rates_group = cart.data.rates_group;
		var rates_group_tax_exclude = cart.data.rates_group_tax_exclude;
		var date_group = cart.data.date_group;
	
		var room_name = cart.data.room_name;
		var rate_plan_name = cart.data.rate_plan_name;
		
		var extra_person_rates_group = cart.data.extra_person_rates_group;
		var extra_person_rates_group_tax_exclude = cart.data.extra_person_rates_group_tax_exclude;
		
		var opt = $('body').data('option');
		
		$('#checkrate_title').text(room_name + ' - Rates');
		
		
		var rates = include_tax?rates_group:rates_group_tax_exclude;
		var extra = include_tax?extra_person_rates_group:extra_person_rates_group_tax_exclude;
		if(cart.mandatory_charge){
			var mandatory = include_tax?cart.mandatory_charge.rates.include:cart.mandatory_charge.rates.exclude;
		}
		var dates = date_group.split(',');
		var rates = rates.split(',');
		var extra = extra.split(',');
		if(what_rate!=null){
			var rate_name = what_rate.split(',');
		}
		
		var table = '';
		table += '<thead>';
        table += '<tr>';
        table += '<th>Date</th>';
		table += '<th>Rate Plan/Promo</th>';
        table += '<th>Rate ('+cart.no_room+')</th>';
		if(cart.withextrapertson){
			table += '<th>Extra Person ('+cart.numberofextraperson+')</th>';
		}
		if(cart.mandatory_charge){
			table += '<th>Mandatory Charge</th>';
		}
        table += '</tr>';
        table += '</thead>';
		table += '<tbody>';
		
		var r_total = 0;
		var e_total = 0;
		var m_total = 0;
		
		$.each(dates,function (index, obj){
			
			table += '<tr>';
			table += '<td>'+obj+'</td>';
			rate_label = what_rate==null?rate_plan_name:rate_name[index];
			table += '<td>'+rate_label+'</td>';
			table += '<td>'+opt.currency+' '+number_format(parseFloat(rates[index]) * parseFloat(cart.no_room),2)+'</td>';
			if(cart.withextrapertson){
				table += '<td>'+opt.currency+' '+number_format(parseFloat(extra[index])* parseFloat(cart.numberofextraperson) * parseFloat(cart.no_room),2)+'</td>';
				e_total += parseFloat(extra[index]) * parseFloat(cart.numberofextraperson) * parseFloat(cart.no_room);
			}
			if(cart.mandatory_charge){
				mandatory[obj] = mandatory[obj] != null?mandatory[obj]:0;
				per_person = parseInt(cart.mandatory_charge.per_person)?cart.no_person:1;
				
				table += '<td>'+opt.currency+' '+number_format(parseFloat(mandatory[obj]) * parseFloat(cart.no_room) * parseInt(per_person),2)+'</td>';
				m_total += parseFloat(mandatory[obj]) * parseFloat(cart.no_room) * parseInt(per_person);
			}
			table += '</tr>';
			r_total += parseFloat(rates[index]) * parseFloat(cart.no_room);
		});
			t_chrage = r_total+e_total+m_total;
			table += '<tr>';
			table += '<td>Total Charge: '+opt.currency+' '+number_format(t_chrage,2)+'</td>';
			table += '<td>Total</td>';
			table += '<td>'+opt.currency+' '+number_format(r_total,2)+'</td>';
			if(cart.withextrapertson){
				table += '<td>'+opt.currency+' '+number_format(e_total,2)+'</td>';
			}
			if(cart.mandatory_charge){
				table += '<td>'+opt.currency+' '+number_format(m_total,2)+'</td>';
			}

			table += '</tr>';
		table += '</tbody>';
		$('#checkrate_table').html(table);
		
		
		var curr = $('#changecurr').val();
		
		if(curr!=opt.currency){
			currencyConvert(opt.currency,curr);
		}
		
	});	
	$(document).on('click','.book_now',function (){
		var opt = $('body').data('option');
	
		if(opt.with_addon=='yes'){
			$('#next_process').modal();
			$('#next_process').modal('open'); 
		}else{
			closeaddon();
		}
		
	});
	
	$(document).on('click','.description',function (){
		var opt = $('body').data('option');
		var room_id = $(this).attr('room_id');
		var rate_id = $(this).attr('rate_id');
		var promo_id = $(this).attr('promo_id');
		var type = $(this).attr('typ');
		
		description(type,room_id,rate_id,promo_id,opt.environment);
	});
	
	$('#back-to-rooms, #smartwizard > ul > li:nth-child(1)').click(function (){
		$('#step1').show();
		$('#step2').hide();	
		$('#smartwizard > ul > li:nth-child(2)').removeClass('active'); 
		$('html, body').animate({scrollTop:0},500);
	});
	$('#book_now_payment').click(function (){
		$('#guest_details').submit();
	});
	$('#guest_details').validator().on('submit', function (e) {
	
	var gacookie = getCookie('_ga');

	var opt = $('body').data('option');
	
	opt.gacookie = gacookie;
	var base_url = opt.base_url;

	var guest_details = serializeArrayToObject($('#guest_details').serializeArray());
	var reservation = $('#reservation').data('reservation');
	
	var addons = $('#addon_details').data('addon_details');
	
	if (typeof addons !== 'undefined' && addons!=null) {
	$.each(addons.addon_cart,function (index, obj){ 
		delete addons.addon_cart[index].addondata.original; 
	});
	}  
	$.extend(guest_details,reservation);
	$.extend(guest_details,addons);
	$.extend(guest_details,opt); 
 
	if (e.isDefaultPrevented()) {
		
	}else{
		mbox.confirm("YOU ARE ABOUT TO PAY YOUR RESERVATION <br><br>Hotel website rates are provided and collected in Philippine Peso. Rates can be converted into different currencies for information purposes only. The rate value is applicable only on the day that the reservation is taken. The currency and amount you see displayed on the final booking page and in you voucher is the amount that will be charged to your credit card. Your issuing bank rates apply in converting to your credit card currency billing. Your bank may impose additional fees on the transaction, over which the hotel has no control.", function(yes) {
			if(yes){
			$('#loading').fadeIn("slow");
			$('#msg1').text('Processing...');
			$('#msg2').text('');
			var xhr = $.post(base_url+'booking/booknow',guest_details, function(json) {

				if(opt.environment=='live'){
				$.post(base_url+'booking/checkallocation/'+json.confirmNoSet,guest_details, function(cont) {
					
					if(cont.continue){
						$('#msg1').text('Redirecting...');
						
						ga('set', 'page', 'step3/paymentpage');
						ga('send', 'pageview');
						
						proceedPayment(opt,json);
					}else{
						
						mbox.alert("Room is not available");
						$('#loading').fadeOut("slow");
					}
				}, 'json').error(function() { mbox.alert("There was a problem in your request. Please contact our administrator. <br><br> Phone No.: " + opt.phone + " <br> Email: " + opt.email_address + ". <br><br> Thank You!"); $('#loading').fadeOut("slow"); }); 
				}else{
					$('#msg1').text('Redirecting...');
						
					ga('set', 'page', 'step3/paymentpage');
					ga('send', 'pageview');
					
					proceedPayment(opt,json);
				}
			}, 'json').error(function() { mbox.alert("There was a problem in your request. Please contact our administrator. <br><br> Phone No.: " + opt.phone + " <br> Email: " + opt.email_address + ". <br><br> Thank You!"); $('#loading').fadeOut("slow"); }); 
			}
		});
		
	}
	e.preventDefault();
	});
	
	$('#addon_bnt').click(function (){
		$('#next_process').modal('open'); 
	});
	
	var opt = $('body').data('option');
	if(opt.page == 'step1'){
		if(Object.keys(opt.season).length > 0){
			$.each(opt.season,function (index, obj){
				
				var html = obj.roomname_arr.map(function (element) {
				  return '<li class="collection-item">' + element + '</li>';  
				}).join('');
				
				mbox.alert(obj.note+'<br>List of Room Affected: <ul class="collection">'+html+'</ul>');
			});
		} 
	}
	$('#mod_cal_submit').click(function (){
		$('#mod_can').submit();
	});
	$('#mod_can').validator().on('submit', function (e) {
		
		var opt = $('body').data('option');
		var base_url = opt.base_url;
		
		var mod = serializeArrayToObject($(this).serializeArray())
		$.extend(mod,opt);
		
		var loader = loader_html(opt);
		$('#mod-option').html(loader);
		if (e.isDefaultPrevented()) { 
			$('#mod-option').html('');
		}else{
			var xhr = $.post(base_url+'booking/calendar/checkbooking',mod, function(json) {
				var cancellation = parseInt(json.cancellation);
				var modification = parseInt(json.modification);
				
				if(json.results){
				$('#mod-option').data('modcancel',json);
				
				var modcan_html = '<div class="room_label">';
				modcan_html += '<h6>Modify/Cancel Booking Option</h6>';
				modcan_html += '</div>';
				modcan_html += '<ul class="collection">';
				// modcan_html += '<li class="collection-item">View Voucher</li>';
				if(modification) modcan_html += '<li class="collection-item" onClick="mod_action(\'modify_room\');">Modify Room</li>';
				if(modification) modcan_html += '<li class="collection-item" onClick="mod_action(\'modify_date\');">Modify Date</li>';
				// modcan_html += '<li class="collection-item">Modify Add-on Services</li>';
				// modcan_html += '<li class="collection-item">Modify Special Request</li>';
				if(cancellation) modcan_html += '<li class="collection-item" onClick="mod_action(\'cancel\');">Cancel Booking</li>';
				modcan_html += '</ul>';
				
				if(cancellation||modification){
					$('#mod-option').html(modcan_html);
				}else{
					mbox.alert('Modification or Cancellation not allowed');
					$('#mod-option').html('');
				}
				
				
				}else{
					mbox.alert('Invalid Transaction ID, Email Address or Transaction cant modified/cancelled');
					$('#mod-option').html('');
				}
				
			}, 'json').error(function() { mbox.alert("There was a problem in your request. Please contact our administrator. <br><br> Phone No.: " + opt.phone + " <br> Email: " + opt.email_address + ". <br><br> Thank You!"); $('#loading').fadeOut("slow"); $('#mod-option').html(''); }); 
		}
		e.preventDefault();
	});
	
	$('.add-day-tour').click(function (){
		var daytour_date = $(this).parent().serialize();
		
		alert(daytour_date);
	});

	if($('#advisor').length > 0 ){
		$('#advisor').modal();
		 $('#advisor').modal('open');
	}
	
	 $( "#dateshow" ).datepicker({ 
		minDate: 0,
		dateFormat: 'yy-mm-dd'
	});
	
	
	$('#change_date').click(function (){
		var opt = $('body').data('option');
		var base_url = opt.base_url;
		
		var datechange = $('#dateshow').val();
		
		if(datechange!=''){
			
			$.ajax({url: base_url+"booking/change-availability/"+datechange+"/"+opt.property_id, success: function(result){
				$('#table-avail').html(result);
			}});
			
		}else{
			mbox.alert('Please select dates');
		}

	});
	
	
	$('input[name="mode_payment"]').change(function (){
		var opt = $('body').data('option');
	
		if(opt.with_addon=='yes'){
			addaddon();
		}else{
			closeaddon();
		}
		
		
	});
	$('#changecurr').change(function (){
		var val = $(this).val();
		var cc = $(this).attr('cc');
		
		$(this).attr('cc',val);
		currencyConvert(cc,val);
		
	});
	$('#featured_promo').carouseller({
		//scrollSpeed: 650,
		//autoScrollDelay: -1800,
		//easing: 'easeOutBounce'
	});
	
});
function mod_action(action){
	
	var mod_option = $('#mod-option').data('modcancel');
	var opt = $('body').data('option');
	
	switch(action){
		case 'modify_room':
			mbox.confirm(mod_option.msg.modify_room, function(yes) {
			if (yes) {

				var field = [
				{'field':mod_option.arrival_date,'name':'arrival_date'},
				{'field':mod_option.departure_date,'name':'departure_date'},
				{'field':mod_option.property_id,'name':'property_id'},
				{'field':true,'name':'modification'},
				{'field':mod_option.confirmation_no,'name':'confirmation_no'},
				{'field':'','name':'promo_code'},
				{'field':action,'name':'mod_action'}
				];

				submitform('POST',opt.web_url + "managebooking.php",field);
				
			}
		});
		break;
		case 'modify_date':
			mbox.confirm(mod_option.msg.modify_room, function(yes) {
			if (yes) {
				
				
				datepicker = '<div class="row"><div class="input-field inline col m6 form-group">';
				datepicker += '<input id="c_in" type="email" name="arrival_date" readonly required />';
				datepicker += '<label for="c_in" class="c_in">Arrival Date</label>';
				datepicker += '</div>';
				datepicker += '<div class="input-field inline col m6 form-group">';
				datepicker += '<input id="c_out" type="email" name="departure_date" readonly required />';
				datepicker += '<label for="c_out" class="c_in">Departure Date</label>';
				datepicker += '</div></div><div class="datepicker con_dp"></div>';
				
				mbox.custom({
					message: datepicker,
					options: {},
					 buttons: [
						{
							label: 'Ok',
							color: 'light-blue darken-2',
							callback: function() {
								var arrival_date = $('#c_in').val();
								var departure_date = $('#c_out').val();
								if(departure_date=='' && arrival_date==''){
									mbox.alert('Please select arrival and departure date.');
								}else{
									var field = [
									{'field':arrival_date,'name':'arrival_date'},
									{'field':departure_date,'name':'departure_date'},
									{'field':mod_option.property_id,'name':'property_id'},
									{'field':true,'name':'modification'},
									{'field':mod_option.confirmation_no,'name':'confirmation_no'},
									{'field':'','name':'promo_code'},
									{'field':action,'name':'mod_action'}
									];
					
									submitform('POST',opt.web_url + "managebooking.php",field);
								}
							}
						},
						{
							label: 'Cancel',
							color: 'light-blue darken-2',
							callback: function() {
								 $('.mbox').fadeOut(0, function () {
									$(this).closest('.mbox-wrapper').remove();
								});

								// allow scrolling on body again
								$('body').removeClass('mbox-open');

								// unbind all the mbox buttons
								$('.mbox-button').unbind('click');
							}
						}
					]
				});
				
				$('#c_in, #c_out').click(function(){
					$(".datepicker").show(500);
				});
				
				var select_date = !0;
				var todayDate = $('.datepicker2').attr("current-date");
				var priorarrival = $('.datepicker2').attr("prior-days");
				var is_rolling = $('.datepicker2').attr("is-rolling");
				var valid_from = $('.datepicker2').attr("start-date");
				var valid_to = $('.datepicker2').attr("end-date");
				var no_months = $('.datepicker2').attr("no-months");
				
				var currentDate = new Date(Date.parse(todayDate));
				
				if(is_rolling==1){
					var dateToday = currentDate.addDays(priorarrival);
					var maxDateRolling = "+"+no_months+"M"
				}else{
					var dateToday = currentDate.addDays(priorarrival);
					var maxDateRolling = new Date(Date.parse(valid_to));
				}
				
				var cur = -1,
				prv = -1;
				var d1, d2;
				
				
				$('.datepicker').datepicker({
					minDate: dateToday,
					numberOfMonths: 2,
					maxDate: maxDateRolling,
					beforeShowDay: function(date) {
						return [!0, ((date.getTime() >= Math.min(prv, cur) && date.getTime() <= Math.max(prv, cur)) ? 'date-range-selected' : '')]
					},
					onSelect: function(dateText, inst) {
				
						prv = cur;
						cur1 = new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay);
						cur = (new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay)).getTime();
						tom = cur1.setDate(cur1.getDate() + 1);
						prv = select_date ? tom : prv;
						select_date = !1;
						if (prv == -1 || prv == cur) {
							prv = cur;
							$("#check_rates").attr('disabled', 'disabled');
							$(this).addClass('selected');
						} else {
							d1 = $.datepicker.formatDate('M dd, yy', new Date(Math.min(prv, cur)), {});
							d2 = $.datepicker.formatDate('M dd, yy', new Date(Math.max(prv, cur)), {});
						   
							$("#check_rates").removeAttr('disabled');
							
							if ($('#c_in').length > 0 && prv != Math.max(prv, cur)) {
								$('#c_in').val(d1);
								$('#c_out').val(d2);
								$('.c_in').addClass('active');
								$('.c_out').addClass('active');
								$('#search_new').removeAttr('disabled');
								$(".con_dp").hide(500);
							}
						}
						
						/* var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#c_in").val());
						var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#c_out").val());
						if (!date1 || date2) {
							// dateselect = $.datepicker.formatDate('M dd, yy', new Date(dateText), {});
							$("#c_in").val(dateText);
							$("#c_out").val("");
							$('.c_in').addClass('active');
							$(this).datepicker();
						} else {
							// dateselect = $.datepicker.formatDate('M dd, yy', new Date(dateText), {});
							$("#c_out").val(dateText);
							$(this).datepicker();
							$('.c_out').addClass('active');
							$(".con_dp").hide(500);
						} */
					},
					onChangeMonthYear: function(year, month, inst) {}
				});
				
			}
		});
		break;
		case 'cancel':
			mbox.custom({
					message: mod_option.msg.cancelled,
					options: {},
					 buttons: [
						{
							label: 'Ok',
							color: 'light-blue darken-2',
							callback: function() {
								var cancel = serializeArrayToObject($('#cancelform').serializeArray());
								$.extend(cancel,opt);
								if(cancel.reason=='' && cancel.specify==''){
									mbox.alert('Please pill up the following.');
								}else{
									
									var xhr = $.post(opt.base_url+'booking/calendar/cancel',cancel, function(json) {
										
										if(json.guest && json.hotel){
											mbox.alert('Cancel Successfull');
											$('#mod-option').html('');
											$('#email_add, #trans_id').val('');
										}
									}, 'json').error(function() { mbox.alert("There was a problem in your request. Please contact our administrator. <br><br> Phone No.: " + opt.phone + " <br> Email: " + opt.email_address + ". <br><br> Thank You!"); }); 
									
									
									
								}
							}
						},
						{
							label: 'Cancel',
							color: 'light-blue darken-2',
							callback: function() {
								 $('.mbox').fadeOut(0, function () {
									$(this).closest('.mbox-wrapper').remove();
								});

								// allow scrolling on body again
								$('body').removeClass('mbox-open');

								// unbind all the mbox buttons
								$('.mbox-button').unbind('click');
							}
						}
					]
				});
		break;
	}
	
	

	
}

function submitform(method,action,fields){
	
	var form = document.createElement("form");
	
	form.method = method;
	form.action = action;  
	
	$.each(fields,function (index, obj){
		var fields = document.createElement("input"); 
		fields.value=obj.field;
		fields.name=obj.name;
		form.appendChild(fields); 
	});

	document.body.appendChild(form);

	form.submit(); 
}
function serializeArrayToObject(formdata){
	var data = {};
	$(formdata ).each(function(index, obj){
		data[obj.name] = obj.value;
	});
	
	return data;
}

function closeaddon(addon_summary = null){
	$('#step1').hide();
	$('#rdn').hide();
	$('#step2').show();		
	$('#smartwizard > ul > li:nth-child(2)').addClass('active'); 
	$('#smartwizard > ul > li:nth-child(1)').removeClass('active'); 
	var opt = $('body').data('option');
	var full_payment = false;
	if(opt.fullpayemnt_option==1){
		var mod_payment = $('input[name="mode_payment"]:checked').val();
		full_payment = mod_payment=='full'?true:false;
	}
	
	if(opt.with_addon=='yes') $('#next_process').modal('close'); 
	
	var html = '';
	var rooms_cost = 0;
	var total_payment = 0;
	var tax_services = 0;
	var room_cart = [];
	$('.room-cart').each(function (){
		var cart = $(this).data('cart');
		// var cart_original = $(this).data('cart-original');
		// console.log(cart);
		
		// if(full_payment){
			// cart.percentage_payment = 100;
			// cart.payment_msg = '100% Payment to reserve<br>NRGD (100%)';
			// cart.data.one_day_booking_rate = 100;
			// cart.data.payment_rate = 100;
		// }else{
			// cart = cart_original
		// }
		
		
		room_cart = $.merge(room_cart,[cart]);
		// console.log(cart);
		
		total = cart.tatal_room;
		tax_services = cart.data.total_tax_services;
		
		rooms_cost += total;
		
		total_payment += parseFloat(cart.payment);
		
		booking_name = cart.booking_name;
		
		html += '<div class="col s12 m12 every_con">';
		html += '<div class="col s12 m12">';
		html += '<h6>'+booking_name+'</h6>';
		html += '</div>';
		html += '<div class="col s12 m12">';
		html += '<div class="col s12 m7">';
		html += '<ul class="collection">';
		html += '<li class="collection-item">Number of nights: '+cart.data.no_nights+'</li>';
		html += '<li class="collection-item">Number of person(s): '+cart.no_person+'</li>';
		if(cart.no_child > 0) html += '<li class="collection-item">Number of child(ren): '+cart.no_child+'</li>';
		html += '<li class="collection-item">Number of room(s): '+cart.no_room+'</li>';
		html += '<li class="collection-item">'+cart.payment_msg+'</li>';
		html += '</ul>';
		html += '</div>';
		html += '<div class="col s12 m5 price_container">';
		html += '<div class="h_prive">'+opt.currency+' '+number_format(total,2)+'</div>';
		html += '<span>'+cart.tax_msg+'</span>';
		html += '<span class="new badge chck_rates">';
		html += '<a class="waves-effect waves-light modal-trigger chkrates" rel="'+cart.rel+'" href="#chkrates">';
		html += 'Check rates';
		html += '</a>';
		html += '</span>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		
	});
	// console.log(room_cart);
	var tax_services_cost = rooms_cost * (tax_services/100);
	var total_cost = rooms_cost + tax_services_cost
	var hotel_total_payable = total_cost-total_payment;
	
	if(full_payment){
		total_payment = total_cost;
		hotel_total_payable = 0;
	}
	
	var res = '<ul class="collection">';
	res += '<li class="collection-item dismissable">';
	res += '<div>';
	res += '<div class="col s12 m7">';
	res += 'Room Cost:';
	res += '</div>';
	res += '<div class="col s12 m5 right_side">';
	res += ''+opt.currency+' '+number_format(rooms_cost,2);
	res += '</div>';
	res += '</div>';
	res += '</li>';
	
	//addons
	addon_summary = $('#addon_details').data('addon_details');
	
	if(addon_summary!=null){
		
		total_payment += parseFloat(addon_summary.payment_on_reservation);
		hotel_total_payable += parseFloat(addon_summary.payment_on_hotel);
		
		total_addon_charge = parseFloat(addon_summary.total_charge);
		total_addon_not_charge = parseFloat(addon_summary.total_not_charge);
	
		tax_services_cost = (rooms_cost + total_addon_charge + total_addon_not_charge) * (tax_services/100);
		
		total_cost = rooms_cost + total_addon_charge + total_addon_not_charge + tax_services_cost;
		
		if(addon_summary.total_charge>0){
			res += '<li class="collection-item dismissable">';
			res += '<div>';
			res += '<div class="col s12 m7">';
			res += 'Add-on Services (Charge):';
			res += '</div>';
			res += '<div class="col s12 m5 right_side">';
			res += ''+opt.currency+' '+number_format(total_addon_charge,2);
			res += '</div>';
			res += '</div>';
			res += '</li>';
		}
		if(addon_summary.total_not_charge>0){
			res += '<li class="collection-item dismissable">';
			res += '<div>';
			res += '<div class="col s12 m7">';
			res += 'Add-on Services (Not Charge):';
			res += '</div>';
			res += '<div class="col s12 m5 right_side">';
			res += ''+opt.currency+' '+number_format(total_addon_not_charge,2);
			res += '</div>';
			res += '</div>';
			res += '</li>';
		}
	}
	
	
	res += '<li class="collection-item">';
	res += '<div>';
	res += '<div class="col s12 m7">';
	res += 'Tax & Other Fee ('+number_format(tax_services,2)+'%):';
	res += '</div>';
	res += '<div class="col s12 m5 right_side">';
	res += ''+opt.currency+' '+number_format(tax_services_cost,2);
	res += '</div>';
	res += '</div>';
	res += '</li>';
	res += '<li class="collection-item">';
	res += '<div>';
	res += '<div class="col s12 m7">';
	res += 'Total Reservation Cost:';
	res += '</div>';
	res += '<div class="col s12 m5 right_side">';
	res += ''+opt.currency+' '+number_format(total_cost,2);
	res += '</div>';
	res += '</div>';
	res += '</li>';
	if(parseInt(opt.modification) && parseFloat(opt.modification_charge) > 0){ 
		res += '<li class="collection-item">';
		res += '<div>';
		res += '<div class="col s12 m7">';
		res += 'Modification Charge:';
		res += '</div>';
		res += '<div class="col s12 m5 right_side">';
		res += ''+opt.currency+' '+number_format(opt.modification_charge,2);
		res += '</div>';
		res += '</div>';
		res += '</li>';
		total_payment += parseFloat(opt.modification_charge);
	}
	res += '<li class="collection-item">';
	res += '<div>';
	res += '<div class="col s12 m7">';
	res += 'Total amount payable in the hotel:';
	res += '</div>';
	res += '<div class="col s12 m5 right_side">';
	res += ''+opt.currency+' '+number_format(hotel_total_payable,2);
	res += '</div>';
	res += '</div>';
	res += '</li>';	
	res += '<li>';
	res += '<div class="s12 m12 total_con">';
	res += '<div class="col s12 m7">';
	res += '<span id="payment_rsvn">Payment upon reservation:</span>';
	res += '<p style="margin-top:0px;font-size:10px;font-style: italic;">Non-Refundable Guarantee Deposit (NRGD)</p>';
	res += '</div>';
	res += '<div class="col s12 m5 reservation_cost">';
	res += '<span>'+opt.currency+' '+number_format(total_payment,2)+'</span>';
	res += '</div>';
	res += '</div>';
	res += '</li>';
	res += '</ul>';
	
	if(Math.round(hotel_total_payable)==0 && !full_payment){
		$('#mode_payment').hide();
	}
	
	var reservation = {
			"total_payment":total_payment,
			"hotel_total_payable":hotel_total_payable,
			"total_cost":total_cost,
			"tax_services_cost":tax_services_cost,
			"rooms_cost":rooms_cost,
			"room_cart":room_cart
	};

	$('#reservation').data('reservation',reservation);
	$('#step2-room-details').html(html);
	$('#step2-res-summary').html(res);
	lean_modal($('.chkrates'));
	
	ga('set', 'page', 'step2/guestdetails');
	ga('send', 'pageview');
	
	var curr = $('#changecurr').val();
		
	if(curr!=opt.currency){
		currencyConvert(opt.currency,curr);
	}
}

function description(type,id,rate_id=0,promo_id=0,environment='live'){ 
	
	var opt = $('body').data('option');
	var base_url = opt.base_url;
	

	if(screen.width < 1000){
		$('#description').addClass('description_mobile');
	}
	
	var loader = loader_html(opt);

	
	$("#description .modal-content").html(loader);
	$.ajax({url: base_url+"booking/description/"+type+"/"+id+"/"+rate_id+"/"+promo_id+"/"+environment, success: function(result){
        $("#description .modal-content").html(result);
		
		if ($(".fotorama")[0]){
			$('.fotorama').fotorama();
		}
		
		}});
}

function loader_html(opt){
	var loader = '<div class="loader-center">';
	loader += '<div class="loader-center-absolute">';
	loader += '<div class="loader-object"><img src="'+opt.logo+'" />';
	loader += '</div>';
	loader += '<div class="loader-msg">';
	loader += '<span class="msg-span" id="msg1">Loading</span>';
	loader += '</div>';
	loader += '</div>';
	loader += '</div>';
	return loader;
}


function delete_roomrate(room_id,rate_id){
	var booking_name = $('#bookings-'+room_id+'-'+rate_id).attr('booking_name');
	
	mbox.confirm('Are you sure you want to delete '+booking_name+'?', function(yes) {
    if (yes) {
		
		var number_rooms = parseInt($('#bookings-'+room_id+'-'+rate_id).attr('number_rooms'));
		
		$('.rooms-'+room_id).each(function (){ 
			var allocation = parseInt($(this).attr('temp_allocation'));
			allocation += number_rooms;
			
			
			room_option = "";
			for(x=0;x<=allocation;x++){
				room_option += "<option rel='"+x+"' value='"+x+"'>"+x+"</option>";
			}
			
			$(this).html(room_option);
			$(this).attr('temp_allocation',allocation);
		});
		
		$('#bookings-'+room_id+'-'+rate_id).remove();
		$('#policy-'+room_id+'-'+rate_id).remove();
		
		content = $('.room_details').html();
		content = content.trim();

		if(content==''){
			$('.room_details').hide();
		}
		
		var len = $('.room-cart').length;
		
		if(len == 0){
			if($('.book_now').hasClass('next_button_active')){
				$('.book_now').removeClass('next_button_active');
				$('.book_now').addClass('next_button_inactive');
				$('.book_now').attr('disabled','');
				$('a.add-book').removeClass('active_rooms');
			}
		}
		
    }
});
	
}
function addaddon(){
	
	var addon_cart = [];
	var html = '';
	var withaddon = false;
	var charge = 0;
	var not_charge = 0;
	var payment_on_hotel = 0;
	var payment_on_reservation = 0;
	
	var opt = $('body').data('option');
	
	
	var full_payment = false;
	if(opt.fullpayemnt_option==1){
		var mod_payment = $('input[name="mode_payment"]:checked').val();
		full_payment = mod_payment=='full'?true:false;
	}
	
	$('select.addon_qty').each(function (){
		var qty = parseFloat($(this).val());
		var id = $(this).attr('addonid');

		var addondata = $('#addon_'+id).data('addons');
		
		addondata.original = addondata;
		if(full_payment){
			addondata.auto_charge = 1;
		}else{
			if (typeof addondata.original !== 'undefined') {
				addondata = addondata.original;
			}
		}
		
		
		if(addondata.charge_type) var per_night = parseFloat($('#per_night_'+id).val());
		else var per_night = parseFloat($('#per_night_'+id).val());
		var request = $('#addons_request_'+id).val();
		
		var add_rate = parseFloat(addondata.rate);
		
		if(qty>0 && per_night>0){
		withaddon = true;
		
		
		var type = parseInt(addondata.type)?'Transfer':'Service';
		var auto_charge = parseInt(addondata.auto_charge)?'Yes':'No';
		var total_addon = add_rate * per_night * qty;
		var total_addon_inclusive = total_addon;
		total_addon = parseInt(opt.include_tax)?total_addon:(total_addon / parseFloat(opt.taxs_computed));
	
		var percentage = per_night==1?addondata.one_day_rate_percentage:addondata.payment_rate_percentage;
		
		var addon = {
			"qty":qty,
			"per_night":per_night,
			"remark":request,
			"rate":total_addon,
			"addondata":addondata,	
			"percentage":percentage,
			"payment": (total_addon_inclusive * (percentage/100)) 
		};	
		
		html += '<div class="col s12 m12 every_con">';
		html += '<div class="col s12 m12">';
		html += '<h6>'+addondata.addon_name+'</h6>';
		html += '</div>';
		html += '<div class="col s12 m12">';
		html += '<div class="col s12 m7">';
		html += '<ul class="collection">';
		html += '<li class="collection-item">Type: '+type+'</li>';
		html += '<li class="collection-item">Quanty: '+qty+'</li>';
		html += '<li class="collection-item">Number of nights: '+per_night+'</li>';
		html += '<li class="collection-item">Charge upon reservation: '+auto_charge+'</li>';
		
	
		html += '</ul>';
		html += '</div>';
		html += '<div class="col s12 m5 price_container">';
		html += '<div class="h_prive">PHP '+number_format(total_addon,2)+'</div>';
		if(parseInt(addondata.auto_charge)) html += '<span>'+percentage+'% to reserve</span>';
		html += '<span class="new badge chck_rates">';
		html += '<a class="waves-effect waves-light modal-trigger checkrequest" addonid="'+id+'" href="#checkrequest">';
		html += 'Check request';
		html += '</a>';
		html += '</span>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		
		if(parseInt(addondata.auto_charge)) charge += total_addon;
		else not_charge += total_addon;
		
		if(parseInt(addondata.auto_charge)){
			payment_on_reservation += (total_addon_inclusive * (percentage/100));
			payment_on_hotel += (total_addon_inclusive - payment_on_reservation);
		}else{
			payment_on_hotel += total_addon_inclusive;
		}
		
		addon_cart = $.merge(addon_cart,[addon]);
		
		}
		
		
	});
	if(withaddon){
		
		
		addon_summary = {
			"total_charge" : charge,
			"total_not_charge" : not_charge,
			"addon_cart" : addon_cart,
			"payment_on_hotel" : payment_on_hotel,
			"payment_on_reservation" : payment_on_reservation
		};
		
		$('#addon_details').data('addon_details',addon_summary);
		
		closeaddon(addon_summary);
		
	
		
		$('#step2-addon-details').html(html);
		$('#addoncart').show();
		lean_modal($('.checkrequest'));
	}else{
		$('#addon_details').data('addon_details',null);
		closeaddon();
		$('#step2-addon-details').html('');
		$('#addoncart').hide();
	}
	
}
function proceedPayment(opt,json) {
    if(json.withpayment){
		var form = document.createElement("form");
		var element1 = document.createElement("input"); 
	  
		form.method = "POST";
		form.action = opt.PAYGATE_URL;   
		form.target = "_parent";   

		element1.value=json.data_encrypted;
		element1.name="paymentrequest";
		form.appendChild(element1);  

		document.body.appendChild(form);
		
		form.submit(); 
	}else{
		 var voucher_link = opt.base_url+'booking/pay-return/resultpage?modification=1';
		 voucher_link += '&ref='+opt.payment_ref_number;
		 voucher_link += '&pm='+opt.payment_method;
		 voucher_link += '&chn='+opt.card_holder_name;
		 voucher_link += '&cn='+json.confirmNoSet;
		 voucher_link += '&oldcn='+opt.confirmation_no;
		 window.location.href = voucher_link;

	}
	
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function currencyConvert(cc = 'PHP',tc='USD'){
	
	var con = true;
	var opt = $('body').data('option');
	
	var convertQ = tc+'_'+opt.currency;
	
	$.ajax({url: 'https://free.currencyconverterapi.com/api/v6/convert?q='+convertQ+'&compact=y', success: function(result){
		
		var converter = result[convertQ].val;
		
		while(con){
			$('#loading').fadeIn("slow");
			foundin = $('*:contains("'+cc+'"):not("html, form, body, script, .dontconvert")').last();	
					
			origtext = foundin.html();
			
			if(typeof origtext !== "undefined"){
				
				if(!origtext.includes('('+cc+')')){
					
					origtext = origtext.replace(',','');
						
					getnumber = origtext.match(/-?(?:\d+(?:\.\d*)?|\.\d+)/);
					floatval = parseFloat(getnumber);
					floatval = floatval.toFixed(2);
					
					displayval = floatval;
					
					if(cc!=opt.currency){
									
						floatval = foundin.attr('defaultcur');
					}
					
					if(tc==opt.currency){
						floatval = foundin.attr('defaultcur');
						converter = 1;
					}
					// console.log(floatval);
					
					convertusd = floatval /converter;
					// console.log(convertusd);
					changetext = origtext.replace(cc,tc);
					
					changetext = changetext.replace(displayval,number_format(convertusd,2));
					
					foundin.html(changetext);
					if(cc==opt.currency){
						foundin.attr('defaultcur',floatval);
					}
				}else{
					foundin.addClass('dontconvert');
				}
			}else{
				con= false;
			}
		}
		$('.default_currency').text(opt.currency);
		$('#loading').fadeOut("slow");

	}});

}