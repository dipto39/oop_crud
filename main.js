// add button
const addbtn = document.querySelector(".addbtn");
// search input
const search_input = document.querySelector("#search");
// insert button
const insert_btn = document.querySelector(".insert");
// update button
const update_btn = document.querySelector(".update");
// update model
const update_pop = document.querySelector(".upmodel")
// add model
const insert_pop = document.querySelector(".addmodel")

// load data
function load_data() {
    var rq = new XMLHttpRequest();
    rq.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(".tbody").innerHTML = this.responseText;
        }
    }
    rq.open("get", "getdata.php", true);
    rq.send();
}
load_data();

// close popup
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("can")) {
        update_pop.setAttribute("style", "display:none")
        insert_pop.setAttribute("style", "display:none")
    }
})


// insert data
addbtn.addEventListener("click", function (element) {
    insert_pop.setAttribute("style", "display:block");

})
document.addEventListener("submit", function (e) {
    if (e.target.getAttribute('id') == "aform") {
        e.preventDefault();
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var address = document.getElementById("address").value;
        if (name == "" || email == "" || address == "") {
            alert("please fill out the form");
        } else {
            const formData = new FormData();
            formData.append("name", name);
            formData.append("email", email);
            formData.append("addr", address);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText)
                    insert_pop.setAttribute("style", "display:none");
                    load_data();
                }
            };
            xhttp.open("POST", "insert.php", true);
            xhttp.send(formData);
        }
    }
})

// update data 

// show data
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("edit")) {
        var id = e.target.getAttribute("data-attr");
        const formData = new FormData();
        formData.append("gateform", id)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "failed") {
                    alert("someting went wrong");
                } else {
                    update_pop.innerHTML = this.responseText;
                    update_pop.setAttribute("style", "display:block")
                }

            }
        };
        xhttp.open("POST", "update.php", true);
        xhttp.send(formData);
    }
})
// updata
document.addEventListener("submit", function (e) {
    if (e.target.getAttribute('id') == "uform") {
        e.preventDefault();
        var id = document.getElementById("id").value;
        var name = document.getElementById("uname").value;
        var email = document.getElementById("uemail").value;
        var address = document.getElementById("uaddress").value;
        if (name == "" || email == "" || address == "" || id == "") {
            alert("please fill out the form");
        } else {
            const formData = new FormData();
            formData.append("id", id);
            formData.append("name", name);
            formData.append("email", email);
            formData.append("addr", address);
            formData.append("update", "success");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText)
                    update_pop.setAttribute("style", "display:none")
                    load_data();
                }
            };
            xhttp.open("POST", "update.php", true);
            xhttp.send(formData);
        }
    }
})

// delete data
document.addEventListener("click", function (e) {
    if (e.target.classList.contains('delete')) {
        var id = e.target.getAttribute("data-attr");
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText)
                load_data();
            }
        };
        xhttp.open("POST", "delete.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }

})
//search data
search_input.addEventListener("keyup", function (e) {
    document.querySelector(".cancel").setAttribute("style", "display:block");
    var keyval = this.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (e) {
        if (this.readyState == 4 && this.status) {
            document.querySelector(".tbody").innerHTML = this.responseText;
        }

    }
    xhttp.open("post", "search.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    xhttp.send("keyval=" + keyval)
})
//cancel data
document.querySelector(".cancel").addEventListener("click", function () {
    document.querySelector(".cancel").setAttribute("style", "display:none");
    load_data();
})