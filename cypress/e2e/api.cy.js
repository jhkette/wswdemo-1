const CAL_API = 'AIzaSyBs4W8WmNLu8Kx3H7b9bjYUn5qPYcRwo-k';
const CAL_ID = 'joseph.ketterer@gmail.com';
const BASEPARAMS = `orderBy=startTime&singleEvents=true&timeMin=${new Date().toISOString()}`;
const BASEURL = `https://www.googleapis.com/calendar/v3/calendars/${CAL_ID}/events?${BASEPARAMS}`;

const finalURL = `${BASEURL}&key=${CAL_API}`;

// https://docs.cypress.io/guides/core-concepts/variables-and-aliases

describe('Google analytics api test', () => {
	beforeEach(() => {
		cy.request('GET', finalURL).as('google');
	});

	it('returns events', () => {
		cy.get('@google').then((response) => {
			expect(response.status).to.eq(200);
			expect(response.body.items).length.to.be.greaterThan(1);
		});
	});

	it('api eevent text appears in container calender div', () => {
		cy.get('@google').then((response) => {
			const description = response.body.items[0]['description'];
			cy.visit('http://mysite.test/');
			cy.get('.container-calender').should('contain.text', description);
		});
	});

});

describe('Twitter api tests', () => {
	beforeEach(() => {
		const id_token =
			'AAAAAAAAAAAAAAAAAAAAABOulgEAAAAAbkmecjNGMtjbJNBOpYQJ9FjAorw%3DO56kDoU2ymuENPHA5iAdqQmq8W7aiDvz2RnYvHrV6HDjIBm9rp';

		const id = '477141267';
		cy.request({
			method: 'GET',
			url: `https://api.twitter.com/2/users/${id}/tweets?exclude=retweets&max_results=5&user.fields=profile_image_url&expansions=author_id`,

			headers: {
				Authorization: `Bearer ${id_token}`,
			},
		}).as('details');
	});
	it('api status', () => {
		cy.get('@details').then((response) => {
			expect(response.status).to.eq(200);
			expect(response.body.data.length).to.eq(5);
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
