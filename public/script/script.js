document.addEventListener('DOMContentLoaded', function() {

    // const selectElement = document.getElementById('background-select');
    // const videoElement = document.getElementById('myVideo');

    // selectElement.addEventListener('change', function () {
    //     const selectedValue = selectElement.value;
    //     if (selectedValue === 'moon') {
    //         videoElement.innerHTML = `
    //             <source src="{{ asset('images/Typical Night Live Wallpaper.mp4') }}" type="video/mp4">
    //         `;
    //     } else if (selectedValue === 'sun') {
    //         videoElement.innerHTML = `
    //             <source src="{{ asset('images/Free stock video - Connections futuristic 3d geometry structure (loop).mp4') }}" type="video/mp4">
    //         `;
    //     } else {
    //         videoElement.innerHTML = ''; 
    //     }
    // });
    const themeSelect = document.getElementById("background-select");
    const savedTheme = localStorage.getItem("theme");
  
    if (savedTheme) {
      document.documentElement.classList.add(savedTheme);
      themeSelect.value = savedTheme;
    }
  
    themeSelect.addEventListener("change", function() {
      document.documentElement.classList.remove("dark", "light", "color");
      document.documentElement.classList.add(this.value);
      localStorage.setItem("theme", this.value);
    });

    let listTab = document.querySelectorAll('.tab');
    let listBg = document.querySelectorAll('.bg'); 
    let titleBanner = document.querySelector('.title-banner'); 

    const slides = document.querySelectorAll('input[name="slide"]');
    const container = document.querySelector('.custom-scrollbar');
    let currentSlide = 0;

    const changeSlide = () => {
        slides[currentSlide].checked = false;
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].checked = true;

        const newSlide = slides[currentSlide].nextElementSibling;
        const newSlideLeft = newSlide.offsetLeft;

        container.scroll({
            left: newSlideLeft,
            behavior: 'smooth'
        });
    };

    setInterval(changeSlide, 3000);

    window.addEventListener("scroll", () => {
        let top = window.scrollY;

        listBg.forEach((bg, index) => {
            if (index != 0 && index != 8) {
                bg.style.transform = `translateY(${(top * index / 2)}px)`;
            } else if (index == 0) {
                bg.style.transform = `translateY(${(top / 3)}px)`;
            }
        });

        if (titleBanner) {
            titleBanner.style.transform = `translateY(${(top * 4 / 2)}px)`;
        }

        listTab.forEach(tab => {
            if (tab.offsetTop - top < 400) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    });
});
