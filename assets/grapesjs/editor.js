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
  // storageManager: false,
})

async function mollatParseLatestFavorites () {
  const response = await fetch('https://www.mollat.com/Nova/GetPostsByEAN/9782364684072')
  const result = await response.json()

  const parsedResult = result.map(({ title, seo, media }) => {
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

  parsedFavorites.forEach(({ title, seo, mediaUrl, mediaAlt }) => {
    const linkItem = document.createElement('a')
    linkItem.href = seo

    const titleItem = document.createElement('mj-text')
    titleItem.textContent = title

    const imageItem = document.createElement('mj-image')

    imageItem.src = mediaUrl
    imageItem.alt = mediaAlt

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
    content
  })
}

domReadyFavorites()
