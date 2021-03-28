(function ($) {
	class Clock {
		constructor() {
			this.initializeClock();
		}

		initializeClock() {
			const t = setInterval( () => this.time(), 1000 );
		}

		numPad(str) {
			const cStr = str.toString();
			if (cStr.length < 2) {
				str = 0 + cStr;
			}
			return str;
		}

		time() {
			const currDate = new Date();
			const currSec = currDate.getSeconds();
			const currMin = currDate.getMinutes();
			const curr24Hr = currDate.getHours();
			const ampm = 12 <= curr24Hr ? 'pm' : 'am';
			let currHr = curr24Hr % 12;
			currHr = currHr ? currHr : 12;

			const stringTime =
				currHr +
				':' +
				this.numPad( currMin ) +
				':' +
				this.numPad( currSec );
			const timeEmojiEl = $('#time-emoji');

			if (curr24Hr >= 5 && 17 >= curr24Hr ) {
				timeEmojiEl.text('🌞');
			} else {
				timeEmojiEl.text('🌜');
			}

			$('#time').text(stringTime);
			$('#ampm').text(ampm);
		}
	}

	new Clock();
} )( jQuery );
