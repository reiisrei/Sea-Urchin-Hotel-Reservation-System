
<div class="reserve-form-area">
  {!! Form::open(['url' => '/check', 'id' => 'ajax-reservation-form']) !!}
  <ul class="clearfix">
    <div class="form-group forms">
      <li class="li-input">
        {{ Form::label('checkin', 'ARRIVAL') }}
        {{ Form::text('start_date', '', ['id' => 'dpd1', 'placeholder' => '&#xf073;' ,'class' => 'date-selector' ,'required', 'autocomplete' => 'off', 'readonly']) }}
      </li>

      <li class="li-input">
        {{ Form::label('checkout', 'DEPARTURE') }}
        {{ Form::text('end_date', '', ['id' => 'dpd2', 'placeholder' => '&#xf073;' , 'class' => 'date-selector' ,'required', 'autocomplete' => 'off' ,'readonly']) }}
      </li>

      {{-- <li class="li-select">
        {{ Form::label('rooms', 'ROOMS') }}
        {{ Form::select('adult', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),'', ['class' => 'pretty-select' ]) }}
      </li>

      <li class="li-select">
        {{ Form::label('adult', 'ADULT') }}
        {{ Form::select('adult', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),'', ['class' => 'pretty-select' ]) }}
      </li>

      <li class="li-select">
        {{ Form::label('children', 'CHILDREN') }}
        {{ Form::select('children', array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),'', ['class' => 'pretty-select' ]) }}
      </li> --}}
      <li>
        <div class="button-style-1 ">
            {{ Form::submit('SEARCH', ['style' => 'margin-left:0px; padding: 0px;']) }}
        </div>
      </li>
  </ul>
  {!! Form::close() !!}
</div>
