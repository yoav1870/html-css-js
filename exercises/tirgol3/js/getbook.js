function getBookId() {
	const aKeyValue = window.location.search.substring(1).split('&');

	const bookId = aKeyValue[0].split("=")[1];
    
	return bookId;
}

function showSelectionBook(data) {
    const selectionBookId = getBookId();
    let bookName;
    let bookPrice;

    for (const key in data.products) {
        let bookObj = data.products[key];

        if (bookObj.id == selectionBookId) {
            bookName = bookObj.name;
            bookPrice = bookObj.price;
        }
    }

    document.querySelector("h1").innerHTML = bookName;
    document.querySelector("#bookPrice").innerHTML = bookPrice;
}

fetch("data/books.json")
    .then(response => response.json())
    .then(data => showSelectionBook(data));