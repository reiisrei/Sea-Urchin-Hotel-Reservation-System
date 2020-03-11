var n_standard = 0;
var n_quad = 0;
var n_family = 0;
var n_barkada = 0;

function standardRoom() {
  n_standard = n_standard + Number($("#selectBoxStandard").val());
  var xSumStandard = Number($("#n_adultStandard").val()) + Number($("#n_childrenStandard").val());
  var totalStandard = {{$availableRooms[0]['nightRate'] * $n_nights }} * n_standard;

  if ($('select#selectBoxStandard option').length > 1 && Number($("#selectBoxStandard").val()) !== 0) {
    $('#selectBoxStandard').find("option:nth-last-child(-n+" + $('#selectBoxStandard').val() + ")").remove();
        $("#roomDetailStandard ul").html('<li><strong>Standard Room - Regular Online Rate</strong> </li>'+
        '<li class="pull-right"><h4 style="color:darkorange">PHP ' + totalStandard + '</h4></li>'+
        '<li>Number of night(s): {{$n_nights}} </li>'+
        '<li>Number of person(s): ' + xSumStandard + '</li>'+
        '<li class="hr">Number of room(s): '+ n_standard +'</li><hr />'
      );

      $.ajax({
           url: "ReservationController.php",
           data: { role: $roleID }
      });

  }else {
    alert("Select No. of rooms");
  }
}

  function quadRoom()
{
   var xSumQuad = Number($("#n_adultQuad").val()) + Number($("#n_childrenQuad").val());
   n_quad = n_quad + Number($("#selectBoxQuad").val());
   var totalQuad = {{$availableRooms[1]['nightRate'] * $n_nights}} * n_quad;

  if ($('select#selectBoxQuad option').length > 1 && Number($("#selectBoxQuad").val()) !== 0) {
     $('#selectBoxQuad').find("option:nth-last-child(-n+" + $('#selectBoxQuad').val() + ")").remove();
         $("#roomDetailQuad ul").html('<li><strong>Quad Room - Regular Online Rate</strong> </li>'+
            '<li class="pull-right"><h4 style="color:darkorange">PHP ' + totalQuad + '</h4></li>'+
            '<li>Number of night(s): {{$n_nights}} </li>').append('<li>Number of person(s): ' + xSumQuad + '</li>'+
            '<li class="hr">Number of room(s): '+ n_quad +'</li><hr />'
          );
  }else {
      alert("Select No. of rooms");
  }
}

function familyRoom()
{
  var xSumFamily = Number($("#n_adultFamily").val()) + Number($("#n_childrenFamily").val());
  n_family = n_family + Number($("#selectBoxFamily").val());
  var totalFamily = {{$availableRooms[2]['nightRate'] * $n_nights}} * n_family;

  if ($('select#selectBoxFamily option').length > 1 && Number($("#selectBoxFamily").val()) !== 0) {
    $('#selectBoxFamily').find("option:nth-last-child(-n+" + $('#selectBoxFamily').val() + ")").remove();

        $("#roomDetailFamily ul").html('<li ><strong>Family Room - Regular Online Rate</strong> </li>'+
            '<li class="pull-right"><h4 style="color:darkorange">PHP ' + totalFamily + '</h4></li>'+
            '<li>Number of night(s): {{$n_nights}} </li>').append('<li>Number of person(s): ' + xSumFamily + '</li>' +
            '<li class="hr">Number of room(s): '+ n_family +'</li><hr />'
          );
  }else {
    alert("Select No. of rooms");
  }
}

function barkadaRoom()
{
  var xSumBarkada = Number($("#n_adultBarkada").val()) + Number($("#n_childrenBarkada").val());
  n_barkada = n_barkada + Number($("#selectBoxBarkada").val());
  var totalBarkada = {{$availableRooms[3]['nightRate'] * $n_nights}} * n_barkada;

  if ($('select#selectBoxBarkada option').length > 1 && Number($("#selectBoxBarkada").val()) !== 0) {
    $('#selectBoxBarkada').find("option:nth-last-child(-n+" + $('#selectBoxBarkada').val() + ")").remove();
        $("#roomDetailBarkda ul").html("<li ><strong>Barkada's Room - Regular Online Rate</strong> </li>"+
        '<li class="pull-right"><h4 style="color:darkorange">PHP ' + totalBarkada + '</h4></li>'+
        '<li>Number of night(s): {{$n_nights}} </li>').append('<li>Number of person(s): ' + xSumBarkada + '</li>' +
        '<li class="hr">Number of room(s): '+ n_barkada +'</li><hr />'
      );
  }else {
    alert("Select No. of rooms");
  }
}
