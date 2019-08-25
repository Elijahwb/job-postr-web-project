//dealing with the menu in the mobile view of the site, opening the menu and closing it
attachThreeEvents(elemById('menu'),'click','mouseover','mouseout',()=>{
  toggleClass(elemById('menu'),'open')
  toggleClass(elemById('nav'),'nav-hide')
  toggleClass(elemById('body'),'body-noscroll')
},()=> {
  addClass(elemById('header-bg'),'whiten')
  addClass(elemById('logo'),'darken')
},()=> {
  console.log('mouse is out')
  removeClass(elemById('header-bg'),'whiten')
  removeClass(elemById('logo'),'darken')
})

//dealing with closing of the job poster error
if(postJobError != false){
  attachEvent(elemById('close-error'),'click',()=>{
    toggleClass(elemById('post-job-error-container'),'hide')
  })
}

//dealing with the functionality of showing more job inforamtion and also minimazing it
getElems('#more').forEach( function(button,event) {
  attachEvent(button,'click', function(){
    toggleClass(elemById(`${this.previousElementSibling.id}`),'hide');
    toggleClass(elemById(`${this.previousElementSibling.previousElementSibling.id}`),'hide');
    console.log(this)
  })
})

//elements that are sharing an event and functionality
combineElems(getElems('#more-1'), getElems('#more-2'), 'click', event =>{
  alert('Functionality not yet active')
})
