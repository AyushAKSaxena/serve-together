document.addEventListener('DOMContentLoaded', () => {
    const postForm = document.getElementById('postForm');
    const opportunityList = document.getElementById('opportunityList');
    const modal = document.getElementById('modal');
    const closeButton = document.querySelector('.close-button');
    const applyForm = document.getElementById('applyForm');
    let currentOpportunity = null;

    postForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        addOpportunityInDB(title, description)
        addOpportunity(title, description);
        postForm.reset();
    });

    opportunityList.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON') {
            currentOpportunity = e.target.parentElement;
            modal.style.display = 'block';
        }
    });

    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    });

    applyForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const volunteerName = document.getElementById('volunteerName').value;
        const contactInfo = document.getElementById('contactInfo').value;
        applyForOpportunity(currentOpportunity, volunteerName, contactInfo);
        applyForm.reset();
        modal.style.display = 'none';
    });

    function addOpportunityInDB(title, description) {
        const formData = {
            title: title,
            description: description
        }
        fetch("post_opportunity.php", {
            method: "POST",
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
            } else {
                alert("Error: " + data.message);
            }
        })
    }

    function addOpportunity(title, description) {
        const opportunity = document.createElement('div');
        opportunity.classList.add('opportunity');
        opportunity.innerHTML = `
            <h3>${title}</h3>
            <p>${description}</p>
            <button>Apply</button>
        `;
        opportunityList.appendChild(opportunity);
    }

    function applyForOpportunity(opportunity, name, contact) {
        alert(`Thank you, ${name}! We will contact you at ${contact} regarding the "${opportunity.querySelector('h3').textContent}" opportunity.`);
    }

    // Mobile menu toggle
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.querySelector('.nav-links');

    mobileMenu.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('mobile-menu');
        const navLinks = document.querySelector('.nav-links');
    
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    });
    
});
