import './bootstrap';
import 'aos/dist/aos.css';
import AOS from 'aos';

// Initialiser AOS avec des options spécifiques
AOS.init({
    startEvent: 'DOMContentLoaded', // Initialiser AOS dès que le DOM est chargé
    once: true, // L'animation ne se reproduira qu'une seule fois
});