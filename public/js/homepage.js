document.addEventListener("alpine:init", () => {
    Alpine.data("autoScrollGaleri", () => ({
        scrollEl: null,
        interval: null,
        openModal: false,
        modalImage: "",
        init() {
            this.scrollEl = this.$refs.scrollContainer;
            this.startAutoScroll();
        },
        startAutoScroll() {
            this.interval = setInterval(() => {
                this.scrollEl.scrollLeft += 1;
                if (this.scrollEl.scrollLeft >= this.scrollEl.scrollWidth / 2) {
                    this.scrollEl.scrollLeft = 0;
                }
            }, 15);
        },
        pauseScroll() {
            clearInterval(this.interval);
        },
        resumeScroll() {
            this.startAutoScroll();
        },
        scrollPrev() {
            this.scrollEl.scrollLeft -= 250;
        },
        scrollNext() {
            this.scrollEl.scrollLeft += 250;
        },
        openImage(src) {
            this.modalImage = src;
            this.openModal = true;
        },
    }));
});
