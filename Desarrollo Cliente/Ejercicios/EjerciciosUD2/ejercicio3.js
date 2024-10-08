let body = document.body;

for (let i = 1; i <= 30; i++) {
    
    for (let j = 0; j < i; j++) {
        body.innerHTML += i;
    }

    body.innerHTML += "<br>";
}