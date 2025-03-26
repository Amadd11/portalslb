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
                if (!this.scrollEl) return;

                let maxScrollLeft =
                    this.scrollEl.scrollWidth - this.scrollEl.clientWidth;

                if (this.scrollEl.scrollLeft >= maxScrollLeft) {
                    this.scrollEl.scrollLeft = 0; // Kembali ke awal secara halus
                } else {
                    this.scrollEl.scrollLeft += 1; // Langkah lebih besar supaya cepat
                }
            }, 5); // Delay diatur agar tetap smooth
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
            this.pauseScroll(); // Hentikan auto-scroll sementara
            if (!this.scrollEl) return;
            this.scrollEl.scrollBy({
                left: -250,
                behavior: "smooth",
            });
            setTimeout(() => this.resumeScroll(), 2000); // Lanjutkan auto-scroll setelah 2 detik
        },

        scrollNext() {
            this.pauseScroll(); // Hentikan auto-scroll sementara
            if (!this.scrollEl) return;
            this.scrollEl.scrollBy({
                left: 250,
                behavior: "smooth",
            });
            setTimeout(() => this.resumeScroll(), 2000); // Lanjutkan auto-scroll setelah 2 detik
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
