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

    /* .courses-list h2,
    .course-detail h2 {
        color: #b71c1c;
        font-size: 1.5em;
    } */

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
        /* Default button color */
        color: #fff;
        /* Default text color */
        padding: 15px;
        margin-bottom: 5px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        /* Ensure text color transitions smoothly */
    }

    .btn:hover {
        background-color: #0056b3;
        /* Darker blue when hovering */
    }

    .btn.active {
        background-color: #000;
        /* Black background for active state */
        color: #fff;
        /* White text color for active state */
    }

    .icon {
        font-size: 16px;
        transition: transform 0.3s;
        /* Ensure smooth icon rotation */
    }

    .sub-list-show .icon {
        transform: rotate(180deg);
        /* Rotate icon when sub-list is visible */
    }

    .sub-list {
        display: none;
        padding-left: 20px;
        margin: 0;
        border-left: 2px solid #ddd;
        /* Border to visually separate sub-lists */
    }

    .sub-list li {
        background-color: #f9f9f9;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .sub-list li:last-child {
        border-bottom: none;
    }
</style>

<?php $this->load->view("components/frontend/header.php"); ?>

<div class="all-courses-container">
    <!-- <div class="courses-list">
        <h2>Courses</h2>
        <ul>
            <li class="btn btn-primary  w-100 ">Level 3: Award in Education & Training (AET) Course</li>
            <li class="btn btn-primary  w-100 ">Level 4: Certificate in Education & Training (CET) Course</li>
            <li class="btn btn-primary  w-100 ">Level 5: Diploma in Education & Training (DET) Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Teacher Training (PTLLS) Course</li>
            <li class="btn btn-primary  w-100 ">Level 4: Certificate in Teaching (CTLLS) Course</li>
            <li class="btn btn-primary  w-100 "> Level 5: Diploma in Teaching (DTLLS) Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Assessor (TAQA) Understanding Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Assessor (TAQA) Vocational Level Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Assessor (TAQA) Competence Level Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Assessor Certificate (Combined) CAVA Course</li>
            <li class="btn btn-primary  w-100 ">Level 4: Verifier Award (IQA) Course</li>
            <li class="btn btn-primary  w-100 ">Study in the UK: International Students</li>
            <li class="btn btn-primary  w-100 ">Restraint Reduction Training Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Emergency First Aid at Work Course</li>
            <li class="btn btn-primary  w-100 ">Level 3 First Aid At Work 3 Day Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: SIA-Trainer Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Conflict Management Course</li>
            <li class="btn btn-primary  w-100 ">Level 3: Physical Intervention (Trainer) Course</li>
            <li class="btn btn-primary  w-100 ">Level 2: Upskilling Door Supervisor Course</li>
            <li class="btn btn-primary  w-100 ">Level 2: SIA Door Supervisor Course</li>
            <li class="btn btn-primary  w-100 ">Level 2: SIA CCTV Public Surveillance Course</li>
            <li class="btn btn-primary  w-100 ">Level 2: Security Guarding (SIA) Course</li>
            <li class="btn btn-primary  w-100 ">Level 2: Professional Taxi and Private Hire Driver Course</li>
            <li class="btn btn-primary  w-100 ">TFL PCO B1 English and SERU Training</li>
            <li class="btn btn-primary  w-100 ">Level 3: Driver CPC Training Course</li>
            <li class="btn btn-primary  w-100 ">Forklift 1 Day Refresher & Retest Course</li>
            <li class="btn btn-primary  w-100 ">Forklift 3 Day Basic Training Course</li>
            <li class="btn btn-primary  w-100 ">Forklift 5 Day Novice Operator Training</li>
        </ul>
    </div> -->
    <div class="courses-list">
        <h2>Courses</h2>
        <ul id="coursesContainer">
            <!-- Dynamic content will be injected here -->
        </ul>
    </div>




    <div class="course-detail">
        <h2>Level 3: Award in Education & Training (AET) Course</h2>
        <div class="col-md-12 h-10 mb-5">
            <img class="h-100 w-100" src="<?= base_url('uploads/landing_img/course-3.jpg') ?>" alt="Education Training Course">
        </div>
        <p>Level 3 Award in Education and Training (AET), formerly known as PTLLS, is designed to give people the knowledge and confidence to teach adults in any specialty subject area. It is suitable for those wishing to work as a teacher, trainer, or tutor in further education.</p>
        <p>Russbridge Academy offers this qualification via Distance Learning, Online, Face to Face Classroom, or Live Zoom classroom. This Level 3 AET is a direct replacement qualification of the Level 3/4 Preparing to Teach in the Lifelong Learning Sector (PTLLS) course, colloquially known as "PETALS" since 2011.</p>
        <p>This course is an initial teacher training qualification, also a Regulated Qualifications Framework (RQF) and OFQUAL regulated. It is best suited for those new to teaching or currently teaching in England, Wales, Scotland, and Ireland. It provides the knowledge and confidence to teach adult learners at a nationally accredited standard.</p>

        <div class="award-announcement">
            <p class="highlight-blue">We are delighted to share that Russbridge Academy Ltd has been awarded</p>
            <p class="highlight-brown">“Training Provider of the Year 2020 – London”</p>
            <p>and</p>
            <p class="highlight-orange">”Innovation and Excellence Awards – Training Provider of the Year 2021”</p>
            <p>and</p>
            <p class="highlight-red">”Global 100- 2022 Winner: Best Leading Training Provider – UK”</p>
        </div>

        <h3>Book a Course from our Wide-range of Venue (Online/ Class-based)</h3>
        <table class="booking-table mb-5">
            <thead>
                <tr>
                    <th style="width: 10%;">Id</th>
                    <th style="width: 25%;">City</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 10%;">Price</th>
                    <th style="width: 40%;">Book Now</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Stuart Crescent, Wood Green, London N22 5NJ</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>

                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">1 Greenhill Way, Harrow, London HA1 1LE</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">196 High Street, Stratford, London E15 2NE</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Suite 26, Harbour House, Coldharbour Lane, Rainham RM13 9YB</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Catherine Grove, Greenwich, London SE10 8FR</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Victoria Rd, North Acton, London W3 6UP</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">156 Blackfriars Road, Southwark, Elephant & Castle, London SE1 8EN</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Empire Way, Wembley, London HA9 8DS</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£269.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Main Road, Boreham, Essex CM3 3HJ</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£319.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Church Street, Chalvey, Slough SL1 2NH</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£319.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">The Watermill, London Road, Bourne End, Hemel Hempstead, Hertfordshire HP1 2RJ</td>
                    <td data-label="Date">
                        <select>
                            <option>5th - 7th Aug</option>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£319.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="id">1</td>
                    <td data-label="Address">Star City, Cuckoo Road, Heartlands Parkway Nechells, Birmingham B7 5SB</td>
                    <td data-label="Date">
                        <select>
                            <option>12th - 14th Aug</option>
                            <option>19th - 21st Aug</option>
                            <option>26th - 28th Aug</option>
                        </select>
                    </td>
                    <td data-label="Price">£319.99</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>


            </tbody>
        </table>

        <h3>Book for Combined Course</h3>
        <table class="booking-table">
            <thead>
                <tr>
                    <th style="width:55%">Course</th>
                    <th style="width:15%">Price</th>
                    <th style="width:30%">Book Now</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 4 CET / CTLLS Courses - Online</td>
                    <td data-label="Price">£680.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 4 CET / CTLLS Courses - Classroom</td>
                    <td data-label="Price">£830.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 5 DET / DTLLS Courses - Online</td>
                    <td data-label="Price">£1620.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 5 DET / DTLLS Courses - Classroom</td>
                    <td data-label="Price">£1850.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor Understanding Unit Courses - Online</td>
                    <td data-label="Price">£430.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor Understanding Unit Courses - Classroom</td>
                    <td data-label="Price">£530.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor Vocational / Competence Courses - Online</td>
                    <td data-label="Price">£490.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor Vocational / Competence Courses - Classroom</td>
                    <td data-label="Price">£720.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor CAVA Courses - Online</td>
                    <td data-label="Price">£525.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
                <tr>
                    <td data-label="Course">Level 3 AET / PTLLS & Level 3 Assessor CAVA Courses - Classroom</td>
                    <td data-label="Price">£740.00</td>
                    <td data-label="Book Now">Quantity: <input type="number" min="1" value="1"><button>Add to Cart</button></td>
                </tr>
            </tbody>
        </table>

        <!-- New sections added in the table structure -->
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

<?php $this->load->view("components/frontend/footer.php"); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const courses = [{
                id: 'aet',
                title: 'DOOR SUPERVISOR',
                subItems: ['Sub-item 1', 'Sub-item 2']
            },
            {
                id: 'cet',
                title: 'CLOSE PROTECTION',
                subItems: ['Sub-item 1', 'Sub-item 2']
            }
            // Add more courses as needed
        ];

        const coursesContainer = document.getElementById('coursesContainer');

        // Function to render courses
        function renderCourses(courses) {
            courses.forEach(course => {
                const courseItem = document.createElement('li');
                courseItem.className = 'btn btn-primary w-100';
                courseItem.innerHTML = `
                <span class="course-title">${course.title}</span>
                <span class="icon">&#9662;</span> <!-- Downward arrow -->
            `;

                const subList = document.createElement('ul');
                subList.className = 'sub-list';
                subList.id = course.id;
                subList.style.display = 'none';

                course.subItems.forEach(subItem => {
                    const subItemElement = document.createElement('li');
                    subItemElement.className = 'btn btn-primary w-100';
                    subItemElement.textContent = subItem;
                    subList.appendChild(subItemElement);
                });

                coursesContainer.appendChild(courseItem);
                coursesContainer.appendChild(subList);
            });
        }

        renderCourses(courses);

        // Event delegation for handling clicks on course items and sub-list items
        coursesContainer.addEventListener('click', function(event) {
            const target = event.target.closest('.btn');

            if (target) {
                const subList = target.nextElementSibling;

                if (subList && subList.classList.contains('sub-list')) {
                    // Close all other sub-lists
                    document.querySelectorAll('.sub-list').forEach(list => {
                        if (list !== subList) {
                            list.style.display = 'none';
                        }
                    });

                    // Remove active class from all course buttons
                    document.querySelectorAll('.btn').forEach(button => {
                        if (button !== target) {
                            button.classList.remove('active');
                        }
                    });

                    // Toggle the clicked sub-list and button
                    if (subList.style.display === 'none' || subList.style.display === '') {
                        subList.style.display = 'block';
                        target.classList.add('active');
                    } else {
                        subList.style.display = 'none';
                        target.classList.remove('active');
                    }
                } else {
                    // Handle clicks on sub-list items
                    if (target.parentElement.classList.contains('sub-list')) {
                        // Remove active class from all sub-list items
                        document.querySelectorAll('.sub-list .btn').forEach(button => {
                            button.classList.remove('active');
                        });

                        // Add active class to the clicked sub-list item
                        target.classList.add('active');
                    }
                }
            }
        });
    });
</script>