<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serve-Together</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Serve-Together</h1>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="index.php#opportunities">Volunteer</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <main>
        <section class="hero">
            <h2>Make a Difference in Your Community</h2>
            <p>Join us in connecting volunteers with opportunities to serve.</p>
            </br>
            <button>Get Started</button>
        </section>

        <section class="post-opportunity">
            <h2>Post a Volunteer Opportunity</h2>
            <form id="postForm">
                <div class="form-group">
                    <label for="title">Opportunity Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <button type="submit" class="submit-button">Post Opportunity</button>
            </form>
        </section>


        <section class="opportunities">
            <h2>Volunteer Opportunities</h2>
            <div id="opportunityList">
                <?php
                include 'db_connect.php';

                $query = "SELECT * FROM opportunities";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='opportunity'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<button>Apply</button>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No opportunities available at the moment.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Apply for Opportunity</h2>
            <form id="applyForm">
                <input type="hidden" id="opportunityId" name="opportunity_id" value="">
                <label for="volunteerName">Name:</label>
                <input type="text" id="volunteerName" name="name" required>
            </br>
                <label for="contactInfo">Contact Information:</label>
                <input type="text" id="contactInfo" name="contact_info" required>
                <button type="submit" class="apply-button">Apply</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Serve-Together. All rights reserved.</p>
    </footer>

    <script src="scripts/index.js"></script>
</body>
</html>
