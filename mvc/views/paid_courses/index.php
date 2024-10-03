<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.0 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        .center-section {
            margin-top: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #6d1e1e;
            padding: 15px;
            color: white;
        }

        .center-header {
            font-weight: bold;
            font-size: 16px;
            color: #fff;
        }

        .center-header:hover {
            color: #fff;
        }

        .transaction-table {
            margin-bottom: 15px;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            font-size: 18px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-star"></i>Courses</h3>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('dashboard/index') ?>"><i class="fa fa-laptop"></i> Dashboard</a></li>
                    <li class="active" style="color: white;"> /Course Transactions</li>
                </ol>
            </div>
            <!-- Transaction Data Section -->
            <div class="accordion" id="categoryAccordion">
                <?php if (isset($transaction_data) && count($transaction_data) > 0): ?>
                    <!-- Check the structure of $transaction_data -->
                    <?php foreach ($transaction_data as $category_id => $category): ?>
                        <div class="card category-section">
                            <div class="card-header" id="headingCategory<?= $category_id; ?>">
                                <h4 class="mb-0" data-bs-toggle="collapse" data-bs-target="#collapseCategory<?= $category_id; ?>" aria-expanded="true" aria-controls="collapseCategory<?= $category_id; ?>">
                                    <i class="fa fa-folder"></i>
                                    <?= isset($category['category_name']) ? $category['category_name'] : 'Unknown Category'; ?>
                                </h4>
                            </div>

                            <div id="collapseCategory<?= $category_id; ?>" class="collapse show" aria-labelledby="headingCategory<?= $category_id; ?>" data-bs-parent="#categoryAccordion">
                                <div class="card-body">
                                    <div class="accordion" id="centerAccordion<?= $category_id; ?>">
                                        <?php foreach ($category['centers'] as $center_id => $center):  ?>
                                            <div class="card center-section">
                                                <div class="" id="headingCenter<?= $category_id . $center_id; ?>">
                                                    <h6 class="mb-0">
                                                        <i class="fa fa-building"></i>
                                                        <?= isset($center['center_city']) ? $center['center_city'] : 'Unknown Center'; ?>
                                                    </h6>
                                                </div>
                                                <div id="" class="" aria-labelledby="" >
                                                    <div class="card-body">
                                                        <div id="hide-table">
                                                            <table class="table table-striped table-bordered table-hover transaction-table">
                                                                <thead class="sticky-header">
                                                                    <tr>
                                                                        <th>Student Name</th>
                                                                        <th>Course Name</th>
                                                                        <th>Payment Amount</th>
                                                                        <th>Payment Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (isset($center['records']) && count($center['records']) > 0): ?>
                                                                        <?php foreach ($center['records'] as $transaction): ?>
                                                                            <tr>
                                                                                <td><?= $transaction['student_name'] ?></td>
                                                                                <td><?= $transaction['course_name'] ?></td>
                                                                                <td><?= $transaction['paymentamount'] ?></td>
                                                                                <td><?= $transaction['paymentdate'] ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <td colspan="4">No records found for this center.</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-data">
                        <p><i class="fa fa-exclamation-triangle"></i> No transactions found for your account.</p>
                    </div>
                <?php endif; ?>
            </div>



        </div>
    </div>

    <!-- Bootstrap 5.0 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

</body>

</html>