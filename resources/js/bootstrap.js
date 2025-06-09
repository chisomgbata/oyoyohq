import Swiper from 'swiper';
import {Autoplay, Navigation, Pagination} from "swiper/modules";

const swiper = new Swiper(".mySwiper", {
    modules: [Pagination, Navigation, Autoplay],
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return `
                <span class="${className}">
                    <svg class="bullet-progress" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                    <span class="bullet-inner"></span>
                </span>`;
        },
    },
    navigation: {
        nextEl: '#next-button',
        prevEl: '#prev-button',
    },
    on: {
        autoplayTimeLeft(s, time, progress) {
            const activeBullet = s.pagination.bullets[s.realIndex];
            if (activeBullet) {
                const progressCircle = activeBullet.querySelector('.bullet-progress circle');
                if (progressCircle) {
                    const circumference = progressCircle.r.baseVal.value * 2 * Math.PI;
                    progressCircle.style.strokeDashoffset = circumference - (progress * circumference);
                }
            }
        },
        slideChange(s) {
            // Reset all progress bars
            s.pagination.bullets.forEach(bullet => {
                const progressCircle = bullet.querySelector('.bullet-progress circle');
                if (progressCircle) {
                    const circumference = progressCircle.r.baseVal.value * 2 * Math.PI;
                    progressCircle.style.strokeDashoffset = circumference;
                }
            });
        }
    }
});
