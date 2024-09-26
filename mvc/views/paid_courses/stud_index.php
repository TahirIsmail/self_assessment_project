<!-- Main Content -->
<div class="panel panel-primary">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="bi bi-star"></i> Paid Course Transactions</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('dashboard/index') ?>" class="text-white"><i class="bi bi-laptop"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">Paid Course Transactions</li>
            </ol>
        </nav>
    </div>

    <div class="panel-body">
        <?php if (isset($transaction_data) && count($transaction_data) > 0): ?>
            <div class="row">
                <?php foreach ($transaction_data as $transaction): ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <!-- Image at the top of the card -->
                            <img src="<?= base_url('uploads/images/' . $transaction['photo']) ?>" alt="<?= $transaction['course_name'] ?>" style="height: 200px; object-fit: cover;">

                            <!-- Card body -->
                            <div class="caption">
                                <h4 class="text-primary"><?= $transaction['course_name'] ?></h4>
                                <p><strong>Center:</strong> <?= $transaction['center_city'] ?></p>
                                <p><strong>Amount:</strong> <?= number_format($transaction['paymentamount'], 2) ?> <?= $siteinfos->currency_code ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                <i class="glyphicon glyphicon-exclamation-sign"></i> No transactions found for your account.
            </div>
        <?php endif; ?>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->