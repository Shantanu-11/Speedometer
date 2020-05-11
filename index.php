<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Speedometer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="gauge.min.js"></script>
  </head>
  <body style="padding:30px 30px 30px 30px">
    <h2 style="text-align: center">
      Welcome to the Speedometer
    </h2>

    <h3>
      Please enter the speed to see it work.
    </h3>
    <p>
      <form action="index.php" method="get" id="target">
        <label for="speed" class="mr-2"> <h5>Speed:</h5> </label>
        <input type="number" name="speed" max="240">
        <h6 class="ml-5">(Press enter to continue)</h6>
      </form>
    </p>
    <div align="center" style="font-size: 30px">
      <?php echo isset($_GET['speed'])? $_GET['speed'] : 0 ?> kmph
    </div>
    <div class="speed" align="center">
        <canvas id="speedometer" style="width: 70%; padding-top: 0px;">guage</canvas>
    </div>
    <script type="text/javascript">
      var opts = {
        lines: 12,
        angle: -0.15,
        lineWidth: 0.14,
        pointer: {
          length: 0.5,
          strokeWidth: 0.05,
          color: '#000000'
        },
        limitMax: 'false',
        percentColors: [[0.0, "#a9d70b" ], [0.50, "#f9c802"], [1.0, "#ff0000"]], // !!!!
        strokeColor: '#E0E0E0',
        generateGradient: true,
        staticZones: [
         {strokeStyle: "#F03E3E", min: 160, max: 240}, // Red
         {strokeStyle: "#FFA500", min: 100, max: 160}, // Orange
         {strokeStyle: "#FFDD00", min: 60, max: 100}, // Yellow
         {strokeStyle: "#30B32D", min: 0, max: 60}, // Green
        ],
        staticLabels: {
          font: "20px sans-serif",  // Specifies font
          labels: [0,20, 40, 60, 80, 100, 120, 140, 160, 180, 200, 220, 240],  // Print labels at these values
          color: "#000000",  // Optional: Label text color
          fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        },
        renderTicks: {
          divisions: 12,
          divWidth: 1.1,
          divLength: 0.7,
          subDivisions: 2,
          subLength: 0.5,
          subWidth: 0.6
        }
      };

      var target = document.getElementById('speedometer');
      var gauge = new Gauge(target).setOptions(opts);
      gauge.maxValue = 240;
      gauge.animationSpeed = 32;
      gauge.setMinValue(0);
      gauge.set(<?php echo isset($_GET['speed'])? $_GET['speed'] : 0 ?>);
    </script>
  </body>
</html>
