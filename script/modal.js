const modal = document.getElementById("modal");

const btn = document.getElementById("addBtn");

const span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
    modal.style.display = "block";
};

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

const modal2 = document.getElementById("modal2");
const span2 = document.getElementsByClassName("close2")[0];

const btn2 = document.querySelectorAll("#updateBtn");

btn2.forEach((btn) => {
    btn.addEventListener("click", () => {
        if (!modal2.style.display === "none") {
            modal2.style.display = "none";
        } else {
            modal2.style.display = "block";
        }

        span2.onclick = function () {
            modal2.style.display = "none";
        };
    });
});
