const container = document.querySelector(".container");

const btnSignUp = document.getElementById("btn-sign-up");

const btnSignIn = document.getElementById("btn-sign-in");

btnSignIn.addEventListener("click", () => {
    container.classList.remove("toggle");
});

btnSignUp.addEventListener("click", () => {
    container.classList.add("toggle");
});
