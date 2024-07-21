document.addEventListener("DOMContentLoaded", function() {
    const postForm = document.getElementById("postForm");
    const applyForm = document.getElementById("applyForm");
    const modal = document.getElementById("modal");
    const closeButton = document.querySelector(".close-button");

    postForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(postForm);

        fetch("post_opportunity.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                postForm.reset();
                loadOpportunities();
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    });

    applyForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(applyForm);

        fetch("apply_volunteer.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                applyForm.reset();
                modal.style.display = "none";
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    });

    function loadOpportunities() {
        fetch("load_opportunities.php")
            .then(response => response.text())
            .then(data => {
                document.getElementById("opportunityList").innerHTML = data;

                const applyButtons = document.querySelectorAll(".apply-button");
                applyButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const opportunityId = this.getAttribute("data-id");
                        document.getElementById("opportunityId").value = opportunityId;
                        modal.style.display = "block";
                    });
                });
            })
            .catch(error => {
                console.error("Error loading opportunities:", error);
            });
    }

    closeButton.addEventListener("click", function() {
        modal.style.display = "none";
    });

    loadOpportunities();
});


