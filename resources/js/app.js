import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const editorElements = document.querySelectorAll('textarea.tinymce-editor');
    editorElements.forEach((editorElement) => {
        if (editorElement) {
            import('tinymce/tinymce').then(tinymce => {
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
