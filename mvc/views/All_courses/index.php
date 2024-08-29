<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <style>
        .all-courses-container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
    font-family: Arial, sans-serif;
    background-color: #fdf2f0; /* Nude background */
}

.courses-list, .course-detail {
    padding: 8px; /* Reduced padding */
    border-radius: 8px;
    margin: 10px;
    box-sizing: border-box;
}

.courses-list {
    background-color: rgb(246, 235, 235); /* Nude red background for the course list */
    flex: 0 0 28%;
}

.course-detail {
    flex: 0 0 68%;
}

.courses-list h2, .course-detail h2 {
    color: #b71c1c; /* Flaming red */
    font-size: 1.5em;
    margin: 0;
}

.courses-list ul {
    list-style-type: none;
    padding: 0;
}

.courses-list ul li {
    padding: 6px; /* Reduced padding for smaller size */
    border: 1px solid transparent;
    background-color: #f4dcdc; /* Lighter nude red shade for the course boxes */
    margin-bottom: 10px; /* Reduced margin */
    color: #b71c1c;
    font-size: 1em;
    border-radius: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.courses-list ul li:hover,
.courses-list ul li.active {
    border: 1px solid #ff4c4c;
    background-color: #fcdede; /* Slightly different background on hover */
    box-shadow: 0 8px 16px rgba(183, 28, 28, 0.4);
    transform: scale(1.05);
    cursor: pointer;
}

.course-detail img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
    border-radius: 8px;
}

.course-detail p, .course-detail ul {
    color: #333;
    line-height: 1.6;
    font-size: 1em;
}

.course-detail ul {
    list-style-type: disc;
    padding-left: 20px;
}

.booking-table {
    width: 100%;
    max-width: 900px;
    margin: 20px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 0.9em;
    border-radius: 8px;
    overflow: hidden;
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

.booking-table tr:hover {
    background-color: #000;
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

.booking-table input[type="number"] {
    width: 50px;
    font-size: 0.6em;
    padding: 4px;
    margin-right: 5px;
}

.award-announcement {
    text-align: center;
    margin: 20px 0;
    font-size: 1.1em;
}

.award-announcement p {
    margin: 5px 0;
}

.award-announcement .highlight-blue {
    color: #0288d1;
    font-weight: bold;
}

.award-announcement .highlight-brown {
    color: #795548;
    font-weight: bold;
}

.award-announcement .highlight-orange {
    color: #ff8c00;
    font-weight: bold;
}

.award-announcement .highlight-red {
    color: #b71c1c;
    font-weight: bold;
}

@media (max-width: 768px) {
    .courses-list, .course-detail {
        flex: 0 0 100%;
    }

    .booking-table, .booking-table th, .booking-table td {
        display: block;
        width: 100%;
    }

    .booking-table th, .booking-table td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    .booking-table th::before, .booking-table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-weight: bold;
        text-align: left;
    }

    .booking-table th:last-child, .booking-table td:last-child {
        border-bottom: 2px solid #ddd;
    }
}


           </style>
</head>
<body>
<nav>
    <a href="<?= base_url('all_courses/index') ?>" class="navbar-brand p-0">All Courses</a>
</nav>
<div class="all-courses-container">
    <div class="courses-list">
        <h2>Courses</h2>
        <ul>
            <?php foreach ($courses as $course): ?>
                <li><?= htmlspecialchars($course['name']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="course-detail">
        <h2><?= htmlspecialchars($courseDetails['name']); ?></h2>
        <img src="<?= base_url('uploads/landing_img/' . $courseDetails['image']); ?>" alt="<?= htmlspecialchars($courseDetails['name']); ?>">
        <p><?= htmlspecialchars($courseDetails['description']); ?></p>
        <!-- Additional course details -->

        <div class="award-announcement">
            <p class="highlight-blue">We are delighted to share that Russbridge Academy Ltd has been awarded</p>
            <p class="highlight-brown">“Training Provider of the Year 2020 – London”</p>
            <p>and</p>
            <p class="highlight-orange">”Innovation and Excellence Awards – Training Provider of the Year 2021”</p>
            <p>and</p>
            <p class="highlight-red">”Global 100- 2022 Winner: Best Leading Training Provider – UK”</p>
        </div>

        <h3>Book a Course from our Wide-range of Venue (Online/ Class-based)</h3>
        <table class="booking-table">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Book Now</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over venues, assuming $courseDetails['venues'] contains an array of venues -->
                <?php foreach ($courseDetails['venues'] as $venue): ?>
                    <tr>
                        <td data-label="Location"><?= htmlspecialchars($venue['location']); ?></td>
                        <td data-label="Address"><?= htmlspecialchars($venue['address']); ?></td>
                        <td data-label="Date">
                            <select>
                                <?php foreach ($venue['dates'] as $date): ?>
                                    <option><?= htmlspecialchars($date); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td data-label="Price"><?= htmlspecialchars($venue['price']); ?></td>
                        <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
