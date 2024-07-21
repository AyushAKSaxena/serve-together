<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Serve-Together</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Serve-Together</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="volunteer.php">Volunteer</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact">
            <h2>Contact Us</h2>
            <form id="contactForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
            <p id="formResponse" style="display:none;"></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Serve-Together. All rights reserved.</p>
    </footer>

    <script src="scripts/contact.js"></script>
</body>
</html>
