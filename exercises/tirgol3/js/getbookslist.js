
function showData(data){
    document.querySelector("h1").innerHTML=data.category;

    const ul = document.createElement('ul')

    for (const key in data.products) {
        const li = document.createElement('li');

        const sHtml = `<a href='book.html?bookId=${data.products[key].id}'>${data.products[key].name}</a>`;
        li.innerHTML = sHtml;

        ul.appendChild(li);
    }
    document.getElementById("dataServices").appendChild(ul);


}

fetch("data/books.json")
    .then(Response=> Response.json())
    .then(data=> showData(data));