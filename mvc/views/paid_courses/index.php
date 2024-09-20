<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .center-section {
            margin-top: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f5e6da; /* Light Nude Background */
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }

        .center-header {
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            color: #fff; /* White Text Color */
        }

        .center-header:hover {
            color: #fff;
        }

        .transaction-table {
            margin-bottom: 15px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #f1f1f1;
        }

        .search-bar {
            margin-bottom: 15px;
            text-align: right;
        }

        .search-bar input {
            width: 200px; /* Smaller search bar */
            display: inline-block;
        }

        .sticky-header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 999;
        }

        .pagination {
            justify-content: center;
        }

        .collapse:not(.show) .center-header {
            color: #fff; /* Ensure text is white even when collapsed */
        }

        .collapse.show .center-header {
            color: #fff; /* White text when expanded */
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-star"></i> Paid Course Transactions</h3>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-laptop"></i> Dashboard</a></li>
                <li class="active">Paid Course Transactions</li>
            </ol>
        </div>

        <div class="row search-bar">
            <div class="col-sm-12">
                <input type="text" class="form-control" id="centerSearch" placeholder="Search for centers...">
            </div>
        </div>

        <div class="accordion" id="centerAccordion">
            <div class="card center-section">
                <div class="card-header" id="heading1">
                    <h4 class="center-header mb-0" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        <i class="fa fa-building"></i> E-LEARNING/ONLINE/DISTANCE LEARNING Call: 02081031238, 01483947061 (ID: 3)
                    </h4>
                </div>

                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-bs-parent="#centerAccordion">
                    <div class="card-body">
                        <div id="hide-table">
                            <table class="table table-striped table-bordered table-hover transaction-table">
                                <thead class="sticky-header">
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Student Name</th>
                                        <th>Course ID</th>
                                        <th>Payment Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ch_3Q08bHL3GDJhQLIO1eePy62a</td>
                                        <td>Kashif</td>
                                        <td>1</td>
                                        <td>40.00</td>
                                        <td>Stripe</td>
                                        <td>2024-09-19</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5.0 JS (including Popper.js for tooltips and popovers) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

<!-- jQuery (if not already included in your project) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript for Search and Filter -->
<script>
    $(document).ready(function() {
        $('#centerSearch').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.center-section').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

</body>
</html>
