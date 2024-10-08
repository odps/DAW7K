let body = document.body;

for (let i = 30; i >= 0; i--) {
    
    for (let j = 0; j < i; j++) {
        body.innerHTML += i;
    }

    body.innerHTML += "<br>";
}