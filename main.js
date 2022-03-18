
    var loadFile = function(event) {
        var image = document.getElementById('img-post');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
