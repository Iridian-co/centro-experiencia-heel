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
			spaceBetween: 2,
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
import events from './events.json';

document.addEventListener('DOMContentLoaded', function () {
	const calendarEl = document.getElementById("calendar");
	let draggableEl = document.getElementById("mydraggable");

	const calendar = new Calendar(calendarEl, {
		plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, interaction],
		droppable: true,
		initialView: "dayGridMonth",
		// select: { start: info.startStr, end: info.endStr, filledIn: true },
		headerToolbar: {
			left: "prev,title,next",
			right: "dayGridMonth,dayGridWeek,dayGridDay", // user can switch between the two
		},
		views: {
			dayGridMonth: {
				// name of view
				titleFormat: { year: "numeric", month: "short" },
				// other view-specific options here
			},
		},
		editable: true,
		selectable: true,
		select: function (start, end, allDays) {
			console.log("select event start", start, end, allDays);
		},
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
		events: events,
		eventContent: function (info) {
			// console.log(">>> Contenedor ", info.view);
			return {
				html: `
				<div class="score_cursos fw_400 color_blanco fz_min ${info.event.extendedProps.colorido}">${info.event.extendedProps.cursos}</div>
                <div class="background_events">
					<div class="bg_gradient_azul_2 brd_rds_5 mb-2 d-flex justify-content-between w-100">
						<hr class="linea_vertical_date my-0 ${info.event.extendedProps.colorido}">
						<div class="pe-2 pb-1 w-100">
							<div class="d-flex justify-content-between align-items-start">
								<p class="fz_p fw_400 color_azul_1 tres_puntos ps-2 my-2">${info.event.title}</p>
							</div>
						</div>
					</div>
				</div>
					`,
				// <div>Location: ${info.event.extendedProps.location}</div>
				// <div>Date: ${info.event.start.toLocaleDateString("es-US",
				// {month: "long",day: "numeric",year: "numeric",})}</div>
				// <div>Time: ${info.event.extendedProps.timeStart} - ${info.event.extendedProps.timeEnd}</div>
			};
		},
		//hover events
		eventMouseEnter: function (mouseEnterInfo) {
			// console.log(mouseEnterInfo);
			let el = mouseEnterInfo.el;
			el.classList.add("relative");
			// console.log(">>> " + JSON.stringify(mouseEnterInfo) );

			let newEl = document.createElement("div");
			let newElTitle = mouseEnterInfo.event.title;
			// let newElLocation = mouseEnterInfo.event.extendedProps.location;
			newEl.innerHTML = `
                <div class="fc-hoverable-event"
                    style="position: absolute; bottom: 100%; left: 0; width: 300px; height: auto; background-color: white; z-index: 50; border: 1px solid #e2e8f0; border-radius: 0.375rem; padding: 0.75rem; font-size: 14px; font-family: 'Inter', sans-serif; cursor: pointer;"
                >
                    <strong>${newElTitle}</strong>
                </div>
            `;
			el.after(newEl);
		},
		eventMouseLeave: function () {
			document.querySelector(".fc-hoverable-event").remove();
		},
		//multiples events
		dayMaxEventRows: 3,
		//trae clic event
		dayCellDidMount: function (info) {
			// let elemento = document.getElementsByClassName(
			// 	"fc-scrollgrid-sync-inner"
			// );
			

			info.el.addEventListener("click", function () {
				// info.el.style.backgroundColor = "red";
				// info.dow.style.backgroundColor = "yellow";
				console.log("dow >>> " + JSON.stringify(info.dow));
				console.log("getDay >>> " + JSON.stringify(info.date.getDay()));
				// console.log("info >>> " + JSON.stringify(info));
				// console.log("el >>> " + JSON.stringify(info.el.style));
				if (info.date.getDay() === 0) {
					info.view.dateEnv.locale.week.dow = "red";
					// Domingo
					// info.date.getDay(0).style.backgroundColor = "red";
					// info.el.style.backgroundColor = "red";
				}
			});
		},
		dateClick: function (info) {
			// let elemento = document.querySelector(".fc-scrollgrid-sync-inner");
			let elemento = document.querySelector('[aria-label="domingo"]');
			elemento.classList.add("clicked");
			console.log("elemento >>> " + elemento);
			console.log("textContent >>> " + elemento.textContent);
			// alert("Clicked on: " + info.dateStr);
			// alert("Current view: " + info.view.type);
			// change the day's background color just for fun
			// info.dayEl.style.backgroundColor = "red";
		},
	});
	calendar.render();

	// Event Dragging
	new Draggable(containerEl, {
		itemSelector: ".item-class",
		eventData: function (eventEl) {
			return {
				title: eventEl.innerText,
				duration: "02:00",
			};
		},
	});

	// calendarEl.addEventListener("click", function (info) {
	// 	console.log("info ", info);
	// 	if (info.event) {
	// 		// Si hizo clic en un evento existente
	// 		console.log("Clic en evento: " + info.event.title);
	// 	} else {
	// 		// Si hizo clic en un día sin evento
	// 		console.log("Fecha clickeada: " + info.dateStr);
	// 		manejarClicEnFecha(info.dateStr, "Otros datos");
	// 	}
	// });

	// function manejarClicEnFecha(fecha, otrosDatos) {
	// 	// Puedes hacer algo con la fecha y otros datos aquí
	// 	console.log("Fecha:", fecha);
	// 	console.log("Otros datos:", otrosDatos);
	// }
})

// Create Menu ---------------------------------------------------------------->

// if ("ontouchstart" in window) {
// 	var click = "touchstart";
// } else {
// 	var click = "click";
// }

// $("div.burger").on(click, function () {
// 	if (!$(this).hasClass("open")) {
// 		openMenu();
// 	} else {
// 		closeMenu();
// 	}
// });

// $("div.menu ul li a").on(click, function (e) {
// 	e.preventDefault();
// 	closeMenu();
// });

// function openMenu() {
// 	$("div.circles").addClass("expand");

// 	$("div.burger").addClass("open");
// 	$("div.x, div.y, div.z").addClass("collapse");
// 	$(".menu li").addClass("animate");

// 	setTimeout(function () {
// 		$("div.y").hide();
// 		$("div.x").addClass("rotate30");
// 		$("div.z").addClass("rotate150");
// 	}, 70);
// 	setTimeout(function () {
// 		$("div.x").addClass("rotate45");
// 		$("div.z").addClass("rotate135");
// 	}, 120);
// }

// function closeMenu() {
// 	$("div.burger").removeClass("open");
// 	$("div.x").removeClass("rotate45").addClass("rotate30");
// 	$("div.z").removeClass("rotate135").addClass("rotate150");
// 	$("div.circles").removeClass("expand");
// 	$(".menu li").removeClass("animate");

// 	setTimeout(function () {
// 		$("div.x").removeClass("rotate30");
// 		$("div.z").removeClass("rotate150");
// 	}, 50);
// 	setTimeout(function () {
// 		$("div.y").show();
// 		$("div.x, div.y, div.z").removeClass("collapse");
// 	}, 70);
// }


/* function gridSize(){

} */

// cambiar Color ---------------------------------------------------------------->
function dropdown() {
	$(".dropdown_menu").toggle();
}

function dropdownSesion() {
	$(".dropdown_sesion").toggle();
}

// Menu  ---------------------------------------------------------------->
//Regular Javascript
var navicon = document.getElementById("navicon");
var navEl = document.getElementById("siteNav");

function toggleMenu() {
	navEl.classList.toggle("hidden");
	// console.log("menu hidden");
}

navicon.addEventListener("click", toggleMenu, false);

const elemento = document.getElementById("siteNav");
if (window.matchMedia("(max-width: 1024px)").matches) {
	elemento.classList.add("hidden");
}
