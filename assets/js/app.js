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
		576: {
			slidesPerView: 2,
			spaceBetween: 2,
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 2,
		},
		1024: {
			slidesPerView: 2,
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
	// on: {
	// 	init: function () {
	// 		console.log("swiper initialized");
	// 	},
	// },
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
	// on: {
	// 	init: function () {
	// 		console.log("swiper initialized");
	// 	},
	// },
});


// import { Calendar } from 'fullcalendar'
import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin, { Draggable } from '@fullcalendar/interaction';
import interaction from '@fullcalendar/interaction'


// let request_calendar = "./events.json";

import request_calendar from "./events.json";

document.addEventListener('DOMContentLoaded', function () {
	const calendarEl = document.getElementById('calendar')
	const calendar = new Calendar(calendarEl, {
		plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, interaction],
		initialView: "dayGridMonth",
		// select: { start: info.startStr, end: info.endStr, filledIn: true },
		headerToolbar: {
			left: "prev,title,next",
			right: "dayGridMonth,dayGridWeek,dayGridDay", // user can switch between the two
		},
		editable: true,
		selectable: true,
		// events: practiceTimes,
		dayHeaderFormat: { weekday: "long" },
		locale: "es",
		locales: [
			{
				code: "es",
				week: {
					dow: 1, // Monday is the first day of the week.
					doy: 4, // The week that contains Jan 4th is the first week of the year.
				},
				buttonText: {
					prev: "Ant",
					next: "Sig",
					today: "Hoy",
					month: "Mes",
					week: "Semana",
					day: "Día",
					list: "Agenda",
				},
				weekText: "Sm",
				allDayText: "Todo el día",
				moreLinkText: "más",
				noEventsText: "No hay eventos para mostrar",
			},
		],
		events: function (info, successCallback, failureCallback) {
			// console.log("request_calendar >>> ", request_calendar);
			fetch(request_calendar,{
					headers : { 
						'Content-Type': 'application/json',
						'Accept': 'application/json'
					}
    		})
			.then(function (response) {
				return response.json();
			})
			.then(function (data) {
				console.log("data >>> ", data.trace);
				let events = data.trace.map(function (event) {
					// console.log("event >>> ", event);
					return {
						title: event.eventTitle,
						start: new Date(event.eventStartDate),
						end: new Date(event.eventEndDate),
						timeStart: event.eventStartTime,
						timeEnd: event.eventEndTime,
						location: event.eventLocation,
						// url: event.eventUrl,
					};
				});
				successCallback(events);
			})
			.catch(function (error) {
				// console.log("error >>> ", error);
				failureCallback(error);
			});
		},
	});
	calendar.render();

	calendarEl.addEventListener("click", function (info) {
		if (info.event) {
			// Si hizo clic en un evento existente
			console.log("Clic en evento: " + info.event.title);
		} else {
			// Si hizo clic en un día sin evento
			console.log("Fecha clickeada: " + info.dateStr);
			manejarClicEnFecha(info.dateStr, "Otros datos");
			console.log("Fecha clickeada: " + info.startStr);
		}
	});

	function manejarClicEnFecha(fecha, otrosDatos) {
		// Puedes hacer algo con la fecha y otros datos aquí
		console.log("Fecha:", fecha);
		console.log("Otros datos:", otrosDatos);
	}


})

// Create Menu ---------------------------------------------------------------->

if ("ontouchstart" in window) {
	var click = "touchstart";
} else {
	var click = "click";
}

$("div.burger").on(click, function () {
	if (!$(this).hasClass("open")) {
		openMenu();
	} else {
		closeMenu();
	}
});

$("div.menu ul li a").on(click, function (e) {
	e.preventDefault();
	closeMenu();
});

function openMenu() {
	$("div.circles").addClass("expand");

	$("div.burger").addClass("open");
	$("div.x, div.y, div.z").addClass("collapse");
	$(".menu li").addClass("animate");

	setTimeout(function () {
		$("div.y").hide();
		$("div.x").addClass("rotate30");
		$("div.z").addClass("rotate150");
	}, 70);
	setTimeout(function () {
		$("div.x").addClass("rotate45");
		$("div.z").addClass("rotate135");
	}, 120);
}

function closeMenu() {
	$("div.burger").removeClass("open");
	$("div.x").removeClass("rotate45").addClass("rotate30");
	$("div.z").removeClass("rotate135").addClass("rotate150");
	$("div.circles").removeClass("expand");
	$(".menu li").removeClass("animate");

	setTimeout(function () {
		$("div.x").removeClass("rotate30");
		$("div.z").removeClass("rotate150");
	}, 50);
	setTimeout(function () {
		$("div.y").show();
		$("div.x, div.y, div.z").removeClass("collapse");
	}, 70);
}
