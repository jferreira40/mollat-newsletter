const PageEditor = grapesjs.init({
  container: '#gjs_page',
  plugins: ['gjs-preset-webpage'],
  pluginsOpts: {
    'gjs-preset-webpage': {
      // options
    }
  },
  cssIcons: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
  fromElement: true,
  height: '60vh',
  width: '100%',
  storageManager: {
    autosave: true,
    autoload: true,
    stepsBeforeSave: 5,
  },
})
