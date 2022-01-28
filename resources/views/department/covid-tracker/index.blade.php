<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CovidNG - One page</title>
  <!-- HTML -->
  <!-- Custom Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="">
</head>

<body>
  <div>
    <p>CovidNG</p>
  </div>
  <div id="states">
    <table id="details">
      <tr id="head">
        <td>States</td>
        <td>Active Cases</td>
        <td>Discharged Cases</td>
        <td>Deaths</td>
      </tr>
    </table>
  </div>
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

        var sec = document.createElement('te');
        var subsec1 = document.createElement('td');
        var subsec2 = document.createElement('td');
        var subsec3 = document.createElement('td');
        var subsec4 = document.createElement('td');
        var d = 'd';
        var tablee = document.getElementById('details');
        sec.id = 'head';
        subsec1.id = 'sub1'
        subsec1.innerText = result.data.states[i].state;
        subsec2.innerText = result.data.states[i].casesOnAdmission;
        subsec3.innerText = result.data.states[i].discharged;
        subsec4.innerText = result.data.states[i].death;
        tablee.appendChild(sec);
        sec.appendChild(subsec1);
        sec.appendChild(subsec2);
        sec.appendChild(subsec3);
        sec.appendChild(subsec4);
      }
    })

}
  </script>
</body>

</html>
