<!DOCTYPE HTML>
<html>
  <head>
    <title>URI RECORD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
          crossorigin="anonymous">
    <link rel="icon" href="./icon/Uri icon.png">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  
  <body class="bg-black/95">
    <div class="content flex justify-center">
      <div class="topnav flex justify-between mt-3 w-[1730px] py-2 bg-white/90 shadow-lg shadow-white/20 rounded-2xl">
        <div class="flex justify-center items-center mx-3 text-white cursor-pointer
                    bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center me-2 transition-all"
              onclick="window.location.href = 'home.php';">
            <div class="flex justify-center items-center px-3 text-white space-x-2">
            <i class="fas fa-angle-left"></i>
            <p class="font-bold">BACK</p>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <img class="h-12 w-12" src="./icon/Uri icon.png" alt="logo">
          <h3 class="font-bold text-3xl text-gray-800">URI RECORD</h3>
        </div>
        <div class="flex justify-center items-center mx-3 text-blue-500 space-x-2
                    bg-gradient-to-r from-blue-500/10 via-blue-600/10 to-blue-700/10 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center me-2 transition-all">
          <i class='fas fa-sync animate-spin'></i>
          <p>
            Processing
          </p>
        </div>
      </div>
    </div>
    <div class="flex justify-center ">
    <table class="styled-table w-[1700px] shadow-lg shadow-white/20 " id= "table_id">
      <thead class="">
        <tr class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700">
          <th class="p-2">NO</th>
          <th class="p-2">ID</th>
          <th class="p-2">BOARD</th>
          <th class="p-2">TEMPERATURE (°C)</th>
          <th class="p-2">HUMIDITY (%)</th>
          <th class="p-2">STATUS READ SENSOR DHT11</th>
          <th class="p-2 uppercase">air conditioner</th>
          <th class="p-2 uppercase">heater fan</th>
          <th class="p-2">TIME</th>
          <th class="p-2">DATE (dd-mm-yyyy)</th>
        </tr>
      </thead>
      <tbody id="tbody_table_record">
        <?php
          include 'database.php';
          $num = 0;
          //------------------------------------------------------------ The process for displaying a record table containing the DHT11 sensor data and the state of the LEDs.
          $pdo = Database::connect();
          // replace_with_your_table_name, on this project I use the table name 'esp32_table_dht11_leds_record'.
          // This table is used to store and record DHT11 sensor data updated by ESP32. 
          // This table is also used to store and record the state of the LEDs, the state of the LEDs is controlled from the "home.php" page. 
          // To store data, this table is operated with the "INSERT" command, so this table will contain many rows.
          $sql = 'SELECT * FROM esp32_table_dht11_leds_record ORDER BY date, time';
          foreach ($pdo->query($sql) as $row) {
            $date = date_create($row['date']);
            $dateFormat = date_format($date,"d-m-Y");
            $num++;
            echo '<tr class="hover:bg-blue-300 odd:bg-white even:bg-slate-50">';
            echo '<td class="p-3 font-semibold text-black" hover:bg-blue-300>'. $num . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['id'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['board'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['temperature'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['humidity'] . '</td>';
            $statusColor = ($row['status_read_sensor_dht11'] === 'SUCCEED') ? 'text-green-500' : 'text-red-500';
            echo '<td class="bdr p-3 font-semibold ' . $statusColor . '" hover:bg-blue-500>'. $row['status_read_sensor_dht11'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['LED_01'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['LED_02'] . '</td>';
            echo '<td class="bdr p-3 text-black" hover:bg-blue-500>'. $row['time'] . '</td>';
            echo '<td class="p-3 text-black hover:bg-blue-500">'. $dateFormat . '</td>';
            echo '</tr>';
          }
          Database::disconnect();
          //------------------------------------------------------------
        ?>
      </tbody>
    </table>
    </div>
    
    <!-- END BAR -->
    <div class="flex justify-center">
      <div class="w-[1730px] py-3 bg-white/90 shadow-lg shadow-white/20 rounded-xl">
        <div class="btn-group flex justify-between mx-3">
          <button class="button font-semibold px-3 text-white hover:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br uppercase cursor-pointer rounded-lg transition-all" 
                  id="btn_prev" onclick="prevPage()">Previous</button>
          <div class="flex justify-center items-center space-x-4">
            <div class="flex items-center space-x-2">
              <!-- <div style="display: inline-block; position:relative; border: 0px solid #e3e3e3; float: center; margin-left: 2px;;"> -->
              <div class="inline-block relative items-center">
                <p class="relative text-xs"> Table : <span id="page"></span></p>
              </div>
              <select class="px-2 rounded-full" name="number_of_rows" id="number_of_rows">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            
            <button class="button font-semibold px-3 text-white hover:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br uppercase rounded-full transition-all" 
                    id="btn_apply" onclick="apply_Number_of_Rows()">Apply</button>
          </div>
          
          <button class="button font-semibold px-3 text-white hover:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br uppercase rounded-lg transition-all" 
                  id="btn_next" onclick="nextPage()">Next</button>
        </div>
      </div>
    </div>

    <br>

    <script>
      //------------------------------------------------------------
      var current_page = 1;
      var records_per_page = 10;
      var l = document.getElementById("table_id").rows.length
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function apply_Number_of_Rows() {
        var x = document.getElementById("number_of_rows").value;
        records_per_page = x;
        changePage(current_page);
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function prevPage() {
        if (current_page > 1) {
            current_page--;
            changePage(current_page);
        }
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function nextPage() {
        if (current_page < numPages()) {
            current_page++;
            changePage(current_page);
        }
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function changePage(page) {
        var btn_next = document.getElementById("btn_next");
        var btn_prev = document.getElementById("btn_prev");
        var listing_table = document.getElementById("table_id");
        var page_span = document.getElementById("page");
       
        // Validate page
        if (page < 1) page = 1;
        if (page > numPages()) page = numPages();

        [...listing_table.getElementsByTagName('tr')].forEach((tr)=>{
            tr.style.display='none'; // reset all to not display
        });
        listing_table.rows[0].style.display = ""; // display the title row

        for (var i = (page-1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
          if (listing_table.rows[i]) {
            listing_table.rows[i].style.display = ""
          } else {
            continue;
          }
        }
          
        page_span.innerHTML = page + "/" + numPages() + " (Total Number of Rows = " + (l-1) + ") | Number of Rows : ";
        
        if (page == 0 && numPages() == 0) {
          btn_prev.disabled = true;
          btn_next.disabled = true;
          return;
        }

        if (page == 1) {
          btn_prev.disabled = true;
        } else {
          btn_prev.disabled = false;
        }

        if (page == numPages()) {
          btn_next.disabled = true;
        } else {
          btn_next.disabled = false;
        }
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function numPages() {
        return Math.ceil((l - 1) / records_per_page);
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      window.onload = function() {
        var x = document.getElementById("number_of_rows").value;
        records_per_page = x;
        changePage(current_page);
      };
      //------------------------------------------------------------
    </script>
  </body>
</html>
