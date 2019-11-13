;(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                let fileInput = document.getElementById('customFile');
                let link = document.getElementById('linkInput');
                let duration = document.getElementById('durationSelect');

                if (fileInput.files.length === 0 && link.value === "") {
                    link.classList.add('is-invalid');
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    link.classList.remove('is-invalid');
                    link.classList.add('is-valid');
                }

                if (form.checkValidity() === false) {
                    duration.classList.add('is-invalid');
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    duration.classList.remove('is-invalid');
                    duration.classList.add('is-valid');
                }
            }, false);
        });

        document.getElementById('customFile').addEventListener( 'change', function( e )
        {
            let label = document.getElementById('custom-file-lbl');
            let labelVal = label.innerHTML;
            let fileName = '';
            if ( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if ( this.files && this.files.length === 1) 
                if ( e.target.value.length >= 50 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();
            else 
                fileName = '';
                labelVal = "Choose file(s)";

            if ( fileName )
                label.innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    }, false);
})();