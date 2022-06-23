function CheckId() {
    let url = "http://localhost:8000/api/login";

    fetch(url).then((response) => {
        return response.json();
    })
    fetch(url).then((data) => {
        console.log(data);
    });
}

