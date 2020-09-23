if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker
      .register('/bocetarte/service-worker.js')
      .then((reg) => {
        console.log('Service worker registered.', reg)
      })
  })
}

$(document).ready(function () {
  $('.sidenav').sidenav()
  $('.slider').slider()
  $('.modal').modal()
  $('.tabs').tabs()
  $('.dropdown-trigger').dropdown()
  $('select').formSelect()
  $('textarea#textarea2').characterCounter()
  $('.materialboxed').materialbox()
  $('.tooltipped').tooltip()
})

AOS.init({
  easing: 'ease-out-back',
  duration: 1000,
})
