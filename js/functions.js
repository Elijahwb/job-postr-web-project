function elemById(elemId) {
  return document.getElementById(elemId)
}

function getElems(query) {
  return document.querySelectorAll(query)
}

function toggleClass(elem,klas) {
  elem.classList.toggle(klas)
}

function addClass(elem,klas) {
  elem.classList.add(klas)
}

function removeClass(elem,klas) {
  elem.classList.remove(klas)
}

function attachEvent(elem,eve,func) {
  elem.addEventListener(eve,func)
}

function attachThreeEvents(elem, eve1, eve2, eve3, func1, func2, func3) {
  elem.addEventListener(eve1, func1)
  elem.addEventListener(eve2, func2)
  elem.addEventListener(eve3, func3)
}

function combineElems(elem1, elem2, eve, func) {
  elem1.forEach(function(elem){
    elem.addEventListener(eve,func)
  })
  elem2.forEach(function(elem) {
    elem.addEventListener(eve,func)
  })
}
