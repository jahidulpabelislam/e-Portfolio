loadXHR = function (ob) {
    var i, query, xhr = new XMLHttpRequest();

    xhr.open(ob.method, "api/" + ob.url, true);

    xhr.setRequestHeader("Accept", "application/json");

    if (ob.query) {
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        query = ob.query;
    }

    for (i in ob.callbacks) {
        if (ob.callbacks.hasOwnProperty(i)) {
            
            xhr.addEventListener(i, ob.callbacks[i]);
        }
    }

    xhr.send(query);
};