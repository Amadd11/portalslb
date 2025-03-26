document.addEventListener("alpine:init", () => {
    Alpine.data("autoScrollGaleri", () => ({
        scrollEl: null,
        interval: null,
        openModal: false,
        modalImage: "",

        init() {
            this.scrollEl = this.$refs.scrollContainer;
            this.startAutoScroll();

            // Tambahkan event listener untuk tombol Esc
            window.addEventListener("keydown", this.handleKeydown);
        },

        startAutoScroll() {
            this.stopAutoScroll(); // Hentikan interval lama sebelum memulai yang baru
            this.interval = setInterval(() => {
                if (this.scrollEl.scrollLeft >= this.scrollEl.scrollWidth / 2) {
                    this.scrollEl.scrollLeft = 0;
                } else {
                    this.scrollEl.scrollLeft += 1;
                }
            }, 15);
        },

        stopAutoScroll() {
            clearInterval(this.interval);
            this.interval = null;
        },

        pauseScroll() {
            this.stopAutoScroll();
        },

        resumeScroll() {
            this.startAutoScroll();
        },

        scrollPrev() {
            if (!this.scrollEl) return;
            this.scrollEl.scrollBy({
                left: -250,
                behavior: "smooth",
            });
        },

        scrollNext() {
            if (!this.scrollEl) return;
            this.scrollEl.scrollBy({
                left: 250,
                behavior: "smooth",
            });
        },

        openImage(src) {
            this.modalImage = src;
            this.openModal = true;
        },

        closeModal() {
            this.openModal = false;
        },

        handleKeydown(event) {
            if (event.key === "Escape") {
                this.openModal = false;
            }
        },

        destroy() {
            // Hapus event listener saat komponen dihancurkan
            window.removeEventListener("keydown", this.handleKeydown);
        },
    }));
});
