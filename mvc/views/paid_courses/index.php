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
            background-color: #f5e6da;
            padding: 15px;
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
        .table th, .table td {
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
            <h3 class="box-title"><i class="fa fa-star"></i> Paid Course Transactions</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('dashboard/index') ?>"><i class="fa fa-laptop"></i> Dashboard</a></li>
                <li class="active" style="color: white;">  /Paid Course Transactions</li>

            </ol>
        </div>

        <!-- Transaction Data Section -->
        <div class="accordion" id="centerAccordion">
            <?php if (isset($transaction_data) && count($transaction_data) > 0): ?>
                <?php foreach ($transaction_data as $transaction): ?>
                    <div class="card center-section">
                        <div class="card-header" id="heading<?= isset($transaction['center_id']) ? $transaction['center_id'] : ''; ?>">
                            <h4 class="center-header mb-0" data-bs-toggle="collapse" data-bs-target="#collapse<?= isset($transaction['center_id']) ? $transaction['center_id'] : ''; ?>" aria-expanded="true" aria-controls="collapse<?= isset($transaction['center_id']) ? $transaction['center_id'] : ''; ?>">
                                <i class="fa fa-building"></i>
                                <?= isset($transaction['center_city']) ? $transaction['center_city'] : 'Unknown Center'; ?> 
                            </h4>
                        </div>

                        <div id="collapse<?= isset($transaction['center_id']) ? $transaction['center_id'] : ''; ?>" class="collapse show" aria-labelledby="heading<?= isset($transaction['center_id']) ? $transaction['center_id'] : ''; ?>" data-bs-parent="#centerAccordion">
                            <div class="card-body">
                                <div id="hide-table">
                                    <table class="table table-striped table-bordered table-hover transaction-table">
                                        <thead class="sticky-header">
                                            <tr>
                                                <!-- <th>Transaction ID</th> -->
                                                <th>Student Name</th>
                                                <!-- <th>Course ID</th> -->
                                                <th>Course Name</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Method</th>
                                                <th>Payment Date</th>
                                                <th>Status</th>
                                                <th>Course Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td><?= $transaction['id'] ?></td> -->
                                                <td><?= $transaction['student_name'] ?></td>
                                                <!-- <td><?= $transaction['course_id'] ?></td> -->
                                                <td><?= $transaction['course_name'] ?></td>
                                                <td><?= $transaction['paymentamount'] ?></td>
                                                <td><?= $transaction['paymentmethod'] ?></td>
                                                <td><?= $transaction['paymentdate'] ?></td>
                                                <td><?= isset($transaction['status']) ? $transaction['status'] : 'Pending'; ?></td>
                                                <td>
                                                    <img src="<?= base_url('uploads/images/' . $transaction['photo']) ?>" alt="Course Photo" style="width: 50px; height: 50px;" /> <!-- Display course photo -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
