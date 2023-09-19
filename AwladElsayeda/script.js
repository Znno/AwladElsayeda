function modalVisible(id) {
    let element = document.getElementById(id);
    if (element.className === "modal") {
        element.className += " hide";
    } else {
        element.className = "modal";
    }
}