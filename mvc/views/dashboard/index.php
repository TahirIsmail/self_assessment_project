<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        /* General Styling */
        body, html {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            background-color: #f1f2f7;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Container */
        .container {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px; /* Set a max-width for the container */
        }

        /* Announcement Box */
        .announcement {
            background-image: linear-gradient(red, maroon);
            color: #fff;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .announcement:hover {
            background-color: #ff0800;
        }

        /* Row */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .row > div {
            padding: 10px;
        }

        /* Callout Box */
        .callout {
            border-left: 5px solid #ff6c60;
            background-color: #fff;
            color: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-left-color 0.3s ease, box-shadow 0.3s ease;
        }

        .callout-success {
            border-left-color: #ff6c60;
        }

        .callout-success:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Buttons */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-danger {
            background-color: #ff5045;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #e0433b;
        }

        .btn-success {
            background-color: #ff6c60;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #ff5045;
        }

        /* Small Box */
        .small-box {
            background-color: #ff6c60;
            color: #fff;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .small-box .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .small-box .inner h3, .small-box .inner p {
            margin: 0;
        }

        .small-box-footer {
            display: block;
            background-color: rgba(0, 0, 0, 0.1);
            color: #fff;
            padding: 10px;
            border-radius: 0 0 4px 4px;
            transition: background-color 0.3s ease;
        }

        .small-box-footer:hover {
            background-color: rgba(0, 0, 0, 0.2);
        }

        /* Box */
        .box {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: box-shadow 0.3s ease;
        }

        .box:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .box-body {
            padding: 20px;
        }

        /* Chart */
        .chart {
            height: 300px;
            margin-bottom: 20px;
        }

        #students-chart, #visitors-chart, #quizzes-chart, #performance-chart {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #students-chart:hover, #visitors-chart:hover, #quizzes-chart:hover, #performance-chart:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="announcement">
            <h4>Simply Licenced</h4>
        </div>

        <div class="row">
            <?php if ((config_item('demo') === FALSE) && ($siteinfos->auto_update_notification == 1) && ($versionChecking != 'none')) { ?>
                <?php if ($this->session->userdata('updatestatus') === null) { ?>
                    <div class="col-sm-12" id="updatenotify">
                        <div class="callout callout-success">
                            <h4>Dear Admin</h4>
                            <p>iTest - Complete Online Examination System has released a new update.</p>
                            <p>Do you want to update it now <?= config_item('ini_version') ?> to <?= $versionChecking ?> ?</p>
                            <a href="<?= base_url('dashboard/remind') ?>" class="btn btn-danger">Remind me</a>
                            <a href="<?= base_url('dashboard/update') ?>" class="btn btn-success">Update</a>
                        </div>
                    </div>
                <?php } ?> 
            <?php } ?>

            <?php
                $arrayColor = array(
                    'bg-teal',
                    'bg-dark-blue',
                    'bg-yellow',
                    'bg-orange'
                );

                function allModuleArray($usertypeID = '1', $dashboardWidget) {
                    if (!is_array($dashboardWidget)) {
                        throw new InvalidArgumentException('$dashboardWidget must be an array');
                    }

                    $userAllModuleArray = array(
                        $usertypeID => array(
                            'student' => (int)$dashboardWidget['students'],
                            'classes' => (int)$dashboardWidget['classes'],
                            'parents' => (int)$dashboardWidget['parents'],
                            'subject' => (int)$dashboardWidget['subjects'],
                            'event' => (int)$dashboardWidget['events'],
                            'online_exam' => (int)$dashboardWidget['onlineexam'],
                            'question_level' => (int)$dashboardWidget['questionlevel'],
                            'question_bank' => (int)$dashboardWidget['questionbank'],
                            'notice' => (int)$dashboardWidget['notice'],
                            'studentgroup' => (int)$dashboardWidget['studentgroup']
                        )
                    );

                    return $userAllModuleArray;
                }

                $userArray = array(
                    '1' => array(
                        'student' => $dashboardWidget['students'],
                        'parents' => $dashboardWidget['parents'],
                        'online_exam' => $dashboardWidget['onlineexam'],
                        'notice' => $dashboardWidget['notice']
                    ), '2' => array(
                        'student' => $dashboardWidget['students'],
                        'classes' => $dashboardWidget['classes'],
                        'subject' => $dashboardWidget['subjects'],
                    ), '3' => array(
                        'subjects' => $dashboardWidget['subjects'],
                    ), '4' => array(
                        'event' => $dashboardWidget['events'],
                    )
                );

                $generateBoxArray = [];
                $counter = 1;
                $getActiveUserID = $this->session->userdata('usertypeID');

                $getAllSessionDatas = $this->session->userdata('master_permission_set');
                foreach ($getAllSessionDatas as $getAllSessionDataKey => $getAllSessionData) {
                    if ($getAllSessionData == 'yes') {
                        if (isset($userArray[$getActiveUserID][$getAllSessionDataKey])) {
                            if ($counter > 4) {
                                break;
                            }

                            $generateBoxArray[$getAllSessionDataKey] = array(
                                'icon' => $dashboardWidget['allmenu'][$getAllSessionDataKey],
                                'color' => $arrayColor[$counter - 1],
                                'link' => $getAllSessionDataKey,
                                'count' => $counter,
                                'menu' => $dashboardWidget['allmenulang'][$getAllSessionDataKey],
                            );
                            $counter++;
                        }
                    }
                }

                if ($counter <= 4) {
                    $userArray = allModuleArray($getActiveUserID, (array)$dashboardWidget);
                    foreach ($getAllSessionDatas as $getAllSessionDataKey => $getAllSessionData) {
                        if ($getAllSessionData == 'yes') {
                            if (isset($userArray[$getActiveUserID][$getAllSessionDataKey])) {
                                if ($counter > 4) {
                                    break;
                                }

                                if (!isset($generateBoxArray[$getAllSessionDataKey])) {
                                    $generateBoxArray[$getAllSessionDataKey] = array(
                                        'icon' => $dashboardWidget['allmenu'][$getAllSessionDataKey],
                                        'color' => $arrayColor[$counter - 1],
                                        'link' => $getAllSessionDataKey,
                                        'count' => $counter,
                                        'menu' => $dashboardWidget['allmenulang'][$getAllSessionDataKey]
                                    );
                                    $counter++;
                                }
                            }
                        }
                    }
                }

                if (inicompute($generateBoxArray)) {
                    foreach ($generateBoxArray as $generateBoxArrayKey => $generateBoxValue) {
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box <?= $generateBoxValue['color'] ?>">
                    <a class="small-box-footer" href="<?= base_url($generateBoxValue['link']) ?>">
                        <div class="icon <?= $generateBoxValue['color'] ?>" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa <?= $generateBoxValue['icon'] ?>"></i>
                        </div>
                        <div class="inner">
                            <h3>
                                <?= $generateBoxValue['count'] ?>
                            </h3>
                            <p>
                                <?= $this->lang->line('menu_' . $generateBoxValue['menu']) ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body" style="padding: 0px;">
                        <div id="visitor"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <div id="students-chart" class="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <div id="visitors-chart" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <div id="quizzes-chart" class="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <div id="performance-chart" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Students Chart
        Highcharts.chart('students-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Students Overview'
            },
            xAxis: {
                categories: ['Class 1', 'Class 2', 'Class 3', 'Class 4']
            },
            yAxis: {
                title: {
                    text: 'Number of Students'
                }
            },
            series: [{
                name: 'Students',
                data: [49, 71, 106, 129],
                color: '#ff0000' // Red color
            }]
        });

        // Visitors Chart
        Highcharts.chart('visitors-chart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Weekly Visitors'
            },
            xAxis: {
                categories: <?= json_encode(array_keys($showChartVisitor)) ?>
            },
            yAxis: {
                title: {
                    text: 'Number of Visitors'
                }
            },
            series: [{
                name: 'Visitors',
                data: <?= json_encode(array_values($showChartVisitor)) ?>,
                color: '#ff0000' // Red color
            }]
        });

        // Quizzes Chart
        Highcharts.chart('quizzes-chart', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Quiz Attempts'
            },
            series: [{
                name: 'Quizzes',
                colorByPoint: true,
                data: [{
                    name: 'Math',
                    y: 45,
                    color: '#ff6c60' // Custom color
                }, {
                    name: 'Science',
                    y: 26,
                    color: '#ff5045' // Custom color
                }, {
                    name: 'English',
                    y: 20,
                    color: '#e0433b' // Custom color
                }, {
                    name: 'History',
                    y: 9,
                    color: '#ff0800' // Custom color
                }]
            }]
        });

        // Performance Chart
        Highcharts.chart('performance-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Performance Overview'
            },
            xAxis: {
                categories: ['Student A', 'Student B', 'Student C', 'Student D']
            },
            yAxis: {
                title: {
                    text: 'Scores'
                }
            },
            series: [{
                name: 'Scores',
                data: [85, 90, 78, 88],
                color: '#ff0000' // Red color
            }]
        });
    </script>

    <script type="text/javascript"> 
        $(document).ready(function() {
            var count = 7;
            var countdown = setInterval(function() {
                $("p.countdown").html(count + " seconds remaining!");
                if (count == 0) {
                    clearInterval(countdown);
                    $('#resetDummyData').hide();
                }
                count--;
            }, 1000);
        });
    </script>
</body>
</html>
