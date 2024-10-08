let body = document.body;

for (let i = 1; i <= 500; i++) {

    if (i%4==0) {
        body.innerHTML += i + " Multiplo de 4";    
    } else if (i%9==0) {
        body.innerHTML += i + " Multiplo de 9";
    }else
        body.innerHTML += i;


    if (i%5==0) {
        body.innerHTML += "<br>";
        body.innerHTML += "------";    
    }
    body.innerHTML += "<br>";
    
}