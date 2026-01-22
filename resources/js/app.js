import './bootstrap';
import './rain';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.querySelectorAll('.reveal').forEach(el=>{
    const obs = new IntersectionObserver(([e])=>{
        if(e.isIntersecting) el.classList.add('show')
    },{threshold:0.2})
    obs.observe(el)
})
