const editor = grapesjs.init({
  container: '#gjs',
  plugins: ['grapesjs-mjml'],
  pluginsOpts: {
    'grapesjs-mjml': {/* ...options */ }
  },
  fromElement: true,
  height: '60vh',
  width: '100%',
  storageManager: {
    autosave: false,
    autoload: false,
    stepsBeforeSave: 5,
  }
})
const blockManager = editor.BlockManager

async function mollatParseLatestFavorites () {
  const parsedResult = mockedData.map(({ title, seo, media, header, price }) => {
    return {
      title,
      seo,
      mediaUrl: media?.url_upload,
      header,
      price
    }
  })

  parsedResult.length = 3

  return parsedResult
}

async function domReadyFavorites () {
  const parsedFavorites = await mollatParseLatestFavorites()

  const wrapperItem = document.createElement('mj-wrapper')

  parsedFavorites.forEach(async ({ title, seo, mediaUrl, header, price }, i) => {
    const sectionItem = document.createElement('mj-section')

    const column1 = document.createElement('mj-column')
    const column2 = document.createElement('mj-column')
    const column3 = document.createElement('mj-column')

    column1.setAttribute('width', '40px')
    column2.setAttribute('width', '100px')
    column3.setAttribute('width', '400px')

    const counterItem = document.createElement('p')
    counterItem.textContent = i + 1
    counterItem.style.backgroundColor = '#001689'
    counterItem.style.color = '#fff'
    counterItem.style.width = '6px'
    counterItem.style.padding = '12px'
    counterItem.style.display = 'inline'
    counterItem.style.fontFamily = 'Tahoma, sans-serif'
    column1.append(counterItem)

    const imageItem = document.createElement('img')
    imageItem.src = 'data:image/jpeg;base64,' + mediaUrl
    imageItem.style.width = "100%"
    column2.append(imageItem)

    const titleItem = document.createElement('mj-text')
    const priceItem = document.createElement('mj-text')
    const chapoItem = document.createElement('mj-text')
    const buttonItem = document.createElement('mj-button')

    titleItem.textContent = title
    titleItem.style.fontSize = '22px'
    titleItem.style.fontWeight = 600
    titleItem.style.textTransform = 'uppercase'
    titleItem.style.fontFamily = 'Tahoma, sans-serif'

    priceItem.textContent = price
    priceItem.style.padding = '0 25px'
    priceItem.style.color = '#001689'
    priceItem.style.fontSize = '22px'
    priceItem.style.fontWeight = 600
    priceItem.style.fontFamily = 'Tahoma, sans-serif'


    chapoItem.textContent = header
    chapoItem.style.fontFamily = 'Tahoma, sans-serif'

    buttonItem.textContent = 'Découvrir'
    buttonItem.style.backgroundColor = '#001689'
    buttonItem.style.fontFamily = 'Tahoma, sans-serif'

    column3.append(titleItem, priceItem, chapoItem, buttonItem)

    sectionItem.append(column1, column2, column3)
    wrapperItem.append(sectionItem)
  })

  paintFavorites(wrapperItem.outerHTML)
}

function paintFavorites (content) {
  blockManager.add('Nos coups de coeur', {
    label: 'Coups de coeur',
    content,
    attributes: {
      class: 'fa fa-heart'
    }
  })
}

domReadyFavorites()


function mollatParseLatestEvents () {
  mockedEvents.length = 5

  const wrapperItem = document.createElement('mj-wrapper')

  mockedEvents.forEach(({ thumbnail, title, date, summary }) => {
    const sectionItem = document.createElement('mj-section')

    const column1 = document.createElement('mj-column')
    const column2 = document.createElement('mj-column')

    const imageItem = document.createElement('img')
    imageItem.src = thumbnail
    imageItem.style.maxWidth = '100%'
    imageItem.style.maxHeight = '100%'

    column1.append(imageItem)

    const titleItem = document.createElement('mj-text')
    titleItem.textContent = title
    titleItem.style.textTransform = 'uppercase'
    titleItem.style.fontWeight = 800
    titleItem.style.fontSize = '20px'

    const dateItem = document.createElement('mj-text')
    dateItem.textContent = date
    dateItem.style.color = '#001689'
    dateItem.style.fontSize = '20px'

    const summaryItem = document.createElement('mj-text')
    summaryItem.textContent = summary

    const buttonItem = document.createElement('mj-button')
    buttonItem.textContent = 'Découvrir'
    buttonItem.style.textTransform = 'uppercase'
    buttonItem.style.backgroundColor = '#001689'
    buttonItem.style.borderRadius = 0

    column2.append(titleItem, dateItem, summaryItem, buttonItem)

    sectionItem.append(column1, column2)
    wrapperItem.append(sectionItem)
  })

  paintFiveLastEvents(wrapperItem.outerHTML)
}


function paintFiveLastEvents (content) {
  blockManager.add('5 Events', {
    label: '5 Events',
    content,
    attributes: {
      class: 'fa fa-calendar'
    }
  })
}

mollatParseLatestEvents()
