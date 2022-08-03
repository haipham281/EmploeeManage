
var elems = document.getElementsByClassName('confirmation');
var confirmIt = function (e) {
    if (!confirm('Are you sure?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

