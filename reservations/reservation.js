// JavaScript to handle image animation
const images = [
    '../img1/1.png',
    '../img1/2.png',
    '../img1/3.png',
    '../img1/4.png',
    '../img1/5.png',
    '../img1/6.png',
    
];
const container = document.getElementById('d12');
let currentIndex = 0;

function changeImage() {
    // Set the background image of the container
    container.style.backgroundImage = `url(${images[currentIndex]})`;

    // Update the index for the next image
    currentIndex = (currentIndex + 1) % images.length; // Loop back to the start
}

// Start the animation
changeImage(); // Set the initial image
setInterval(changeImage, 5000); // Change every 5 seconds

//-----------------------------------------sa3a----------------------
function updateClock() {
    const now = new Date(); // Get current date and time

    // Format time
    let hours = String(now.getHours()).padStart(2, '0');
    let minutes = String(now.getMinutes()).padStart(2, '0');
    let seconds = String(now.getSeconds()).padStart(2, '0');

    // Format date
    let day = String(now.getDate()).padStart(2, '0');
    let month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
    let year = now.getFullYear();

    // Update time and date elements
    let time=document.getElementById('time') ;
    time.textContent= `${hours}:${minutes}:${seconds}`;

    let date=document.getElementById('date') 
    date.textContent= `${day}/${month}/${year}`;
}

// Update the clock immediately and then every second
updateClock(); // Initial call to display immediately
setInterval(updateClock, 1000); // Update every 1000ms (1 second)
//---------------------------------------------list-------------------------------------
// Get all toggle buttons
const buttons = document.querySelectorAll('.toggle-btn');

// Add click event listener to each button
buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Remove the active class from all buttons
        buttons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to the clicked button
        button.classList.add('active');
        
        // Redirect to another page (example: page1.html)
        //window.location.href = `page${index + 1}.html`;
    });
});
// Add "active" class on page load
window.onload = () => {
    const button = document.getElementById('button3');
    button.classList.add('active');
};
// document.getElementById('button1').addEventListener('click', function () {
//     window.location.href = 'casablanca/casablanca.html';
// });
document.getElementById('button3').addEventListener('click', function () {
    window.location.href = '../casablanca/casablanca.html';
});
const button = document.getElementById('button2');
const listDiv = document.getElementById('menu');

button.addEventListener('click', () => {
    const b3=document.getElementById("button3");
    if (listDiv.style.display === 'none') {
        listDiv.style.display = 'block'; // Show the list
         button.classList.replace('active', 'inactive');
         b3.classList.add('active');
    } else {
        listDiv.style.display = 'none'; // Hide the list
         button.classList.replace('active', 'inactive');
         b3.classList.add('active');
    }
    // const but = document.getElementById('button1');
    // but.classList.add('active');
});
function commantaire(){
    const textarea = document.getElementById('Texterea');
            const content = textarea.value.trim();  // .trim() removes leading/trailing spaces

            if (content === "") {
                alert("Veuillez écrire un commantaire!");
            } else {
                alert("Merci pour votre commantaire!");
            }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
