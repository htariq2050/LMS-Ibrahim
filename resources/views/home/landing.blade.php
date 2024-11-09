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
                <a href="/login?role=student" class="btn-login">Login</a>
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

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <img src="about-image.jpg" alt="About Us Image">
            <div class="text">
                <h2>About Us</h2>
                <p>CourseBrand is dedicated to providing top-notch education and skill development to help you reach your career goals. With expert instructors and a range of courses, we ensure you have everything you need to succeed.</p>
                <p>Our mission is to empower individuals by making quality education accessible and affordable for everyone. Whether you’re looking to advance in your career or explore a new field, CourseBrand has something for you.</p>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="courses">
        <h2>Our Courses</h2>
        <div class="container course-list">
            <div class="course">
                <h3>Course 1</h3>
                <p>Learn the fundamentals of Course 1 and gain valuable insights to enhance your skills.</p>
            </div>
            <div class="course">
                <h3>Course 2</h3>
                <p>Master Course 2 and advance your career with industry-recognized skills and knowledge.</p>
            </div>
            <div class="course">
                <h3>Course 3</h3>
                <p>Dive into Course 3 and become proficient with hands-on experience and expert guidance.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <h2>What Our Students Say</h2>
        <div class="container testimonial-list">
            <div class="testimonial">
                <h3>John Doe</h3>
                <p>"The best learning experience I've ever had! Highly recommend CourseBrand."</p>
            </div>
            <div class="testimonial">
                <h3>Jane Smith</h3>
                <p>"CourseBrand's courses are well-structured and easy to follow. Fantastic!"</p>
            </div>
            <div class="testimonial">
                <h3>Michael Brown</h3>
                <p>"I gained the skills I needed to advance in my career. Thank you, CourseBrand!"</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>Have questions or need help? Reach out to our support team, and we’ll be happy to assist you.</p>
        <a href="mailto:support@coursebrand.com" class="btn-contact">Contact Support</a>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <nav>
                <a href="#about">About</a>
                <a href="#courses">Courses</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#contact">Contact</a>
            </nav>
            <p>&copy; 2024 CourseBrand. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
