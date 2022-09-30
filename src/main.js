const burgerMenuHTML = document.querySelector('#burgerMenu')
const navBarHTML = document.querySelector('#navBar')
const navLinksHTML = document.querySelectorAll('.navLinks')

burgerMenuHTML.addEventListener('click', toggleNavBar)

navLinksHTML.forEach((navLink) => {
  navLink.addEventListener('click', toggleNavBar)
})

function toggleNavBar() {
  navBarHTML.classList.toggle('hidden')
  navBarHTML.classList.toggle('block')
}
