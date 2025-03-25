<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn more about the Zoo Management System, its mission, vision, and efforts towards wildlife conservation.">
    <title>About Us - Zoo Management System</title>
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

        /* About Section */
        .about {
            text-align: center;
            padding: 50px 15%;
            background-color: white;
        }

        .about h2 {
            font-size: 28px;
            color: #7A6C4F;
        }

        .about p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
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

        @media (max-width: 768px) {
            .header-container h1 {
                font-size: 24px;
            }

            .banner-text h2 {
                font-size: 28px;
            }

            .about {
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
    <header>
        <div class="header-container">
            <h1>Zoo Management System</h1>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php" class="active">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="animals.php">Animals</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="banner">
        <img src="uploads/banner.jpg" alt="Zoo Landscape">
        <div class="banner-text">
            <h2>About Us</h2>
        </div>
    </section>

    <section class="about">
        <h2>About Us</h2>
        <p>The Zoo Management System is dedicated to the conservation and care of wildlife. Our mission is to provide a safe and enriching environment for animals while educating visitors about biodiversity and conservation efforts.</p>
        <p>We strive to ensure the welfare of all species housed in our facility by maintaining high standards of care, implementing advanced veterinary services, and promoting eco-friendly initiatives.</p>
        <p>Come explore our diverse collection of animals and learn about our commitment to preserving wildlife for future generations.</p>
    </section>

    <footer>
    
        <div class="footer-content">
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="animals.php">Animals</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
