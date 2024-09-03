<style>
    .section {
        display: flex;
        align-items: center;
        /* Vertically centers the content */
        justify-content: flex-start;
        /* Horizontally centers the content */
        background-size: cover;
        background-position: center;
        height: 500px;
        /* padding: 0 50px; */
        box-sizing: border-box;
    }


    .content {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px 20px;
        border-radius: 15px;
        margin-top: 20px;
    }

    .btn-custom {
        background-color: #EF0107;
        color: white;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-custom:hover {
        background-color: #d40806;
    }

    .btn-custom:active {
        background-color: #b00705;
    }

    .expandable .description {
        display: none;
    }

    .expandable.expanded .description {
        display: block;
    }

    .toggle {
        cursor: pointer;
    }

  

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 15px;
        font-size: 18px;
        color: #555;
        cursor: pointer;
        position: relative;
        padding-right: 25px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    li .toggle {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
        color: #EF0107;
    }

    li .description {
        display: none;
        margin-top: 10px;
        font-size: 16px;
        color: #777;
        padding-left: 20px;
    }

    li.expanded .description {
        display: block;
    }

    li.expanded .toggle::before {
        content: "–";
    }

    li .toggle::before {
        content: "+";
    }


    .esg-section ul {
        list-style-type: none;
        padding-left: 0;
    }

    .esg-section li {
        font-size: 18px;
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
        border-bottom: none;
    }

    .esg-section li::before {
        content: "✔";
        color: #EF0107;
        font-size: 24px;
        margin-right: 10px;
        line-height: 1;
    }



    .esg-section .image-content img {
        width: auto;
        height: 100%;
        max-width: 100%;
        object-fit: cover;
        border-radius: 15px;
    }
    .hiring p ,.Contact p ,.Data p ,.Success p ,.Data_Centres p
    {
        text-align: justify
    }

</style>


<?php $this->load->view("components/frontend/header.php"); ?>

<!-- First Section -->
<div class="container hiring my-5">
    <div class="section p-lg-5 rounded" style="background-image: url('<?php echo base_url('uploads/landing_img/course mock/image.jpg'); ?>');">
        <div class="content col-sm-12 col-md-6 ">
            <span class="btn btn-primary py-md-3 px-md-5 me-3 ">We're Hiring</span>
            <h1 class="mt-3">Data Centres</h1>
            <p>We emphasise proactive maintenance and strict condition management in environments where continuous service is crucial to ensure dependable service delivery.</p>
        </div>
    </div>
</div>
<!-- New Section -->
<div class="container my-5">
    <div class="row align-items-center Contact ">
        <div class="col-md-7 px-5">
            <h2>Best practices to deliver the best resilience, outcomes and continuity</h2>
            <p>In the world of data centres, where uptime and continuity are paramount, the demand for ultra-clean environments is critical. Our facilities services for data centres focus on meticulous cleanliness, adhering to stringent protocols that maintain the highest levels of hygiene.</p>
            <p>This hyper-hygienic ‘cleanroom cleaning’ approach is essential in preventing any particulate or microbial contamination that could disrupt operations.</p>
            <p>OCS has the specialised skills and extensive experience to deliver precision cleanroom cleaning services, ensuring that environments meet stringent cleanliness and contamination control standards.</p>
            <p>View Facilities Management (FM) or Single-Service solutions below.</p>
            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 my-3">Contact Our Data Centre Team</a>
        </div>
        <div class="col-md-5">
            <img src="<?php echo base_url('uploads/landing_img/course mock/image2.png'); ?>" alt="Image" class=" h-100 img-fluid rounded">
        </div>
    </div>
</div>

<!-- Data Centres FM Section -->
<div class="container my-5">
    <div class="row Data">
        <div class="col-md-7 px-5">
            <h2>Data Centres FM</h2>
            <p>Our mission’s BEST strategy and ethos addresses five areas of concern highlighted by industry leaders in reference to facilities management: Experiences, Productivity, Practices, Resilience and Outcomes.</p>
            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 my-3">Our Mission & Best Strategy</a>
        </div>
        <div class="col-md-5">
            <ul class="list-unstyled">
                <li class="expandable">
                    Sector-specific FM to create Best Experiences
                    <span class="toggle float-end"></span>
                    <div class="description">
                        Our services help you create environments that your customers and colleagues can keep coming back to. With careful attention, we take a comprehensive approach to developing and sustaining optimal spaces, considering every moment your people spend within it, ensuring they are provided with the best experiences.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to maintain Best Productivity
                    <span class="toggle float-end"></span>
                    <div class="description">
                        We strive to offer optimised solutions to enhance productivity every step of the way. With OCS Advance, our suite of tools and apps, we work smarter to maximise the uptime and longevity of your facilities, providing you with the equipment you need to stay informed about the progress and status of tasks.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to ensure Best Practice
                    <span class="toggle float-end"></span>
                    <div class="description">
                        Our safety-first approach, entrenched in our Code of Conduct and QHSE policies, guides our manner of operating. By prioritising the safety of your colleagues, communities, customers, and the environment, we create the best possible practices that help foster empathetic, secure, and impactful working cultures within your business.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to implement Best Resilience
                    <span class="toggle float-end"></span>
                    <div class="description">
                        We remain vigilant and ensure that we never take the daily operations behind your business for granted. Through acute and alert responses to the unforeseen, along with planned preventative maintenance for regular upkeep, we help your operations remain durable and resilient. In times of crisis, we work with you to ensure the secure emergence of your customers, visitors, and colleagues.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to enable Best Outcomes
                    <span class="toggle float-end"></span>
                    <div class="description">
                        We listen to and collaborate with you to understand your mission, forging a collective goal as we work together. By aligning our mission with yours, we adapt and customise our services to uniquely suit your outcomes and goals, assisting you in creating a lasting positive impact on your places and communities.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Info Section -->
<div class="container my-5">
    <div class="row Success">
        <div class="col-md-5">
            <img src="<?php echo base_url('uploads/landing_img/course mock/pic1.png'); ?>" alt="Image" class="h-100 img-fluid rounded">
        </div>
        <div class="col-md-7 px-5">
            <h2>Success is built on industry insights and a dedication to the detail</h2>
            <p>Our specialised cleaning services focus on creating a healthier atmosphere by meticulously removing dust, debris, and other contaminants. Achieving the highest levels of cleanliness promotes the well-being of personnel and ensures a safer working environment. Our approach involves hyper-hygienic cleaning methods and proactive maintenance, which play a crucial role in extending the lifespan of critical equipment, thus reducing the frequency of replacements and minimising any costly operational downtime.</p>
            <p>We provide flexible scheduling options to suit your needs, from annual to monthly cleanings. These services are also available for emergencies, such as in response to floods or other disasters, and for preparing spaces for new equipment installation post-construction. Additionally, our cleaning processes are designed to maintain optimal power quality, sustain the necessary humidity levels, and enhance indoor air quality, contributing to the overall efficiency and safety of the environment.</p>
        </div>
    </div>
</div>

<!-- ESG Section -->
<div class="container my-5 esg-section">
    <div class="row Data_Centres">
        <div class="col-md-7 px-5">
            <h2>Data Centres + ESG</h2>
            <p>OCS provides carbon management services for data centres, focusing on reducing their carbon footprint and enhancing sustainability. These services are crucial in a country like India, where demand for data storage and processing is growing alongside an increasing emphasis on environmental responsibility.</p>
            <ul class="list-unstyled">
                <li>
                    <p>
                        We conduct detailed energy audits to identify areas where data centres can improve energy efficiency. By optimising power usage effectiveness (PUE), we help data centres reduce their energy consumption, which directly impacts their carbon emissions.
                    </p>
                </li>
                <li>
                    <p>
                        We offer comprehensive waste management solutions, focusing on recycling electronic waste and other materials. Proper disposal and recycling of e-waste are essential in data centres to minimise their environmental impact.
                    </p>
                </li>
                <li>
                    <p>
                        We support data centres in transitioning to renewable energy sources, such as solar or wind power. This shift not only reduces reliance on fossil fuels but also significantly cuts down on greenhouse gas emissions.
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-5">
            <img src="<?php echo base_url('uploads/landing_img/course mock/pic4.png'); ?>" alt="Image" class="img-fluid rounded h-100">
        </div>
    </div>
</div>

<?php $this->load->view("components/frontend/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle the expandable sections
    document.querySelectorAll('.expandable').forEach(item => {
        item.addEventListener('click', function() {
            this.classList.toggle('expanded');
            const toggle = this.querySelector('.toggle');
            toggle.textContent = this.classList.contains('expanded') ? '–' : '+';
        });
    });
</script>