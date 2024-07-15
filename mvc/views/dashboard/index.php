<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            background-image: linear-gradient(#ce2029,#800000) !important;
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
            <!-- Students Button -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" id="students-button">
                    <a class="small-box-footer">
                        <div class="icon" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="inner">
                            <h3 id="student-count">0</h3>
                            <p>Students</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Teachers Button -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" id="teachers-button">
                    <a class="small-box-footer">
                        <div class="icon" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa fa-chalkboard-teacher"></i>
                        </div>
                        <div class="inner">
                            <h3 id="teacher-count">0</h3>
                            <p>Teachers</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Subjects Button -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box" id="subjects-button">
                    <a class="small-box-footer">
                        <div class="icon" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="inner">
                            <h3 id="subject-count">0</h3>
                            <p>Subjects</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body" id="student-records" style="display: none;">
                        <!-- Student records will be displayed here -->
                    </div>
                    <div class="box-body" id="teacher-records" style="display: none;">
                        <!-- Teacher records will be displayed here -->
                    </div>
                    <div class="box-body" id="subject-records" style="display: none;">
                        <!-- Subject records will be displayed here -->
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
        $(document).ready(function() {
            // Students Button Click
            $('#students-button').click(function() {
                $.ajax({
                    url: '<?= base_url('dashboard/get_students') ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('Students:', response); // Debugging line
                        let studentCount = response.length;
                        $('#student-count').text(studentCount);
                        let records = '';
                        response.forEach(student => {
                            records += `<p>${student.name} - ${student.roll}</p>`;
                        });
                        $('#student-records').html(records).toggle();
                    },
                    error: function(error) {
                        console.log('Error fetching student data:', error);
                    }
                });
            });

            // Teachers Button Click
            $('#teachers-button').click(function() {
                alert('0');
                $.ajax({
                    url: '<?= base_url('dashboard/get_teachers') ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('Teachers:', response); // Debugging line
                        let teacherCount = response.length;
                        $('#teacher-count').text(teacherCount);
                        let records = '';
                        response.forEach(teacher => {
                            records += `<p>${teacher.name} - ${teacher.subject}</p>`;
                        });
                        $('#teacher-records').html(records).toggle();
                    },
                    error: function(error) {
                        console.log('Error fetching teacher data:', error);
                    }
                });
            });

            // Subjects Button Click
            $('#subjects-button').click(function() {
                alert('0');
                $.ajax({
                    url: '<?= base_url('dashboard/get_subjects') ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('Subjects:', response); // Debugging line
                        alert(response);
                        let subjectCount = response.length;
                        $('#subject-count').text(subjectCount);
                        let records = '';
                        response.forEach(subject => {
                            records += `<p>${subject.name}</p>`;
                        });
                        $('#subject-records').html(records).toggle();
                    },
                    error: function(error) {
                        console.log('Error fetching subject data:', error);
                    }
                });
            });
        });

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
</body>
</html>
