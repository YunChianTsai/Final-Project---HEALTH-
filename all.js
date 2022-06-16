/*jslint browser:true */
'use strict';

var weatherConditions = new XMLHttpRequest();
var weatherForecast = new XMLHttpRequest();
var cObj;
var fObj;

// GET THE CONDITIONS
weatherConditions.open('get', 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-F132D20E-0B3A-4B6A-A24F-35BBAA2CD044', true);
weatherConditions.responseType = 'text';
weatherConditions.send(null);

weatherConditions.onload = function() {
    if (weatherConditions.status === 200){
        cObj = JSON.parse(weatherConditions.responseText); 
        // console.log(cObj); 

        // area of taipei
        var tainan = cObj.records.location[60].parameter[0].parameterValue + " " + cObj.records.location[60].parameter[2].parameterValue;
        
        // temperature
        var tnTemp = cObj.records.location[60].weatherElement[3].elementValue;
        var h_tnTemp = cObj.records.location[60].weatherElement[14].elementValue;
        var l_tnTemp = cObj.records.location[60].weatherElement[16].elementValue;
        var phenmn = cObj.records.location[60].weatherElement[20].elementValue;
        
        document.getElementById('location').innerHTML = tainan;
        document.getElementById('station').innerHTML = "觀測站別：" + cObj.records.location[60].locationName;
        document.getElementById('temperature').innerHTML = tnTemp + "&deg";
        document.getElementById('h_l_temperature').innerHTML = "最高溫：" + h_tnTemp + "&deg" + "&nbsp&nbsp&nbsp&nbsp" + "最低溫：" + l_tnTemp + "&deg";
        document.getElementById('phenmn').innerHTML = phenmn;

    } //end if
}; //end function
