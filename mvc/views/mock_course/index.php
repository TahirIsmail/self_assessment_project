

<style>
    header {
    margin-bottom: 20px; 
}

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .section, .data-centres-fm-section, .new-section, .info-section, .esg-section {
            width: 90%;
            max-width: 1200px;
            border-radius: 15px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .spacer {
                height: 20px
           }

        .section {
            background-image: url('"C:\laragon\www\self_assessment_project\uploads\landing_img\course mock\image.jpg"'); 
            background-size: cover;
            background-position: center;
            height: 500px; 
            padding: 0 50px;
            box-sizing: border-box;
            padding-top: 20px;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px 50px;
            border-radius: 15px;
            max-width: 500px;
            margin-top: 20px; 
        }
        h1, h2 {
            font-weight: bold;
            color: #333;
            margin: 20px 0;
        }
        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 32px;
        }
        p {
            margin-top: 10px;
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }
        .button, .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #EF0107;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
     /* Data Centres FM Section Styling */
.data-centres-fm-section {
    display: flex;
    justify-content: space-between;
    padding: 30px;
    background-color: #Ffff; 
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.data-centres-fm-section .left-content {
    max-width: 45%; 
}

.data-centres-fm-section .right-content {
    max-width: 50%; 
}

.data-centres-fm-section .btn {
    display: inline-block;
    padding: 15px 30px;
    background-color: #EF0107; 
    color: #ffffff; 
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    margin-top: 20px; 
    transition: background-color 0.3s, transform 0.3s; 
}

.data-centres-fm-section .btn:hover {
    background-color: #EF0107; 
    transform: translateY(-2px); 
}

.data-centres-fm-section .btn:active {
    background-color: #EF0107; 
    transform: translateY(1px); 
}

/* Expandable List Styling */
.data-centres-fm-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.data-centres-fm-section li {
    margin-bottom: 15px;
    font-size: 18px;
    color: #555;
    cursor: pointer;
    position: relative;
    padding-right: 25px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.data-centres-fm-section li .toggle {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    line-height: 1;
    cursor: pointer;
    color: #EF0107;
}

.data-centres-fm-section li .description {
    display: none;
    margin-top: 10px;
    font-size: 16px;
    color: #777;
    padding-left: 20px;
}

.data-centres-fm-section li.expanded .description {
    display: block;
}

.data-centres-fm-section li.expanded .toggle::before {
    content: "–";
}

.data-centres-fm-section li .toggle::before {
    content: "+";
}


      /* Styling for the new section */
.new-section {
    display: flex;
    justify-content: space-between;
    align-items: center; 
    padding: 30px; 
    background-color: #ffffff; 
    border-radius: 15px; 
    box-shadow: 0 0 10px rgba(0,0,0,0.1); 
    overflow: hidden; 
}

.new-section .text-content {
    max-width: 600px;
    box-sizing: border-box; 
}

.new-section .image-content {
    flex: 1;
    background-image: url('/uploads/landing_img/course mock/image2.png'); 
    background-size: cover; 
    background-position: center;
    height: 500px;
    width: 500px; 
    border-radius: 15px; 
    margin-left: 20px; 
    box-sizing: border-box; 
    overflow: hidden; 
}
/* Button Styling in the new-section */
.new-section .btn {
    display: inline-block;
    padding: 15px 30px;
    background-color: #EF0107; 
    color: #ffffff; 
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    margin-top: 20px;
    transition: background-color 0.3s, transform 0.3s;
}

.new-section .btn:hover {
    background-color: #EF0107; 
    transform: translateY(-2px); 
}

.new-section .btn:active {
    background-color: #EF0107;
    transform: translateY(1px); 
}


/* Optional: Add media query for responsiveness */
@media (max-width: 768px) {
    .new-section {
        flex-direction: column; 
        align-items: center; 
    }

    .new-section .image-content {
        height: auto; 
        width: 100%; 
        max-width: 500px;
    }
}

        

       
/* Info Section Styling (Image on the left and text on the right) */
.info-section {
    display: flex;
    justify-content: space-between;
    align-items: stretch; 
    padding: 40px; 
    background-color: #f9f9f9; 
    border-radius: 15px; 
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    max-width: 1200px; 
    margin: 0 auto;
    margin-bottom: 50px;
}

.info-section .image-content {
    flex: 1;
    margin-right: 30px;
}

.info-section .image-content img {
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
    border-radius: 15px;
}

.info-section .text-content {
    flex: 1.5; 
    max-width: 700px; 
}

.info-section .text-content h2 {
    font-size: 28px; 
    margin-bottom: 20px;
}

.info-section .text-content p {
    font-size: 18px; 
    line-height: 1.8; 
    color: #333; 
    margin-bottom: 20px;
}



/* ESG Section Styling */
.esg-section {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    padding: 40px;
    background-color: #f9f9f9; 
    border-radius: 15px; 
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); 
    max-width: 1200px; 
    margin: 0 auto;
}

.esg-section .text-content {
    flex: 1;
    margin-right: 30px;
}

.esg-section .text-content h2 {
    font-size: 28px; 
    margin-bottom: 20px; 
}

.esg-section .text-content p {
    font-size: 18px; 
    line-height: 1.8;
    color: #333; 
    margin-bottom: 20px; 
}

.esg-section .text-content ul {
    list-style-type: none;
    padding-left: 0; 
}

.esg-section .text-content li {
    font-size: 18px;
    margin-bottom: 15px; 
    display: flex;
    align-items: flex-start;
}

.esg-section .text-content li::before {
    content: "✔"; 
    color: #EF0107;
    font-size: 24px;
    margin-right: 10px;
    line-height: 1;
}

.esg-section .image-content {
    flex: 1;
    display: flex;
    align-items: center; 
    justify-content: center;
}

.esg-section .image-content img {
    width: auto; 
    height: 100%; 
    max-width: 100%; 
    object-fit: cover; 
    border-radius: 15px; 
}



    </style>
<?php $this->load->view("components/frontend/header.php"); ?>
    <!-- First Section -->
    <div class="spacer"></div>
    <div class="section" style="background-image: url('<?php echo base_url('uploads/landing_img/course mock/image.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="content">
        <span class="button">We're Hiring</span>
        <h1>Data Centres</h1>
        <p>We emphasise proactive maintenance and strict condition management in environments where continuous service is crucial to ensure dependable service delivery.</p>
    </div>
</div>


    <!-- New Section (Moved to the middle) -->
<div class="new-section">
    <div class="text-content">
        <h2>Best practices to deliver the best resilience, outcomes and continuity</h2>
        <p>In the world of data centres, where uptime and continuity are paramount, the demand for ultra-clean environments is critical. Our facilities services for data centres focus on meticulous cleanliness, adhering to stringent protocols that maintain the highest levels of hygiene.</p>
        <p>This hyper-hygienic ‘cleanroom cleaning’ approach is essential in preventing any particulate or microbial contamination that could disrupt operations.</p>
        <p>OCS has the specialised skills and extensive experience to deliver precision cleanroom cleaning services, ensuring that environments meet stringent cleanliness and contamination control standards.</p>
        <p>View Facilities Management (FM) or Single-Service solutions below.</p>
        <a href="#" class="btn">Contact Our Data Centre Team</a>
    </div>
    <div class="image-content">
        <img src="<?php echo base_url('uploads/landing_img/course mock/image2.png'); ?>" alt="Image">
    </div>
</div>

    
    <!-- Data Centres FM Section -->
    <div class="data-centres-fm-section">
        <div class="left-content">
            <h2>Data Centres FM</h2>
            <p>Our mission’s BEST strategy and ethos addresses five areas of concern highlighted by industry leaders in reference to facilities management: Experiences, Productivity, Practices, Resilience and Outcomes.</p>
            <a href="#" class="btn">Our Mission & Best Strategy</a>
        </div>
        <div class="right-content">
            <ul>
                <li class="expandable">
                    Sector-specific FM to create Best Experiences
                    <span class="toggle"></span>
                    <div class="description">
                        Our services help you create environments that your customers and colleagues can keep coming back to. With careful attention, we take a comprehensive approach to developing and sustaining optimal spaces, considering every moment your people spend within it, ensuring they are provided with the best experiences.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to maintain Best Productivity
                    <span class="toggle"></span>
                    <div class="description">
                        We strive to offer optimised solutions to enhance productivity every step of the way. With OCS Advance, our suite of tools and apps, we work smarter to maximise the uptime and longevity of your facilities, providing you with the equipment you need to stay informed about the progress and status of tasks.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to ensure Best Practice
                    <span class="toggle"></span>
                    <div class="description">
                        Our safety-first approach, entrenched in our Code of Conduct and QHSE policies, guides our manner of operating. By prioritising the safety of your colleagues, communities, customers, and the environment, we create the best possible practices that help foster empathetic, secure, and impactful working cultures within your business.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to implement Best Resilience
                    <span class="toggle"></span>
                    <div class="description">
                        We remain vigilant and ensure that we never take the daily operations behind your business for granted. Through acute and alert responses to the unforeseen, along with planned preventative maintenance for regular upkeep, we help your operations remain durable and resilient. In times of crisis, we work with you to ensure the secure emergence of your customers, visitors, and colleagues.
                    </div>
                </li>
                <li class="expandable">
                    Sector-specific FM to enable Best Outcomes
                    <span class="toggle"></span>
                    <div class="description">
                        We listen to and collaborate with you to understand your mission, forging a collective goal as we work together. By aligning our mission with yours, we adapt and customise our services to uniquely suit your outcomes and goals, assisting you in creating a lasting positive impact on your places and communities.
                    </div>
                </li>
            </ul>
        </div>
    </div>

   <!-- Additional Info Section (Image on the left and text on the right) -->
<div class="info-section">
    <div class="image-content">
        <img src="<?php echo base_url('uploads/landing_img/course mock/pic1.png'); ?>" alt="Image">
    </div>
    <div class="text-content">
        <h2>Success is built on industry insights and a dedication to the detail</h2>
        <p>Our specialised cleaning services focus on creating a healthier atmosphere by meticulously removing dust, debris, and other contaminants. Achieving the highest levels of cleanliness promotes the well-being of personnel and ensures a safer working environment. Our approach involves hyper-hygienic cleaning methods and proactive maintenance, which play a crucial role in extending the lifespan of critical equipment, thus reducing the frequency of replacements and minimising any costly operational downtime.</p>
        <p>We provide flexible scheduling options to suit your needs, from annual to monthly cleanings. These services are also available for emergencies, such as in response to floods or other disasters, and for preparing spaces for new equipment installation post-construction. Additionally, our cleaning processes are designed to maintain optimal power quality, sustain the necessary humidity levels, and enhance indoor air quality, contributing to the overall efficiency and safety of the environment.</p>
    </div>
</div>


    <!-- ESG Section -->
<div class="esg-section">
    <div class="text-content">
        <h2>Data Centres + ESG</h2>
        <p>OCS provides carbon management services for data centres, focusing on reducing their carbon footprint and enhancing sustainability. These services are crucial in a country like India, where demand for data storage and processing is growing alongside an increasing emphasis on environmental responsibility.</p>
        <ul>
            <li>
                <p>We conduct detailed energy audits to identify areas where data centres can improve energy efficiency. By optimising power usage effectiveness (PUE), we help data centres reduce their energy consumption, which directly impacts their carbon emissions.</p>
            </li>
            <li>
                <p>We offer comprehensive waste management solutions, focusing on recycling electronic waste and other materials. Proper disposal and recycling of e-waste are essential in data centres to minimise their environmental impact.</p>
            </li>
            <li>
                <p>We support data centres in transitioning to renewable energy sources, such as solar or wind power. This shift not only reduces reliance on fossil fuels but also significantly cuts down on greenhouse gas emissions.</p>
            </li>
        </ul>
    </div>
    <div class="image-content">
        <img src="<?php echo base_url('uploads/landing_img/course mock/pic4.png'); ?>" alt="Image">
    </div>
</div>

    <?php $this->load->view("components/frontend/footer.php"); ?>

    <script>
        // Toggle the expandable sections
        document.querySelectorAll('.expandable').forEach(item => {
            item.addEventListener('click', function() {
                this.classList.toggle('expanded');
            });
        });
    </script>
