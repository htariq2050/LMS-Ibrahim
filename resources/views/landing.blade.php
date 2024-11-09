<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Website - Learn and Grow</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Basic Styling */ 
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Open Sans', sans-serif; color: #333; background-color: #fafafa; }
        .container { width: 90%; max-width: 1200px; margin: auto; }

        /* Header */
        .header { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; background-color: #1E2A38; color: #fff; }
        .header .logo a { font-size: 2rem; font-weight: 700; color: #fff; text-decoration: none; }
        .header nav a { margin-left: 1rem; color: #fff; text-decoration: none; font-weight: 600; }
        .header .btn-login { padding: 0.8rem 1.5rem; border: none; border-radius: 30px; cursor: pointer; background-color: #FF6F61; color: white; font-weight: 600; transition: background-color 0.3s ease; }
        .header .btn-login:hover { background-color: #FF5A4A; }

        /* Hero */
        .hero { text-align: center; padding: 6rem 0; background: linear-gradient(135deg, #FF6F61, #FF9A8B); color: #fff; }
        .hero h1 { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; }
        .hero p { font-size: 1.2rem; font-weight: 300; margin-bottom: 2rem; }
        .btn-main { padding: 1rem 2rem; border-radius: 30px; background: #fff; color: #FF6F61; text-decoration: none; font-weight: 700; transition: background-color 0.3s ease; }
        .btn-main:hover { background-color: #FF9A8B; color: #fff; }

        /* About, Courses, Testimonials */
        section { padding: 4rem 0; text-align: center; }
        .course, .testimonial { background: #fff; padding: 2rem; border-radius: 10px; width: 28%; margin: 1rem; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .course:hover, .testimonial:hover { transform: translateY(-10px); box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15); }

        /* Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); }
        .modal-content { background: #fff; padding: 2rem; width: 90%; max-width: 500px; margin: 5% auto; text-align: center; border-radius: 10px; }
        .modal-content h2 { margin-bottom: 1rem; font-size: 1.8rem; color: #333; }
        .modal-content .role-button { padding: 1rem 2rem; margin: 1rem; border: none; border-radius: 30px; background-color: #FF6F61; color: #fff; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease; }
        .modal-content .role-button:hover { background-color: #FF5A4A; }
        .modal-content .role-button.cancel { background-color: #ccc; }
        .modal-content .role-button.cancel:hover { background-color: #bbb; }

        /* About Us */
        .about { display: flex; align-items: center; justify-content: space-between; padding: 4rem 0; }
        .about img { width: 45%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
        .about .text { width: 50%; padding: 1rem; }
        .about h2 { font-size: 2.5rem; margin-bottom: 1rem; color: #333; }
        .about p { font-size: 1.1rem; line-height: 1.6; margin-bottom: 1rem; }

        /* Courses */
        .courses { text-align: center; padding: 4rem 0; background: #f9f9f9; }
        .courses h2 { font-size: 2.5rem; margin-bottom: 2rem; color: #333; }
        .course-list { display: flex; justify-content: space-between; gap: 1rem; }
        .course { background: #fff; padding: 2rem; border-radius: 10px; width: 30%; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .course h3 { font-size: 1.5rem; color: #333; margin-bottom: 0.5rem; }
        .course p { font-size: 1rem; color: #666; line-height: 1.6; }
        .course:hover { transform: translateY(-10px); box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15); }

        /* Testimonials */
        .testimonials { padding: 4rem 0; }
        .testimonials h2 { font-size: 2.5rem; margin-bottom: 2rem; color: #333; text-align: center; }
        .testimonial-list { display: flex; gap: 2rem; justify-content: center; }
        .testimonial { background: #fff; padding: 1.5rem; border-radius: 10px; width: 30%; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); text-align: center; }
        .testimonial h3 { font-size: 1.2rem; color: #FF6F61; }
        .testimonial p { font-size: 1rem; color: #666; margin-top: 0.5rem; }

        /* Contact */
        .contact { padding: 4rem 0; text-align: center; background-color: #1E2A38; color: #fff; }
        .contact h2 { font-size: 2.5rem; margin-bottom: 1rem; }
        .contact p { font-size: 1.1rem; margin-bottom: 2rem; }
        .contact .btn-contact { padding: 1rem 2rem; border-radius: 30px; background: #FF6F61; color: #fff; text-decoration: none; font-weight: 700; transition: background-color 0.3s ease; }
        .contact .btn-contact:hover { background-color: #FF5A4A; }

        /* Footer */
        .footer { background: #1E2A38; color: #fff; padding: 3rem 0; text-align: center; }
        .footer nav a { color: #fff; text-decoration: none; margin: 0 1rem; font-weight: 600; }
        .footer nav a:hover { text-decoration: underline; }

        /* Media Queries */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .hero p { font-size: 1rem; }
            .course, .testimonial { width: 45%; }
        }
        @media (max-width: 480px) {
            .header { flex-direction: column; text-align: center; }
            .header nav { margin-top: 1rem; }
            .course, .testimonial { width: 90%; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="#">CourseBrand</a>
            </div>
            <nav>
                <a href="#about">About</a>
                <a href="#courses">Courses</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#contact">Contact</a>
                <button class="btn-login" onclick="showModal('login')">Login</button>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Unlock Your Potential</h1>
            <p>Join thousands of learners and start your journey to expertise with our professional courses.</p>
            <a href="/register" class="btn-main">Get Started</a>
        </div>
    </section>

    <!-- Modal for Login/Registration Role Selection -->
    <div id="roleModal" class="modal">
        <div class="modal-content">
            <h2>Select Your Role</h2>
            <button class="role-button" onclick="navigateTo('login', 'student')">Login as Student</button>
            <button class="role-button" onclick="navigateTo('login', 'instructor')">Login as Instructor</button>
            <button class="role-button cancel" onclick="hideModal()">Cancel</button>
        </div>
    </div>



    <!-- About Section -->
    {{-- <section id="about" class="about">
        <div class="container">
            <img src="about-image.jpg" alt="About Us Image">
            <div class="text">
                <h2>About Us</h2>
                <p>CourseBrand is dedicated to providing top-notch education and skill development to help you reach your career goals. With expert instructors and a range of courses, we ensure you have everything you need to succeed.</p>
                <p>Our mission is to empower individuals by making quality education accessible and affordable for everyone. Whether you’re looking to advance in your career or explore a new field, CourseBrand has something for you.</p>
            </div>
        </div>
    </section> --}}

    <!-- Courses Section -->
    <section id="courses" class="courses">
        <div class="container">
            <h2>Our Courses</h2>
            <div class="course-list">
                <div class="course">
                    <h3>Web Development</h3>
                    <p>Learn the fundamentals of web development, including HTML, CSS, JavaScript, and modern frameworks to build responsive websites.</p>
                </div>
                <div class="course">
                    <h3>Data Science</h3>
                    <p>Explore data science concepts, including machine learning, data visualization, and Python programming to become data-savvy.</p>
                </div>
                <div class="course">
                    <h3>Graphic Design</h3>
                    <p>Get creative with graphic design. Learn Adobe tools, color theory, typography, and more to craft visually stunning content.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2>What Our Students Say</h2>
            <div class="testimonial-list">
                <div class="testimonial">
                    <h3>John Doe</h3>
                    <p>"The Web Development course helped me land my first job as a frontend developer! The content was clear, and the support from instructors was great."</p>
                </div>
                <div class="testimonial">
                    <h3>Jane Smith</h3>
                    <p>"I loved the Data Science course! It was challenging but well-structured, and now I feel confident working with large data sets."</p>
                </div>
                <div class="testimonial">
                    <h3>Michael Lee</h3>
                    <p>"Graphic Design has always been my passion, and this course gave me the skills and portfolio to go freelance. Highly recommend!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Have questions? We’d love to hear from you. Reach out to our support team for any inquiries or assistance.</p>
            <a href="mailto:support@coursebrand.com" class="btn-contact">Email Us</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 CourseBrand. All Rights Reserved.</p>
            <nav>
                <a href="#about">About</a>
                <a href="#courses">Courses</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        function showModal(action) {
            document.getElementById('roleModal').style.display = 'block';
            document.getElementById('roleModal').dataset.action = action;
        }

        function hideModal() {
            document.getElementById('roleModal').style.display = 'none';
        }

        function navigateTo(action, role) {
            const route = action === 'login' ? '/login' : '/register';
            window.location.href = `${route}?role=${role}`;
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('roleModal')) {
                hideModal();
            }
        }
    </script>
</body>
</html>
