<div class="card">


  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('panel_title') ?></h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="<?= base_url("dashboard/index") ?>">
            <i class="bi bi-laptop"></i> <?= $this->lang->line('menu_dashboard') ?>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url("event/index/") ?>"><?= $this->lang->line('menu_event') ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('view') ?></li>
      </ol>
    </nav>
  </div>



  <div id="printablediv">

    <div class="card-body">

      <div class="col-sm-12">

        <div class="col-sm-6 page-header">
          <button class="btn btn-primary btn-sm" onclick="javascript:printDiv('printablediv')">
            <i class="bi bi-printer"></i> <?= $this->lang->line('print') ?>
          </button>

          <!-- Manually adding btn-primary btn-sm classes for the PDF button -->
          <a href="<?= base_url('event/print_preview/' . $event->eventID . "/") ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-file-earmark-pdf"></i> <?= $this->lang->line('pdf_preview') ?>
          </a>

          <?php if (permissionChecker('event_edit')) { ?>
            <!-- Manually adding btn-primary btn-sm classes for the Edit button -->
            <a href="<?= base_url('event/edit/' . $event->eventID . "/") ?>" class="btn btn-primary btn-sm">
              <i class="bi bi-pencil"></i> <?= $this->lang->line('edit') ?>
            </a>
          <?php } ?>

          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mail">
            <i class="bi bi-envelope"></i> <?= $this->lang->line('mail') ?>
          </button>
        </div>



        <div class="profile-view-head-cover" style="background-image: url(<?= base_url('uploads/images/' . $event->photo) ?>);">
          <h1 class="img-thumbnail picture-left"><?= date("d M", strtotime($event->fdate)) ?></h1>
          <?php if ($event->fdate != $event->tdate) { ?>
            <h1 class="img-thumbnail picture-right"><?= date("d M", strtotime($event->tdate)) ?></h1>
          <?php } ?>
        </div>

        <div class="text-center my-4">
          <div class="btn-group">
            <button id="going" style="background-color:#004B98 !important" class="btn btn-primary"><?= $this->lang->line('going') ?></button>
            <button style="background-color:#0A75AF" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#goings"><?= inicompute($goings) ?></button>
          </div>
          <div class="btn-group">
            <button style="background-color:#B00303" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ignores"><?= inicompute($ignores) ?></button>
            <button id="ignore" style="background-color:#C23321" class="btn btn-warning"><?= $this->lang->line('ignore') ?></button>
          </div>
        </div>

        <div class="panel-body profile-view-dis">
          <div class="text-center">
            <h1><?= $event->title ?></h1>
            <h4>
              <?= date("d M Y", strtotime($event->fdate)) ?>
              <?php echo " at " . date("h:i A", strtotime($event->ftime)); ?>
              <?php if ($event->fdate != $event->tdate) {
                echo " <b>to</b> " . date("d M Y", strtotime($event->tdate)) . " at ";
              } else {
                echo " - ";
              }
              echo date("h:i A", strtotime($event->ttime));
              ?>
            </h4>
          </div>
          <div class="row my-4">
            <div class="col-md-6 offset-md-3">
              <?= $event->details ?>
            </div>
          </div>
        </div>

      </div>

      <!-- Going modal starts -->
      <div class="modal fade" id="goings" tabindex="-1" aria-labelledby="goingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="goingModalLabel"><?= $this->lang->line('going') ?> (<?= inicompute($goings) ?>)</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td><?= $this->lang->line('slno') ?></td>
                    <td><?= $this->lang->line('event_photo') ?></td>
                    <td><?= $this->lang->line('event_name') ?></td>
                    <td><?= $this->lang->line('event_user') ?></td>
                  </tr>
                </thead>
                <?php if (inicompute($goings)) {
                  $i = 1;
                  foreach ($goings as $going) { ?>
                    <tbody>
                      <tr>
                        <td><?= $i ?></td>
                        <td><img alt="" class="img-thumbnail" style="border-color:green; width:50px; height:50px;" src="<?= base_url('uploads/images/' . $going->photo) ?>"></td>
                        <td><?= $going->name ?></td>
                        <td><?= $going->type ?></td>
                      </tr>
                    </tbody>
                <?php $i++;
                  }
                } ?>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Going modal ends -->

      <!-- Ignore modal starts -->
      <div class="modal fade" id="ignores" tabindex="-1" aria-labelledby="ignoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="ignoreModalLabel"><?= $this->lang->line('ignore') ?> (<?= inicompute($ignores) ?>)</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td><?= $this->lang->line('slno') ?></td>
                    <td><?= $this->lang->line('event_photo') ?></td>
                    <td><?= $this->lang->line('event_name') ?></td>
                    <td><?= $this->lang->line('event_user') ?></td>
                  </tr>
                </thead>
                <?php if (inicompute($ignores)) {
                  $i = 1;
                  foreach ($ignores as $ignore) { ?>
                    <tbody>
                      <tr>
                        <td><?= $i ?></td>
                        <td><img alt="" class="img-thumbnail" style="border-color:green; width:50px; height:50px;" src="<?= base_url('uploads/images/' . $ignore->photo) ?>"></td>
                        <td><?= $ignore->name ?></td>
                        <td><?= $ignore->type ?></td>
                      </tr>
                    </tbody>
                <?php $i++;
                  }
                } ?>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Ignore modal ends -->

      <!-- Send mail modal starts -->
      <form class="form-horizontal" role="form" action="<?= base_url('event/send_mail'); ?>" method="post">
        <div class="modal fade" id="mail" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="mailModalLabel"><?= $this->lang->line('mail') ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="to" class="form-label"><?= $this->lang->line("to") ?> <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>">
                  <div id="to_error" class="form-text text-danger"></div>
                </div>

                <div class="mb-3">
                  <label for="subject" class="form-label"><?= $this->lang->line("subject") ?> <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>">
                  <div id="subject_error" class="form-text text-danger"></div>
                </div>

                <div class="mb-3">
                  <label for="message" class="form-label"><?= $this->lang->line("message") ?></label>
                  <textarea class="form-control" id="message" name="message" style="resize: vertical;"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                <input type="button" id="send_pdf" class="btn btn-success" value="<?= $this->lang->line("send") ?>" />
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Send mail modal ends -->
    </div>
  </div>
</div>
<script type="text/javascript">
  function printDiv(divID) {
    var divElements = document.getElementById(divID).innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
    window.print();
    document.body.innerHTML = oldPage;
  }

  document.getElementById('going').addEventListener('click', function() {
    var id = "<?= $id; ?>";
    fetch("<?= base_url('event/eventcounter') ?>", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id=' + id + '&status=1'
    }).then(() => location.reload());
  });

  document.getElementById('ignore').addEventListener('click', function() {
    var id = "<?= $id; ?>";
    fetch("<?= base_url('event/eventcounter') ?>", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id=' + id + '&status=0'
    }).then(() => location.reload());
  });

  function check_email(email) {
    var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    if (!email.match(emailRegEx)) {
      document.getElementById("to_error").innerText = "<?= $this->lang->line('mail_valid') ?>";
      return false;
    }
    return true;
  }

  document.getElementById("send_pdf").addEventListener('click', function() {
    var to = document.getElementById('to').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    var eventID = "<?= $event->eventID; ?>";
    var error = 0;

    document.getElementById("to_error").innerText = "";
    if (!to) {
      error++;
      document.getElementById("to_error").innerText = "<?= $this->lang->line('mail_to') ?>";
    } else if (!check_email(to)) {
      error++;
    }

    if (!subject) {
      error++;
      document.getElementById("subject_error").innerText = "<?= $this->lang->line('mail_subject') ?>";
    } else {
      document.getElementById("subject_error").innerText = "";
    }

    if (error == 0) {
      document.getElementById('send_pdf').disabled = true;
      fetch("<?= base_url('event/send_mail') ?>", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'to=' + to + '&subject=' + subject + "&eventID=" + eventID + "&message=" + message
      }).then(response => response.json()).then(data => {
        if (!data.status) {
          document.getElementById('send_pdf').disabled = false;
          Object.keys(data).forEach(index => {
            if (index !== 'status') {
              toastr.error(data[index]);
            }
          });
        } else {
          location.reload();
        }
      });
    }
  });
</script>