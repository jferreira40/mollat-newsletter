const PageEditor = grapesjs.init({
  container: '#gjs_page',
  fromElement: true,
  height: '60vh',
  width: '100%',
  plugins: ['gjs-preset-webpage'],
  selectorManager: { componentFirst: true },
  styleManager: { clearProperties: 1 },
  cssIcons: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
  storageManager: {
    autosave: false,
    autoload: false,
    stepsBeforeSave: 5,
  },
  pluginsOpts: {
    'gjs-preset-webpage': {
      modalImportTitle: 'Import Template',
      modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
      modalImportContent: function (editor) {
        return editor.getHtml() + '<style>' + editor.getCss() + '</style>'
      },
      filestackOpts: null, //{ key: 'AYmqZc2e8RLGLE7TGkX3Hz' },
      aviaryOpts: false,
      blocksBasicOpts: { flexGrid: 1 },
      customStyleManager: [{
        name: 'General',
        buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
        properties: [{
          name: 'Alignment',
          property: 'float',
          type: 'radio',
          defaults: 'none',
          list: [
            { value: 'none', className: 'fa fa-times' },
            { value: 'left', className: 'fa fa-align-left' },
            { value: 'right', className: 'fa fa-align-right' }
          ],
        },
        { property: 'position', type: 'select' }
        ],
      },
      {
        name: 'Dimension',
        open: false,
        buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
        properties: [{
          id: 'flex-width',
          type: 'integer',
          name: 'Width',
          units: ['px', '%'],
          property: 'flex-basis',
          toRequire: 1,
        }, {
          property: 'margin',
          properties: [
            { name: 'Top', property: 'margin-top' },
            { name: 'Right', property: 'margin-right' },
            { name: 'Bottom', property: 'margin-bottom' },
            { name: 'Left', property: 'margin-left' }
          ],
        }, {
          property: 'padding',
          properties: [
            { name: 'Top', property: 'padding-top' },
            { name: 'Right', property: 'padding-right' },
            { name: 'Bottom', property: 'padding-bottom' },
            { name: 'Left', property: 'padding-left' }
          ],
        }],
      },
      {
        name: 'Typography',
        open: false,
        buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
        properties: [
          { name: 'Font', property: 'font-family' },
          { name: 'Weight', property: 'font-weight' },
          { name: 'Font color', property: 'color' },
          {
            property: 'text-align',
            type: 'radio',
            defaults: 'left',
            list: [
              { value: 'left', name: 'Left', className: 'fa fa-align-left' },
              { value: 'center', name: 'Center', className: 'fa fa-align-center' },
              { value: 'right', name: 'Right', className: 'fa fa-align-right' },
              { value: 'justify', name: 'Justify', className: 'fa fa-align-justify' }
            ],
          }, {
            property: 'text-decoration',
            type: 'radio',
            defaults: 'none',
            list: [
              { value: 'none', name: 'None', className: 'fa fa-times' },
              { value: 'underline', name: 'underline', className: 'fa fa-underline' },
              { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough' }
            ],
          }, {
            property: 'text-shadow',
            properties: [
              { name: 'X position', property: 'text-shadow-h' },
              { name: 'Y position', property: 'text-shadow-v' },
              { name: 'Blur', property: 'text-shadow-blur' },
              { name: 'Color', property: 'text-shadow-color' }
            ],
          }],
      },
      {
        name: 'Decorations',
        open: false,
        buildProps: ['opacity', 'border-radius', 'border', 'box-shadow', 'background-bg'],
        properties: [{
          type: 'slider',
          property: 'opacity',
          defaults: 1,
          step: 0.01,
          max: 1,
          min: 0,
        }, {
          property: 'border-radius',
          properties: [
            { name: 'Top', property: 'border-top-left-radius' },
            { name: 'Right', property: 'border-top-right-radius' },
            { name: 'Bottom', property: 'border-bottom-left-radius' },
            { name: 'Left', property: 'border-bottom-right-radius' }
          ],
        }, {
          property: 'box-shadow',
          properties: [
            { name: 'X position', property: 'box-shadow-h' },
            { name: 'Y position', property: 'box-shadow-v' },
            { name: 'Blur', property: 'box-shadow-blur' },
            { name: 'Spread', property: 'box-shadow-spread' },
            { name: 'Color', property: 'box-shadow-color' },
            { name: 'Shadow type', property: 'box-shadow-type' }
          ],
        }, {
          id: 'background-bg',
          property: 'background',
          type: 'bg',
        },],
      },
      {
        name: 'Extra',
        open: false,
        buildProps: ['transition', 'perspective', 'transform'],
        properties: [{
          property: 'transition',
          properties: [
            { name: 'Property', property: 'transition-property' },
            { name: 'Duration', property: 'transition-duration' },
            { name: 'Easing', property: 'transition-timing-function' }
          ],
        }, {
          property: 'transform',
          properties: [
            { name: 'Rotate X', property: 'transform-rotate-x' },
            { name: 'Rotate Y', property: 'transform-rotate-y' },
            { name: 'Rotate Z', property: 'transform-rotate-z' },
            { name: 'Scale X', property: 'transform-scale-x' },
            { name: 'Scale Y', property: 'transform-scale-y' },
            { name: 'Scale Z', property: 'transform-scale-z' }
          ],
        }]
      },
      {
        name: 'Flex',
        open: false,
        properties: [{
          name: 'Flex Container',
          property: 'display',
          type: 'select',
          defaults: 'block',
          list: [
            { value: 'block', name: 'Disable' },
            { value: 'flex', name: 'Enable' }
          ],
        }, {
          name: 'Flex Parent',
          property: 'label-parent-flex',
          type: 'integer',
        }, {
          name: 'Direction',
          property: 'flex-direction',
          type: 'radio',
          defaults: 'row',
          list: [{
            value: 'row',
            name: 'Row',
            className: 'icons-flex icon-dir-row',
            title: 'Row',
          }, {
            value: 'row-reverse',
            name: 'Row reverse',
            className: 'icons-flex icon-dir-row-rev',
            title: 'Row reverse',
          }, {
            value: 'column',
            name: 'Column',
            title: 'Column',
            className: 'icons-flex icon-dir-col',
          }, {
            value: 'column-reverse',
            name: 'Column reverse',
            title: 'Column reverse',
            className: 'icons-flex icon-dir-col-rev',
          }],
        }, {
          name: 'Justify',
          property: 'justify-content',
          type: 'radio',
          defaults: 'flex-start',
          list: [{
            value: 'flex-start',
            className: 'icons-flex icon-just-start',
            title: 'Start',
          }, {
            value: 'flex-end',
            title: 'End',
            className: 'icons-flex icon-just-end',
          }, {
            value: 'space-between',
            title: 'Space between',
            className: 'icons-flex icon-just-sp-bet',
          }, {
            value: 'space-around',
            title: 'Space around',
            className: 'icons-flex icon-just-sp-ar',
          }, {
            value: 'center',
            title: 'Center',
            className: 'icons-flex icon-just-sp-cent',
          }],
        }, {
          name: 'Align',
          property: 'align-items',
          type: 'radio',
          defaults: 'center',
          list: [{
            value: 'flex-start',
            title: 'Start',
            className: 'icons-flex icon-al-start',
          }, {
            value: 'flex-end',
            title: 'End',
            className: 'icons-flex icon-al-end',
          }, {
            value: 'stretch',
            title: 'Stretch',
            className: 'icons-flex icon-al-str',
          }, {
            value: 'center',
            title: 'Center',
            className: 'icons-flex icon-al-center',
          }],
        }, {
          name: 'Flex Children',
          property: 'label-parent-flex',
          type: 'integer',
        }, {
          name: 'Order',
          property: 'order',
          type: 'integer',
          defaults: 0,
          min: 0
        }, {
          name: 'Flex',
          property: 'flex',
          type: 'composite',
          properties: [{
            name: 'Grow',
            property: 'flex-grow',
            type: 'integer',
            defaults: 0,
            min: 0
          }, {
            name: 'Shrink',
            property: 'flex-shrink',
            type: 'integer',
            defaults: 0,
            min: 0
          }, {
            name: 'Basis',
            property: 'flex-basis',
            type: 'integer',
            units: ['px', '%', ''],
            unit: '',
            defaults: 'auto',
          }],
        }, {
          name: 'Align',
          property: 'align-self',
          type: 'radio',
          defaults: 'auto',
          list: [{
            value: 'auto',
            name: 'Auto',
          }, {
            value: 'flex-start',
            title: 'Start',
            className: 'icons-flex icon-al-start',
          }, {
            value: 'flex-end',
            title: 'End',
            className: 'icons-flex icon-al-end',
          }, {
            value: 'stretch',
            title: 'Stretch',
            className: 'icons-flex icon-al-str',
          }, {
            value: 'center',
            title: 'Center',
            className: 'icons-flex icon-al-center',
          }],
        }]
      }
      ],
    }
  },
})

const pageBlockManager = PageEditor.BlockManager

function christmasSelect () {
  pageBlockManager.add('Sélection Noël', {
    label: 'Sélection Noël',
    content: `<section style="background-image: url('../../assets/grapesjs/Background-header.svg');background-size: cover; background-position: bottom center;background-repeat: no-repeat;width: 100%;box-sizing:border-box;margin:0;padding: 4% 10%; display: flex; flex-direction: column;gap: 15vw;"> <div style="display: flex;flex-direction: column;gap: 25px;"> <h1 style="color:#001689;font-family: Lato, sans-serif;font-weight: 600;font-size: 3.5vw;">Préparez Noël avec<br/> nos sélections</h1> <p style="max-width:25vw; font-family: Lato, sans-serif; line-height: 1.7;font-size:1.1vw;">Quis est quis cupidatat esse voluptate. Exercitation exercitation labore tempor id. Consequat anim reprehenderit laboris deserunt consequat incididunt labore minim veniam voluptate dolore.</p><button style="background: #001689; padding: 10px 25px;color: #fff; width: fit-content;border: none;font-size:1vw;">Découvrir</button> </div><div style="display: flex;justify-content: space-between; gap: 6%;"> <div style="background-image: url(../../assets/grapesjs/Indispensable.svg);background-size: contain;background-repeat:no-repeat;height: 10vw;width: 20vw;"> </div><div style="background-image: url(../../assets/grapesjs/Originaux.svg);background-size: contain;background-repeat:no-repeat;height: 10vw;width: 20vw;"> </div><div style="background-image: url(../../assets/grapesjs/Band_dessine.svg);background-size: contain;background-repeat:no-repeat;height: 10vw;width: 20vw;"> </div></div></section>`,
    attributes: {
      class: 'fa fa-gift fa-custom'
    }
  })
}
christmasSelect()


function youthSelect () {
  pageBlockManager.add('Jeunesse', {
    label: 'Jeunesse',
    content: ` <section> <h2 style="color: #001689;font-family: Lato, sans-serif;font-weight: 600;text-align: center;font-size: 2.5vw;"> Jeunesse</h2> <p style="background: #d2d9ff; width: fit-content; margin: 0 auto; padding: 5px 10px; border-radius: 2px; text-transform: uppercase; font-family: lato, sans-serif; font-size: 0.8vw; line-height: initial; margin-top: 1vw;">Littérature</p><p style="font-style: italic;text-align:center;margin-top:1.6vw;font-family: lato, sans-serif; font-size: 1vw;"> Découvrez nos idées cadeaux de livres à offrir à Noël pour les enfants<br/> par âge : de 0 à 2 ans, 3 à 5 ans, 6 à 9 ans, 10 ans et plus.</p><div style="display: flex; gap: 3vw; align-items: flex-end; justify-content: center;"> <div style="display: flex; flex-direction: column; align-items: center; width: 15%; margin-top: 4vw;"> <img style="width: 100%; height: 15vw; object-fit: contain; object-position: bottom center; margin-bottom: 1vw;" src="../../assets/grapesjs/Livre_2.jpg"> <p style="text-transform:uppercase;font-size:.8vw;padding: 4px 8px;color:#001689;background:lightgrey;font-family: Lato, sans-serif;margin-bottom: 1vw;align-self: start;margin-left: 10%"> Manga</p><p style="margin-left: 10%; font-style: italic;color: #001689;align-self: start;font-family: Lato, sans-serif; font-size: 1vw; font-weight: 800; margin-bottom: 1vw;"> 23€</p><p style="margin-left: 10%; align-self: start; font-family: Lato, sans-serif; font-size: 1vw;">Nostrud fugiat ex adipisicing sint eiusmod sint id non non quis tempor.</p><p style="margin-left: 10%; align-self: start; color: #001698; font-family: Lato, sans-serif; font-weight: 600; font-size: 1.1vw; margin-top: 1vw;"> En savoir plus</p></div><div style="display: flex; flex-direction: column; align-items: center; width: 15%;"> <img style="margin-bottom: 1vw;width: 100%; height: 18vw; object-fit: contain; object-position: bottom center;" src="../../assets/grapesjs/Livre_1.jpg"> <p style="text-transform:uppercase;font-size:.8vw;padding: 4px 8px;color:#001689;background:lightgrey;font-family: Lato, sans-serif;margin-bottom: 1vw;align-self: start;"> Manga</p><p style="font-style: italic;color: #001689;align-self: start;font-family: Lato, sans-serif; font-size: 1vw; font-weight: 800; margin-bottom: 1vw;"> 23€</p><p style="align-self: start; font-family: Lato, sans-serif; font-size: 1vw;">Nostrud fugiat ex adipisicing sint eiusmod sint id non non que elit.</p><p style="align-self: start; color: #001698; font-family: Lato, sans-serif; font-weight: 600; font-size: 1.1vw; margin-top: 1vw;"> En savoir plus</p></div><div style="display: flex; flex-direction: column; align-items: center; width: 15%;"> <img style="width: 100%; height: 15vw; object-fit: contain; object-position: bottom center; margin-bottom: 1vw;" src="../../assets/grapesjs/Livre_2.jpg"> <p style="text-transform:uppercase;font-size:.8vw;padding: 4px 8px;color:#001689;background:lightgrey;font-family: Lato, sans-serif;margin-bottom: 1vw;align-self: start;margin-left: 10%"> Manga</p><p style="margin-left: 10%; font-style: italic;color: #001689;align-self: start;font-family: Lato, sans-serif; font-size: 1vw; font-weight: 800; margin-bottom: 1vw;"> 23€</p><p style="margin-left: 10%; align-self: start; font-family: Lato, sans-serif; font-size: 1vw;">Commodo cupidatat irure qui consectetur aliquo.</p><p style="margin-left: 10%; align-self: start; color: #001698; font-family: Lato, sans-serif; font-weight: 600; font-size: 1.1vw; margin-top: 1vw;"> En savoir plus</p></div></div></section>`,
    attributes: {
      class: 'fa fa-custom fa-child'
    }
  })
}
youthSelect()

function popStore () {
  pageBlockManager.add('pop-store', {
    label: 'pop-store',
    content: ` <section style="background-image: url(../../assets/grapesjs/Banniere_popup.svg); background-size: contain; background-repeat: no-repeat; padding: 16vw 24vw; display: flex; flex-direction: column; gap: 1vw;"> <h2 style="font-family: Lato, sans-serif; color: #001689; font-weight: 600; font-size: 2.5vw;">Ouverture du pop-store</h2> <div style="display: flex; gap: 1vw;align-items: center;"> <img src="../../assets/grapesjs/pin_2.svg"> <p style="font-family: Lato, sans-serif">Station Ozonne</p><p style="text-transform: uppercase; background: #d2d9ff; color: #001689; padding: 6px 8px; font-family: Lato, sans-serif;font-size: .8vw; font-weight: 600; border-radius: 2px;"> Événement</p></div><p style="font-family: Lato, sans-serif; margin: 2em 0;">Mollat vous invite à découvrir son petit marché de <br/> Noël solidaire : stand, cadeaux et concerts <br/> acoustiques vous y attendent.</p><div style="display: flex; gap: 1vw; align-items: center;"> <button style="border: none; text-transform: uppercase; color: #fff; background: #001689; padding: 10px 25px; font-family: Lato, sans-serif">Découvrir</button> <img style="height: 100%; width: auto; object-fit: contain;" src="../../assets/grapesjs/facebook.svg"> </div></section>`,
    attributes: {
      class: 'fa fa-custom fa-fire'
    }
  })
}
popStore()
