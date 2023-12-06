import "../css/app.scss";
import $, { get } from 'jquery'
window.jQuery = $;
global.$ = global.jQuery = $;

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// init Swiper:
const swpConferencistas = new Swiper(".swp_conferencistas", {
	// observer: true,
	// observeParents: true,
	// parallax: true,
	//pagination
	pagination: {
		el: ".swiper-pagination",
		// type: "bullets",
		// clickable: true,
	},
	speed: 400,

	// Navigation arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},

	// And if we need scrollbar
	scrollbar: {
		el: '.swiper-scrollbar',
	},
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	breakpoints: {
		// when window width is >= 280px
		280: {
			slidesPerView: 1,
			spaceBetween: 12,
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 2,
		},
		1024: {
			slidesPerView: 3,
			spaceBetween: 2,
		},
		1240: {
			slidesPerView: 3,
			spaceBetween: 2,
		},
		1920: {
			slidesPerView: 3,
			spaceBetween: 2,
		},
		3543: {
			slidesPerView: 4,
			spaceBetween: 30,
		},
	},
	on: {
		init: function () {
			console.log("swiper initialized");
		},
	},
});

const swpNextCourse = new Swiper(".swp_next_course", {
	// observer: true,
	// observeParents: true,
	// parallax: true,
	//pagination
	pagination: {
		el: ".swiper-pagination",
		// type: "bullets",
		// clickable: true,
	},
	speed: 400,

	// Navigation arrows
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},

	// And if we need scrollbar
	scrollbar: {
		el: ".swiper-scrollbar",
	},
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	breakpoints: {
		// when window width is >= 280px
		280: {
			slidesPerView: 1,
			spaceBetween: 12,
		},
		768: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		1024: {
			slidesPerView: 1.1,
			spaceBetween: 20,
		},
		1240: {
			slidesPerView: 1.5,
			spaceBetween: 20,
		},
		1920: {
			slidesPerView: 1.7,
			spaceBetween: 20,
		},
		3543: {
			slidesPerView: 1,
			spaceBetween: 30,
		},
	},
	on: {
		init: function () {
			console.log("swiper initialized");
		},
	},
});


// import { Calendar } from 'fullcalendar'
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interaction from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin, { Draggable } from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
	const calendarEl = document.getElementById('calendar')
	const calendar = new Calendar(calendarEl, {
		events: '',
		plugins: [dayGridPlugin],
		initialView: 'dayGridMonth',
		headerToolbar: {
			left: 'prev,title,next',
			right: 'dayGridMonth,dayGridWeek,dayGridDay' // user can switch between the two
		},
		dayHeaderFormat: { weekday: 'long' },
		locale: 'es',
		locales: [{
			code: 'es',
			week: {
				dow: 1, // Monday is the first day of the week.
				doy: 4  // The week that contains Jan 4th is the first week of the year.
			},
			buttonText: {
				prev: "Ant",
				next: "Sig",
				today: "Hoy",
				month: "Mes",
				week: "Semana",
				day: "Día",
				list: "Agenda"
			},
			weekText: "Sm",
			allDayText: "Todo el día",
			moreLinkText: "más",
			noEventsText: "No hay eventos para mostrar",
		}]
	})
	calendar.render();
})
console.log(" APP ready");

