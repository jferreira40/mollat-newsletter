const editor = grapesjs.init({
    container: '#gjs',
    plugins: ['grapesjs-mjml'],
    pluginsOpts: {
        'grapesjs-mjml': {/* ...options */}
    },
    cssIcons: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
    fromElement: true,
    height: '60vh',
    width: '100%',
    // storageManager: false,
});
