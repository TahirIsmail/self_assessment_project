<style>
    .all-courses-container {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
    }

    .courses-list,
    .course-detail {
        padding: 15px;
        border-radius: 8px;
        margin: 10px;
        box-sizing: border-box;
    }

    .courses-list {
        flex: 0 0 30%;
    }

    .course-detail {
        flex: 0 0 60%;
    }

    .courses-list ul {
        list-style-type: none;
        padding: 0;
    }

    .courses-list ul li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        background-color: #be2c2c;
        margin-bottom: 5px;
        color: #ffffff;
        font-size: 1em;
    }

    .course-detail img {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .course-detail p,
    .course-detail ul {
        text-align: justify;
        color: #333;
        line-height: 1.6;
        font-size: 1em;
    }

    .booking-table {
        width: 100%;
        max-width: 900px;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 0.9em;
    }

    .booking-table th,
    .booking-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        color: #333;
    }

    .booking-table th {
        background-color: #ffefeb;
        font-weight: bold;
    }

    .booking-table tr:nth-child(even) {
        background-color: #ffefe0;
    }

    .booking-table tr:nth-child(odd) {
        background-color: #fff7f1;
    }

    .booking-table button {
        background-color: #b71c1c;
        color: white;
        border: none;
        padding: 4px 8px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 0.65em;
        transition: background-color 0.3s ease;
    }

    .booking-table button:hover {
        background-color: #8e0000;
    }

    @media (max-width: 768px) {

        .courses-list,
        .course-detail {
            flex: 0 0 100%;
        }

        .booking-table,
        .booking-table th,
        .booking-table td {
            display: block;
            width: 100%;
        }

        .booking-table th,
        .booking-table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .booking-table th::before,
        .booking-table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }

        .booking-table th:last-child,
        .booking-table td:last-child {
            border-bottom: 2px solid #ddd;
        }
    }










    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        margin-bottom: 5px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn.active {
        background-color: #000;
        color: #fff;
    }

    .icon {
        font-size: 16px;
        transition: transform 0.3s;
    }

    .sub-list-show .icon {
        transform: rotate(180deg);
    }

    .sub-list {
        display: none;
        padding-left: 20px;
        margin: 0;
        border-left: 2px solid #ddd;
    }

    .sub-list li {
        background-color: #f9f9f9;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .sub-list li:last-child {
        border-bottom: none;
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .toast {
        display: flex;
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        min-width: 250px;
        opacity: 0;
        animation: fadeInOut 5s ease forwards;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .toast.toast-success {
        background-color: #28a745;
    }

    .toast.toast-error {
        background-color: #dc3545;
    }

    @keyframes fadeInOut {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }

        10% {
            opacity: 1;
            transform: translateY(0);
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(-30px);
        }
    }
</style>

<?php $this->load->view("components/frontend/header.php"); ?>
<div class="all-courses-container">
    <div id="toastContainer" class="toast-container"></div>

    <div class="courses-list">
        <h2>Courses</h2>
        <ul id="coursesContainer">
            <?php foreach ($all_courses as $course) { ?>
                <li class="btn btn-primary w-100">
                    <a href="<?= base_url('course/index/' . $course['slug']) ?>" style="color:white;">
                        <span class="course-title"><?php echo $course['course_name'] ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="course-detail">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">
                        <h2><?php echo $course_data['name']; ?></h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" class="col-md-12 h-10 mb-5">
                        <img class="h-100 w-100" src="<?= base_url('uploads/images/' . $course_data['image']) ?>" alt="Education Training Course">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p><?php echo $course_data['description']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Book a Course from our Wide-range of Venue (Online/Class-based)</h3>

        <table class="booking-table mb-5">
            <thead>
                <tr>
                    <th style="width: 5%;">Id</th>
                    <th style="width: 30%;">City</th>
                    <th style="width: 30%;">Address</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 5%;">Price</th>
                    <th style="width: 40%;">Book Now</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($course_data['centers'])) { ?>
                    <?php foreach ($course_data['centers'] as $index => $center) { ?>
                        <tr>
                            <td data-label="id"><?php echo $index + 1; ?></td>
                            <td data-label="City"><?php echo $center['city']; ?></td>
                            <td data-label="Address"><?php echo $center['address']; ?></td>
                            <td data-label="Date"><?php echo $center['date']; ?></td>
                            <td data-label="Price">£<?php echo $center['price']; ?></td>
                            <td data-label="Book Now">
                                <button onclick='checkLogin(<?= json_encode($course_data) ?>, <?= json_encode($slug) ?>, <?= json_encode($center) ?>)'>Add to Cart</button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px;">
                            No centers found for this course.
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <h3>Course Introduction</h3>
        <table class="mb-3">
            <tbody>
                <tr>
                    <td data-label="Course Introduction">
                        <p>Level 3 Award in Education and Training (AET) course
                            is designed to contribute towards the knowledge and
                            understanding for Further Education National Training
                            Organisation (FENTO) or the Employment National Training
                            Organisation (EMPNTO) occupational standards in the United
                            Kingdom. This course is designed for anyone wishing to enter
                            in the adult training and teaching industry in this country.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>This course is suitable if you work or want to work as a
                            teacher/trainer/tutor in Further Education Colleges, adult
                            and community education, beauty salon or beauty industry,
                            private training centres, voluntary sector, commerce, industry,
                            public sector, HM forces, Beauty Salon industry, Hair Extension
                            training, Eye Lashes, Grooming, Health Industry, aesthetic trainer,
                            Nail Technician, Waxing Training, Beauty schools, care home and Care
                            Instructor, Driving Instructors, NHS Trusts, various police and military
                            forces, Dog Grooming training, Midwives, Librarians, Laboratory Technicians,
                            Teaching Assistants, Higher Education Teaching Professional, Further
                            Education Teaching Professionals, Secondary Education Teaching
                            Professionals, SIA Security Instructor, Primary and Nursery Education
                            Teaching Professionals, Special Needs Education Teaching Professionals,
                            Security Industry, Teaching/Training, Educational Support Assistants,
                            Education Advisers and School Inspectors, Veterinarians, Nurses,
                            Care sector and First Aid sector.
                        </p>
                    </td>

                </tr>
            </tbody>
        </table>

        <h3>Course Overview</h3>
        <table class="mb-3">
            <tbody>
                <tr>
                    <td data-label="Course Overview">
                        <p>Chapter 1: The roles and responsibilities of a teacher / Trainer in education & Training<br>
                            Chapter 2: Relationships between education and training<br>
                            Chapter 3: Inclusive teaching approaches to meet the needs of learners<br>
                            Chapter 4: Principle of assessment in Education and Training<br>
                            Chapter 5: How to create a safe and supportive learning environment<br>
                            Chapter 6: How to motivate learners<br>
                            Chapter 7: Planning, delivery and evaluation of inclusive teaching and training<br>
                            Chapter 8: Different assessment methods<br>
                            Chapter 9: How to recognise and deal with potential problems<br>
                            Chapter 10: Teaching equipment and aids<br>
                            Chapter 11: Practical teaching sessions (Teaching concept and Technique)
                        </p>
                    </td>

                </tr>
            </tbody>
        </table>

        <h3>Entry Requirement</h3>
        <table class="mb-3">
            <tbody>
                <tr>
                    <td data-label="Entry Requirement">
                        <p>Level 3 Award in Education and Training AET is an introductory,
                            knowledge based teaching qualification. It can be undertaken by
                            individuals who are not yet in a teaching or training role (pre-service)
                            or are currently teaching or training (in-service), however the
                            learners/candidates must be 19 years or above. </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<form method="post" id="paymentAddDataForm" action="<?= base_url('course/payment') ?>" enctype="multipart/form-data">
    <div class="modal fade" id="addpayment" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title mb-0" id="addPaymentModalLabel"><?= $this->lang->line('take_exam_add_payment') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type="hidden" name="course_slug" id="course_slug">
                        <input type="hidden" name="student_id" id="student_id">
                        <input type="hidden" name="center_course_id" id="center_course_id">

                        <div class="col-sm-6">
                            <div class="mb-3 <?= form_error('paymentAmount') ? 'is-invalid' : ''; ?>" id="paymentAmountErrorDiv">
                                <label for="paymentAmount" class="form-label"><?= $this->lang->line('take_exam_payment_amount') ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" readonly="readonly">
                                <div class="invalid-feedback" id="paymentAmountError"><?= form_error('paymentAmount') ?></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3 <?= form_error('payment_method') ? 'is-invalid' : ''; ?>" id="payment_method_error_div">
                                <label for="payment_method" class="form-label"><?= $this->lang->line('take_exam_payment_method') ?> <span class="text-danger">*</span></label>
                                <?php
                                $payment_method_array['select'] = $this->lang->line('take_exam_select_payment_method');
                                if (customCompute($payment_settings)) {
                                    foreach ($payment_settings as $payment_setting) {
                                        $payment_method_array[$payment_setting->slug] = $payment_setting->name;
                                    }
                                }
                                echo form_dropdown("payment_method", $payment_method_array, set_value("payment_method"), "id='payment_method' class='form-select select2'");
                                ?>
                                <div class="invalid-feedback" id="payment_method_error"><?= form_error('payment_method') ?></div>
                            </div>
                        </div>

                        <!-- Additional Inputs -->
                        <?php
                        if (inicompute($payment_settings)) {
                            foreach ($payment_settings as $payment_setting) {
                                if ($payment_setting->misc != null) {
                                    $misc = json_decode($payment_setting->misc);
                                    if (inicompute($misc->input)) {
                                        foreach ($misc->input as $input) {
                                            $this->load->view($input);
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                    <input type="submit" id="add_payment_button" class="btn btn-success" value="<?= $this->lang->line("take_exam_add_payment") ?>" />
                </div>
            </div>
        </div>
    </div>
</form>


<?php
$js_gateway     = [];
$submit_gateway = [];
if (inicompute($payment_settings)) {
    foreach ($payment_settings as $payment_setting) {
        if ($payment_setting->misc != null) {
            $misc = json_decode($payment_setting->misc);
            if (inicompute($misc->js)) {
                foreach ($misc->js as $js) {
                    $this->load->view($js);
                }
            }

            if (inicompute($misc->input)) {
                if (isset($misc->input[0])) {
                    $js_gateway[$payment_setting->slug] = isset($misc->input[0]);
                }
            }

            if (inicompute($misc->input)) {
                if (isset($misc->submit) && $misc->submit) {
                    $submit_gateway[$payment_setting->slug] = $misc->submit;
                }
            }
        }
    }
}

$js_gateway     = json_encode($js_gateway);
$submit_gateway = json_encode($submit_gateway);
?>

<?php $this->load->view("components/frontend/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/inilabs/easing/easing.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/inilabs/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/inilabs/wow/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/inilabs/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/inilabs/landing_js/main.js'); ?>"></script>

<?php if ($this->session->flashdata('success')): ?>
    <script type="text/javascript">
        showToast('success', "<?= $this->session->flashdata('success'); ?>");

        function showToast(type, message) {

            var toastContainer = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast toast-' + type;
            toast.textContent = message;

            toastContainer.appendChild(toast);

            // Remove the toast after 5 seconds (animation duration)
            setTimeout(function() {
                toast.remove();
            }, 5000);
        }
    </script>
<?php $this->session->set_flashdata('success', '');
endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script type="text/javascript">
        showToast('error', "<?= $this->session->flashdata('error'); ?>");

        function showToast(type, message) {

            var toastContainer = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast toast-' + type;
            toast.textContent = message;

            toastContainer.appendChild(toast);

            // Remove the toast after 5 seconds (animation duration)
            setTimeout(function() {
                toast.remove();
            }, 5000);
        }
    </script>
<?php $this->session->set_flashdata('error', '');
endif; ?>
<script>

</script>
<script>
    const gateway = <?= $js_gateway ?>;
    const submit_gateway = <?= $submit_gateway ?>;
    let form = document.getElementById('paymentAddDataForm');
</script>
<script>
    $(document).ready(function() {



        // Handle form submission
        $('#paymentAddDataForm').submit(function(event) {

            event.preventDefault(); // Prevent default form submission

            let payment_method = $('#payment_method').val();
            let submit = true;
            // Call payment gateway function if exists
            for (let item in submit_gateway) {
                if (item === payment_method) {
                    submit = true;
                    window[payment_method + '_payment'](); // Call the payment method function dynamically
                    break;
                }
            }

            if (submit) {

                // let formData = new FormData(this);

                // $.ajax({
                //     url: "<?= base_url('home/payment') ?>", // Target URL
                //     type: "POST",
                //     data: formData,
                //     processData: false,
                //     contentType: false,
                //     success: function(response) {

                //         // Show success message and close the modal
                //         showToast('success', 'Payment successfully processed.');
                //         // $('#addpayment').modal('hide'); // Close the modal
                //         // $('#paymentAddDataForm')[0].reset(); // Reset the form
                //     },
                //     error: function(xhr, status, error) {
                //         // Handle error response
                //         showToast('error', 'Failed to process payment. Please try again.');
                //     }
                // });
            }
        });

        // Close modal and reset form when close button is clicked
        $('#addpayment .btn-default').click(function() {
            $('#paymentAddDataForm')[0].reset();
        });
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1, // Adjust the number of visible items as needed
            autoplay: true,
            autoplayTimeout: 5000, // Adjust the timeout for autoplay
            autoplayHoverPause: true
        });
    });
    isLoggedIn = <?= json_encode($is_logged_in)

                    ?>;


    function checkLogin(course_data, course_slug, center) {
        if (isLoggedIn) {
            $('#student_id').val(isLoggedIn);
            $('#center_course_id').val(course_data.center_course_id);
            $('#course_slug').val(course_slug);
            $('#paymentAmount').val(center.price);
            $('#addpayment').modal('show');
        } else {
            window.location.href = "<?= base_url('signin/index?course_slug=') ?>" + course_slug;
        }
    }

    function runner() {

        url = localStorage.getItem('redirect_url');
        if (url) {
            localStorage.clear();
            window.location = url;
        }
        setTimeout(function() {
            runner();
        }, 500);
    }

    $(document).change(function() {

        console.log(gateway);
        let payment_method = $('#payment_method').val();
        for (let item in gateway) {
            if (item == payment_method) {
                if (gateway[item]) {
                    $('#' + item + '_div').show();
                }
            } else {
                $('#' + item + '_div').hide();
            }
        }
    });
</script>