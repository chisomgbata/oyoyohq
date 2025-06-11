import * as Htmx from "htmx.org"
import * as FilePond from 'filepond';
import {Alpine} from "alpinejs"
import persist from '@alpinejs/persist'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import intersect from '@alpinejs/intersect'
import Splide from "@splidejs/splide";

Alpine.plugin(intersect)
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


document.addEventListener('DOMContentLoaded', () => {
    // Select all elements with the .filepond class
    const inputElements = document.querySelectorAll('input.filepond');

    // Create a FilePond instance for each element
    Array.from(inputElements).forEach(inputElement => {
        FilePond.create(inputElement, {
            credits: false,
            labelIdle: 'Upload Proof of Payment or <span class="filepond--label-action">Browse</span>',
            storeAsFile: true,
            allowImagePreview: true,
        });
    });

    // check if .splide class exists
    if (document.querySelector('.splide')) {
        new Splide('.splide', {
            type: 'loop',
            autoplay: false,
            interval: 3000,
            classes: {
                pagination: 'splide__pagination absolute !right-2 !bottom-2 !flex !justify-end ',
                page: 'splide__pagination__page !w-2 !h-2 !rounded-full transition-all !opacity-50 !mx-1',

            },
            resetProgress: false,
            pauseOnHover: false
        }).mount();
    }
});


window.FilePond = FilePond


window.Alpine = Alpine
window.htmx = Htmx


