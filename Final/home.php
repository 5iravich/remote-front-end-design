<!DOCTYPE HTML>
<html>
  <head>
    <title>URI REMOTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
          crossorigin="anonymous">
    <link rel="icon" href="./icon/Uri icon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* html {font-family: Prompt; display: inline-block; text-align: center;} */
      /* p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;} */
      /* .topnav {overflow: hidden; background-color: #0c6980; color: white; font-size: 1.2rem;}
      .content {padding: 5px; }
      .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .cards {max-width: 700px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
      .reading {font-size: 1.3rem;}
      .packet {color: #bebebe;}
      .temperatureColor {color: #fd7e14;}
      .humidityColor {color: #1b78e2;}
      .statusreadColor {color: #702963; font-size:12px;} */
      /* .LEDColor {color: #183153;}
      
      /* ----------------------------------- Toggle Switch */
      .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
      }

      .switch input {display:none;}

      .sliderTS {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #D3D3D3;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
      }

      .sliderTS:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: #f7f7f7;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
      }

      input:checked + .sliderTS {
        background-color: #22c55e;
      }

      input:focus + .sliderTS {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .sliderTS:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      .sliderTS:after {
        content:'OFF';
        color: white;
        display: block;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 70%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
      }

      input:checked + .sliderTS:after {  
        left: 25%;
        content:'ON';
      }

      input:disabled + .sliderTS {  
        opacity: 0.3;
        cursor: not-allowed;
        pointer-events: none;
      }
      /* ----------------------------------- */
    </style>
  </head>
  
  <body class="bg-black/95">
    <div class="content flex justify-center">
      <div class="topnav mt-6 w-[980px] py-1 bg-white/90 rounded-2xl">
        <div class="px-4 py-3 flex items-center space-x-3">
          <img class="h-12 w-12" src="./icon/Uri icon.png" alt="logo">
          <h3 class="font-bold text-3xl text-gray-800">URI REMOTE</h3>
        </div>
        
      </div>
    </div>
    <br>
    
    <!-- __ DISPLAYS MONITORING AND CONTROLLING ____________________________________________________________________________________________ -->
    <div class="content">
      
    <!-- CARD -->
      <div class="flex justify-center">
        <div class="cards grid grid-cols-3 gap-9 font-Prompt">
          
          <div class="card flex justify-center items-center w-[300px] h-[350px] shadow-lg hover:shadow-orange-500/50
                      bg-gradient-to-r from-amber-500 hover:from-amber-500/95 to-orange-500 hover:to-orange-500/95 rounded-3xl transition-all">
            <div class="card-header">
              <div class="flex justify-center">
                <i class="fas fa-thermometer-half text-[125px] text-white/85 rotate-45"></i>
              </div>
              <p class="temperatureColor font-semibold text-white/85 text-[40px]"><span class="reading"><span id="ESP32_01_Temp"></span>&deg;C</span></p>
            </div>
          </div>

          <div class="card flex justify-center items-center w-[300px] h-[350px] shadow-lg hover:shadow-blue-500/50
                      bg-gradient-to-r from-cyan-500 hover:from-cyan-500/95 to-blue-500 hover:to-blue-500/95 rounded-3xl transition-all">
            <div class="card header">
              <div class="flex justify-center">
                <i class="fas fa-tint text-[125px] text-white/85 rotate-45"></i>
              </div>
              <p class="humidityColor font-semibold text-white/85 text-[40px]"><span class="reading"><span id="ESP32_01_Humd"></span> &percnt;</span></p>
            </div>
          </div>

          <div class="card-status flex justify-center items-center w-[300px] h-[350px] shadow-lg hover:shadow-green-500/50
                      bg-gradient-to-r from-teal-500 hover:from-teal-500/95 to-green-500 hover:to-green-500/95 rounded-3xl transition-all">
            <div class="card header">
              <div class="flex justify-center">
                <p class="statusreadColor font-bold text-[46px] text-white/85"><span id="ESP32_01_Status_Read_DHT11"></span></p>
              </div>
              <div class="flex justify-center px-3 bg-white/20 rounded-full">
                <p class="statusreadColor font-semibold text-xs text-white/85"><span>STATUS READ SENSOR DHT11</p>
              </div>
            </div>
            <div>
              
            </div>
          </div>

        </div>
      </div>
    
    <!-- RECORD & CONTROLLER -->
      <div class="flex justify-center my-9">
        <div class="cards grid grid-cols-3 gap-9 font-Prompt">
          <!-- RECORD -->
          <div class="flex justify-center items-center card w-[300px] bg-white hover:-translate-y-3 shadow-lg hover:shadow-white/50 cursor-pointer rounded-3xl transition-all" onclick="window.location.href = 'recordtable.php';">
            <div class="card header" style="border-radius: 15px;">
              <div class="flex justify-center">
                <i class="fas fa-history rotate-12 hover:rotate-0 text-[125px] text-sky-400 transition-all"></i>
              </div>
              <button class="my-3 px-3 font-semibold text-sky-600 bg-sky-400/30 uppercase rounded-full transition-all" >Open Record Table</button>
            </div>
          </div>
          <!-- CONTROLLER -->
          <div class="card col-span-2 flex justify-center">
            <div class="w-[640px] shadow-lg hover:shadow-teal-500/15
                        bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-xl transition-all">
              <div class="card header">
                <div class="">
                  <div class="flex justify-center w-64 px-3 bg-white/30 rounded-lg">
                    <h3 class="font-bold text-lg text-white uppercase ">Controller Equipment</h3>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="m-3 p-3 flex justify-between bg-white/30 hover:bg-white/40 rounded-2xl transition-all">
                <div class="">
                  <img class="w-20 h-20 animate-pulse" src="./icon/air.png" alt="fan">
                </div>
                <h4 class="LEDColor flex justify-center items-center font-semibold text-xl text-white uppercase">air conditioner</h4>
                <div class="flex items-center">
                  <label class="switch">
                    <input type="checkbox" id="ESP32_01_TogLED_01" onclick="GetTogBtnLEDState('ESP32_01_TogLED_01')">
                    <div class="sliderTS"></div>
                  </label>
                </div>
              </div>
              <!--  -->
              <div class="m-3 p-3 flex justify-between bg-white/30 hover:bg-white/40 rounded-2xl transition-all">
                <div class="">
                  <img class="w-20 h-20 animate-spin" src="./icon/fan.png" alt="fan"></i>
                </div>
                <h4 class="LEDColor flex justify-center items-center font-semibold text-xl text-white uppercase">heater fan</h4>
                <div class="flex items-center">
                  <label class="switch">
                    <input type="checkbox" id="ESP32_01_TogLED_02" onclick="GetTogBtnLEDState('ESP32_01_TogLED_02')">
                    <div class="sliderTS"></div>
                  </label>
                </div>
                
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>

    <!-- END BAR -->
    <div class="content flex justify-center">
      <div class="w-[980px] py-1 bg-white/90 rounded-full">
        <div class="flex justify-center">
          <h3 class="font-semibold text-xs text-gray-800">LAST TIME RECEIVED DATA FROM ESP32 [ <span id="ESP32_01_LTRD"></span> ]</h3>
        </div>
      </div>
    </div>

    <!-- ___________________________________________________________________________________________________________________________________ -->
    
    <script>
      //------------------------------------------------------------
      document.getElementById("ESP32_01_Temp").innerHTML = "NN"; 
      document.getElementById("ESP32_01_Humd").innerHTML = "NN";
      document.getElementById("ESP32_01_Status_Read_DHT11").innerHTML = "NN";
      document.getElementById("ESP32_01_LTRD").innerHTML = "NN";
      //------------------------------------------------------------
      
      Get_Data("esp32_01");
      
      setInterval(myTimer, 5000);
      
      //------------------------------------------------------------
      function myTimer() {
        Get_Data("esp32_01");
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function Get_Data(id) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            const myObj = JSON.parse(this.responseText);
            if (myObj.id == "esp32_01") {
              document.getElementById("ESP32_01_Temp").innerHTML = myObj.temperature;
              document.getElementById("ESP32_01_Humd").innerHTML = myObj.humidity;
              document.getElementById("ESP32_01_Status_Read_DHT11").innerHTML = myObj.status_read_sensor_dht11;
              document.getElementById("ESP32_01_LTRD").innerHTML = "Time : " + myObj.ls_time + " | Date : " + myObj.ls_date + " (dd-mm-yyyy)";
              if (myObj.LED_01 == "ON") {
                document.getElementById("ESP32_01_TogLED_01").checked = true;
              } else if (myObj.LED_01 == "OFF") {
                document.getElementById("ESP32_01_TogLED_01").checked = false;
              }
              if (myObj.LED_02 == "ON") {
                document.getElementById("ESP32_01_TogLED_02").checked = true;
              } else if (myObj.LED_02 == "OFF") {
                document.getElementById("ESP32_01_TogLED_02").checked = false;
              }
            }
          }
        };
        xmlhttp.open("POST","getdata.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
			}
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function GetTogBtnLEDState(togbtnid) {
        if (togbtnid == "ESP32_01_TogLED_01") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("esp32_01","LED_01",togbtncheckedsend);
        }
        if (togbtnid == "ESP32_01_TogLED_02") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("esp32_01","LED_02",togbtncheckedsend);
        }
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function Update_LEDs(id,lednum,ledstate) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("POST","updateLEDs.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id+"&lednum="+lednum+"&ledstate="+ledstate);
			}
      //------------------------------------------------------------
    </script>
  </body>
</html>
