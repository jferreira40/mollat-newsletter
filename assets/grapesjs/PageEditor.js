const PageEditor = grapesjs.init({
  container: '#gjs_page',
  plugins: ['gjs-preset-webpage'],
  pluginsOpts: {
    'gjs-preset-webpage': {
      // options
    }
  },
  cssIcons: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
  fromElement: true,
  height: '60vh',
  width: '100%',
  storageManager: {
    autosave: true,
    autoload: false,
    stepsBeforeSave: 5,
  },
})
