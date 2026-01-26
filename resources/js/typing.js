const words = [
  "Fahri Noor Royyan",
  "Web Developer",
  "Laravel Engineer",
  "UI Designer"
]

let i = 0
let j = 0
let current = ""
let isDeleting = false
const el = document.getElementById("typing")

function type() {
  if (!el) return

  current = words[i]

  if (!isDeleting) {
    el.textContent = current.slice(0, ++j)
    if (j === current.length) {
      setTimeout(() => isDeleting = true, 1400)
    }
  } else {
    el.textContent = current.slice(0, --j)
    if (j === 0) {
      isDeleting = false
      i = (i + 1) % words.length
    }
  }
  setTimeout(type, isDeleting ? 60 : 120)
}

type()
