<?php 
    session_start();    
    include('conn.php');
    include 'navbar.php'; 

?>


            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Discover. Prepare. Krackit</h1>

                            <h6 class="text-center">platform for college aspirants</h6>

                            <form method="get" action="search_results.php" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1"></span>
                                    <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Degree, Institute, Entrance Exam ..." aria-label="Search">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </section>
            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg ">
                                <form action="degree_all.php" method="GET">
                                    <div class="d-flex">
                                        <h5 class="mb-2">Explore Best Institutes</h5>
                                    </div>
                                    <img src="images/topics/undraw_Graduation_re_gthn.png" style="margin-top: 0px" class="custom-block-image img-fluid" alt="">
                                    <div class="form-group">
                                        <select class="form-select" id="studyField" name="studyField">
                                            <option value="" disabled selected>Select Study Field</option>
                                            <?php
                                            // Fetch data from tbl_dept
                                            $dept_query = "SELECT * FROM tbl_dept";
                                            $dept_result = mysqli_query($conn, $dept_query);
                                            if ($dept_result && mysqli_num_rows($dept_result) > 0) {
                                                while ($dept_row = mysqli_fetch_assoc($dept_result)) {
                                                    echo "<option value='" . $dept_row['cc_dept_id'] . "'>" . $dept_row['cc_dept_name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <select class="form-select" id="degreeProgram" name="degreeProgram">
                                            <option value="" disabled selected>Select Degree Program</option>
                                            <?php
                                            // Fetch data from tbl_course
                                            $course_query = "SELECT * FROM tbl_course";
                                            $course_result = mysqli_query($conn, $course_query);
                                            if ($course_result && mysqli_num_rows($course_result) > 0) {
                                                while ($course_row = mysqli_fetch_assoc($course_result)) {
                                                    echo "<option value='" . $course_row['cc_course_id'] . "'>" . $course_row['cc_course_name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn custom-btn mt-2 mt-lg-3">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        

                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="images/compass.jpg" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Take Career Assessment Test</h5>

                                            <p class="text-white">Unlock your potential and discover your ideal career path with our comprehensive career assessment test. Find out where your strengths lie and what career opportunities await you!</p>

                                            <a href="CAT.php" class="btn custom-btn mt-2 mt-lg-3">Take Free Test</a>
                                        </div>
                                    </div>

                                    <div class="social-share d-flex">
                                        <p class="text-white me-4">Share:</p>

                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li></a>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="explore-section section-padding" id="section_2">
                <div class="container">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Browse Mock Test Sets</h1>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">JEE</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">NEET</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">JEE</h5>
                                                            <p class="mb-0">Joint Entrance Examination</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">JEE</h5>
                                                            <p class="mb-0">JEE is a national-level entrance exam for engineering courses that takes place every year throughout India.JEE-Main is conducted by National Testing Agency (NTA).</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">JEE</h5>
                                                            <p class="mb-0">JEE-Main has two papers, Paper-I and Paper-II. Candidates may opt for either or both of them. Both papers contain multiple choice questions.</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">NEET</h5>
                                                            <p class="mb-0">National Eligibility cum Entrance Test</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">NEET</h5>
                                                            <p class="mb-0">The National Eligibility cum Entrance Test (NEET) is conducted by the National Testing Agency (NTA). NEET is held for admission to MBBS and BDS courses in India.</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="course_details.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">NEET</h5>
                                                            <p class="mb-0">NEET serves as a transformative journey that not only shapes the future of medical professionals but also nurtures compassionate and competent healthcare leaders dedicated to serving humanity.</p>
                                                        </div>
                                                        <!-- Add badge or other elements as needed -->
                                                    </div>
                                                    <!-- Add image or other elements as needed -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more tab panes as needed -->
                            </div>
                        </div>
                    </div>
                </div>




            </section>


            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>

                <div class="container">
    <div class="row">

        <div class="col-12 text-center">
            <h2 class="text-white mb-4">How does it work?</h1>
        </div>

        <div class="col-lg-10 col-12 mx-auto">
            <div class="timeline-container">
                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                    <div class="list-progress">
                        <div class="inner"></div>
                    </div>

                    <li>
                        <h4 class="text-white mb-3">Explore Career Paths</h4>

                        <p class="text-white">Find your desired career path by using our interactive assessment tools. Discover potential degree programs based on your interests and skills.</p>

                        <div class="icon-holder">
                          <i class="bi-search"></i>
                        </div>
                    </li>
                    
                    <li>
                    <h4 class="text-white mb-3">Buy Mock Test</h4>

<p class="text-white">Purchase mock test sets tailored to your needs. Access a wide range of mock tests to prepare effectively for your exams.</p>

                        <div class="icon-holder">
                          <i class="bi-bookmark"></i>
                        </div>
                    </li>

                    <li>
                        <h4 class="text-white mb-3">Access Resources</h4>

                        <p class="text-white">Read articles, access mock tests, and gather insights to help you make informed decisions about your career path. Enjoy learning and exploring!</p>

                        <div class="icon-holder">
                          <i class="bi-book"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 text-center mt-5">
            <p class="text-white">
                Want to explore further?
                <a href="#" class="btn custom-btn custom-border-btn ms-3">Visit our YouTube channel</a>
            </p>
        </div>
    </div>
</div>
            </section>


            <section class="faq-section section-padding" id="section_4">
<div class="container">
    <div class="row">

        <div class="col-lg-6 col-12">
            <h2 class="mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="clearfix"></div>

        <div class="col-lg-5 col-12">
            <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
        </div>

        <div class="col-lg-6 col-12 m-auto">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the Interactive Career Assessment and Preparation System?
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            The Interactive Career Assessment and Preparation System is a comprehensive web-based platform designed to assist students in exploring career options, discovering degree programs, and preparing for entrance exams.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How can students access career assessment tools?
                        </button>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Students can access career assessment tools by logging into the Interactive Career Assessment and Preparation System. Once logged in, they can navigate to the career assessment section and begin exploring career options based on their interests, skills, and personality traits.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Is the purchase of mock test sets mandatory?
                        </button>
                    </h2>

                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Purchasing mock test sets is optional but highly recommended for students who wish to prepare effectively for entrance exams. Mock tests provide valuable practice and insights into exam formats and question types.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
            </section>


            <section class="contact-section section-padding section-bg" id="contact.php">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Get in touch</h2>
                        </div>

                        <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.497264189475!2d72.62634057437305!3d23.18854191011598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2a3c9618d2c5%3A0xc54de484f986b1fa!2sDA-IICT!5e0!3m2!1sen!2sin!4v1712496271116!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                            <h4 class="mb-3">Head Quarter</h4>

                            <p>Daiict college, Reliance Cross Rd, Gandhinagar, Gujarat 382007</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 9250010101" class="site-footer-link">
                                    9250010101
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:info@company.com" class="site-footer-link">
                                    Krackit@gmail.com
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mx-auto">
                            <h4 class="mb-3">Mumbai office</h4>

                            <p> Yashodham, Goregaon, Mumbai, Maharashtra 400063</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 110-220-3400" class="site-footer-link">
                                    980-220-3400
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:info@company.com" class="site-footer-link">
                                    Krackit_mumbai@gmail.com
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </section>
            <?php
    include 'footer.php';
?>
