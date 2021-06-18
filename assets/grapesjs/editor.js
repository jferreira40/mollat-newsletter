const editor = grapesjs.init({
  container: '#gjs',
  plugins: ['grapesjs-mjml'],
  pluginsOpts: {
    'grapesjs-mjml': {/* ...options */ }
  },
  cssIcons: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
  fromElement: true,
  height: '60vh',
  width: '100%',
  storageManager: {
    autosave: true,
    autoload: false,
    stepsBeforeSave: 5,
  },
})

async function mollatParseLatestFavorites () {
  const parsedResult = mockedData.map(({ title, seo, media, header }) => {
    return {
      title,
      seo,
      mediaUrl: media?.url_upload,
      header
    }
  })

  parsedResult.length = 4

  return parsedResult
}

async function domReadyFavorites () {
  const parsedFavorites = await mollatParseLatestFavorites()

  const wrapperItem = document.createElement('mj-wrapper')

  parsedFavorites.forEach(async ({ title, seo, mediaUrl, header }, i) => {
    const sectionItem = document.createElement('mj-section')

    const column1 = document.createElement('mj-column')
    const column2 = document.createElement('mj-column')
    const column3 = document.createElement('mj-column')

    const counterItem = document.createElement('mj-text')
    counterItem.textContent = i + 1
    column1.append(counterItem)

    const imageItem = document.createElement('img')
    imageItem.src = 'data:image/jpeg;base64,' + mediaUrl
    imageItem.style.width = "100%"
    column2.append(imageItem)

    const titleItem = document.createElement('mj-text')
    const chapoItem = document.createElement('mj-text')
    const buttonItem = document.createElement('mj-button')

    titleItem.textContent = title

    chapoItem.textContent = header

    buttonItem.textContent = 'Découvrir'

    column3.append(titleItem, chapoItem, buttonItem)

    sectionItem.append(column1, column2, column3)
    wrapperItem.append(sectionItem)
  })

  paintFavorites(wrapperItem.outerHTML)
}

function paintFavorites (content) {
  const blockManager = editor.BlockManager

  blockManager.add('Nos coups de coeur', {
    label: 'Coups de coeur',
    content,
    attributes: {
      class: 'fa fa-heart'
    }
  })
}

domReadyFavorites()
