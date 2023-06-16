const cards = document.querySelectorAll('.card');
const btn = document.getElementById('btn_js');
  // Add click event listener to each card
  cards.forEach((card) => {
    card.addEventListener('click', () => {
      card.classList.toggle('active');
    });
  });