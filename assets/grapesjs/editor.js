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

function mollatParseLatestFolders () {
  mockedFolders.length = 2

  paintLatestFolders(mockedFolders)
}

function prepareFolderColumn ({ thumbnail, title, chapo, tags }) {
  const thumbnailItem = document.createElement('img')
  const titleItem = document.createElement('mj-text')
  const chapoItem = document.createElement('mj-text')

  const columnArray = []

  thumbnailItem.src = thumbnail
  thumbnailItem.style.maxHeight = '100%'
  thumbnailItem.style.maxWidth = '100%'
  columnArray.push(thumbnailItem)

  titleItem.textContent = title
  titleItem.style.textTransform = 'uppercase'
  titleItem.style.color = '#001689'
  titleItem.style.fontWeight = 800
  columnArray.push(titleItem)

  chapoItem.textContent = chapo
  columnArray.push(chapoItem)

  const tagsSectionItem = document.createElement('mj-wrapper')

  for (const tag of tags) {
    const tagItem = document.createElement('mj-button')
    tagItem.textContent = tag
    tagItem.style.border = '1px solid'
    tagItem.style.fontSize = '10px'
    tagItem.style.borderRadius = 0
    tagItem.style.backgroundColor = '#ffffff'
    tagItem.style.color = '#121212'
    tagItem.style.padding = '3px 12px'
    tagItem.setAttribute('align', 'left')
    tagsSectionItem.append(tagItem)
  }

  columnArray.push(tagsSectionItem)

  return columnArray
}

function paintLatestFolders ([folder1, folder2]) {
  const wrapperItem = document.createElement('mj-wrapper')

  const column1 = document.createElement('mj-column')
  const column2 = document.createElement('mj-column')
  const column3 = document.createElement('mj-column')

  column1.append(...prepareFolderColumn(folder1))
  column1.style.width = '49%'

  column2.style.width = '2%'

  column3.append(...prepareFolderColumn(folder2))
  column3.style.width = '49%'

  wrapperItem.append(column1, column2, column3)

  const content = wrapperItem.outerHTML

  blockManager.add('2 Folders', {
    label: '2 Folders',
    content,
    attributes: {
      class: 'fa fa-folder-open'
    }
  })
}

mollatParseLatestFolders()


function paintLatestEvent () {
  const [{ thumbnail, title, date, summary }] = mockedEvents

  const wrapperItem = document.createElement('mj-wrapper')

  const column1 = document.createElement('mj-column')
  const column2 = document.createElement('mj-column')
  const column3 = document.createElement('mj-column')

  const imageItem = document.createElement('img')
  imageItem.src = thumbnail
  imageItem.style.maxWidth = '100%'
  imageItem.style.maxHeight = '100%'

  column1.append(imageItem)
  column1.style.width = '49%'

  column2.style.width = '2%'

  const titleItem = document.createElement('mj-text')
  const dateItem = document.createElement('mj-text')
  const chapoItem = document.createElement('mj-text')
  const buttonItem = document.createElement('mj-button')

  titleItem.textContent = title
  titleItem.style.fontSize = '20px'
  titleItem.style.fontWeight = 800
  titleItem.style.textTransform = 'uppercase'

  dateItem.textContent = date
  dateItem.style.fontSize = '18px'
  dateItem.style.color = '#001689'

  chapoItem.textContent = summary

  buttonItem.textContent = 'Découvrir'
  buttonItem.style.borderRadius = 0
  buttonItem.style.backgroundColor = '#001689'
  buttonItem.style.padding = '10px 25px'
  buttonItem.setAttribute('align', 'left')

  column3.append(titleItem, dateItem, chapoItem, buttonItem)
  column3.style.width = '49%'

  wrapperItem.append(column1, column2, column3)

  const content = wrapperItem.outerHTML

  blockManager.add('Latest Event', {
    label: 'Latest Event',
    content,
    attributes: {
      class: 'fa fa-calendar-check'
    }
  })
}

paintLatestEvent()
