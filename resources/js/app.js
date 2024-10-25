import './bootstrap';

import Alpine from 'alpinejs';
import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver';
import 'tinymce/icons/default';
import 'tinymce/plugins/code';
window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const editorElements = document.querySelectorAll('textarea.tinymce-editor');
    editorElements.forEach((editorElement) => {
        if (editorElement) {
            import('tinymce/tinymce').then(tinymce => {
                console.log('TinyMCE loaded'); // Add this line
                tinymce.init({

                    selector: editorElement,
                    plugins: 'code',
                    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code',
                    height: 400,
                });
            });
        }
    });
});
