<script>

//chart
google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            <?php $stmt = $con->prepare("SELECT * FROM post");
                $stmt->execute();
                $posts = $stmt->fetchAll();
                $Stars5 = 0;
                $Stars4 = 0;
                $Stars3 = 0;
                $Stars2 = 0;
                $Stars1 = 0;
                foreach($posts as $post) {
                    $sumRating = 0; $avarge = 0;
                    $stmt2 = $con->prepare("SELECT * FROM rating WHERE post_id = ?");
                    $stmt2->execute([$post['id']]);
                    $ratings = $stmt2->fetchAll();
                    foreach($ratings as $rating){
                        $sumRating += $rating['number_rating'];
                    }
                    $numberpeople = count($ratings);
                    $avarge = $numberpeople != 0 ?  floor($sumRating / count($ratings)) : $sumRating;
                    if($avarge  == 5) {
                        $Stars5++;
                    }elseif($avarge == 4){
                        $Stars4++;
                    }elseif($avarge == 3){
                        $Stars3++;
                    }elseif($avarge == 2){
                        $Stars2++;
                    }elseif($avarge == 1){
                        $Stars1++;
                    }
                }
            ?>
          ['Language', 'Speakers (in millions)'],
          ['5 Stars', <?=$Stars5?>],
          ['4 Stars', <?=$Stars4?>],
          ['3 Satrs', <?=$Stars3?>],
          ['2 Stars', <?=$Stars2?>],
          ['1 Stars', <?=$Stars1?>]
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'عدد تقيم الحرف',
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

</script>