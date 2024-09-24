
<!-- Main Content -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-star"></i> Paid Course Transactions</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('dashboard/index') ?>"><i class="bi bi-laptop"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Paid Course Transactions</li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <div class="card-body">
    <?php if (isset($transaction_data) && count($transaction_data) > 0): ?>
        <div class="row">
            <?php foreach ($transaction_data as $transaction): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Image at the top of the card -->
                        <img src="<?= base_url('uploads/images/' . $transaction['photo']) ?>" class="card-img-top" alt="<?= $transaction['course_name'] ?>">

                        <!-- Card body containing the course name and potentially other details like description, etc. -->
                        <div class="card-body">
                            <h5 class="card-title" style="color: black;"><?= $transaction['course_name'] ?></h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transactionModal<?= $transaction['id'] ?>">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>


                    <!-- Modal -->
                    <div class="modal fade" id="transactionModal<?= $transaction['id'] ?>" tabindex="-1" aria-labelledby="transactionModalLabel<?= $transaction['id'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="transactionModalLabel<?= $transaction['id'] ?>">Transaction Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p><strong>Transaction ID:</strong> <?= $transaction['id'] ?></p>
                            <p><strong>Student Name:</strong> <?= $transaction['student_name'] ?></p>
                            <p><strong>Course Name:</strong> <?= $transaction['course_name'] ?></p>
                            <p><strong>Payment Amount:</strong> <?= number_format($transaction['paymentamount'], 2) ?> <?= $siteinfos->currency_code ?></p>
                            <p><strong>Payment Method:</strong> <?= $transaction['paymentmethod'] ?></p>
                            <p><strong>Payment Date:</strong> <?= date("d-M-Y", strtotime($transaction['paymentdate'])) ?></p>
                            <p><strong>Status:</strong> <?= isset($transaction['status']) ? $transaction['status'] : 'Pending'; ?></p>
                            <p><strong>center_city:</strong> <?= isset($transaction['center_city']) ? $transaction['center_city'] : 'center_city'; ?></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> No transactions found for your account.
            </div>
        <?php endif; ?>
    </div><!-- /.card-body -->
</div><!-- /.card -->

<!-- Include necessary JS files -->
<!-- Make sure to include these in your template or layout file -->
<!-- jQuery (Optional if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
