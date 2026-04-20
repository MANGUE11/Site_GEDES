// ==================== SLIDER FUNCTIONS ====================
let currentSlideIndex = 0
let slideTimer

function changeSlide(n) {
  clearTimeout(slideTimer)
  showSlide((currentSlideIndex += n))
  startAutoSlide()
}

function currentSlide(n) {
  clearTimeout(slideTimer)
  showSlide((currentSlideIndex = n))
  startAutoSlide()
}

function showSlide(n) {
  const slides = document.querySelectorAll('.slide')
  const dots = document.querySelectorAll('.dot')

  // Boucle circulaire : fonctionne dans les deux sens sans page noire
  currentSlideIndex = ((n % slides.length) + slides.length) % slides.length

  slides.forEach((slide) => (slide.style.display = 'none'))
  dots.forEach((dot) => dot.classList.remove('active'))

  slides[currentSlideIndex].style.display = 'block'
  if (dots[currentSlideIndex]) {
    dots[currentSlideIndex].classList.add('active')
  }
}

function startAutoSlide() {
  slideTimer = setTimeout(() => {
    currentSlideIndex++
    showSlide(currentSlideIndex)
    startAutoSlide()
  }, 5000)
}

// Initialize slider
document.addEventListener('DOMContentLoaded', () => {
  showSlide(currentSlideIndex)
  startAutoSlide()
})

// ==================== MENU TOGGLE ====================
function toggleMenu() {
  const hamburger = document.querySelector('.hamburger')
  const nav = document.getElementById('mainNav')
  hamburger.classList.toggle('active')
  nav.classList.toggle('active')
}

// ==================== SUBMENU TOGGLE (MOBILE) — solution robuste ====================
function toggleSubmenu(event) {
  // Géré directement par le listener DOMContentLoaded ci-dessous
}

document.addEventListener('DOMContentLoaded', () => {
  function closeAllSubmenus() {
    document.querySelectorAll('li.smenu').forEach((el) => {
      el.classList.remove('active')
      const span = el.querySelector('a > span')
      if (span) span.textContent = '+'
    })
  }

  document.querySelectorAll('li.smenu > a').forEach((link) => {
    link.addEventListener('click', (e) => {
      if (window.innerWidth > 768) return
      e.preventDefault()
      e.stopPropagation()
      const li = link.parentElement
      const isOpen = li.classList.contains('active')
      const span = link.querySelector('span')
      // Ferme tous les sous-menus ouverts
      closeAllSubmenus()
      // Si c'était fermé → on l'ouvre
      if (!isOpen) {
        li.classList.add('active')
        if (span) span.textContent = '−'
      }
    })
  })

  // Ferme le submenu si on clique en dehors
  document.addEventListener('click', () => {
    closeAllSubmenus()
  })
})

// ==================== CLOSE MENU ON LINK CLICK ====================
document.querySelectorAll('nav a').forEach((link) => {
  link.addEventListener('click', () => {
    // Ne pas fermer le nav quand on clique sur le toggle SERVICES (mobile)
    if (link.parentElement.classList.contains('smenu')) return

    const hamburger = document.querySelector('.hamburger')
    const nav = document.getElementById('mainNav')

    if (hamburger && nav) {
      hamburger.classList.remove('active')
      nav.classList.remove('active')
    }
  })
})

// ==================== SMOOTH SCROLL ====================
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    const href = this.getAttribute('href')
    if (!href || href === '#') return  // Skip bare # (dropdown toggles)
    e.preventDefault()
    const target = document.querySelector(href)
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' })
    }
  })
})

// ==================== INTERSECTION OBSERVER FOR ANIMATIONS ====================
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px',
}

const observer = new IntersectionObserver(function (entries) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.animation = 'slideInUp 0.6s ease forwards'
      observer.unobserve(entry.target)
    }
  })
}, observerOptions)

// Observe service cards and stat cards for animation
document.querySelectorAll('.service-card, .stat-card').forEach((el) => {
  el.style.opacity = '0'
  observer.observe(el)
})

// ==================== RESPONSIVE MENU CLOSE ON RESIZE ====================
window.addEventListener('resize', () => {
  if (window.innerWidth > 768) {
    const hamburger = document.querySelector('.hamburger')
    const nav = document.getElementById('mainNav')

    if (hamburger && nav) {
      hamburger.classList.remove('active')
      nav.classList.remove('active')
    }
  }
})

// ==================== HEADER SHADOW ON SCROLL ====================
window.addEventListener('scroll', () => {
  const header = document.querySelector('header')
  if (window.scrollY > 50) {
    header.style.boxShadow = '0 4px 24px rgba(0,0,0,0.12)'
  } else {
    header.style.boxShadow = '0 2px 16px rgba(0,0,0,0.08)'
  }
})

// ==================== ACTIVE NAV LINK ON SCROLL ====================
window.addEventListener('scroll', () => {
  const sections = document.querySelectorAll('section')
  const navLinks = document.querySelectorAll('nav a')

  let current = ''
  sections.forEach((section) => {
    const sectionTop = section.offsetTop
    if (scrollY >= sectionTop - 200) {
      current = section.getAttribute('id')
    }
  })

  navLinks.forEach((link) => {
    link.classList.remove('active')
    if (link.getAttribute('href').slice(1) === current) {
      link.classList.add('active')
    }
  })
})

// ==================== LAZY LOADING IMAGES ====================
if ('IntersectionObserver' in window) {
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target
        img.src = img.dataset.src
        img.classList.add('loaded')
        imageObserver.unobserve(img)
      }
    })
  })

  document.querySelectorAll('img[data-src]').forEach((img) => {
    imageObserver.observe(img)
  })
}

// ==================== SMOOTH PAGE LOAD ====================
window.addEventListener('load', () => {
  document.body.style.opacity = '1'
})

document.body.style.opacity = '0'
document.addEventListener('DOMContentLoaded', () => {
  document.body.style.transition = 'opacity 0.5s ease-in-out'
  document.body.style.opacity = '1'
})

// ==================== UTILITY: Check if element is in viewport ====================
function isInViewport(element) {
  const rect = element.getBoundingClientRect()
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  )
}

// ==================== SCROLL TO TOP BUTTON ====================
const scrollTopBtn = document.createElement('button')
scrollTopBtn.innerHTML = '↑'
scrollTopBtn.style.cssText = `
	position: fixed;
	bottom: 30px;
	right: 30px;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background: linear-gradient(135deg, #0891B2 0%, #0E7490 100%);
	color: white;
	border: none;
	cursor: pointer;
	font-size: 24px;
	z-index: 999;
	display: none;
	transition: all 0.3s ease;
	box-shadow: 0 10px 25px rgba(8, 145, 178, 0.3);
	font-weight: bold;
`

document.body.appendChild(scrollTopBtn)

window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    scrollTopBtn.style.display = 'flex'
    scrollTopBtn.style.alignItems = 'center'
    scrollTopBtn.style.justifyContent = 'center'
  } else {
    scrollTopBtn.style.display = 'none'
  }
})

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  })
})

scrollTopBtn.addEventListener('mouseenter', () => {
  scrollTopBtn.style.transform = 'scale(1.1)'
})

scrollTopBtn.addEventListener('mouseleave', () => {
  scrollTopBtn.style.transform = 'scale(1)'
})

// ==================== MARK ACTIVE PAGE LINK ====================
document.addEventListener('DOMContentLoaded', () => {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html'
  const navLinks = document.querySelectorAll('nav a')

  navLinks.forEach((link) => {
    const href = link.getAttribute('href')
    if (
      href === currentPage ||
      (currentPage === '' && href === 'index.html') ||
      (href.includes('savoir') && currentPage.includes('savoir'))
    ) {
      link.classList.add('active')
    }
  })
})

// ==================== INITIALIZATION ====================
console.log('✓ GEDES International - Design Premium Loaded')
