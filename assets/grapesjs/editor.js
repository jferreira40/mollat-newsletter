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
    autoload: true,
    stepsBeforeSave: 5,
  },
})

async function mollatParseLatestFavorites () {
  const parsedResult = mockedData.map(({ title, seo, media }) => {
    return {
      title,
      seo,
      mediaUrl: media?.url_upload,
      mediaAlt: media?.alternative_text
    }
  })

  parsedResult.length = 4

  return parsedResult
}

async function domReadyFavorites () {
  const parsedFavorites = await mollatParseLatestFavorites()
  const sectionItem = document.createElement('mj-section')

  parsedFavorites.forEach(async ({ title, seo, mediaUrl, mediaAlt }) => {
    const linkItem = document.createElement('a')
    linkItem.href = seo

    const titleItem = document.createElement('mj-text')
    titleItem.textContent = title

    const imageItem = document.createElement('img')

    imageItem.src = 'data:image/jpeg;base64,' + mediaUrl
    imageItem.alt = mediaAlt
    imageItem.style.width = "100%"

    linkItem.append(titleItem, imageItem)

    const columnItem = document.createElement('mj-column')
    columnItem.append(linkItem)
    sectionItem.append(columnItem)
  })

  paintFavorites(sectionItem.outerHTML)
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
