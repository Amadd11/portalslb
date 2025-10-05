function autoScrollGaleri() {
    return {
        scrollContainer: null,
        interval: null,
        speed: 1, // kecepatan scroll px per step
        init() {
            this.scrollContainer = this.$refs.scrollContainer;
            this.startScroll();
        },
        startScroll() {
            this.interval = setInterval(() => {
                if (!this.scrollContainer) return;
                this.scrollContainer.scrollLeft += this.speed;

                // kalau sudah setengah (karena kita gandakan data), reset biar mulus
                if (
                    this.scrollContainer.scrollLeft >=
                    this.scrollContainer.scrollWidth / 2
                ) {
                    this.scrollContainer.scrollLeft = 0;
                }
            }, 20); // 20ms sekali (semakin kecil semakin halus)
        },
        pauseScroll() {
            clearInterval(this.interval);
        },
        resumeScroll() {
            this.startScroll();
        },
        openImage(src) {
            // bisa pakai lightbox, modal, dll
            window.open(src, "_blank");
        },
    };
}
