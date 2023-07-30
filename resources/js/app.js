import './bootstrap';
import Dropzone from "dropzone";
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
var myDropzone = new Dropzone("#my-form",{
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    maxFilesize: 12,
});
myDropzone.on("addedfile", file => {
    console.log(`File added: ${file.name}`);
});