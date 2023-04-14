const CAL_API = Cypress.env('CAL_API') 
const CAL_ID = Cypress.env('CAL_ID') 
const ID_TOKEN = Cypress.env('ID_TOKEN') 
const ID = Cypress.env('ID') 
const BASEPARAMS = `orderBy=startTime&singleEvents=true&timeMin=${new Date().toISOString()}`;
const BASEURL = `https://www.googleapis.com/calendar/v3/calendars/${CAL_ID}/events?${BASEPARAMS}`;
// tokens and api details from env.json files

const finalURL = `${BASEURL}&key=${CAL_API}`;

// https://docs.cypress.io/guides/core-concepts/variables-and-aliases

describe('Google analytics api test', () => {
	beforeEach(() => {
		cy.request('GET', finalURL).as('google');
	});

	it('returns events', () => {
		cy.get('@google').then((response) => {
			expect(response.status).to.eq(200);
			expect(response.body.items).to.have.property('length')
		});
	});

	it('api event text appears in container calender div', () => {
		cy.get('@google').then((response) => {
			const description = response.body.items[0]['description'];
			cy.visit('http://mysite.test/');
			cy.get('.container-calender').should('contain.text', description);
		});
	});
});

describe('Twitter api tests', () => {
	beforeEach(() => {
		cy.request({
			method: 'GET',
			url: `https://api.twitter.com/2/users/${ID}/tweets?exclude=retweets&max_results=5&user.fields=profile_image_url&expansions=author_id`,

			headers: {
				Authorization: `Bearer ${ID_TOKEN}`,
			},
		}).as('details');
	});
	it('api status and correct amount of tweets', () => {
		cy.get('@details').then((response) => {
			expect(response.status).to.eq(200);
			expect(response.body.data).to.have.property('length')
		});
	});
	it('gets a list of users', () => {
		cy.get('@details').then((response) => {
			const text = response.body.data[0]['text'];
			cy.visit('http://mysite.test/');
			cy.get('.container-tweet')
				.first()
				.find('p')
				.should('have.text', text);
		});
	});
});
