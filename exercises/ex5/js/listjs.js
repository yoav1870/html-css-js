function showData(data) {
    const select = document.getElementsByName('select')[0];
  
    for (const key in data) {
      const option = document.createElement('option');
      option.value = key;
      option.innerText = data[key];
      select.appendChild(option);
    }
  
    select.addEventListener('change', function () {
      const selectedValue = this.value;
      const cards = document.getElementsByClassName('card');
  
      for (let i = 0; i < cards.length; i++) {
        const cardCategory = cards[i].querySelector('.text-muted').innerText.toLowerCase();
        if (selectedValue === 'all' || cardCategory === selectedValue.toLowerCase()) {
          cards[i].style.display = 'block';
        } else {
          cards[i].style.display = 'none';
        }
      }
    });
  }
  
  fetch("data/books.json")
    .then(response => response.json())
    .then(data => showData(data));
  