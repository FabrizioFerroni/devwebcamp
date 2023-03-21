'use strict';

;
(function(document, window, index) {
    var inputs = document.querySelectorAll('.inputfile');
    if (inputs) {
        Array.prototype.forEach.call(inputs, function(input) {
            let label = input.nextElementSibling,
                labelVal = label.innerHTML,
                span = label.querySelector('span');

            let placeholder = span.placeholder = 'Ingresa la imagen del ponente'
            span.innerHTML = placeholder;


            input.addEventListener('change', function(e) {
                var fileName = 'Seleccionar una imagen';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });
    }
}(document, window, 0));