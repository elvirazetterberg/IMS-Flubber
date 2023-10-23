<!DOCTYPE html>
<html>

<head>
    <title>Analytics for DRUG X</title>
    <link href="../images/SIDES_head_icon.png" rel="icon">
</head>

<body>
    <header>
        <?php
        include "../navigation.php";
        ?>
    </header>
    <div class="white">
        <!-- Add a button to navigate to side_effect_drug_frequency.php -->
        <form action="../Analytics/side_effect_drug_frequency.php" method="GET">
            <button type="submit">View Side Effect Drug Frequency, for the SIDES Community </button>
        </form>

        <!-- 0. Define variables -->
        <!-- form to get time period and side effect -->
        <?php
        include "../DB_connect.php";
        session_start();

        if (isset($_SESSION['username']) && isset($_SESSION["id"])) {
            $userid = $_SESSION['id'];
        }

        // side effect options
        $sides_sql = "SELECT se_name FROM side_effects";
        $sides_result = $link->query($sides_sql);
        // add to an array
        $sides_list = [];
        if ($sides_result->num_rows > 0) {
            while ($sides_row = $sides_result->fetch_assoc()) {
                $sides_list[] = $sides_row["se_name"];
            }
        }
        ?>

        <form action="analytics.php" method="POST">
            <label for "startdate">Side effects between: </label>
            <br>
            <input type="date" id="start" name="start" value="2023-01-01" min="2022-01-01" max="2024-12-31" />
            <br>
            <label for "enddate"> and </label>
            <br>
            <input type="date" id="end" name="end" value="2023-01-01" min="2000-01-01" max="2024-12-31" />
            <br>
            <label for "side_effect">Side effect: </label>
            <select name="sides" id="sides">
                <option value=""></option>
                <?php
                foreach ($sides_list as $side) {
                    $selected = ($_POST['sides'] == $side) ? 'selected' : '';
                    echo "<option value='$side'>$side</option>";
                }
                ?>
            </select>
            <input type="submit" value="Track my SIDES">
        </form>

        <?php
        $rangestart = $_POST['start'];
        $rangeend = $_POST['end'];
        $sideeffect = $_POST['sides'];

        $name_to_id = "SELECT se_id FROM side_effects WHERE se_name ='$sideeffect'";
        $relevant_id = $link->query($name_to_id);
        $row = $relevant_id->fetch_assoc();
        $se_id = $row['se_id'];

        $sql_sides = "SELECT intensity, review_date FROM report WHERE side_effect = '$se_id' AND userid = '$userid' AND review_date BETWEEN '$rangestart' AND '$rangeend' ORDER BY review_date";
        $sides_result2 = $link->query($sql_sides);

        // add dates to an array
        $dates_list = [];
        $intensity_list = [];
        if ($sides_result2->num_rows > 0) {
            while ($sides_row2 = $sides_result2->fetch_assoc()) {
                $dates_list[] = $sides_row2["review_date"];
                $intensity_list[] = $sides_row2["intensity"];
            }
        } else {
            echo 'Please input date range and side effect';
        }
        ;

        ?>

        <!-- Side effect intensity -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <canvas id="myChart"></canvas>

        <script>
            // Convert PHP arrays to JavaScript
            var datesList = <?php echo json_encode($dates_list); ?>;
            var intensityList = <?php echo json_encode($intensity_list); ?>;
            const data = {
                labels: datesList,
                datasets: [{
                    label: 'Intensity: <?php echo $sideeffect ?>',
                    data: intensityList,
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false,
                }]
            };

            const config = {
                type: 'line',
                data: data,
            };

            const ctx = document.getElementById('myChart').getContext('2d');

            // Create a new chart using Chart.js
            new Chart(ctx, config);

        </script>
    </div>

    <?php
    include "../footer.php";
    ?>
</body>

<!--
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                    mode: 'index',
                    intersect: false,
                    },
                    title: {
                        display: true,
                        text: 'Symptom intensity over time',
                    }
                },
                hover: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time',
                        },
                        type: 'time',
                        time: {
                            unit: 'day',
                            tooltipFormat: 'YYYY-MM-DD',
                            min: '?php echo $rangestart; ?>', // Set the minimum date
                            max: '?php echo $rangeend; ?>', // Set the maximum date
                        },
                    },
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 10,
                        title: {

                            display: true,
                            text: 'Intensity',
                        },
                        ticks: {
                            stepSize: 1,
                        },
                    },
                },
            },
        });




        const options = {
                responsive: true,
                plugins: {
                    tooltip: {
                    mode: 'index',
                    intersect: false,
                    },
                    title: {
                        display: true,
                        text: 'Symptom intensity over time',
                    }
                },
                hover: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time',
                        },
                        type: 'time',
                        time: {
                            unit: 'day',
                            tooltipFormat: 'YYYY-MM-DD',
                            min: '?php echo $rangestart; ?>', // Set the minimum date
                            max: '?php echo $rangeend; ?>', // Set the maximum date
                        },
                    },
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Intensity',
                        },
                        ticks: {
                            stepSize: 1,
                        }
                    }
                }
            };
    -->

</html>