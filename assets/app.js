import './bootstrap.js'
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'
import './styles/styles.css'

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉')

document.addEventListener('DOMContentLoaded', () => {
  const floatInputs = document.querySelectorAll('.js-price')

  floatInputs.forEach(input => {
    input.addEventListener('input', () => {
      input.value = input.value.replace(/[^0-9,]/g, '')

      if (input.value.indexOf(',') !== -1) {
        let parts = input.value.split(',')
        if (parts[1].length > 2) {
          input.value = parts[0] + ',' + parts[1].slice(0, 2)
        }
      }
    })
  })
})
