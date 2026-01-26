document.addEventListener('DOMContentLoaded', () => {
    const island = document.getElementById('dynamic-island')
    if (!island) return

    let expanded = false

    island.addEventListener('mouseenter', () => {
        island.classList.add('w-[420px]')
        island.classList.remove('w-[180px]')
        expanded = true
    })

    island.addEventListener('mouseleave', () => {
        island.classList.add('w-[180px]')
        island.classList.remove('w-[420px]')
        expanded = false
    })

    // Active link indicator
    const links = island.querySelectorAll('[data-link]')
    links.forEach(link => {
        link.addEventListener('click', () => {
            links.forEach(l => l.classList.remove('text-sky-400'))
            link.classList.add('text-sky-400')
        })
    })
})
