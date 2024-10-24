$(document).ready(function(){
  //Page-loader
  if (document.getElementById('footer')) { 
    setTimeout(function(){
        document.querySelector('body').classList.add('loaded');
    }, 300);
  }

  //Close navbar on outside click
  $('body').bind('click', function(e) {
    if($(e.target).closest('.navbar').length == 0) {
      // click happened outside of .navbar, so hide
      var opened = $('.navbar-collapse').hasClass('collapse show');
      if ( opened === true ) {
          $('.navbar-collapse').collapse('hide');
          $('body').removeClass('overflow');
      }
    }
    // Offcanvas close on outside click
    if($(e.target).closest('.offcanvas').length == 0) {
      // click happened outside of .offcanvas, so hide
      if ($('.offcanvas').hasClass('show') ) {
          $('.offcanvas').removeClass('show');
      }
    }
    $(function opensidebar_blog() {
      document.querySelector(".blog-off-canvas").classList.add("show");
    });
    $(function closesidebar_blog() {
        (document.querySelector(".blog-off-canvas").classList.remove("show")), $(".blog-off-canvas a.active").remove("active"), $(this).add("active");
    })
    });


    $(".blog-toggler-btn").click(function () {
      $('.blog-off-canvas').addClass('.show')
    }),
    $(".blog-off-canvas .closebtn").click(function () {
        closesidebar_blog();
    }),
    $(".blog-off-canvas a").click(function () {
        closesidebar_blog();
    });
  //Overflow hidden on body when navbar is shown
  $(document).on('click', '.navbar-toggler', function () {
    $('body').toggleClass('overflow')
  });

//Functionality on Scroll
var selectElement=(elem)=>{
  return document.querySelector(elem);
}
window.addEventListener('scroll',function(){
  var scrollDistance = this.scrollY;
  // sticky navbar
  scrollDistance >1 ? this.document.querySelector('.header').classList.add('sticky-header') : this.document.querySelector('.header').classList.remove('sticky-header');

});
});

//Cookie Alert
//Creating Cookie storage
const cookieStorage = {
  getItem: (item) => {
      const cookies = document.cookie
          .split(';')
          .map(cookie => cookie.split('='))
          .reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {});
      return cookies[item];
  },
  setItem: (item, value) => {
    var date = new Date();
    date.setDate(date.getDate() + 90);
    document.cookie = `${item}=${value};expires=${date};path=/;`
  }
}

const storageType = cookieStorage;
const consentPropertyName = 'KrispCall';
const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
const saveToStorage = () => storageType.setItem(consentPropertyName, true);

window.onload = () => {

  const consentPopup = document.getElementById('cookies');
  const acceptBtn = document.getElementById('accept');
  
  //Saving the cookie to the storage and hiding popup if accepted
  if(acceptBtn){
    acceptBtn.addEventListener('click', function(event){
      saveToStorage(storageType);
      consentPopup.classList.add('hidden');
    });
  }

  //Hide if declined
  if(document.getElementById('decline')){
    document.getElementById('decline').addEventListener('click',function(){
      consentPopup.classList.add('hidden');
    })
  }

  //Show popup if cookie hasn't been stored
  if (shouldShowPopup(storageType)) {
      setTimeout(() => {
          consentPopup.classList.remove('hidden');
      }, 1500);
  }
};


