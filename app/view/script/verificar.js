// FUNCIÓN PARA MOVER EL FOCO ENTRE LOS INPUTS
// Se utiliza para facilitar la navegación del usuario entre campos de entrada (por ejemplo, códigos de verificación)

// Declaramos la función que recibe tres parámetros:
// idAc: el input actual
// idSig: el id del input siguiente
// idAnt: el id del input anterior
function moverSiguiente(idAc, idSig, idAnt) {

    // Si el campo actual está lleno (es decir, su longitud es igual al máximo permitido)
    if (idAc.value.length === idAc.maxLength) {

        // Se enfoca automáticamente el campo siguiente
        document.getElementById(idSig).focus();

    } else {
        // Si el campo actual está vacío (el usuario probablemente presionó "Backspace")
        if (idAc.value.length === 0) {

            // Se enfoca el campo anterior
            document.getElementById(idAnt).focus();
        }
    }
}
