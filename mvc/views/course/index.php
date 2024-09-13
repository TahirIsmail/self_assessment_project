<?php 
$this->load->view("components/frontend/header.php"); 
?>

<div class="all-courses-container">
    <!-- Courses List -->
    <div class="courses-list">
        <h2>Courses</h2>
        <ul id="coursesContainer">
            <?php if (!empty($course)): ?>
                <?php foreach($course as $course_item): ?>
                    <li class="btn btn-primary w-100" onclick="showCourseDetail('<?php echo $course_item['id']; ?>')">
                        <?php echo $course_item['name']; ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No courses available</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Course Detail -->
    <div class="course-detail" id="courseDetail">
        <?php if (!empty($course)): 
            $first_course = reset($course); 
        ?>
            <h2 id="courseTitle"><?php echo $first_course['name']; ?></h2>
            <div class="col-md-12 h-10 mb-5">
                <img class="h-100 w-100" id="courseImage" src="<?= base_url(''.$first_course['photo']) ?>" alt="<?php echo $first_course['name']; ?>">
            </div>
            <p id="courseDescription"><?php echo $first_course['description']; ?></p>

            <!-- Displaying Created and Updated Information -->
            <p>Created At: <?php echo date('d M Y', strtotime($first_course['created_at'])); ?></p>
            <p>Updated At: <?php echo !empty($first_course['updated_at']) ? date('d M Y', strtotime($first_course['updated_at'])) : 'Not Updated'; ?></p>

            <!-- Awards and Announcements -->
            <div class="award-announcement">
                <p class="highlight-blue">We are delighted to share that Russbridge Academy Ltd has been awarded</p>
                <p class="highlight-brown">“Training Provider of the Year 2020 – London”</p>
                <p>and</p>
                <p class="highlight-orange">”Innovation and Excellence Awards – Training Provider of the Year 2021”</p>
                <p>and</p>
                <p class="highlight-red">”Global 100- 2022 Winner: Best Leading Training Provider – UK”</p>
            </div>

            <!-- Booking Table -->
            <h3>Book a Course from our Wide-range of Venue (Online/ Class-based)</h3>
            <table class="booking-table mb-5" id="bookingTable">
                <thead>
                    <tr>
                        <th style="width: 10%;">Id</th>
                        <th style="width: 25%;">City</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 40%;">Book Now</th>
                    </tr>
                </thead>
                <tbody id="centerList">
                    <?php if (!empty($first_course['centers'])): ?>
                        <?php foreach ($first_course['centers'] as $index => $center): ?>
                            <tr>
                                <td data-label="Id"><?php echo $index + 1; ?></td>
                                <td data-label="City"><?php echo $center['city']; ?></td>
                                <td data-label="Date"><?php echo $center['date']; ?></td>
                                <td data-label="Price"><?php echo '£'.$center['price']; ?></td>
                                <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No center information available for this course.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

<!-- New Table for Center Courses -->
<h3>Center Course Details</h3>
<table class="booking-table mb-5" id="centerCourseTable"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Center ID</th>
            <th>Course ID</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($first_course['centers'])): ?>
            <?php foreach ($first_course['centers'] as $center): ?>
                <tr>
                    <td><?php echo isset($center['center_course_id']) ? $center['center_course_id'] : 'N/A'; ?></td>
                    <td><?php echo isset($center['center_id']) ? $center['center_id'] : 'N/A'; ?></td>
                    <td><?php echo isset($center['course_id']) ? $center['course_id'] : 'N/A'; ?></td>
                    <td><?php echo '£' . (isset($center['price']) ? $center['price'] : '0.00'); ?></td>
                    <td><?php echo !empty($center['center_course_created_at']) ? date('d M Y', strtotime($center['center_course_created_at'])) : 'N/A'; ?></td>
                    <td><?php echo !empty($center['center_course_updated_at']) ? date('d M Y', strtotime($center['center_course_updated_at'])) : 'Not Updated'; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No center course information available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


        <?php else: ?>
            <p>No course details available.</p>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view("components/frontend/footer.php"); ?>


<!-- JavaScript to handle course details dynamically -->
<script>
function showCourseDetail(courseId) {
    const courses = <?php echo json_encode($course); ?>;

    if (courses[courseId]) {
        document.getElementById('courseTitle').innerText = courses[courseId].name;
        document.getElementById('courseImage').src = '<?= base_url("uploads/landing_img/"); ?>' + courses[courseId].photo;
        document.getElementById('courseImage').alt = courses[courseId].name;
        document.getElementById('courseDescription').innerText = courses[courseId].description;

        let centerList = '';
        if (courses[courseId].centers.length > 0) {
            courses[courseId].centers.forEach((center, index) => {
                centerList += `<tr>
                    <td>${index + 1}</td>
                    <td>${center.city}</td>
                    <td>
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td>£${center.price}</td>
                    <td>Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>`;
            });
        } else {
            centerList = `<tr><td colspan="5">No center information available for this course.</td></tr>`;
        }
        document.getElementById('centerList').innerHTML = centerList;
    }
}
</script>


<style>
    .all-courses-container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
}

.courses-list, .course-detail {
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

.course-detail p, .course-detail ul {
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

.booking-table th, .booking-table td {
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
    .courses-list, .course-detail {
        flex: 0 0 100%;
    }
    .booking-table, .booking-table th, .booking-table td {
        display: block;
        width: 100%;
    }
}


</style>