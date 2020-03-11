
$(document).ready(function () {
  var latitude;
  var longitude;
  var city;
  var api;
  var apiKey = '530790425aad192ccc464fa394e02d2c';
  var coordinates;
  var KcurrentTemperature;
  var FcurrentTemperature;
  var CcurrentTemperature;
  var weatherDescriptionLower;
  var weatherDescription;
  var currentLocation;


  $.getJSON('https://ipinfo.io', function(dataFromIP){

    //coordinates = 16.189860, 120.002251;

    latitude = 16.1897304;
    longitude = 120.0024986;

    api = 'http://api.openweathermap.org/data/2.5/weather?lat='+latitude+'&lon='+longitude+'&appid='+apiKey;
    city = "Alaminos";

      $.getJSON('https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?lat=' + latitude +'&lon=' + longitude + '&appid='
                + apiKey, function(dataFromAPI) {

        currentLocation = dataFromAPI.name;
        weatherDescriptionLower = dataFromAPI.weather[0].description;

        weatherDescription = weatherDescriptionLower.replace(/(^|\s)[a-z]/g,function(f){return f.toUpperCase();});
        console.log(weatherDescription);

        KcurrentTemperature = dataFromAPI.main.temp;
        FcurrentTemperature = Math.round((KcurrentTemperature)*(9/5) - 459.67);
        CcurrentTemperature = Math.round(KcurrentTemperature - 273);
        var icon = dataFromAPI.weather[0].icon;

        $('#current-location').html(city);
        $('#weather-description').html(weatherDescription);
        var iconSrc = 'http://openweathermap.org/img/w/' + icon + '.png';
        $('#temperature').prepend('<img src="' + iconSrc + '">');
        tempSwap = false;
        $('#temperature').html(CcurrentTemperature + " \xB0C");

        $('#temperature').prepend('<img src="' + iconSrc + '">');

          $('#toggle').click(function(){
            if(tempSwap === false) {
              $('#temperature').html(CcurrentTemperature + " \xB0C");
              tempSwap = true;
              $('#temperature').prepend('<img src="' + iconSrc + '">');

            } else if (tempSwap === true) {
              $('#temperature').html(FcurrentTemperature + " \xB0F");
              tempSwap = false;
              $('#temperature').prepend('<img src="' + iconSrc +'">');

            }});

        });


    });

});


/*
$.getJSON(api, function(dataFromAPI) {
    var temperature = dataFromAPI.main.temp;
    console.log(temperature);

} )
*/
