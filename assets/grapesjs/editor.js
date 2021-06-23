const editor = grapesjs.init({
  container: '#gjs',
  plugins: ['grapesjs-mjml'],
  pluginsOpts: {
    'grapesjs-mjml': {
      overwriteExport: false
    }
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

function mollatParseLatestFavorites () {
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

function domReadyFavorites () {
  const parsedFavorites = mollatParseLatestFavorites()

  const wrapperItem = document.createElement('mj-wrapper')

  parsedFavorites.forEach(({ title, seo, mediaUrl, header, price }, i) => {
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
    imageItem.style.maxWidth = '100%'
    imageItem.style.maxHeight = '100%'
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
    priceItem.style.fontSize = '16px'
    priceItem.style.fontWeight = 600
    priceItem.style.fontFamily = 'Tahoma, sans-serif'


    chapoItem.textContent = header
    chapoItem.style.fontFamily = 'Tahoma, sans-serif'

    buttonItem.textContent = 'Découvrir'
    buttonItem.style.backgroundColor = '#001689'
    buttonItem.style.borderRadius = 0
    buttonItem.style.padding = '10px 25px'
    buttonItem.style.fontFamily = 'Tahoma, sans-serif'
    buttonItem.setAttribute('align', 'left')

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
    titleItem.style.fontFamily = 'Tahoma, sans-serif'

    const dateItem = document.createElement('mj-text')
    dateItem.textContent = date
    dateItem.style.color = '#001689'
    dateItem.style.fontSize = '20px'
    dateItem.style.fontFamily = 'Tahoma, sans-serif'

    const summaryItem = document.createElement('mj-text')
    summaryItem.textContent = summary
    summaryItem.style.fontFamily = 'Tahoma, sans-serif'

    const buttonItem = document.createElement('mj-button')
    buttonItem.textContent = 'Découvrir'
    buttonItem.style.backgroundColor = '#001689'
    buttonItem.style.borderRadius = 0
    buttonItem.style.padding = '10px 25px'
    buttonItem.style.fontFamily = 'Tahoma, sans-serif'
    buttonItem.setAttribute('align', 'left')

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
  titleItem.style.fontSize = '18px'
  titleItem.style.fontFamily = 'Tahoma, sans-serif'
  columnArray.push(titleItem)

  chapoItem.textContent = chapo
  chapoItem.style.fontFamily = 'Tahoma, sans-serif'
  columnArray.push(chapoItem)

  const tagsItem = document.createElement('mj-text')
  tagsItem.style.fontStyle = 'italic'
  console.log(tags)
  tagsItem.textContent = tags.toString()
  columnArray.push(tagsItem)

  const buttonItem = document.createElement('mj-button')
  buttonItem.textContent = 'Découvrir'
  buttonItem.style.borderRadius = 0
  buttonItem.style.backgroundColor = '#001689'
  buttonItem.style.padding = '10px 25px'
  columnArray.push(buttonItem)

  return columnArray
}

function paintLatestFolders ([folder1, folder2]) {
  const wrapperItem = document.createElement('mj-wrapper')
  wrapperItem.style.backgroundColor = '#EEEEF2'
  wrapperItem.style.padding = '10px'

  const column1 = document.createElement('mj-column')
  const column2 = document.createElement('mj-column')
  const column3 = document.createElement('mj-column')

  column1.append(...prepareFolderColumn(folder1))
  column1.style.width = '49%'
  column1.style.backgroundColor = '#ffffff'

  column2.style.width = '2%'

  column3.append(...prepareFolderColumn(folder2))
  column3.style.width = '49%'
  column3.style.backgroundColor = '#ffffff'

  const subSectionItem = document.createElement('mj-section')
  subSectionItem.append(column1, column2, column3)
  wrapperItem.append(subSectionItem)

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
  titleItem.style.fontFamily = 'Tahoma, sans-serif'

  dateItem.textContent = date
  dateItem.style.fontSize = '18px'
  dateItem.style.color = '#001689'
  dateItem.style.fontFamily = 'Tahoma, sans-serif'

  chapoItem.textContent = summary
  chapoItem.style.fontFamily = 'Tahoma, sans-serif'

  buttonItem.textContent = 'Découvrir'
  buttonItem.style.borderRadius = 0
  buttonItem.style.backgroundColor = '#001689'
  buttonItem.style.padding = '10px 25px'
  buttonItem.style.fontFamily = 'Tahoma, sans-serif'
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
