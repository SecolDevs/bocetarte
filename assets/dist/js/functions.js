$(document).ready(function() {
    $('.sidenav').sidenav();
    $('.slider').slider();
    $('.tabs').tabs();
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();
    $('textarea#textarea2').characterCounter();
    $('.materialboxed').materialbox();
});

AOS.init({
  easing: 'ease-out-back',
  duration: 1000
});
