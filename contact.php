<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get in touch with us at the Zoo Management System. Find contact details, email, and location.">
    <title>Contact Us - Zoo Management System</title>
    <style>
        /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
    color: #333;
}

/* Header */
header {
    background-color: white;
    padding: 15px 0;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.header-container h1 {
    font-size: 32px;
    font-weight: bold;
    color: #7A6C4F;
}

/* Navigation */
nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    font-size: 18px;
    color: #7A6C4F;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover,
nav ul li .active {
    color: white;
    background-color: #f7954a;
    padding: 8px 15px;
    border-radius: 5px;
}

/* Banner */
.banner {
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
}

.banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.5);
    padding: 15px 30px;
    border-radius: 8px;
}

.banner-text h2 {
    color: white;
    font-size: 36px;
    text-align: center;
}

/* Contact Section */
.contact {
    text-align: center;
    padding: 50px 15%;
    background-color: white;
}

.contact h2 {
    font-size: 28px;
    color: #7A6C4F;
}

.contact p {
    font-size: 16px;
    color: #666;
    line-height: 1.8;
}

.contact-details {
    list-style: none;
    padding: 0;
}

.contact-details li {
    font-size: 18px;
    margin: 10px 0;
}

/* Footer */
footer {
    background-color: #222;
    color: white;
    padding: 40px 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.footer-section h3 {
    font-size: 22px;
    color: #f7954a;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin: 5px 0;
}

.footer-section ul li a {
    text-decoration: none;
    color: white;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #f7954a;
}

footer p {
    margin-top: 20px;
    font-size: 14px;
    color: #aaa;
}

/* Responsive */
@media (max-width: 768px) {
    .header-container h1 {
        font-size: 24px;
    }

    .banner-text h2 {
        font-size: 28px;
    }

    .contact {
        padding: 40px 10%;
    }

    .footer-content {
        flex-direction: column;
        text-align: center;
    }
}

    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="header-container">
            <h1>Zoo Management System</h1>
            <nav>
                <ul>
                <li><a href="login.php">Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                    <li><a href="animals.php">Animals</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contact Banner -->
    <section class="banner">
        <img src="uploads/banner.jpg" alt="A tiger in the wild">
        <div class="banner-text">
            <h2>Contact Us</h2>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact">
        <div class="contact-container">
            <h2>Get in Touch</h2>
            <p>We'd love to hear from you! Reach out to us using the details below.</p>
            <ul class="contact-details">
            <h1>Contact Us</h1>
<p>Email: <a href="mailto:contact@zoomanagement.com">contact@zoomanagement.com</a></p>
<p>Phone: +91 98765 43210</p>
<p>Location: National Zoological Park, Mathura Road, New Delhi, India - 110003</p>
<p>Operating Hours: Monday - Sunday, 9:00 AM - 5:00 PM</p>

            </ul>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="animals.php">Animals</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>
            <div class="footer-section">
            <h1>Contact Us</h1>
<p>Email: <a href="mailto:contact@zoomanagement.com">contact@zoomanagement.com</a></p>
<p>Phone: +91 98765 43210</p>
<p>Location: National Zoological Park, Mathura Road, New Delhi, India - 110003</p>
<p>Operating Hours: Monday - Sunday, 9:00 AM - 5:00 PM</p>

            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
                    <li><a href="https://plus.google.com" target="_blank">Google+</a></li>
                    <li><a href="https://vimeo.com" target="_blank">Vimeo</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2025 Zoo Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
