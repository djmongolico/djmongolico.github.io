var aleatorio=Math.round(Math.random()*100);
var minum, intentos;

    minum=0;
    intentos=0;

do{
    minum=prompt("Adivina el número entre 0 y 100 en el menor número de intentos. ¡Suerte!");
        if(aleatorio>minum){
            alert("Más Alto");
        }
        
        if(aleatorio<minum){
            alert("Más Bajo");
    }
    intentos ++;
}while(aleatorio!=minum);
    alert("¡CORRECTO!. Lo lograste en " +intentos+ " intentos. realiza una captura y envíala por WhatsApp.");
