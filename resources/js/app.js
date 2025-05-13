import * as Htmx from "htmx.org"
import * as FilePond from 'filepond';
import {Alpine} from "alpinejs"
import persist from '@alpinejs/persist'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';


Alpine.plugin(persist)
Alpine.store('cart', {
    items: Alpine.$persist([]).as('cartItems').using(sessionStorage),
    add(item) {
        if (this.items.find(i => i.id === item.id)) {
            return
        }
        this.items.push(item);
    },
    remove(item) {
        this.items = this.items.filter(i => i.id !== item.id);
    },

    clear() {
        this.items = [];
    },

    count() {
        return this.items.length;
    },

    changeQuantity(item, quantity) {
        const index = this.items.findIndex(i => i.id === item.id);
        if (index !== -1) {
            this.items[index].quantity = quantity;
        }
    },
    inCart(item) {
        return this.items.some(i => i.id === item.id);
    },

    total() {
        return this.items.reduce((acc, item) => {
            return acc + (item.price * item.quantity);
        }, 0);
    },
    isEmpty() {
        return this.items.length === 0;
    }

})

Alpine.start()


FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateSize,
);

FilePond.create('#proof', {
    credits: false,
    labelIdle: 'Drag and Drop Proof Of Payment or <span class="filepond--label-action">Browse</span>',
    storeAsFile: true
})


window.FilePond = FilePond

window.Alpine = Alpine
window.htmx = Htmx


