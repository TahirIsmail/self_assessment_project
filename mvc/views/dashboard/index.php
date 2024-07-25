<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* General Styling */
        body, html {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            background-color: #f1f2f7;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .small-box {
            background-color: #fff;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            text-align: left;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .small-box:hover {
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .small-box .icon {
            background-color: #5bc0de; 
            color: #fff;
            border-radius: 50%;
            padding: 15px;
            font-size: 24px;
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
        }

        .small-box:nth-child(2) .icon {
            background-color: #5cb85c; 
        }

        .small-box:nth-child(3) .icon {
            background-color: #f0ad4e; 
        }
    
        .small-box .inner {
            flex-grow: 1;
            margin-left: 80px;
        }

        .small-box .inner h3 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }

        .small-box .inner p {
            margin: 0;
            font-size: 14px;
            color: #000;
        }

        .box {
            background-color: #fff;
            border-radius: 10px;
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

        .chart {
            height: 380px;
            margin-bottom: 20px;
        }

        .large-chart {
            height: 380px;
            margin-bottom: 20px;
        }

        #students-chart, #quizzes-chart, #performance-chart, #enrollment-trends-chart, #subject-popularity-chart {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #students-chart:hover, #quizzes-chart:hover, #performance-chart:hover, #enrollment-trends-chart:hover, #subject-popularity-chart:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Students Button -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box" id="students-button">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="inner">
                    <h3 id="student-count">0</h3>
                    <p>Students</p>
                </div>
                
            </div>
        </div>

        <!-- Teachers Button -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box" id="teachers-button">
                <div class="icon">
                    <i class="fa fa-chalkboard-teacher"></i>
                </div>
                <div class="inner">
                    <h3 id="teacher-count">0</h3>
                    <p>Teachers</p>
                </div>
                
            </div>
        </div>

        <!-- Subjects Button -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box" id="subjects-button">
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <div class="inner">
                    <h3 id="subject-count">0</h3>
                    <p>Subjects</p>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Records Sections -->
    <div class="row">
        <div class="col-12">
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

    <!-- Charts -->
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box">
                <div class="box-body">
                    <div id="students-chart" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box">
                <div class="box-body">
                    <div id="quizzes-chart" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box">
                <div class="box-body">
                    <div id="performance-chart" class="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="box">
                <div class="box-body">
                    <div id="subject-popularity-chart" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="box">
                <div class="box-body">
                    <div id="enrollment-trends-chart" class="large-chart"></div>
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
                    $('#teacher-records').hide();
                    $('#subject-records').hide();
                },
                error: function(error) {
                    console.log('Error fetching student data:', error);
                }
            });
        });

        // Teachers Button Click
        $('#teachers-button').click(function() {
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
                    $('#student-records').hide();
                    $('#subject-records').hide();
                },
                error: function(error) {
                    console.log('Error fetching teacher data:', error);
                }
            });
        });

        // Subjects Button Click
        $('#subjects-button').click(function() {
            $.ajax({
                url: '<?= base_url('dashboard/get_subjects') ?>',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Subjects:', response); // Debugging line
                    let subjectCount = response.length;
                    $('#subject-count').text(subjectCount);
                    let records = '';
                    response.forEach(subject => {
                        records += `<p>${subject.name}</p>`;
                    });
                    $('#subject-records').html(records).toggle();
                    $('#student-records').hide();
                    $('#teacher-records').hide();
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
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Total Students by Gender'
        },
        subtitle: {
            text: '2500'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y}'
                }
            }
        },
        series: [{
            name: 'Students',
            data: [
                { name: 'Boys', y: 1500, color: '#CF9FFF' },
                { name: 'Girls', y: 1000, color: '#C3B1E1' }
            ]
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
                color: '#CF9FFF' // Custom color
            }, {
                name: 'Science',
                y: 26,
                color: '#DA70D6' // Custom color
            }, {
                name: 'English',
                y: 20,
                color: '#CCCCFF' // Custom color
            }, {
                name: 'History',
                y: 9,
                color: '#7F00FF' // Custom color
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
            color: '#B6D0E2' // Custom color
        }]
    });

    // Enrollment Trends Chart
    Highcharts.chart('enrollment-trends-chart', {
        chart: {
            type: 'pie',
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        },
        title: {
            text: 'Course Enrollments'
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                startAngle: -90,
                endAngle: 90,
                depth: 45,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.percentage:.2f}%'
                }
            }
        },
        series: [{
            name: 'Enrollments',
            data: [
                { name: 'One', y: 26.32, color: '#4682B4' },
                { name: 'Two', y: 23.68, color: '#6F8FAF' },
                { name: 'Three', y: 15.79, color: '#CCCCFF' },
                { name: 'Four', y: 13.16, color: '#87CEEB' },
                { name: 'Five', y: 10.53, color: '#CBC3E3' },
                { name: 'Six', y: 7.89, color: '#E0B0FF' },
                { name: 'Seven', y: 2.63, color: '#DA70D6' }
            ]
        }]
    });

    // Subject Popularity Chart
    Highcharts.chart('subject-popularity-chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Subject Popularity'
        },
        xAxis: {
            categories: ['Math', 'Science', 'History', 'Art']
        },
        yAxis: {
            title: {
                text: 'Number of Enrollments'
            }
        },
        series: [{
            name: 'Male',
            data: [30, 25, 20, 15],
            color: '#4682B4' // Custom color
        }, {
            name: 'Female',
            data: [20, 15, 10, 5],
            color: '#CF9FFF' // Custom color
        }]
    });
</script>
</body>
</html>
