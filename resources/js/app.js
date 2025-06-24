import "./bootstrap";

import flatpickr from "flatpickr";
import { Indonesian } from "flatpickr/dist/l10n/id.js";

window.initFlatpickrTanggalSpj = function () {
    const el = document.querySelector("#tanggal_spj");
    if (el) {
        flatpickr(el, {
            dateFormat: "d-m-Y",
            locale: Indonesian,
            allowInput: true,
        });
    }
};

// Reinit setiap selesai Livewire update DOM
document.addEventListener("livewire:initialized", () => {
    window.Livewire.hook("commit", () => {
        initFlatpickrTanggalSpj();
    });
});

document.addEventListener("livewire-ui:modal:close", () => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((el) => el.remove());
});

document.addEventListener("livewire-ui:modal:close", () => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((el) => el.remove());
});
