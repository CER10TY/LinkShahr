(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });


        document.getElementById('customFile').addEventListener('change', function (e) {
            let fileList = document.getElementById("custom-file-list");
            Array.from(e.target.files).forEach(file => {
                let size = humanFileSize(file.size, false);
                let name = file.name;

                let fileElement = document.createElement("li");
                let removeLink = document.createElement("a");

                fileElement.setAttribute("id", "file-" + Math.floor((Math.random() * 250) + 1))

                removeLink.setAttribute("href", "#");
                removeLink.setAttribute("data-element", fileElement.id);
                removeLink.classList.add("badge", "badge-dark");
                removeLink.appendChild(document.createTextNode("X"));


                removeLink.addEventListener("click",function(e) {
                   document.getElementById(e.target.dataset.element).remove();
                });

                fileElement.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
                fileElement.appendChild(document.createTextNode(size + ": " + name));
                fileElement.appendChild(removeLink);

                fileList.appendChild(fileElement);

            });
            fileList.classList.remove("d-none");
        });
    }, false);

    function humanFileSize(bytes, si) {
        var thresh = si ? 1000 : 1024;
        if(Math.abs(bytes) < thresh) {
            return bytes + ' B';
        }
        var units = si
            ? ['kB','MB','GB','TB','PB','EB','ZB','YB']
            : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
        var u = -1;
        do {
            bytes /= thresh;
            ++u;
        } while(Math.abs(bytes) >= thresh && u < units.length - 1);
        return bytes.toFixed(1)+' '+units[u];
    }
})();