function loadNav() {
    fetch("./partials/nav.html")
        .then(res => res.text())
        .then(data => {
            document.getElementById("nav").innerHTML = data;
        });
}

window.deleteCourse = function(index) {
    const type = document.activeElement.id;
    fetch('../model/delete_course.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'type=' + type + '&index=' + index
    })
    .then(res => res.text())
    .then(() => location.reload());
};

window.onload = function () {
    loadNav();
};
