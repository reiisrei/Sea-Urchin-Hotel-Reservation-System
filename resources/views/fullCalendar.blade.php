@extends('layouts.app')
@section('content')
  	<!-- CSS  -->
  	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
  	<link type="text/css" rel="stylesheet" href="{{URL::asset('fullcalendar/font-awesome.css')}}"/>
  	<link type="text/css" rel="stylesheet" href="{{URL::asset('fullcalendar/materialize.css')}}"/>
  	<link type="text/css" rel="stylesheet" href="{{URL::asset('fullcalendar/style.css')}}"/>
  	<link type="text/css" rel="stylesheet" href="{{URL::asset('fullcalendar/smart_wizard.css')}}"/>
  	<link type="text/css" rel="stylesheet" href="{{URL::asset('fullcalendar/smart_wizard_theme_arrows.css')}}"/>
  	<!--<link rel="stylesheet" type="text/css" href="https://manage.instantonlinebookings.com/public/booking/css/mobile.css" media="all" />-->
  	<style>
  .form_blocker_handler,
  .close_handler{
  	display:none;
  }
  .steps_container p{margin:0px;}
  .desktop_step{display:block;}
  .mobile_step{display:none;}
  .carouseller__list .element-item,
  .each_boxes{
  	border: 1px solid #dcdcdc;
      border-radius: 5px;
      overflow: hidden;
  }
  #featured_promo{
  	border: 1px solid #dcdcdc;
      border-radius: 5px;
  }
  .right_panel{
  	border: 1px solid #dcdcdc;
      border-radius: 0px 0px 5px 5px;
      overflow: hidden;
  }
  .featured-promo{
  	margin-top: 0px;
  }
  .carouseller{
  	background: #fff;
  }
  /* Extra small devices (phones, 600px and down) */
  @media screen and (min-width: 300px) and (max-width: 600px) {
  	.tab-bar-inner a{
  		font-size: 27px;
  		padding-top: 6px;
  		padding-bottom: 3px;
  		font-weight: 500;
  	}
  	.tab-bar-inner a i {
  		vertical-align: middle;
  		background-size: 100% auto;
  		background-position: center;
  		background-repeat: no-repeat;
  		font-style: normal;
  		position: relative;
  		line-height: 20px;
  		height: 30px;
  	}
  	.tab-bar-inner a span {
  		display: block;
  		line-height: 1;
  		margin: 0;
  		position: relative;
  		text-overflow: ellipsis;
  		white-space: nowrap;
  		letter-spacing: 0;
  		font-size: 10px;
  	}
  	.button_header_input .s12{
  		float: left;
  		width: auto !important;
  	}
  	.nav-item a{
  		width: 100%;
  	}
  	.nav-item.active{
  		display:block;
  	}
  	.nav-item{
  		display:none;
  		width:100%;
  	}
  	.nav-item a{
  		width:100% !important;
  	}
  	ul.outter_filter{
  		float: left;
  		width: 100%;
  	}
  	.filter_container ul li{
  		width: 33.33%;
  		float: left;
  	}
  	.m4.sorts{
  		background: #fff;
  	}
  	.ui-datepicker-inline.ui-datepicker{
  		display: block !important;
  		width: 100% !important;
  	}
  	.ui-datepicker-multi-2 .ui-datepicker-group {
  		width: 100% !important;
  	}
  	.datepicker{
  		    left: 0px !important;
  	}
  	.search_now_input {
  		padding-right: 0px !important;
  		padding-left: 9px !important;
  	}
  	.button_header_input{
  		margin-bottom: 24px;
  	}
  	.row container_rd .col.s6{
  		    font-size: 18px;
      margin-top: -6px;
  	}
  	.row container_rd .col.s6 i{
  		    margin-right: 15px;
  	}
  	.room_num{
  		font-size: 18px;
  		margin-top: -7px;
  		font-weight: bold;
  		color: #5cb85c;
  	}
  	.reservation_details_mobile{display:block;}
  	.row.container_rd{
  		background: #fff;
  		height: 50px;
  		padding: 18px 0px 19px 0px;
  		position: fixed;
  		bottom: 0px;
  		width: 100%;
  		z-index: 9999;
  		margin-bottom: 0px;
  		box-shadow: 1px -2px 15px #828282;
  		-webkit-box-shadow: 1px -2px 15px #828282;
  		-moz-box-shadow: 1px -2px 15px #828282;
  		transition:linear 0.3s;
  		-webkit-transition:linear 0.3s;
  		-moz-transition:linear 0.3s;
  	}
  	.reservation_details_mobile.cart .row.container_rd{
  		height:100%;
  	}
  	.close_cart {
  		position: absolute;
  		right: 22px;
  		top: 12px;
  	}
  	#next_process.modal{
  		min-height: 100% !important;
  		    top: 0px !important;
  	}
  	.header_cart{
  		float: left;
  		width: 100%;
  		border-bottom: 1px solid #bbb;
  		padding-bottom: 6px;
  	}
  	.modal .modal-footer{
  	    text-align: left !important;
  	}
  	#next_process.modal {
  		width: 100% !important;
  	}
  	#next_process.modal{
  		z-index: 9999999999 !important;
  	}
  	ul.inner_prop .select-wrap {
  		width: 30.33% !important;
  		margin-right: 6px;
  		text-align: center;
  	}
  	ul.inner_prop .select-wrap:nth-child(3) {
  		margin-right: 0px;
  	}
  	.select-wrap select{
  		width: 100% !important;
  	}
  	.btn-wrap .btn-custom{
  		margin-right: 8px;
  		margin-bottom: 25px;
  	}
  	.rate_list_table {
  		margin-top: 27px;
  	}
  	li .border_right {
  		min-height: 177px !Important;
  	}
  	.dropdown-content li {
  		width: 100% !important;
  	}

  	.sorts{
  		padding-left:0px !Important;
  	}
  	ul.viewed_by li {
  		float: left;
  	}
  	.label_filter.view_b{
  		float: left;
  		margin-right: 23px;
  		margin-top: 13px;
  		margin-left: 12px;
  		font-weight: bold;
  	}
  	.filter_container{
  		background: #fff;
  		margin-bottom: 17px;
  	}
  	.filter_container ul {
  		margin-bottom: 0px;
  	}
  	.filter_b{
  		float: right !important;
  	}
  	.sort2.outter_filter{float:right;}
  	.filter_b{
  		float: right !Important;
  	}
  	.label_filter {
  		margin-top: 15px !important;
  		font-size: 13px !important;
  		font-weight: bold;
  		margin-right: 13px;
  		color: #90bd90;
  	}
  	.scroll-to-fixed-fixed ul {
  		border-bottom: 1px solid #dadada !important;
  	}
  	.filter_container ul li{border:0px solid #000 !important;}
  	.filter_container{
  		box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-webkit-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-moz-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  	}
  	.filter_b{
  		width: 33.33%;
  		float: right !important;
  		    padding-left: 0px;
  	}
  	.filter_b ul{
  		float: left;
  		width: 100%;
  	}
  	.col.s12.m4.sorts{
  		float: left;
  		width: 66%;
  	}
  	.viewed_by li {
  		width: 50% !important;
  		font-size: 11px !important;
  	}
  	.filter_container ul li{
  		width: 100%;
  		font-size: 11px;
  	}
  	.col.s12.m4.filter_b {
  		float: right;
  		width: 33.33%;
  		    padding-right: 0px;
  	}
  	.price_filter{
  		width: 100%;
  	}
  	.sidebar_rev .title_details{
  		font-size: 18px;
  		    padding: 15px;
  	}
  	.room_filter li{width:100% !important;}
  	.label_filter{display:none;}
  	.sidebar_rev {
  		position: fixed;

  		padding: 0px !important;
  		background: #fff;
  		transition:linear 0.3s;
  		-webkit-transition:linear 0.3s;
  		-moz-transition:linear 0.3s;
  		z-index: 9999;
  	}
  	.content_sidebar_rev .sidebar_rev{
  		display:block;
  	}
  	.book_now{
  		width: 100%;
  		margin: 0 0px;
  	}
  	#next_process table tr{
  		position: relative;
  		display: block;
  		height: 288px;
  		    margin-bottom: 40px;
  	}

  	td.addon_td.addon_name {
  		top: -5px !important;
  		left: 5px;
  		font-size: 19px;
  	}
  	td.addon_td {
  		position: absolute;
  	}

  	td.addon_td.addon_rate {
  		top: 30px;
  		left: 6px;
  		font-size: 22px;
  		color: #3ca98a;
  	}
  	table.striped > tbody > tr > td {
  		border-radius: 0;
  	}
  	td.addon_td.addon_slc12 {
  		top: 71px;
  		left: 175px;
  		position: absolute;
  	}
  	#back-to-rooms{
  		margin-left: 19px;
  		margin-top: -6px;
  	}
  	.button-collapse{display:none;}
  	#book_now_payment{
  		width: 100% !important;
  		margin-bottom: 20px !important;
  	}
  	td.addon_td.addon_description {
  		top: 128px;
  		left: 0px;
  		position: absolute;
  		width: 100%;
  	}
  	.btn_book{padding:0px;}
  	td.addon_slc1 {
  		top: 71px;
  		left: 0px;
  		position: absolute;
  	}
  	.header_tr{
  		height: 47px !important;
  		margin-bottom: 33px;
  	}
  	.addon_description div{
  		height: 79px;
  	}
  	td.addon_td.addon_request {
  		top: 195px;
  		left: 0px;
  		width: 100%;
  		position: absolute;
  	}
  	#next_process table thead{
  		display:none;
  	}
  	.addon_request textarea{
  		width: 100%;
  	}
  	div#next_process table tbody tr:first-child {
  		display: none;
  	}
  	.footer-copyright{
  		margin-bottom: 29px;
  	}
  	#description .fotorama__stage__frame img{
  		width:100% !important;
  	}

  	#description .modal-content .row *{
  		width:100% !important;
  	}

  	#description .modal-content .col.s5 .fotorama__stage{
  		min-height: 196px !important;
  	}
  	#description .fotorama{
  		height: 158px;
  	}
  	.section div#description {
  		width: 100% !important;
  		top: 0px !important;
  		height: 100% !important;
  		max-height: 92%;
  		z-index: 9999;
  	}
  	#description h5{
  		    color: darkorange;
  	}
  	.mobile_opt{display:block;}
  	.mobile_opt{
  		position: absolute;
  		right: 54px;
  		    top: 47px;
  		color: #fff;
  		display: inline-block;
  		font-size: 15px;
  	}
  	body #toast-container {
  		top: auto !important;
  		right: 0% !Important;
  		bottom: 10%;
  		left: auto !important;
  	}
  	.next-process img{width:90%;}
  	.drag-target{display:block !important;}
  	.tooltipiob{display:block;}
  	.tooltipiob{
  		width: 112px !important;
  		height: 51px !important;
  		text-align: left !important;
  		top: -69px !important;
  		text-align: left !Important;
  		left: 10px !important;
  	}
  	.tooltipiob .arrows{
  		margin-left: 41px !important;
  		position: absolute !important;
  		bottom: -17px !important;
  		left: 0px !Important;
  	}
  	.head_step2 h5{
  		width: 100%;
  		margin-bottom: 16px;
  	}
  	.head_step2 h5 a{
  		margin-left:0px;
  	}
  	form#calendar_form .input-field {
  		width: 100% !important;
  	}
  	.footer-panel {
  		display: block !important;
  	}
  	form#calendar_form button.waves-effect.waves-light.btn-large {
  		width: 100% !important;
  	}
  	.modify_field {
  		margin-left: 0px !important;
  	}
  	.drag-target{display:none !important;}
  	form#calendar_form .checkin-c, form#calendar_form .checkout-c{
  		width: 50% !important;
  		margin-top: 23px;
  	}
  	form#calendar_form .checkin-c input, form#calendar_form .checkout-c input{
  		margin-bottom:10px;
  	}
  	.input-field .prefix{
  		font-size: 1.4rem !important;
  	}
  	.input-field i.prefix{
  		margin-top: 20px;
  		margin-left: 5px;
  	}
  	.searcher{
  		position:relative;
  		    bottom: 0px !important;
  	}
  	.banner_section{
  		height: 144px !important;
  		transition:linear 0.3s;
  		-webkit-transition:linear 0.3s;
  		-moz-transition:linear 0.3s;
  		overflow:hidden;
  	}
  	.promo_code_container{margin-top:0px;}
  	.form_blocker_handler{
  		position: absolute;
  		top: 0px;
  		left: 0px;
  		width: 100%;
  		height: 100%;
  		z-index: 999999;
  		display:block;
  	}
  	.open_calendar_top.banner_section{
  		height: 240px !important;
  		overflow: unset !important;
  	}
  	.close_handler{
  		position: absolute;
  		color: #000;
  		font-size: 24px;
  		right: 9px;
  		top: 8px;
  		z-index: 99;
  		width: 20px;
  		height: 20px;
  		background: #fff;
  		border-radius: 50px;
  		line-height: 14px;
  		text-align: center;
  		display:none;
  		cursor:pointer;
  	}
  	.fixed_scroll {
  		position: fixed !Important;
  		top: 61px;
  		left: 0px;
  		z-index: 99;
  	}
  	.fixed_nav_scroll {
  		position: fixed !Important;
  		top: 0px;
  		left: 0px;
  		z-index: 99;
  	}
  	.currency_dropdown{
  		position: absolute;
  		top: 6px;
  		z-index: 9;
  		right: 132px;
  		width: 135px;
  	}
  	ul.inner_prop .inc_container li:last-child, ul.inner_prop .inc_container li:last-of-type:not(:only-of-type) {
  		margin-bottom: 22px !important;
  	}
  	nav .brand-logo{
  		position:relative !important;
  		left: 0px !important;
  		-webkit-transform: translateX(0%) !important;
  		transform: translateX(0%) !important;
  	}
  	#logo-container img {
  		margin: 10px 13px 10px 14px !important;
  		height: 33px !important;
  	}
  	.black-1 {
  		height: 62px !important;
  	}
  	.banner_section{
  		width: 100%;
  	}
  	ul.right.marg-2{
  		margin-top: 6px;
  	}
  	div#google_translate_element{
  		position: absolute;
  		top: 2px;
  		z-index: 9;
  		right: 8px;
  		    width: 119px;
  	}
  	#header{overflow:hidden;}
  	.desktop_step{display:none;}
  	.mobile_step{display:block;}
  	.carouseller{margin-bottom:0px;}
  	.row.searcher form#calendar_form .ui-datepicker-inline.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all.ui-datepicker-multi-2.ui-datepicker-multi{
  		overflow-y: scroll;
  		height: 430px;
  	}
  	.banner_section .datepicker{width:100%;}
  	.banner_section .datepicker .ui-datepicker{
  		height: 500px;
  	}
  	.banner_section .ui-datepicker td{
  		padding: 3px;
  		line-height: 35px;
  	}
  	.head_list_popup i{float: left;}
  	.popup_listroom.active_pu .head_list_popup div{
  		font-weight: bold;
  		margin-left: 51px;
  		font-size: 16px;
  		padding-top: 14px;
  		display: table-cell;
  		vertical-align: middle;
  	}
  }

  /* Small devices (portrait tablets and large phones, 600px and up) */
  /* @media screen and (min-width: 300px) and (max-width: 600px){ */
  @media screen and (min-width: 601px) and (max-width: 1000px) {
  	.button_header_input .s12{
  		float: left;
  		width: auto !important;
  	}
  	.tooltipiob{display:none;}
  	.nav-item a{
  		width: 100%;
  	}
  	.btn-custom.add-book{
  		background: #acacac!important;
  	}
  	body #toast-container {
  		top: auto !important;
  		right: 0% !Important;
  		bottom: 10%;
  		left: auto !important;
  	}
  	.mobile_opt{display:block;}
  	.nav-item.active{
  		display:block;
  	}
  	.mobile_opt{display:block;}
  	.mobile_opt{
  		position: absolute;
  		right: 54px;
  		top: 17px;
  		color: #fff;
  		display: inline-block;
  		font-size: 15px;
  	}
  	.nav-item{
  		display:none;
  		width:100%;
  	}
  	.nav-item a{
  		width:100% !important;
  	}
  	ul.outter_filter{
  		float: left;
  		width: 100%;
  	}
  	.filter_container ul li{
  		width: 33.33%;
  		float: left;
  	}
  	.m4.sorts{
  		background: #fff;
  	}
  	.ui-datepicker-inline.ui-datepicker{
  		display: block !important;
  		width: 100% !important;
  	}
  	.ui-datepicker-multi-2 .ui-datepicker-group {
  		width: 100% !important;
  	}
  	.datepicker{
  		    left: 0px !important;
  	}
  	.search_now_input {
  		padding-right: 0px !important;
  		padding-left: 9px !important;
  	}
  	.button_header_input{
  		margin-bottom: 25px;
  	}
  	.row container_rd .col.s6{
  		    font-size: 18px;
      margin-top: -6px;
  	}
  	.row container_rd .col.s6 i{
  		    margin-right: 15px;
  	}
  	.btn-custom.add-book{
  		background: #acacac!important;
  	}
  	.room_num{
  		font-size: 18px;
  		margin-top: -7px;
  		font-weight: bold;
  		color: #5cb85c;
  	}
  	.reservation_details_mobile{display:block;}
  	.row.container_rd{
  		background: #fff;
  		height: 50px;
  		padding: 18px 0px 19px 0px;
  		position: fixed;
  		bottom: 0px;
  		width: 100%;
  		z-index: 9999;
  		margin-bottom: 0px;
  		box-shadow: 1px -2px 15px #828282;
  		-webkit-box-shadow: 1px -2px 15px #828282;
  		-moz-box-shadow: 1px -2px 15px #828282;
  		transition:linear 0.3s;
  		-webkit-transition:linear 0.3s;
  		-moz-transition:linear 0.3s;
  	}
  	.reservation_details_mobile.cart .row.container_rd{
  		height:100%;
  	}
  	.close_cart {
  		position: absolute;
  		right: 22px;
  		top: 12px;
  	}
  	#next_process.modal{
  		min-height: 100% !important;
  		    top: 0px !important;
  	}
  	.header_cart{
  		float: left;
  		width: 100%;
  		border-bottom: 1px solid #bbb;
  		padding-bottom: 6px;
  	}
  	.modal .modal-footer{
  	    text-align: left !important;
  	}
  	#next_process.modal {
  		width: 100% !important;
  	}
  	#next_process.modal{
  		z-index: 99999 !important;
  	}
  	ul.inner_prop .select-wrap {
  		width: 31.33% !important;
  		margin-right: 6px;
  		text-align: center;
  	}
  	ul.inner_prop .select-wrap:nth-child(3) {
  		margin-right: 0px;
  	}
  	.select-wrap select{
  		width: 100% !important;
  	}
  	.btn-wrap .btn-custom{
  		margin-right: 8px;
  		margin-bottom: 25px;
  	}
  	.rate_list_table {
  		margin-top: 27px;
  	}
  	li .border_right {
  		min-height: 177px !Important;
  	}
  	.dropdown-content li {
  		width: 100% !important;
  	}

  	.sorts{
  		padding-left:0px !Important;
  	}
  	ul.viewed_by li {
  		float: left;
  	}
  	.label_filter.view_b{
  		float: left;
  		margin-right: 23px;
  		margin-top: 13px;
  		margin-left: 12px;
  		font-weight: bold;
  	}
  	.filter_container{
  		background: #fff;
  		margin-bottom: 17px;
  	}
  	.filter_container ul {
  		margin-bottom: 0px;
  	}
  	.filter_b{
  		float: right !important;
  	}
  	.sort2.outter_filter{float:right;}
  	.filter_b{
  		float: right !Important;
  	}
  	.label_filter {
  		margin-top: 15px !important;
  		font-size: 13px !important;
  		font-weight: bold;
  		margin-right: 13px;
  		color: #90bd90;
  	}
  	.scroll-to-fixed-fixed ul {
  		border-bottom: 1px solid #dadada !important;
  	}
  	.filter_container ul li{border:0px solid #000 !important;}
  	.filter_container{
  		box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-webkit-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-moz-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  	}
  	.filter_b{
  		width: 33.33%;
  		float: right !important;
  		    padding-left: 0px;
  	}
  	.filter_b ul{
  		float: left;
  		width: 100%;
  	}
  	.col.s12.m4.sorts{
  		float: left;
  		width: 66%;
  	}
  	.viewed_by li {
  		width: 50% !important;
  		font-size: 11px !important;
  	}
  	.filter_container ul li{
  		width: 100%;
  		font-size: 11px;
  	}
  	.col.s12.m4.filter_b {
  		float: right;
  		width: 33.33%;
  		    padding-right: 0px;
  	}
  	.price_filter{
  		width: 100%;
  	}
  	.room_filter li{width:100% !important;}
  	.label_filter{display:none;}
  	.sidebar_rev{
  		display:block;
  	}
  	.content_sidebar_rev .sidebar_rev{
  		display:block;
  	}
  	.book_now{
  		width: 100%;
  		margin: 0 0px;
  	}
  	#next_process table tr{
  		position: relative;
  		display: block;
  		height: 288px;
  		    margin-bottom: 40px;
  	}

  	td.addon_td.addon_name {
  		top: -5px !important;
  		left: 5px;
  		font-size: 19px;
  	}
  	td.addon_td {
  		position: absolute;
  	}

  	td.addon_td.addon_rate {
  		top: 30px;
  		left: 6px;
  		font-size: 22px;
  		color: #3ca98a;
  	}
  	table.striped > tbody > tr > td {
  		border-radius: 0;
  	}
  	td.addon_td.addon_slc12 {
  		top: 71px;
  		left: 200px;
  		position: absolute;
  	}
  	.g_details{
  		width:100% !important;
  	}
  	#back-to-rooms{
  		margin-left: 19px;
  		margin-top: -6px;
  	}
  	.button-collapse{display:none;}
  	#book_now_payment{
  		width: 100% !important;
  		margin-bottom: 20px !important;
  	}
  	td.addon_td.addon_description {
  		top: 128px;
  		left: 0px;
  		position: absolute;
  		width: 100%;
  	}
  	.btn_book{padding:0px;}
  	td.addon_slc1 {
  		top: 71px;
  		left: 0px;
  		position: absolute;
  	}
  	.header_tr{
  		height: 47px !important;
  		margin-bottom: 33px;
  	}
  	.addon_description div{
  		height: 79px;
  	}
  	td.addon_td.addon_request {
  		top: 195px;
  		left: 0px;
  		width: 100%;
  		position: absolute;
  	}
  	#next_process table thead{
  		display:none;
  	}
  	.addon_request textarea{
  		width: 100%;
  	}
  	div#next_process table tbody tr:first-child {
  		display: none;
  	}
  	.left-sidebar{
  		width:100% !important;
  	}
  	.content_sidebar_rev .sidebar_rev {
  		width: 100% !important;
  	}
  	.footer-copyright{
  		margin-bottom: 49px;
  	}
  	.row .width_two {
  		padding: 0px 31px !important;
  	}
  	#description .fotorama__stage__frame img{
  		width:100% !important;
  	}

  	.inner_prop li .border_right {
  		min-height: 313px !Important;
  	}

  	#description .modal-content .row *{
  		width:100% !important;
  	}

  	#description .modal-content .col.s5 .fotorama__stage{
  		min-height: 196px !important;
  	}
  	#description .fotorama{
  		height: 451px;
  	}
  	.section div#description {
  		width: 100% !important;
  		top: 0px !important;
  		height: 100% !important;
  		max-height: 92%;
  		z-index: 9999;
  	}
  	#description h5{
  		    color: darkorange;
  	}
  	#booking_inputs{width:100% !important;}
  	.button_header_input{
  		width: 78% !important;
  		margin-left: 24% !important;
  		text-align: center;
  	}
  	.header_cart .close_cart, .header_cart .col.s6, .header_cart .room_num{
  		font-size: 20px !important;
  	}
  	.mobile_opt{
  		position: absolute;
  		right: 54px;
  		top: 17px;
  		color: #fff;
  		display: inline-block;
  		font-size: 15px;
  	}
  	.sidebar_rev .title_details{
  		font-size: 18px;
  		    padding: 15px;
  	}
  	.room_filter li{width:100% !important;}
  	.label_filter{display:none;}
  	.sidebar_rev {
  		position: fixed;

  		padding: 0px !important;
  		background: #fff;
  		transition:linear 0.3s;
  		-webkit-transition:linear 0.3s;
  		-moz-transition:linear 0.3s;
  		z-index: 9999;
  		width: 100% !important;
  		left: 0px !important;
  	}
  	.content_sidebar_rev .sidebar_rev{
  		display:block;
  	}
  	.book_now{
  		width: 100%;
  		margin: 0 0px;
  	}
  	#next_process table tr{
  		position: relative;
  		display: block;
  		height: 288px;
  		    margin-bottom: 40px;
  	}
  	.next-process img{width:90%;}
  	.drag-target{display:block !important;}

  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {

  }

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {

  }

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
  	.mobile_opt{display:none;}
  	.sorts{
  		padding-left:0px !Important;
  		width: 58% !important;
  	}
  	ul.viewed_by li {
  		float: left;
  	}
  	.label_filter.view_b{
  		float: left;
  		margin-right: 23px;
  		margin-top: 13px;
  		margin-left: 12px;
  		font-weight: bold;
  	}
  	.filter_container{
  		background: #fff;
  		margin-bottom: 17px;
  	}
  	.filter_container ul {
  		margin-bottom: 0px;
  	}
  	.filter_b{
  		float: right !important;
  	}
  	.sort2.outter_filter{float:right;}
  	.filter_b{
  		float: right !Important;
  	}
  	.label_filter {
  		margin-top: 15px !important;
  		font-size: 13px !important;
  		font-weight: bold;
  		margin-right: 13px;
  		color: #90bd90;
  	}
  	.scroll-to-fixed-fixed ul {
  		border-bottom: 1px solid #dadada !important;
  	}
  	.filter_container ul li{border:0px solid #000 !important;}
  	.filter_container{
  		box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-webkit-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  		-moz-box-shadow: rgb(93, 93, 93) 0px 3px 0px;
  	}
  	.next-process img{width:90%;}
  	.filter_b{
  		padding-right: 0px !important;
  	}
  	.drag-target{display:none !important;}
  	.btn-custom.add-book{
  		background: #acacac!important;
  	}
  	.fotorama__stage__shaft, .fotorama__stage{
  		/* height: 197px !important; */
  	}
  }
  </style>	<!--<link type="text/css" rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
  -->
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/public/booking/css/jquery-ui.css"/>
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/public/booking/css/default-theme.css"/>
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/public/booking/css/fotorama.css"/>
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/public/booking/css/mbox.css"/>
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/public/theme-be/content-slider/css/carouseller.css"/>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/jquery.min.js"></script>
  	<!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  -->
  	<link type="text/css" rel="stylesheet" href="https://manage.instantonlinebookings.com/booking/theme/css/10"/>
  </head>
  <body>
  <style>
  #loading{
  	background-color: #fff;
  	height: 100%;
  	width: 100%;
  	position: fixed;
  	z-index: 1;
  	margin-top: 0px;
  	top: 0px;
  	z-index: 999999999999;
  }
  #loading-center, .loader-center{
  	width: 100%;
  	height: 100%;
  	position: relative;
  }
  #loading-center-absolute, .loader-center-absolute {
  	position: absolute;
  	left: 50%;
  	top: 50%;
  	height: 200px;
  	width: 200px;
  	margin-top: -100px;
  	margin-left: -100px;
  }
  #object, .loader-object{
  	text-align: center;
  	-webkit-animation: animate 1s infinite ease-in-out;
  	animation: animate 1s infinite ease-in-out;
  	margin-right: auto;
  	margin-left: auto;
  	margin-top: 60px;
  }
  #object img, .loader-object img{
  	width: 150px;
  }
  @-webkit-keyframes animate {
    0% { -webkit-transform: perspective(160px); }
    100% { -webkit-transform: perspective(160px) rotateX(-360deg); }
  }

  @keyframes animate {
    0% {
      transform: perspective(160px) rotateX(0deg) rotateY(0deg);
      -webkit-transform: perspective(160px) rotateX(0deg) rotateY(0deg);
    } 100% {
      transform: perspective(160px) rotateX(0deg) rotateY(-360deg);
      -webkit-transform: perspective(160px) rotateX(0deg) rotateY(-360deg);
    }
  }
  #msg, .loader-msg{
  	margin-top: 9px;
      text-align: center;
      font-weight: bold;
      font-size: 13px;

  }
  #msg span{
  	display: block;
  	overflow: hidden;
  	animation: animatetext 1s infinite ease-in-out;
  }

  @keyframes animatetext {
    0% {.msg-span{
  	  display:none;
    }
    50% {.msg-span{
  	  display:none;
    }
    #msg1{
  	 display: block;
    }

    }
    100% { }
  }
  </style>
  <div id="loading">

  </div>
      <div class="nav-wrapper padding-set">



    </nav>
    <div class="section no-pad-bot" id="index-banner"><div class="row">
  	<div class="col s12 m12 width_two">


  			<div class="datepicker2" current-date="Feb 9, 2019" prior-days="0" is-rolling="1" start-date="1970-01-01" end-date="1970-01-01" no-months="12"></div>

  			<form id="calendar_form" target="_parent" method="POST" action="https://www.villacacereshotel-naga.com/managebooking.php">
  			<input type="hidden" name="property_id" value="10" />
  			<input type="hidden" name="environment" value="live" />
  			<input type="hidden" name="arrival_date" value="" />
  			<input type="hidden" name="departure_date" value="" />
  			<div class="footer-panel">



  						<div class="input-field inline col s2 modify_field">
  				            <button class="waves-effect waves-light btn-large modal-trigger waves-effect tc1">Submit</button>
  						</div>
  			</form>
  	</div>
  </div>

  <style>
  .input-field.inline.col.s2.front_calendar {
      width: auto !important;
  }
  .footer-panel{
  	display: inline-flex;
      width: 100%;
      margin: 0 auto;
  }
  .footer-panel > .input-field {
      margin-right: 30px;
  }
  </style>
    </div>



  <style>
  .hotel_policy_popup .section td{
      text-align: center;
      width: 55px;
  }
  /* .waves-effect{
  	z-index: auto;
  } */
  .footer-copyright a{color:#fff;}
  .inner_filter .label_filter.filter_b {
  	position: absolute;
      left: -57px;
      z-index: 99;
      top: 2px;
  }
  .collapsible-header{
  	 padding: 0.3rem;
  }
  #pp2 h1{
  	font-size: 20px;
      margin-top: 30px;
      margin-bottom: 10px;
      font-weight: bold;
      color: rgb(3, 67, 146) !important;
  }

  #pp2 h2{
  	font-size: 18px;
      margin-top: 37px;
      margin-bottom: 12px;
      font-weight: bold;
  	    color: rgb(3, 67, 146) !important;
  }
  .terms_condition_text .waves-effect,
  .footer-copyright .waves-effect{
  	z-index:0 !important;
  }
  .ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
      width: 2.8em !important;
      height: 2.8em !important;
  }
  #calendar_form .ui-datepicker .ui-datepicker-prev, #calendar_form .ui-datepicker .ui-datepicker-next {
      width: 1.8em !important;
      height: 1.8em !important;
  }
  a.ui-datepicker-next.ui-corner-all{
  	background-image: url(https://manage.instantonlinebookings.com/public/booking/images/l-arrow.jpg);
      background-size: 100%;
  }
  a.ui-datepicker-prev.ui-corner-all{
  	background-image: url(https://manage.instantonlinebookings.com/public/booking/images/r-arrow.jpg);
      background-size: 100%;
  }
  .ui-widget-header .ui-icon {
      background-image: none !important;
  }
  .arrow_down_ward{display:none;}
  .popup_listroom{display:none;}
  @media screen and (min-width: 300px) and (max-width: 600px) {
  	.head_s1 {
  		width: 100%;
  		margin-bottom: 14px;
  	}
  	.mbox-wrapper{
  		z-index: 9999999 !important;
  	}
  	#back-to-rooms {
  		margin-left: 0px !important;
  	}
  	.arrow_down_ward{display:block;}
  	.popup_listroom{display:none;}
  	.page-footer{
  	    margin-bottom: 72px !important;
  	}
  	#chkrates{
  		width: 100% !important;
  	}
  }
  </style>

    <!-- Modal Structure -->

  	<!--  Scripts-->
  	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
  		function googleTranslateElementInit() {
  		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  	}
  	$( document ).ready(function() {
  				$('body').data('option',{"base_url":"https:\/\/manage.instantonlinebookings.com\/","logo":"https:\/\/manage.instantonlinebookings.com\/public\/images\/uploaded\/VCH\/logo\/IMG-1adr3.png","property_id":"10","page":"calendar","email_address":"Reservation@villacacereshotel.com","phone":"473-65-30","web_url":"https:\/\/www.villacacereshotel-naga.com\/"});
  			});



    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80734719-1', 'auto');
    ga('send', 'pageview','step1/calendar');



  	</script>

  	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  -->
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/jquery-ui.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/jquery.smartWizard.min.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/jquery-scrolltofixed.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/materialize.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/materialize2.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/init.js"></script>
  	<script src="https://manage.instantonlinebookings.com/public/booking/js/mbox.js"></script>
  	<script>
  Date.prototype.addDays = function(days) {
  	this.setDate(this.getDate() + parseInt(days));
  	return this
  };
  var toggle_id,
  	elem_clone;
  var win_Orient = '';
  var win_height = 0;
  var view_month = 2;
  if (screen.height > screen.width) {
  	  win_Orient = 'portrait';
      } else {
        win_Orient = 'landscape';
  }

  function mobile_tablet_js(winOrient){
  	if (typeof window.orientation !== 'undefined') {
  		view_month = 1;
  		if(winOrient == 'portrait'){
  			//alert('asdfasdfasdf123123');
  			//mobile
  			if(screen.width < 1000){
  				win_height = $(window).height();
  				$('.sidebar_rev').css({"height":win_height+"px"});
  				win_height = win_height - 50;

  				$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});

  				$(function(){
  					$('.view-rate').click(function(e){
  						e.preventDefault();
  						toggle_id = $(this).attr('toggle-id');
  						var room_title = $(this).attr('room-title');
  						elem_clone = '';
  						$('.promo_list').each(function(){
  							var drop_id = $(this).attr('toggle-id');
  							if(drop_id == toggle_id){
  								elem_clone = $(this).find('.inner_listing').clone();
  								$(this).find('.inner_listing').remove();
  								$('body').addClass('popup_mode');
  								$('.popup_listroom .content_listpopup').html(elem_clone);
  								// $('.popup_listroom .content_listpopup .action-top').remove();
  								$('.popup_listroom').addClass('active_pu');
  							}
  						});
  						$('.header_title_room').remove();
  						$('.popup_listroom.active_pu .head_list_popup').append('<div class="header_title_room">'+room_title+'</div>');
  					});

  					$('.featured-view-room').click(function (){
  						var rate_id = $(this).attr('rate_id');

  						// $('.exlusive_view').click();
  						// $('.show[data-id="'+rate_id+'"] .view-rate').click();

  						elem_clone = $('li[data-id="'+rate_id+'"] .inner_listing').clone();
  						$('.show[data-id="'+rate_id+'"] .inner_listing').remove();
  						$('body').addClass('popup_mode');
  						$('.popup_listroom .content_listpopup').html(elem_clone);
  						$('.popup_listroom').addClass('active_pu');
  					});

  					$(document).on('click','a.modal-action.modal-close.waves-effect.waves-green.btn-flat',function(){
  						$('#description').removeClass('description_mobile');
  					});

  					$(document).on('click','.head_list_popup1',function(){
  						$('#description').removeClass('description_mobile');
  					});

  					$(document).on('click','.head_list_popup i',function(){
  						if($('.popup_listroom').hasClass('active_pu')){
  							$('.popup_listroom').removeClass('active_pu');
  							$('body').removeClass('popup_mode');
  						}
  						$('.promo_list').each(function(){
  							var drop_id = $(this).attr('toggle-id');
  							if(drop_id == toggle_id){
  								$(this).html(elem_clone);
  							}
  						});
  					});
  				});

  			}

  			$(document).click('click','.close_addOn',function(){
  				$('.reservation_details_mobile').hide(500);
  				//$('.book_now')[0].click();
  				//$('.reservation_details_mobile').remove();
  			});


  			$(document).on('click','#back-to-rooms',function(){
  				$('.reservation_details_mobile').show(500);
  				if($('.reservation_details_mobile').hasClass('cart')){
  					$('.reservation_details_mobile').removeClass('cart')
  				}
  					//$('.content_sidebar_rev *').remove();
  			});

  			$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  			$('.reservation_details_mobile').click(function(){
  				$(this).addClass('cart');
  				if($('.close_cart').length == 0){
  					$(this).find('.header_cart').append('<div class="close_cart">X</div>');
  				}
  				$('.close_cart').show();

  				//if($('.room_wrapper .sidebar_rev').length == 1){
  				var clone_elem = $('.room_wrapper .sidebar_rev').clone();
  				$('.content_sidebar_rev *').remove();
  				//$('.room_wrapper .sidebar_rev').remove();
  				$('.content_sidebar_rev').append(clone_elem);
  				//$('#step1 .sidebar_rev .book_now').removeClass('book_now');
  					//$('.content_sidebar_rev')
  				//}

  			});

  			$('.sidebar_rev .title_details').click(function(){
  				if($('.sidebar_rev').hasClass('active_cart')){
  					$('.sidebar_rev').removeClass('active_cart');
  					$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  				}else{
  					$('.sidebar_rev').addClass('active_cart');
  					$('.sidebar_rev').css({"bottom":"0px"});
  				}
  			});

  			$(document).on('click', '.close_cart', function(){
  				$('.reservation_details_mobile').removeClass('cart');
  				if($('.close_cart').length > 0){
  				//$('.close_cart').remove();
  				}
  				$('.close_cart').hide();
  			});

  			$(document).on('click', '.close_addOn', function(){
  				if($('.sidebar_rev').hasClass('active_cart')){
  						$('.sidebar_rev').removeClass('active_cart');
  						$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  					}
  				});

  			$(document).on('click', '.remove-book', function(){
  				var current_num = (parseInt($('.rev_count span').html()) > 0) ? parseInt($('.rev_count span').html()) - 1 : 0;
  				$('.rev_count span').html(current_num);
  			});
  		}else{
  			$('.sidebar_rev').css({"height":"auto"});
  			$('.sidebar_rev').css({"bottom":"auto"});

  		}
  	}else{
  		$(function(){
  			$('.view-rate').click(function(e){
  				e.preventDefault();
  				var id = $(this).attr('toggle-id');

  				$('.promo_list').each(function(){
  				var drop_id = $(this).attr('toggle-id');
  					if($(this).hasClass('active-toggle')){
  						$(this).animate({height: 'toggle'});
  						$(this).removeClass('active-toggle');
  					}else{
  						if(drop_id == id){
  							$(this).addClass('active-toggle');
  							$(this).animate({height: 'toggle'});
  						}
  					}

  				});
  			});



  			var fx = true;
  			$('.featured-view-room').click(function (){

  				var rate_id = $(this).attr('rate_id');

  				$('.exlusive_view').click();

  				if(fx){
  					$('#staggered2 > li').each(function (){
  						ids = $(this).attr('data-id');
  						// console.log($(this).find('.each_boxes').offset().top);
  						$('#goto-'+ids).data('loc',$(this).find('.each_boxes').offset().top);
  					});
  					fx = false;
  				}



  				$('.show[data-id="'+rate_id+'"] .view-rate').click();



  				$('html,body').animate({
  				scrollTop: $("#goto-"+rate_id).data('loc') - 80
  				}, 'slow');

  			});
  		})
  	}
  }mobile_tablet_js(win_Orient);



  function doOnOrientationChange(){

  	if (screen.height > screen.width) {
  		win_Orient = 'portrait';
  	} else {
  		win_Orient = 'landscape';
  	}

  	setTimeout(function(){
  		win_height = $(window).height();
  		mobile_tablet_js(win_Orient);
  	}, 2000)

      mobile_tablet_js(win_Orient);
  }

  window.addEventListener('orientationchange', doOnOrientationChange);

  $(function(){

  	var startDate = new Date();
   	var count = 0;
   	var elem;
   	var price_s = [];

  	var window_width = $(window).height();



  	$('#c_in, #c_out').click(function(){
  		$(".datepicker").show(500);
  	});

  	$('.change-booking').click(function(){
  		dataPicker($('.datepicker_changebook'));
  	});

  	if($('.view-rate').length > 0){
  		var count = 0;
  		loops($('.view-rate'), 'toggle-id', count);
  		loops($('.promo_list'), 'toggle-id', count);
  	}

  	$('.close_btn').click(function(e){
  		e.preventDefault();

  		var close_btn = $(this).attr('data-id');

  		$('.data_sec ').each(function(){
  			var elem = $(this);
  			var section = elem.attr('data-id');
  			if(close_btn == section){
  				$(this).hide(600);
  				setInterval(function(){
  					elem.remove();
  					var len = $('.data_sec').length;
  					if(len == 0){
  						$('.room_details').hide(600);
  					}
  				}, 900)
  			}
  		});
  	});

  	$(document).on('change', '.no_of_rooms', function(){
  		var val = $(this).val();
  		var parent = $(this).parent().parent();
  		if(val > 0){
  			//parent.find('.add-book').css({"background":"#333"});
  			parent.find('.add-book').addClass('active_rooms');
  			//parent.find('.add-book').prop("disabled", true);
  		}else{
  			parent.find('.add-book').removeClass('active_rooms');
  		}
  	});

  	if($('.filter_container').length > 0){
  		$('.filter_container').scrollToFixed();
  	}


  	if($('.scrollfixed').length > 0){
  		$('.scrollfixed').scrollToFixed();
  	}

  	if($('.tc1').length > 0 ){
  		lean_modal($('.tc1'));
  	}

  	if($('.featured').length > 0 ){
  		lean_modal($('.featured'));
  	}

  	if($('.description').length > 0 ){
  		lean_modal($('.description'));
  	}


  	if($('.chkrates').length > 0 ){
  		lean_modal($('.chkrates'));
  	}

  	if($('.availChart').length > 0 ){
  		lean_modal($('.availChart'));
  	}

  	if($('.hp1').length > 0 ){
  		lean_modal($('.hp1'));
  	}

  	if($('.pp').length > 0 ){
  		lean_modal($('.pp'));
  	}

  	if($('.next_process').length > 0 ){
  		lean_modal($('.next_process'));
  	}

  	/* if($('#avail_chart1').length > 0){
  		//$('#avail_chart1').leanModal();
  		lean_modal($('#avail_chart1'));
  	}
  	 */
  	if($('#smartwizard').length > 0){
  	$('#smartwizard').smartWizard({
  		selected: 0,
  		theme: 'arrows',
  		transitionEffect:'fade'
  	});
  	}

  	function modal_init(elem){
  		elem.modal({
  			startingTop: '2%'
  		});
  	}

  	if($('#date_popup').length > 0){
  		dataPicker($('#date_popup'));
  	}

  	if($('.datepicker').length > 0){
  		dataPicker($('.datepicker'));
  	}

  	function dataPicker(elem){
  		var select_date = !0;
  		var todayDate = $('#booking_inputs').attr("current-date");
  		var priorarrival = $('#booking_inputs').attr("prior-days");
  		var is_rolling = $('#booking_inputs').attr("is-rolling");
  		var valid_from = $('#booking_inputs').attr("start-date");
  		var valid_to = $('#booking_inputs').attr("end-date");
  		var no_months = $('#booking_inputs').attr("no-months");

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
  		var d1 = '', d2 = '';


  		elem.datepicker({
  			minDate: dateToday,
  			numberOfMonths: view_month,
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
  					if(d1){
  						$('body').css({"overflow":"hidden"});
  					}
  					if(d2){
  						$('body').css({"overflow":"unset"});
  					}
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

  	var dates = '';
  	if($('.datepicker2').length > 0){
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
  		var d1, d2, num_months;

  		if($(window).width() > 300 && $(window).width() < 900){
  			num_months = 1;
  		}else{
  			num_months = 2;
  		}

  		$('.datepicker2').datepicker({
  				numberOfMonths: num_months,
  				changeMonth: !1,
  				changeYear: !1,
  				showButtonPanel: !0,
  				minDate: dateToday,
  				maxDate: maxDateRolling,
  				"showButtonPanel":  false,
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

  						if ($('input[name="arrival_date"]').length > 0) {
  							$('input[name="arrival_date"]').val(d1);
  							$('input[name="departure_date"]').val(d2)
  						}
  					}
  				},
  				onChangeMonthYear: function(year, month, inst) {}
  			});
  	}

  	//calendar submit
  	$('#check_rates').click(function (event){
  		event.preventDefault();
  		var calendar_form = $('#calendar_form').serialize();
  		$('#calendar_form').submit();
  	});

  	$('#search_new').click(function (event){
  		event.preventDefault();
  		var calendar_form = $('#calendar_form').serialize();
  		$('#calendar_form').submit();
  	});
  	$('.filter_mobile > a').click(function(e){
  		e.preventDefault();
  		if($('ul.sort2.outter_filter.room_filter.active_fil').hasClass('active_drop')){
  			$('ul.sort2.outter_filter.room_filter.active_fil').removeClass('active_drop');
  		}else{
  			$('ul.sort2.outter_filter.room_filter.active_fil').addClass('active_drop');
  		}
  	});

  	//FILTERS
  	$('ul.sort2 li.price_filter').click(function(){
  		elem = $(this);
  		var ev = $(this).attr('data-c'),
  			data = ''.
  			each_container = '',
  			types = '';
  		var view = $('.property_view').attr('data-view');
  		var sort = $('.sort2').attr('data-sort');
  		var filter_secion = elem.attr('data-filter');
  		var parent_id = elem.attr('data-parent-id');

  		if(view == 'room_views'){
  			//container view id
  			if(filter_secion == 'outter'){
  				// $('ul.outter_filter.sort2 > li').removeClass('active_filter');
  				if($('ul.outter_filter.sort2 > li i.fa-arrow-down').length == 0){
  					$('ul.outter_filter.sort2 > li').append('<i class="fa fa-arrow-down"></i>');
  				}
  				$(this).addClass('active_filter');

  				each_container = '#staggered';
  				//types = 'room_view';

  				if(ev == 'price_c'){
  					data = 'price';
  				}else if(ev == 'alloc_c'){
  					data = 'allocation';
  				}else if(ev == 'name_c'){
  					data = 'name';
  				}
  			}else{
  				// $('.p_'+parent_id+' ul.inner_filter.sort2 > li').removeClass('active_filter');
  				$(this).addClass('active_filter');
  				if($('.p_'+parent_id+' ul.inner_filter.sort2 > li i.fa-arrow-down').length == 0){
  					$('.p_'+parent_id+' ul.inner_filter.sort2 > li').append('<i class="fa fa-arrow-down"></i>');
  				}
  				$section = $(this).data('section');
  				each_container = '.p_'+parent_id+' ul.inner_prop.inner_'+$section;

  				if(ev == 'price_c'){
  					data = 'price';
  				}else if(ev == 'rate_c'){
  					data = 'rate';
  				}
  			}
  		}else{
  			if(filter_secion == 'outter'){
  				// $('ul.outter_filter.sort2 > li').removeClass('active_filter');
  				$(this).addClass('active_filter');

  				each_container = '#staggered2';
  				//types = 'room_view';

  				if(ev == 'price_c'){
  					data = 'price';
  				}else if(ev == 'rate_c'){
  					data = 'rate';
  				}

  			}else{
  				// $('.p_'+parent_id+' ul.inner_filter.sort2 > li').removeClass('active_filter');
  				$(this).addClass('active_filter');
  				each_container = '.p_'+parent_id+' ul.inner_prop';

  				if(ev == 'price_c'){
  					data = 'price';
  				}else if(ev == 'alloc_c'){
  					data = 'allocation';
  				}else if(ev == 'name_c'){
  					data = 'name';
  				}
  			}
  		}

  		$(each_container+" > li").sort(sort_li).appendTo(each_container);
  		// $(each_container+" > li").sort(sort_li2).appendTo(each_container);
  		function sort_li(a, b) {

  			// if(a.dataset.allocation > 0 && b.dataset.allocation > 0){
  				if(view == 'room_views'){

  					if(sort == 'lh'){
  						$('.sort2').attr('data-sort', 'hl');
  						elem.find('i.fa').removeClass('fa-arrow-up');
  						elem.find('i.fa').addClass('fa-arrow-down');
  						return ($(b).data(data)) < ($(a).data(data)) ? 1 : -1;
  					}else{
  						$('.sort2').attr('data-sort', 'lh');
  						elem.find('i.fa').removeClass('fa-arrow-down');
  						elem.find('i.fa').addClass('fa-arrow-up');
  						return ($(b).data(data)) > ($(a).data(data)) ? 1 : -1;
  					}
  				}else{
  					if(sort == 'lh'){
  						$('.sort2').attr('data-sort', 'hl');
  						elem.find('i.fa').removeClass('fa-arrow-up');
  						elem.find('i.fa').addClass('fa-arrow-down');
  						return ($(b).data(data)) < ($(a).data(data)) ? 1 : -1;
  					}else{
  						$('.sort2').attr('data-sort', 'lh');
  						elem.find('i.fa').removeClass('fa-arrow-down');
  						elem.find('i.fa').addClass('fa-arrow-up');
  						return ($(b).data(data)) > ($(a).data(data)) ? 1 : -1;
  					}
  				}
  			// }


  		}

  		// function sort_li2(a, b) {
  			// return ($(b).data('allocation')) > ($(a).data('allocation')) ? 1 : -1;
  		// }
  	});




  	//FILTERS END

  	Materialize.updateTextFields();
  	$('.collapsible').collapsible();
  	$('.input-field select').material_select();

  	if( $('.sorts').length > 0 ){
  		$('.sorts .viewed_by li').click(function(){

  			var val = $(this).data('fil');
  			$('.viewed_by li').removeClass('active_filter');
  			$(this).addClass('active_filter');
  			if(val == 'rate'){
  				$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.room_view > li', 'remove', 'show');
  				loop_delay( '.room_view > li', 'add', 'hide');
  				loop_delay( '.rate_view > li', 'add', 'show');
  				loop_delay( '.rate_view > li', 'remove', 'hide');
  				loop_delay( '.day-tour', 'add', 'hide');
  				loop_delay( '.day-tour', 'remove', 'show');
  			}else if(val == 'room'){
  				$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.rate_view > li', 'remove', 'show');
  				loop_delay( '.rate_view > li', 'add', 'hide');
  				loop_delay( '.room_view > li', 'add', 'show');
  				loop_delay( '.room_view > li', 'remove', 'hide');
  				loop_delay( '.day-tour', 'add', 'hide');
  				loop_delay( '.day-tour', 'remove', 'show');
  			}else if(val == 'daytour'){
  				$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.room_view > li', 'remove', 'show');
  				loop_delay( '.room_view > li', 'add', 'hide');
  				loop_delay( '.rate_view > li', 'remove', 'show');
  				loop_delay( '.rate_view > li', 'add', 'hide');
  				loop_delay( '.day-tour', 'add', 'show');
  				loop_delay( '.day-tour', 'remove', 'hide');

  			}

  			$('.main_filter .sort2.outter_filter').each(function(){
  				var type = $(this).attr('data-type');
  				if(val == type){
  					$('.sort2.outter_filter').removeClass('active_fil');
  					$(this).addClass('active_fil');
  				}
  			});

  		})
  	}

  	if( $('.tab-bar').length > 0 ){
  		$('.tab-bar .tab-bar-inner a').click(function(e){
  			e.preventDefault();
  			var val = $(this).data('fil');
  			$('.tab-bar-inner a').removeClass('active_tab');
  			$(this).addClass('active_tab');
  			$('html, body').animate({
  			  scrollTop: 470
  			}, 800);
  			if(val == 'rate'){
  				////$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.room_view > li', 'remove', 'show');
  				loop_delay( '.room_view > li', 'add', 'hide');
  				loop_delay( '.rate_view > li', 'add', 'show');
  				loop_delay( '.rate_view > li', 'remove', 'hide');
  				loop_delay( '.day-tour', 'add', 'hide');
  				loop_delay( '.day-tour', 'remove', 'show');
  				$('.sidebar_rev').removeClass('active_cart');
  				$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  			}else if(val == 'room'){
  				////$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.rate_view > li', 'remove', 'show');
  				loop_delay( '.rate_view > li', 'add', 'hide');
  				loop_delay( '.room_view > li', 'add', 'show');
  				loop_delay( '.room_view > li', 'remove', 'hide');
  				loop_delay( '.day-tour', 'add', 'hide');
  				loop_delay( '.day-tour', 'remove', 'show');
  				$('.sidebar_rev').removeClass('active_cart');
  				$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  			}else if(val == 'daytour'){
  				////$('.property_view').attr('data-view', val+'_views');
  				loop_delay( '.room_view > li', 'remove', 'show');
  				loop_delay( '.room_view > li', 'add', 'hide');
  				loop_delay( '.rate_view > li', 'remove', 'show');
  				loop_delay( '.rate_view > li', 'add', 'hide');
  				loop_delay( '.day-tour', 'add', 'show');
  				loop_delay( '.day-tour', 'remove', 'hide');
  				$('.sidebar_rev').removeClass('active_cart');
  				$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  			}else if(val == 'reservation'){
  				if($('.sidebar_rev').hasClass('active_cart')){
  					$('.sidebar_rev').removeClass('active_cart');
  					$('.sidebar_rev').css({"bottom":"-"+win_height+"px"});
  				}else{
  					$('.sidebar_rev').addClass('active_cart');
  					$('.sidebar_rev').css({"bottom":'0px'});
  				}
  			}

  			$('.sort2.outter_filter').each(function(){
  				var type = $(this).attr('data-type');
  				if(val == type){
  					$('.sort2.outter_filter').removeClass('active_fil');
  					$(this).addClass('active_fil');
  				}
  			});

  			if($('.popup_listroom').hasClass('active_pu')){
  				$('.popup_listroom').removeClass('active_pu');
  				$('body').removeClass('popup_mode');
  			}
  		})
  	}

  	$('.click-to-toggle').on('click', function(e) {
  		if($(this).hasClass('active')){
  			$(this).removeClass('active');
  		}else{
  			$(this).addClass('active');
  		}
  	})

  	relation_loop($('.drop_con .inner_prop > li'), 'data-rate-id', count);
  	//loops($('.drop_con .inner_prop > li'), 'data-rate-id', count);
  	//loops($('.drop_con .inner_prop > li .add-book'), 'data-rate-id', count);

  	function loop_delay(elem, action, cls){
  		$(elem).delay(500).each(function(i) {
  		      if(action == 'remove'){
  					$(this).removeClass(cls);
  				}else if(action == 'add'){
  					$(this).addClass(cls);
  				}
  		})
  	}

  	function relation_loop(elem, attr, count){
  		elem = elem;
  		elem.each(function(){
  			$(this).attr(attr, count);
  			$(this).find('.add-book').attr(attr, count);
  			count++
  		});
  		count = 0;
  	}

  	function loops(elem, attr, count){
  		elem = elem;
  		elem.each(function(){
  			$(this).attr(attr, count);
  			count++
  		});
  		count = 0;
  	}

  	if($('#staggered2 > li').hasClass('show')){
  		$('#staggered2 > li').removeClass('show');
  		$('#staggered2 > li').addClass('hide');
  	}

  	$('')

  });

  function number_format(number, decimals, decPoint, thousandsSep) {
    //   example 1: number_format(1234.56)
    //   returns 1: '1,235'
    //   example 2: number_format(1234.56, 2, ',', ' ')
    //   returns 2: '1 234,56'
    //   example 3: number_format(1234.5678, 2, '.', '')
    //   returns 3: '1234.57'
    //   example 4: number_format(67, 2, ',', '.')
    //   returns 4: '67,00'
    //   example 5: number_format(1000)
    //   returns 5: '1,000'
    //   example 6: number_format(67.311, 2)
    //   returns 6: '67.31'
    //   example 7: number_format(1000.55, 1)
    //   returns 7: '1,000.6'
    //   example 8: number_format(67000, 5, ',', '.')
    //   returns 8: '67.000,00000'
    //   example 9: number_format(0.9, 0)
    //   returns 9: '1'
    //  example 10: number_format('1.20', 2)
    //  returns 10: '1.20'
    //  example 11: number_format('1.20', 4)
    //  returns 11: '1.2000'
    //  example 12: number_format('1.2000', 3)
    //  returns 12: '1.200'
    //  example 13: number_format('1 000,50', 2, '.', ' ')
    //  returns 13: '100 050.00'
    //  example 14: number_format(1e-8, 8, '.', '')
    //  returns 14: '0.00000001'

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec)
      return '' + (Math.round(n * k) / k)
        .toFixed(prec)
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || ''
      s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
  }
  function lean_modal(elem){
  	elem.leanModal();
  }

  function sortMeBy(arg, sel, elem, order) {
          var $selector = $(sel),
          $element = $selector.children(elem);
          $element.sort(function(a, b) {
                  var an = parseInt(a.getAttribute(arg)),
                  bn = parseInt(b.getAttribute(arg));
                  if (order == "asc") {
                          if (an > bn)
                          return 1;
                          if (an < bn)
                          return -1;
                  } else if (order == "desc") {
                          if (an < bn)
                          return 1;
                          if (an > bn)
                          return -1;
                  }
                  return 0;
          });
          $element.detach().appendTo($selector);
  }


  $( document ).ready(function() {
  	sortMeBy('data-price','#staggered','li','asc');
  	sortMeBy('data-allo','#staggered','li','desc');

  	if($(window).width() > 300 && $(window).width() < 900){


  		$('.form_blocker_handler').click(function (e){
  			e.preventDefault();
  			if(! $('.section.no-pad-bot.banner_section').hasClass('open_calendar_top')){
  				$('.close_handler').show();
  				$('.section.no-pad-bot.banner_section').addClass('open_calendar_top');
  				$('.form_blocker_handler').hide();
  				// $('body').css({'overflow':'hidden'});
  			}
  		});

  		$('.close_handler').click(function (e){
  			e.preventDefault();
  			if($('.section.no-pad-bot.banner_section').hasClass('open_calendar_top')){
  				$('.close_handler').hide();
  				$('.section.no-pad-bot.banner_section').removeClass('open_calendar_top');
  				$('.form_blocker_handler').show();
  				$( ".datepicker" ).hide("400");
  			}
  		})

  		$(window).scroll(function(e){
  			e.stopPropagation();
  			if ($(window).scrollTop() > 110){
  				// $('.close_handler').hide();
  				// $('.section.no-pad-bot.banner_section').removeClass('open_calendar_top');
  				// $('.form_blocker_handler').show();
  				$('.banner_section').addClass('fixed_scroll');
  				$('#header.black-c.black-1').addClass('fixed_nav_scroll');
  			}else{
  				$('.banner_section').removeClass('fixed_scroll');
  				$('#header.black-c.black-1').removeClass('fixed_nav_scroll');
  			}
  		});

  	}
  });
  </script>
      <script src="{{ URL::asset('fullcalendar/calendar.js')}}"></script>
@endsection
