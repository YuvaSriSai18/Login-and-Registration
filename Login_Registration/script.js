const api = "78b9abaafff24856b1235d108f27134c";
const url = "https://newsapi.org/v2/everything?q=";

async function fetchData(query) {
    const response = await fetch(`${url}${query}&apiKey=${api}`);
    const data = await response.json(); // Await the JSON parsing
    console.log(data);
    return data; // Return the parsed JSON data
}

fetchData("all")
    .then(data => renderMain(data));

function renderMain(array) {
    let main = document.querySelector("main");
    let mainHTML = '';
    for (let i = 0; i < array.articles.length; i++) { // Access 'articles' property of the response
        if (array.articles[i].urlToImage) {
            mainHTML += `
                <div class="card">
                    <a href="${array.articles[i].url}">
                        <img src="${array.articles[i].urlToImage}" alt="">
                        <div class="textContent">
                            <h3 id="heading">${array.articles[i].title}</h3>
                            <div id="para_heading">
                                <p id="source_name">${array.articles[i].source.name}</p>
                                <p id="PublishedAt">${array.articles[i].publishedAt}</p>
                            </div>
                            <div id="desc">${array.articles[i].description}</div>
                        </div>
                    </a>
                </div>
            `;
        }
    }
    main.innerHTML = mainHTML; // Render the generated HTML to the main element
}

function fetchQueryData(){

}