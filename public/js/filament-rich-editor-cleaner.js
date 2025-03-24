document.addEventListener("filament:rich-editor:init", (e) => {
    const editor = e.detail.editor;

    editor.on("blur", () => {
        let html = editor.getHTML();

        // Bersihkan &nbsp; dan spasi di awal setiap paragraf
        html = html.replace(/<p>(\s|&nbsp;)+/g, "<p>");

        // Update isi editor jika sudah dibersihkan
        editor.commands.setContent(html, false);
    });
});
