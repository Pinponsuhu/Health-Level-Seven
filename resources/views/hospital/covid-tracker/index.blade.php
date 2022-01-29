<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Covid 19 Tracker</title>
  <style>
      body {
                font-family: 'Cabin', sans-serif;
            }
            *::-webkit-scrollbar {
    width: 7px;
}

/* Track */
*::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
    background: rgb(46, 189, 137);
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
    background: #095134;
}
  </style>
  <!-- HTML -->
  <!-- Custom Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/all.js') }}"></script>
</head>

<body onload="states();" class="bg-gray-100 h-screen py-6">
 <main class="w-9/12 mx-auto bg-white h-full overflow-y-scroll rounded-md shadow-md p-8 ">
  <a href="/hospital/dashboard" class="bg-gray-100 px-4 py-3 hover:bg-gray-200 rounded-full shadow-md text-green-500"><i class="fa fa-arrow-left"></i> Dashboard</a>
    <div class="mt-3">
        <p class="font-bold text-2xl text-green-500"><i class="fa fa-viruses"></i> CovidNG Tracker</p>
      </div>
      <div id="states">
        <table id="details" class="w-full mt-4">
          <thead id="head">
            <tr class="py-3 bg-green-500 text-green-50">
                <td class="w-1/4 border-r-4 border-green-200 py-3 font-medium px-3">States</td>
                <td class="w-1/4 border-r-4 border-green-200 py-3 font-medium px-3">Active Cases</td>
                <td class="w-1/4 border-r-4 border-green-200 py-3 font-medium px-3">Discharged Cases</td>
                <td class="w-1/4 py-3 font-medium px-3">Deaths</td>
            </tr>
          </thead>
          <tbody id="table_body">

          </tbody>
        </table>
        <div>
            <a href="https://covid19.ncdc.gov.ng/" class="block text-center underline pb-1.5 italic fot-medium text-green-500 mt-3"><i class="fa fa-arrow-alt-circle-down animate-bounce"></i> Click here for more infomation</a>
        </div>
      </div>
 </main>
  <script>
      function states() {
var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };

  fetch("https://covidnigeria.herokuapp.com/api", requestOptions)
    .then(response => response.json())
    .then(function(result) {
      for (var i = 0; i <= 35; i++) {

        var sec = document.createElement('tr');
        var subsec1 = document.createElement('td');
        var subsec2 = document.createElement('td');
        var subsec3 = document.createElement('td');
        var subsec4 = document.createElement('td');
        var d = 'd';
        var tablee = document.getElementById('details');
        var table_body = document.getElementById('table_body');
        sec.id = 'head';
        subsec1.id = 'sub1'
        subsec1.innerText = result.data.states[i].state;
        subsec2.innerText = result.data.states[i].casesOnAdmission;
        subsec3.innerText = result.data.states[i].discharged;
        subsec4.innerText = result.data.states[i].death;
        table_body.appendChild(sec);
        tablee.appendChild(table_body);
        sec.appendChild(subsec1);
        sec.appendChild(subsec2);
        sec.appendChild(subsec3);
        sec.appendChild(subsec4);
        subsec1.classList.add('bg-green-100','px-3','py-3','border-b-2','border-gray-100');
        subsec2.classList.add('bg-gray-100','px-3','py-3','border-b-2','border-green-100');
        subsec3.classList.add('bg-green-100','px-3','py-3','border-b-2','border-gray-100');
        subsec4.classList.add('bg-gray-100','px-3','py-3','border-b-2','border-green-100');
      }
    })

}
  </script>
</body>

</html>
